<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $viewpath = 'app.user';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $dataTable)
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
        $this->validate($request, [
            'username' => ['unique:users', 'alpha_dash', 'required'],
            'phone' => ['unique:users', 'required'],
            'telegram_account' => ['unique:users', 'required'],
            'password' => ['required']
        ]);
        $user = new User();
        $request->merge([
            'is_user' => 1,
            'is_nasabah' => 0,
            'password' => bcrypt($request->password)
        ]);
        $user->fill($request->all());
        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view($this->viewpath . '.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view($this->viewpath . '.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'username' => ['unique:users,username,'.$user->id, 'alpha_dash', 'required'],
            'phone' => ['unique:users,phone,'.$user->id, 'required'],
            'telegram_account' => ['unique:users,telegram_account,'.$user->id, 'required'],
        ]);

        $password = $user->password;
        if ($request->password) {
           $passwod = bcrypt($request->password);
        }
        $request->merge([
            'is_user' => 1,
            'is_nasabah' => 0,
            'password' => $password
        ]);
        $user->fill($request->all());
        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
