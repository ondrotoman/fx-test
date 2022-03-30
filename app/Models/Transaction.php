<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sending_card_id',
        'receiving_card_id',
        'amount',
    ];

    public function sending()
    {
        return $this->hasOne(Card::class, 'id', 'sending_card_id');
    }

    public function recieving()
    {
        return $this->hasOne(Card::class, 'id', 'recieving_card_id');
    }
}
