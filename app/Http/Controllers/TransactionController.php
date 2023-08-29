<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Transaction';
        $data = array(
            'list' => 'List Transaction',
            'data' => Transaction::get(),
        );
        return view('pages.transaction.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $data = array(
            'transaction' => $transaction,
            'details' => TransactionDetail::with('product')->where('transactions_id', $transaction->id)->get()
        );
        return view('pages.transaction.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $title = 'Transaction';
        $data = array(
            'list' => 'Edit Transaction ' . $transaction->uuid,
            'menu' => 'Transaction',
            'type' => 'edit',
            'data' => $transaction,
        );
        return view('pages.transaction.form', compact('title', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        DB::beginTransaction();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
            'address' => 'required',
        ]);
        try {
            $transaction->name = $request->name;
            $transaction->email = $request->email;
            $transaction->number = $request->phone;
            $transaction->address = $request->address;
            $transaction->save();

            DB::commit();

            return redirect()->route('transaction.index')->with('success', 'Transaction updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Something wrong. : ' . $e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Something wrong on database : ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        DB::beginTransaction();
        try {
            $transaction->delete();
            TransactionDetail::where('transactions_id', $transaction->id)->delete();

            DB::commit();

            return redirect()->route('transaction.index')->with('success', 'Transaction has been deleted.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Something wrong. : ' . $e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Something wrong on database : ' . $e->getMessage());
        }
    }

    public function setStatus(Request $request, $id)
    {
        DB::beginTransaction();
        $request->validate([
            'status' => 'required|in:PENDING,SUCCESS,FAILED',
        ]);
        try {
            $transaction = Transaction::find($id);
            $transaction->transaction_status = $request->status;
            $transaction->save();

            DB::commit();

            return redirect()->route('transaction.index')->with('success', 'Transaction set status successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Something wrong. : ' . $e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Something wrong on database : ' . $e->getMessage());
        }
    }
}
