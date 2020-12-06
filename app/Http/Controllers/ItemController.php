<?php

namespace App\Http\Controllers;

use App\DataTables\ItemDataTable;
use App\Helpers\Response;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private $viewpath = 'app.item';

    /**
     * @var Response
     */
    private $response;

    /**
     * @param
     */
    public function __construct()
    {
        $this->response = new Response;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ItemDataTable $dataTable, Request $request)
    {
        if (request()->type == 'select2') {
            return $this->response->success(Item::where('nama', 'LIKE', "%{$request->term}%")->get()->map(function($data) {
                return ['value' => $data->nama, 'label' => $data->nama, 'id' => $data->id, 'unit' => $data->unit];
            })->toArray());
        }

        return $dataTable->render($this->viewpath . '.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->viewpath . '.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => ['required', 'unique:items'],
            'unit' => ['required']
        ]);
        $item = new Item();
        $item->fill($request->all());
        $item->save();

        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view($this->viewpath . '.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view($this->viewpath . '.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $this->validate($request, [
            'nama' => ['required', 'unique:items,nama,'.$item->id],
            'unit' => ['required']
        ]);
        $item->fill($request->all());
        $item->save();

        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return back();
    }

    public function getItemByName(Request $request)
    {
        $item = Item::where('nama', $request->nama)->first();
        return view($this->viewpath . '.show', compact('item'));
    }
}
