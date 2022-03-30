<?php

namespace App\Src\Card\Issuers;

use App\Src\Card\CardBuilder;
use App\Src\Contracts\CardIssuer;

class Visa implements CardIssuer
{
    /*

    private ApiConnector $apiConnector;

    public function __construct(ApiConnector $apiConnector)
    {
        $this->apiConnector = $apiConnector;
    }
    */


    /**
     * Predpokladam, ze vydanie karty sa deje na strane 
     * vydavatela karty.
     */
    public function generate() : CardBuilder
    {
        return (new CardBuilder())
            ->setNumber(random_int(1000000000000000, 9999999999999999))
            ->setCvv(123)
            ->setExpiration('02/23');
    }
}
