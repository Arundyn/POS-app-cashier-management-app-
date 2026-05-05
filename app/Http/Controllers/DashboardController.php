<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $totalCategories  = Category::count();
        $totalItems       = Item::count();
        $totalTransactions = Transaction::count();
        $totalRevenue     = Transaction::sum('total');
        $recentTx         = Transaction::with('user')->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalCategories', 'totalItems',
            'totalTransactions', 'totalRevenue', 'recentTx'
        ));
    }
}
