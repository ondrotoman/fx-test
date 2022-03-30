<?php 

namespace App\Src\Contracts;

use App\Models\Card;
use App\Models\User;

interface UpdateCardNames
{
    public function update(User $user, Card $card, array $input) : bool;
}