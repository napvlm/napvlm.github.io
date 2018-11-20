<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [

    	'name',
    	'picture',
    	'description',
        'description2',
    	'user_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getPictureUrl()
    {
        return '/storage/app/' .$this->picture;
    }
}
