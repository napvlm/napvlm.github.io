<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
    	'city',
    	'street',
    	'phone',
    	'map_iframe',

    	'user_id'
    ];
}
