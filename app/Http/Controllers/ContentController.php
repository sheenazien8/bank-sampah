<?php

namespace App\Http\Controllers;

use App\DataTables\ContentDataTable;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    private $viewpath = 'app.content';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContentDataTable $dataTable)
    {
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
        $user = auth()->user();
        $content = new Content();
        $content->fill($request->all());
        $content->user()->associate($user);
        $content->save();

        return redirect()->route('content.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        return view($this->viewpath . '.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit($content)
    {
        $content = Content::find($content);

        return view($this->viewpath . '.edit', [
            'content' => $content
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\act$ivity  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $content)
    {
        $user = auth()->user();
        $content = Content::find($content);
        $content->fill($request->all());
        $content->user()->associate($user);
        $content->save();

        return redirect()->route('content.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        $content->delete();

        return back();
    }
}
