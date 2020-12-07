<?php

namespace App\Http\Controllers;

use App\DataTables\PicDataTable;
use App\Models\Pic;
use Illuminate\Http\Request;

class PicController extends Controller
{
    private $viewpath = 'app.pic';

    public function index(PicDataTable $dataTable)
    {
        return $dataTable->render($this->viewpath . '.index');
    }

    public function create()
    {
        return view($this->viewpath . '.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_jabatan' => ['required', 'unique:pics'],
            'keterangan' => ['required'],
            'nilai_setiap_tugas' => ['required'],
        ]);
        $pic = new Pic();
        $pic->fill($request->all());
        $pic->save();

        return redirect()->route('pic.index')->with('success',trans('message.create', ['data' => $pic->nama_jabatan]));
    }

    public function show(Pic $pic)
    {
        return view($this->viewpath . '.show', compact('pic'));
    }

    public function edit(Pic $pic)
    {
        return view($this->viewpath . '.edit', compact('pic'));
    }

    public function update(Request $request, Pic $pic)
    {
        $this->validate($request, [
            'nama_jabatan' => ['required', 'unique:pics,nama_jabatan,'.$pic->id],
            'keterangan' => ['required'],
            'nilai_setiap_tugas' => ['required'],
        ]);
        $pic->fill($request->all());
        $pic->save();

        return redirect()->route('pic.index')->with('success',trans('message.update', ['data' => $pic->nama_jabatan]));
    }

    public function destroy(Pic $pic)
    {
        $message = $pic->nama_jabatan;
        $pic->delete();

        return back()->with('success',trans('message.delete', ['data' => $message]));
    }
}
