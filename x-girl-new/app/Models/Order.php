<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'name',
    	'phone',
    	'email',
    	'city',
    	'comment',
    	'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
