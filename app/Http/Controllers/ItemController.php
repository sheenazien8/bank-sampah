<?php

namespace App\Http\Controllers;

use App\DataTables\ItemDataTable;
use App\Helpers\Response;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private $viewpath = 'app.item';

    private $response;

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
                return [
                    'value' => $data->nama,
                    'label' => $data->nama,
                    'id' => $data->id,
                    'unit' => $data->unit,
                    'priceFormat' => price_format($data->price),
                    'price' => $data->price
                ];
            })->toArray());
        }

        return $dataTable->render($this->viewpath . '.index');
    }

    public function create()
    {
        return view($this->viewpath . '.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => ['required', 'unique:items'],
            'unit' => ['required']
        ]);
        $item = new Item();
        $item->fill($request->all());
        $item->save();

        return redirect()->route('item.index')->with('success',trans('message.create', ['data' => $item->nama]));
    }

    public function show(Item $item)
    {
        return view($this->viewpath . '.show', compact('item'));
    }

    public function edit(Item $item)
    {
        return view($this->viewpath . '.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $this->validate($request, [
            'nama' => ['required', 'unique:items,nama,'.$item->id],
            'unit' => ['required']
        ]);
        $item->fill($request->all());
        $item->save();

        return redirect()->route('item.index')->with('success',trans('message.update', ['data' => $item->nama]));
    }

    public function destroy(Item $item)
    {
        $message = $item->nama;
        $item->delete();

        return back()->with('success',trans('message.delete', ['data' => $item->nama]));
    }

    public function getItemByName(Request $request)
    {
        $item = Item::where('nama', $request->nama)->first();
        return view($this->viewpath . '.show', compact('item'));
    }
}
