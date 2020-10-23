<?php

namespace App\Http\Controllers;

use App\Models\TodayPic;
use Illuminate\Http\Request;

class TodayPicController extends Controller
{
    private $viewpath = 'app.today-pic';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today_pics = TodayPic::get();

        return view($this->viewpath . '.index', compact('today_pics'));
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
        $today_pic = new TodayPic();
        $today_pic->fill($request->all());
        $today_pic->save();

        return redirect()->route('today-pic.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TodayPic  $today_pic
     * @return \Illuminate\Http\Response
     */
    public function show(TodayPic $today_pic)
    {
        return view($this->viewpath . '.show', compact('today_pic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TodayPic  $today_pic
     * @return \Illuminate\Http\Response
     */
    public function edit(TodayPic $today_pic)
    {
        return view($this->viewpath . '.edit', compact('today_pic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TodayPic  $today_pic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TodayPic $today_pic)
    {
        $today_pic->fill($request->all());
        $today_pic->save();

        return redirect()->route('today-pic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TodayPic  $today_pic
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodayPic $today_pic)
    {
        $today_pic->delete();

        return back();
    }
}
