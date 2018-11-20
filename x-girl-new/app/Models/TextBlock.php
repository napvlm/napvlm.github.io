<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TextBlock extends Model
{
    protected $fillable = [

    	'page_key',
    	'block_key',
    	'page_name',
    	'block_name',
    	'type',

    	'text',
    ];

    public static function mapByBlockKey(Collection $textBlocksCollection)
    {
    	$mapped = [];

    	foreach ($textBlocksCollection as $key => $textBlock) {

    		$mapped[$textBlock->block_key] = $textBlock->text;
    	}

    	return $mapped;
    }
}
