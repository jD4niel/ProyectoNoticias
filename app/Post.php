<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'text',
        'img_src',
        'user_id',
        'address_id',
        'category_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function address()
    {
        return $this->belongsTo('App\Address');
    }
}
