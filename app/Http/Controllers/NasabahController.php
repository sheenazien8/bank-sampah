<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\User;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    private $viewpath = 'app.nasabah';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nasabahs = Nasabah::latest()->get();

        return view($this->viewpath . '.index', compact('nasabahs'));
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
        $user = new User();
        $request->merge([
            'is_nasabah' => 1,
            'saldo_akhir' => 0,
            'password' => bcrypt($request->password)
        ]);
        $user->fill($request->all());
        $user->save();
        $nasabah = new Nasabah();
        $nasabah->fill($request->all());
        $nasabah->user()->associate($user);
        $nasabah->save();

        return redirect()->route('nasabah.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function show(Nasabah $nasabah)
    {
        return view($this->viewpath . '.show', compact('nasabah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function edit(Nasabah $nasabah)
    {
        return view($this->viewpath . '.edit', compact('nasabah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nasabah $nasabah)
    {
        $password = $nasabah->user->password;
        if ($request->password) {
           $passwod = bcrypt($request->password);
        }
        $request->merge([
            'is_nasabah' => 1,
            'saldo_akhir' => $nasabah->saldo_akhir,
            'password' => $password
        ]);
        $nasabah->fill($request->all());
        $user = $nasabah->user;
        $user->fill($request->all());
        $user->save();
        $nasabah->save();

        return redirect()->route('nasabah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nasabah $nasabah)
    {
        $nasabah->delete();

        return back();
    }
}
