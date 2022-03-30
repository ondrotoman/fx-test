<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CardsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_cards_for_user()
    {
        $user = User::where('id',2)->first();
        $response = $this->actingAs($user)
            ->getJson('api/user/cards');
        
        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_payment_from_card_to_card()
    {
        $user = User::where('id',2)->first();
        $data = [
            'sending_card_id' => 1,
            'recieving_card_id' => 2,
            'amount' => 29.98,
        ];

        $response = $this->actingAs($user)
            ->postJson('api/card-payment', $data);
        
        
        $response->assertStatus(200);
    }
}
