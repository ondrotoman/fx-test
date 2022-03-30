<?php

namespace App\Src\Card;

use App\Models\Card;

class TransactionBuilder
{
    private int $sendingCardId;

    private int $receivingCardId;

    private float $amount;


    public function setSendingCard(int $cardId) : self
    {
        $this->sendingCardId = $cardId;
        return $this;
    }

    public function setReceivingCard(int $cardId) : self
    {
        $this->receivingCardId = $cardId;
        return $this;
    }

    public function setAmount(float $amount) : self
    {
        $this->amount = $amount;
        return $this;
    }

    public function toArray() : array
    {
        return [
            'sending_card_id' => $this->sendingCardId,
            'receiving_card_id' => $this->receivingCardId,
            'amount' => $this->amount
        ];
    }

}
