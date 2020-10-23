<?php

namespace App\Http\Controllers;

use App\Models\Pic;
use Illuminate\Http\Request;

class PicController extends Controller
{
    private $viewpath = 'app.pic';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pics = Pic::get();

        return view($this->viewpath . '.index', compact('pics'));
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
        $pic = new Pic();
        $pic->fill($request->all());
        $pic->save();

        return redirect()->route('pic.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pic  $pic
     * @return \Illuminate\Http\Response
     */
    public function show(Pic $pic)
    {
        return view($this->viewpath . '.show', compact('pic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pic  $pic
     * @return \Illuminate\Http\Response
     */
    public function edit(Pic $pic)
    {
        return view($this->viewpath . '.edit', compact('pic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pic  $pic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pic $pic)
    {
        $pic->fill($request->all());
        $pic->save();

        return redirect()->route('pic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nasabah  $pic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pic $pic)
    {
        $pic->delete();

        return back();
    }
}
