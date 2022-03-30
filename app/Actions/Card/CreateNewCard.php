<?php

namespace App\Actions\Card;

use App\Models\Card;
use App\Models\User;
use App\Events\Card\Created;
use App\Src\Contracts\CardIssuer;
use App\Src\Contracts\CreateNewCards;

class CreateNewCard implements CreateNewCards
{
    use ValidateCardName;

    /**
     * Card issuer
     * @var CardIssuer
     */
    private CardIssuer $issuer;

    public function __construct(CardIssuer $issuer)
    {
        $this->issuer = $issuer;
    }

    /**
     * Generate and store new card for user
     * and fire Created event
     * 
     * @param User $user
     * @return Card
     */
    public function create(User $user, array $input) : Card
    {
        $this->validateInput($input);

        $cardBuilder = $this->issuer->generate();
        $cardBuilder->setOwner($user)
            ->setName($input['name']);
        
        $card = Card::create(
            $cardBuilder->toArray()
        );

        event(new Created(
            $user, $card
        ));

        return $card;
    }
}
