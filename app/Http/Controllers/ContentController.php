<?php

namespace App\Http\Controllers;

use App\DataTables\ContentDataTable;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    private $viewpath = 'app.content';

    public function index(ContentDataTable $dataTable)
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
            'title' => ['required'],
            'body' => ['required']
        ]);
        $user = auth()->user();
        $content = new Content();
        $content->fill($request->all());
        $content->user()->associate($user);
        $content->save();

        return redirect()->route('content.index')->with('success',trans('message.create', ['data' => $content->title]));
    }

    public function show(Content $content)
    {
        return view($this->viewpath . '.show', compact('content'));
    }

    public function edit($content)
    {
        $content = Content::find($content);

        return view($this->viewpath . '.edit', [
            'content' => $content
        ]);
    }

    public function update(Request $request, $content)
    {
        $this->validate($request, [
            'title' => ['required'],
            'body' => ['required']
        ]);
        $user = auth()->user();
        $content = Content::find($content);
        $content->fill($request->all());
        $content->user()->associate($user);
        $content->save();

        return redirect()->route('content.index')->with('success',trans('message.update', ['data' => $content->title]));
    }

    public function destroy(Content $content)
    {
        $message = $content->title;
        $content->delete();

        return back()->with('success',trans('message.delete', ['data' => $content->title]));
    }
}
