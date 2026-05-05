<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Models\TransactionItem;

class TransactionController extends Controller
{
    public function pos() 
    {
        $items = Item::with('category')->where('stock', '>', 0)->get();
        return view('transactions.pos', compact('items'));
    }
    public function index() 
    {
        $transactions = Transaction::with('user')->latest()->paginate(15);
        return view('transactions.index', compact('transactions'));
    }
    public function store(Request $request)
    {
        $cartData = json_decode($request->cart, true);
        $total    = $request->total;
        $payment  = $request->payment ?? 0;
        $change   = $request->change ?? 0;

        if (empty($cartData)) {
            return back()->with('error', 'Keranjang kosong!');
        }

        // SERVER-SIDE stock validation (exam requirement #6)
        foreach ($cartData as $cartItem) {
            $item = Item::find($cartItem['id']);
            if (!$item || $item->stock < $cartItem['qty']) {
                return back()->with('error', "Stok {$item->name} tidak cukup!");
            }
        }

        // Validate payment
        if ($payment < $total) {
            return back()->with('error', 'Jumlah pembayaran tidak cukup!');
        }

        // Wrap in DB transaction for safety
        $transaction = DB::transaction(function () use ($cartData, $total, $payment, $change) {
            $tx = Transaction::create([
                'user_id' => auth()->id(),
                'total'   => $total,
                'payment' => $payment,
                'change'  => $change,
            ]);

            foreach ($cartData as $cartItem) {
                $item = Item::find($cartItem['id']);

                // Save transaction item
                TransactionItem::create([
                    'transaction_id' => $tx->id,
                    'item_id'        => $item->id,
                    'qty'            => $cartItem['qty'],
                    'price'          => $item->price,
                ]);

                // Deduct stock (exam requirement #8)
                $item->decrement('stock', $cartItem['qty']);
            }

            return $tx;
        });

        // Redirect to receipt (exam requirement #9)
        return redirect()->route('transactions.show', $transaction->id)->with('success', 'Transaksi berhasil!');
    }
    public function show($id) 
    {
        $transaction = Transaction::with(['user', 'items.item'])->findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }

    public function download($id)
    {
        $transaction = Transaction::with(['user', 'items.item'])->findOrFail($id);
        $pdf = \PDF::loadView('transactions.receipt-pdf', compact('transaction'));
        return $pdf->download('Struk-' . str_pad($transaction->id, 5, '0', STR_PAD_LEFT) . '.pdf');
    }
}
