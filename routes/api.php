<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'auth:sanctum'
], function() {


    Route::group([
        'prefix' => 'user'
    ], function() {
    
        // Get all users cards
        Route::get('/cards', [CardController::class, 'show']);
        
        // Generate new card
        Route::post('/card', [CardController::class, 'store']);

        // Update card name
        Route::put('/card/{userCard}', [CardController::class, 'update']);
    });

    // Process payment from card to card
    Route::post('/card-payment', [TransactionController::class, 'cardPayment']);

});
