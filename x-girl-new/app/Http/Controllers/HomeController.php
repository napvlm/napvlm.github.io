<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Order;
use App\Models\Product;
use App\Models\Callback;
use App\Models\TextBlock;
use Illuminate\Http\Request;
use App\Http\Requests\PostCallbackRequest;
use App\Http\Requests\PostBuyOneClickRequest;

class HomeController extends Controller
{

	private function products()
	{
		return Product::all();
	}
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $texts = TextBlock::where('page_key', 'home')->get();

        $pageHomeTexts  = TextBlock::mapByBlockKey($texts);

        return view('page_home',[
        	'products' => $this->products(),
            'page_home_texts' => $pageHomeTexts
        ]);
    }

    public function getProducts()
    {
    	$products = $this->products();

    	$products_2 = $products->slice(0, 2);
    	$products_other = $products->slice(2);

    	return view('page_products',[
        	'products_2' => $products_2,
        	'products_other' => $products_other
        ]);
    }

    public function getAboutUs()
    {
        $texts = TextBlock::where('page_key', 'about_us')->get();

        $pageAboutUsTexts  = TextBlock::mapByBlockKey($texts);

    	return view('page_about_us',[
        	'products' => $this->products(),
            'page_about_us_texts' => $pageAboutUsTexts
        ]);
    }

    public function getContacts()
    {
    	return view('page_contacts',[
        	'products' => $this->products(),
        	'shops' => Shop::all()
        ]);
    }

    public function postCallback(PostCallbackRequest $request)
    {
        if(!$request->ajax()){
            abort(404);
        }

        $validated = $request->validated();

        Callback::create($validated);

        return response()->json(['ok' => true]);
    }

    public function postBuyOneClick(PostBuyOneClickRequest $request)
    {
        if(!$request->ajax()){
            abort(404);
        }

        $validated = $request->validated();

        Order::create($request->validated());
        //$validated

        return response()->json(['ok' => true]);
    }
}

