<?php

namespace App\Src\Contracts;

use App\Src\Card\CardBuilder;

interface CardIssuer
{
    /**
     * Card issuer musi vediet vygenerovat novu kartu
     * 
     * @return CardBuilder
     */
    public function generate() : CardBuilder;
}
