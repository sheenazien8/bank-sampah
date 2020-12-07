<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\DataTables\ActivityDataTable;

class ActivityController extends Controller
{
    private $viewpath = 'app.activity';

    public function index(ActivityDataTable $dataTable)
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
            'tanggal' => ['required', 'after:now'],
            'agenda' => ['required']
        ]);
        $activity = new Activity();
        $activity->fill([
            'agenda'=>$request->agenda,
            'tanggal'=>$request->tanggal,
            'title'=>$request->title
        ]);
        $activity->save();

        return redirect()->route('activity.index')->with('success',trans('message.create', ['data' => $activity->title]));
    }

    public function show(Activity $activity)
    {
        return view($this->viewpath . '.show', compact('activity'));
    }

    public function edit($activity)
    {
        $activity = Activity::find($activity);

        return view($this->viewpath . '.edit', [
            'activity' => $activity
        ]);
    }

    public function update(Request $request, $activity)
    {
        $this->validate($request, [
            'title' => ['required'],
            'tanggal' => ['required', 'after:now'],
            'agenda' => ['required']
        ]);
        $activity = Activity::find($activity);
        $activity->fill($request->all());
        $activity->save();

        return redirect()->route('activity.index')->with('success',trans('message.update', ['data' => $activity->title]));
    }

    public function destroy(Activity $activity)
    {
        $message = $activity->title;
        $activity->delete();

        return back()->with('success',trans('message.delete', ['data' => $message]));
    }
}
