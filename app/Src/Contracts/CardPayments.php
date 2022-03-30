<?php 

namespace App\Src\Contracts;

interface CardPayments
{
    public function handle(array $input);
}