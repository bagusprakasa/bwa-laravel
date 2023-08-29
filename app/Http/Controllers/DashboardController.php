<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Dashboard';
        $totalTransaction = Transaction::selectRaw('Sum(transaction_total) as grandTotal')->where('transaction_status', 'SUCCESS')->get();
        $sales = Transaction::count();
        $success = Transaction::where('transaction_status', 'SUCCESS')->count();
        $pending = Transaction::where('transaction_status', 'PENDING')->count();
        $failed = Transaction::where('transaction_status', 'FAILED')->count();
        $data = array(
            'title' => 'Dashboard',
            'totalTransaction' => $totalTransaction,
            'transaction' => Transaction::orderBy('id', 'asc')->limit(10)->get(),
            'sales' => $sales,
            'success' => $success,
            'pending' => $pending,
            'failed' => $failed,
        );
        // return $data;
        return view('pages.dashboard.index', compact('title', 'data'));
    }
}
