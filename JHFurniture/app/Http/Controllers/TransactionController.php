<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionHeader;
use App\Models\TransactionDetail;

use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function checkout(Request $request){
        $rules = [
            'cardNumber' => 'required|numeric|digits:16',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $date = Carbon::now();

        $txHistory = new TransactionHeader();
        $txHistory->idUser = auth()->user()->id;

        $txHistory->transactionDate = $date->toDateString();
             $txHistory->method = $request->method;

        // if($request->Credit == 'checked'){
        //     $txHistory->method = $request->Credit;
        // }else if ($request->Debit == 'checked'){
        //     $txHistory->method = $request->Debit;
        // }
        $txHistory->cardNumber = $request->cardNumber;
        
        $txHistory->total = 0;

        $txHistory->save();
        foreach (session('cart') as $id => $details){
            $txDetail = new TransactionDetail();
            $txDetail->idTransactionHeader = $txHistory->id;

            $txDetail->furnitureName = $details['furnitureName'];
            $txDetail->furniturePrice = $details['furniturePrice'];
            $txDetail->quantity = $details['quantity'];
            $txDetail->subTotal = $details['furniturePrice'] * $details['quantity'];

            $txHistory->total += $txDetail->subTotal;


            $txDetail->save();

        }

        if($txHistory->total <= 0){
            return redirect()->back()->withErrors('There is no item on cart');
        }
        $txHistory->save();
        session()->forget('cart');

        return redirect()->back()->with('success', 'Thankyou for choosing us!');
    }

    public function txHistory(){
        $txHistory = TransactionHeader::all();

        return view('transactionHistory')->with('txHistory', $txHistory);
    }
}
