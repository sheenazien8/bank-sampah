<?php

namespace App\Http\Controllers;

use App\DataTables\TodayPicTable;
use App\Models\TodayPic;
use App\Models\User;
use App\Notifications\SendTodayPicNotification;
use Illuminate\Http\Request;

class TodayPicController extends Controller
{
    private $viewpath = 'app.today-pic';

    public function index(TodayPicTable $dataTable)
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
            'tanggal_tugas' => ['required', 'after:now'],
            'user_id' => ['required'],
            'pic_id' => ['required']
        ]);
        $pin = random_int(1111, 9999);
        $request->merge(['pin' => $pin]);
        $user = User::find($request->user_id);
        $user->notify(new SendTodayPicNotification([
            'text' => "Selamat kamu di tugaskan sebagai Petugas di tanggal {$request->tanggal_tugas}. Silahkan Masuk dengan pin {$pin} dan password kamu, Semoga Sukses."
        ]));
        $today_pic = new TodayPic();
        $today_pic->fill($request->all());
        $today_pic->save();

        return redirect()->route('today-pic.index')->with('success',trans('message.create', ['data' => "for {$user->nasabahProfile->nama_lengkap}"]));
    }

    public function show(TodayPic $today_pic)
    {
        return view($this->viewpath . '.show', compact('today_pic'));
    }

    public function edit(TodayPic $today_pic)
    {
        return view($this->viewpath . '.edit', compact('today_pic'));
    }

    public function update(Request $request, TodayPic $today_pic)
    {
        $this->validate($request, [
            'tanggal_tugas' => ['required', 'after:now'],
            'user_id' => ['required'],
            'pic_id' => ['required']
        ]);
        $today_pic->fill($request->all());
        $today_pic->save();

        return redirect()->route('today-pic.index')->with('success',trans('message.update', ['data' => "for {$user->nasabahProfile->nama_lengkap}"]));
    }

    public function destroy(TodayPic $today_pic)
    {
        $message = $today_pic->user->nasabahProfile->nama_lengkap;
        $today_pic->delete();

        return back()->with('success',trans('message.delete', ['data' => "for {$message}"]));
    }
}
