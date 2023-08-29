<?php

namespace App\Http\Controllers\API\v1;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
            'address' => 'required',
            'transaction_total' => 'required',
            'transaction_details' => 'required|array',
            'transaction_details.*' => 'integer|exists:products,id',
        ]);
        try {
            $transaction = new Transaction();
            $transaction->name = $request->name;
            $transaction->uuid = 'TRX' . time();
            $transaction->email = $request->email;
            $transaction->number = $request->phone;
            $transaction->address = $request->address;
            $transaction->transaction_total = $request->transaction_total;
            $transaction->transaction_status = 'PENDING';
            $transaction->save();

            foreach ($request->transaction_details as $key => $value) {
                $detail = new TransactionDetail();
                $detail->products_id = $value;
                $detail->transactions_id = $transaction->id;
                $detail->save();

                Product::find($value)->decrement('quantity');
            }

            DB::commit();


            return Helpers::succesResponse($transaction, 'Store transaction successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return Helpers::errorResponse(null, 'Something wrong. : ' . $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return Helpers::errorResponse(null, 'Something wrong on database. : ' . $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function show(Request $request, $id)
    {
        try {
            $transaction = Transaction::with('details.product.galleries')->findOrFail($id);
            return Helpers::succesResponse($transaction, 'Get transaction successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return Helpers::errorResponse(null, 'Something wrong. : ' . $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return Helpers::errorResponse(null, 'Something wrong on database. : ' . $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
