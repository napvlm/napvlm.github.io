<?php

namespace App\Http\Controllers\Admin;

use App\Models\TextBlock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TextBlocks\CreateTextBlockRequest;
use App\Http\Requests\Admin\TextBlocks\UpdateTextBlockRequest;

class TextBlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $texts = TextBlock::all();

        return view('admin.texts.list', [
            'items' => $texts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $textBlock = new TextBlock();

         return view('admin.texts.create', [
             'edit' => false,
             'action' => route('admin.texts.store'),
             'method' => 'post',
             'item' => $textBlock
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTextBlockRequest $request)
    {
         $validated = $request->validated();

         $data = $validated;

         TextBlock::create($data);

         return redirect()
             ->action('Admin\TextBlockController@index')
             ->with('success', 'Текст создан');
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
        $textBlock = TextBlock::findOrFail($id);

        return view('admin.texts.edit', [
            'edit' => true,
            'action' => route('admin.texts.update', ['text' => $id]),
            'method' => 'put',
            'item' => $textBlock,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTextBlockRequest $request, $id)
    {
        $textBlock = TextBlock::findOrFail($id);

        $validated = $request->validated();

        $textBlock->update($validated);

        return redirect()
            ->action('Admin\TextBlockController@index')
            ->with('success', 'Текст обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
