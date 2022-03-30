<?php

namespace App\Actions\Card;

use Illuminate\Support\Facades\Validator;

trait ValidateCardName
{
    public function validateInput(array $input)
    {
        Validator::make($input, [
            'name' => [
                'required',
                'string',
                'max:255'
            ]
        ])->validate();
    }
}
