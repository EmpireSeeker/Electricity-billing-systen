<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'provider_id'=>'required|exists:providers,id',
            'meter_number'=>'required|numeric|digits_between:10,20',
            'amount' => 'required|numeric|min:1',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $transaction = Transaction::create([
            'user_id'=>auth()->id(),
            'provider_id'=>$request->provider_id,
            'meter_number'=>$request->meter_number,
            'amount'=>$request->amount,
        ]);
        return response()->json(['message'=>'payment Successful', 'transaction'=> $transaction], 201);
    }

    public function index()
    {
        $transactions = Transaction::where('user_id', auth()->id())->paginate(10);

        // Mask meter_number
        $transactions->getCollection()->transform(function ($transaction) {
            $transaction->meter_number = str_repeat('*', strlen($transaction->meter_number) - 4) . substr($transaction->meter_number, -4);
            return $transaction;
        });

        return response()->json($transactions, 200);
    }

}
