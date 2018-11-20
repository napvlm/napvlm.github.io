<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\CreateProductRequest;
use App\Http\Requests\Admin\Products\UpdateProductRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.orders.list', [
            'items' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();

        return view('admin.products.edit', [
            'edit' => false,
            'action' => route('admin.products.store'),
            'method' => 'post',
            'item' => $product
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $validated = $request->validated();

        $data = $validated;
        $data['user_id'] = $request->user()->id;

        $file = $request->picture->store('public/pictures');

        $data['picture'] = $file;

        Product::create($data);

        return redirect()
            ->action('Admin\ProductController@index')
            ->with('success', 'Продукт создан');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.orders.show', [
            'item' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $order = Order::findOrFail($id);

    //     return view('admin.products.edit', [
    //         'edit' => true,
    //         'action' => route('admin.products.update', ['product' => $id]),
    //         'method' => 'put',
    //         'item' => $order,
    //     ]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdateProductRequest $request, $id)
    // {
    //     $product = Product::findOrFail($id);

    //     $validated = $request->validated();

    //     $data = $validated;
    //     $data['user_id'] = $request->user()->id;

    //     if ($validated['picture']) {

    //         // delete old picture
    //         Storage::delete($product->picture);

    //         // store new picture
    //         $file = $request->picture->store('public/pictures');

    //         $validated['picture'] = $file;

    //     }



    //     $product->update($validated);

    //     return back();



    //     // dd($validated);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Order::findOrFail($id);
        $item->delete();

        session()->flash('success', 'Заказ удалено');

    }
}
