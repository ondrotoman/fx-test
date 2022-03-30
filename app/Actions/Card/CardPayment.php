<?php

namespace App\Actions\Card;

use App\Events\Card\Payed;
use App\Models\Transaction;
use App\Src\Contracts\CardPayments;
use App\Src\Card\TransactionBuilder;
use Illuminate\Support\Facades\Validator;

class CardPayment implements CardPayments
{
    public function handle(array $input)
    {
        Validator::make($input, [
            'sending_card_id' => [
                'required',
                'numeric',
                'exists:cards,id',
            ],
            'recieving_card_id' => [
                'required',
                'numeric',
                'exists:cards,id',
            ],
            'amount' => [
                'required',
                'numeric',
            ],
        ])->validate();

        // Tu naozaj neviem ci pouzivate platobnu branu alebo len interne posielate zaznamy
        // $bank = $this->bank->pay();

        $data = (new TransactionBuilder())->setSendingCard($input['sending_card_id'])
            ->setReceivingCard($input['recieving_card_id'])
            ->setAmount($input['amount'])
            ->toArray();

        $transaction = Transaction::create($data);

        event(new Payed(

        ));

        return $transaction;
    }
}
