<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use App\Src\Contracts\CreateNewCards;
use App\Src\Contracts\UpdateCardNames;

class CardController extends Controller
{
    /**
     * Create new card for auth user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  CreateNewCards  $creator
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreateNewCards $creator)
    {
        return $creator->create(
            $request->user(), $request->all()
        );
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        return $card;
    }


    /**
     * Update cards name.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @param  UpdateCardNames  $updater
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card, UpdateCardNames $updater)
    {
        return $updater->update(
            $request->user(), $card, $request->all()
        );
    }
}
