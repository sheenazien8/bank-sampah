<?php

namespace App\Http\Controllers;

use App\DataTables\SavingDataTable;
use App\Models\Saving;
use Illuminate\Http\Request;

class SavingController extends Controller
{
    private $viewpath = 'app.saving';

    public function index(SavingDataTable $dataTable)
    {
        return $dataTable->render($this->viewpath . '.index');
    }

    public function create()
    {
        return view($this->viewpath . '.create');
    }

    public function store(Request $request)
    {
        $saving = new Saving();
        $saving->fill($request->all());
        $saving->save();

        return redirect()->route('saving.index');
    }

    public function show(Saving $saving)
    {
        return view($this->viewpath . '.show', compact('saving'));
    }

    public function edit(Saving $saving)
    {
        return view($this->viewpath . '.edit', compact('saving'));
    }

    public function update(Request $request, Saving $saving)
    {
        $saving->fill($request->all());
        $saving->save();

        return redirect()->route('saving.index');
    }

    public function destroy(Saving $saving)
    {
        $saving->delete();

        return back();
    }
}
