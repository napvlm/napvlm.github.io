<?php

namespace App\Http\Controllers;

use App\Models\TextBlock;
use App\Models\LinkBlock;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __construct()
	{
		//its just a dummy data object.
		$footerTextBlock = TextBlock::where('page_key','all')->where('block_key','footer')->first()->text;

		// Sharing is caring
		View::share('footerTextBlock', $footerTextBlock);
	}
}
