<?php 

namespace App\Src\Contracts;

use App\Models\Card;
use App\Models\User;

interface CreateNewCards
{
    public function create(User $user, array $input) : Card;
}