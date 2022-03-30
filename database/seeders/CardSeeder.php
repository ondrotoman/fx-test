<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Card::insert([
            [
                'user_id' => 1,
                'name' => 'Karta na víkendy',
                'number' => encrypt('4251789412347536'),
                'cvv' => encrypt('555'),
                'expiration' => encrypt('01/23'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'name' => 'Intergalaktická karta',
                'number' => encrypt('4100123411256456'),
                'cvv' => encrypt('123'),
                'expiration' => encrypt('09/22'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'name' => 'Na horšie časy',
                'number' => encrypt('4400123154256368'),
                'cvv' => encrypt('879'),
                'expiration' => encrypt('05/23'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
