<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Src\Contracts\CardPayments;

class TransactionController extends Controller
{
    /**
     * Payment form card to card
     *
     * @return \Illuminate\Http\Response
     */
    public function cardPayment(Request $request, CardPayments $payment)
    {
        $transaction =  $payment->handle(
            $request->all()
        );

        return $transaction->with(
            'sending', 'recieving'
        )->get();
    }
}
