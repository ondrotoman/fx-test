<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Card;
use App\Models\User;
use App\Src\Card\CardBuilder;
use App\Src\Contracts\CardIssuer;
use App\Actions\Card\CreateNewCard;
use App\Actions\Card\UpdateCardName;

class CardTest extends TestCase
{
    public $user;
    public $input;
    public function setUp() : void
    {
        parent::setUp();

        $this->user = User::where('id', 1)->first();
        $this->input = [
            'name' => 'Nový názov'
        ];
    }


    public function test_generate_new_card_for_user() : void
    {
        $action = new CreateNewCard(
            new FakeCardIssuer()
        );

        $this->card = $action->create(
            $this->user, $this->input
        );

        $this->assertInstanceOf(
            Card::class,
            $this->card
        );
    }

    
    public function test_update_cards_name() : void
    {
        $card = Card::where('id',1)->first();
        $action = new UpdateCardName();

        $result = $action->update(
            $this->user, $card, $this->input
        );

        $this->assertTrue($result);
    }

}



/**
 * Pouzivam len v pripade, ze by skutocna trieda CardIssuer-u 
 * bola obrovska a netreba ju celu volat
 */
class FakeCardIssuer implements CardIssuer
{
    public function generate() : CardBuilder
    {
        return (new CardBuilder())
            ->setNumber(random_int(1000000000000000, 9999999999999999))
            ->setCvv(123)
            ->setExpiration('01/25');
    }
}
