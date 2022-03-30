<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'owner_id',
        'name',
        'number',
        'cvv',
        'expiration',
    ];
    

    /**
     * Every card number should be encrypted
     * 
     * @param string $value
     */
    public function setNumberAttribute(string $value) : void
    {
        $this->attributes['number'] = encrypt($value);
    }


    /**
     *  Decrypt card number data when called
     * 
     * @param string $value
     */
    public function getNumberAttribute(string $value) : string
    {
        return decrypt($value);
    }

    /**
     * Every card cvv should be encrypted
     * 
     * @param string $value
     */
    public function setCvvAttribute(string $value) : void
    {
        $this->attributes['cvv'] = encrypt($value);
    }


    /**
     *  Decrypt card cvv data when called
     * 
     * @param string $value
     */
    public function getCvvAttribute(string $value) : string
    {
        return decrypt($value);
    }

    /**
     * Every card expiration should be encrypted
     * 
     * @param string $value
     */
    public function setExpirationAttribute(string $value) : void
    {
        $this->attributes['expiration'] = encrypt($value);
    }


    /**
     *  Decrypt card expiration data when called
     * 
     * @param string $value
     */
    public function getExpirationAttribute(string $value) : string
    {
        return decrypt($value);
    }
}
