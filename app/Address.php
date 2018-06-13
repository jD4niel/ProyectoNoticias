<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'country',
        'state',
        'city',
        'colony',
        'postal_code'
    ];
    public function post()
    {
        return $this->hasOne('App\Post');
    }
}
