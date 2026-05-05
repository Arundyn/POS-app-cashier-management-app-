@push('scripts')
<style>
    @media print {
        nav, .no-print { display: none !important; }
        body { background: white !important; }
    }
</style>
@endpush
<x-app-layout>
<div class="max-w-md mx-auto my-8 bg-white shadow-lg rounded-lg p-6">
  <div class="text-center border-b pb-4 mb-4">
    <h2 class="text-2xl font-bold">TOKO SERBAGUNA ARASHIYA</h2>
    <p class="text-gray-500 text-sm">No. #{{ str_pad($transaction->id, 5, '0', STR_PAD_LEFT) }}</p>
    <p class="text-gray-500 text-sm">{{ $transaction->created_at->format('d M Y, H:i') }}</p>
    {{-- Exam requirement #10: show cashier name --}}
    <p class="text-sm font-medium mt-1">Kasir: {{ $transaction->user->name }}</p>
  </div>

  <table class="w-full text-sm mb-4">
    <thead>
      <tr class="border-b">
        <th class="text-left pb-2">Item</th>
        <th class="text-center pb-2">Qty</th>
        <th class="text-right pb-2">Subtotal</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($transaction->items as $txItem)
      <tr class="border-b">
        <td class="py-2">
          {{ $txItem->item->name }}
          <br><span class="text-gray-400 text-xs">@ Rp {{ number_format($txItem->price, 0, ',', '.') }}</span>
        </td>
        <td class="text-center py-2">{{ $txItem->qty }}</td>
        <td class="text-right py-2">Rp {{ number_format($txItem->price * $txItem->qty, 0, ',', '.') }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="border-t pt-3">
    <div class="flex justify-between font-bold text-lg mb-2">
      <span>TOTAL</span>
      <span>Rp {{ number_format($transaction->total, 0, ',', '.') }}</span>
    </div>
    <div class="flex justify-between text-gray-700 mb-2">
      <span>Bayar</span>
      <span>Rp {{ number_format($transaction->payment, 0, ',', '.') }}</span>
    </div>
    @if (isset($transaction->change) && $transaction->change >= 0)
    <div class="flex justify-between font-bold text-green-700 bg-green-50 p-2 rounded">
      <span>KEMBALIAN</span>
      <span>Rp {{ number_format($transaction->change, 0, ',', '.') }}</span>
    </div>
    @endif
  </div>

  <div class="mt-6 flex gap-3 no-print" >
    <a href="{{ route('transactions.pos') }}"
       class="flex-1 text-center bg-blue-600 text-white py-2 rounded">Transaksi Baru</a>
    <button onclick="window.print()"
       class="flex-1 bg-green-600 text-white py-2 rounded">🖨️ Print Struk</button>
  </div>
  <div class="mt-6 flex gap-3 no-print" >
    <a href="{{ route('transactions.index') }}"
       class="flex-1 text-center bg-gray-200 text-gray-700 py-2 rounded">History</a>
    <a href="{{ route('transactions.download', $transaction->id) }}"
       class="flex-1 text-center bg-yellow-500 text-white py-2 rounded">📥 Download PDF</a>
  </div>
</div>
</x-app-layout>