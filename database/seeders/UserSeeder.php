<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Jack Daniel',
                'login' => '10001',
                'email' => 'jack.daniel@fx.test',
                'password' => Hash::make('heslo123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Zafod Biblbrox',
                'login' => '10002',
                'email' => 'zafod.biblbrox@fx.test',
                'password' => Hash::make('heslo123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Artur Dent',
                'login' => '10003',
                'email' => 'artur.dent@fx.test',
                'password' => Hash::make('heslo123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
