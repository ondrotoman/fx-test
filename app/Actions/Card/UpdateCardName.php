<?php

namespace App\Actions\Card;

use App\Models\Card;
use App\Models\User;
use App\Events\Card\Updated;
use App\Src\Contracts\UpdateCardNames;

class UpdateCardName implements UpdateCardNames
{    
    use ValidateCardName;

    /**
     * Update card name
     * 
     * @param User $user
     * @param Card $card
     * @param array $input
     * 
     * @return bool
     */
    public function update(User $user, Card $card, array $input) : bool
    {
        $this->validateInput($input);

        $result = $card->update([
            'name' => $input['name']
        ]);

        event(new Updated(
            $user, $card
        ));

        return $result;
    }
}
