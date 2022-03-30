<?php

namespace App\Src\Card;

use App\Models\User;

class CardBuilder
{
    private ?User $owner;

    private string $name = 'Karta';

    private int $number;

    private int $cvv;

    private string $expiration;


    public function setOwner(User $owner) : self
    {
        $this->owner = $owner;
        return $this;
    }

    public function setName(string $name) : self
    {
        $this->name = $name;
        return $this;
    }

    public function setNumber(int $number) : self
    {
        $this->number = $number;
        return $this;
    }

    public function setCvv(int $cvv) : self
    {
        $this->cvv = $cvv;
        return $this;
    }

    public function setExpiration(string $expiration) : self
    {
        $this->expiration = $expiration;
        return $this;
    }

    public function toArray() : array
    {
        return [
            'owner_id' => $this->owner ? $this->owner->id : null,
            'name' => $this->name,
            'number' => $this->number,
            'cvv' => $this->cvv,
            'expiration' => $this->expiration,
        ];
    }

}
