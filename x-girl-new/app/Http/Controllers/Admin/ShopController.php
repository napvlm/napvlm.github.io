<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shops\CreateShopRequest;
use App\Http\Requests\Admin\Shops\UpdateShopRequest;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::all();

        return view('admin.shops.list', [
            'items' => $shops
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shop = new Shop();

        return view('admin.shops.edit', [
            'edit' => false,
            'action' => route('admin.shops.store'),
            'method' => 'post',
            'item' => $shop
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateShopRequest $request)
    {
        $validated = $request->validated();

        $data = $validated;
        $data['user_id'] = $request->user()->id;

        Shop::create($data);

        return redirect()
            ->action('Admin\ShopController@index')
            ->with('success', 'Магазин создан');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::findOrFail($id);

        return view('admin.shops.edit', [
            'edit' => true,
            'action' => route('admin.shops.update', ['shop' => $id]),
            'method' => 'put',
            'item' => $shop
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShopRequest $request, $id)
    {
        $shop = Shop::findOrFail($id);

        $validated = $request->validated();

        $data = $validated;
        $data['user_id'] = $request->user()->id;

        $shop->update($validated);

        return redirect()
            ->action('Admin\ShopController@index')
            ->with('success', 'Магазин оновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Shop::findOrFail($id);
        $item->delete();

        session()->flash('success', 'Магазин удалено');
    }
}
