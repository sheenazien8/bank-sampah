<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $viewpath = 'app.user';

    public function index(UserDataTable $dataTable)
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

        return redirect()->route('user.index')->with('success',trans('message.create', ['data' => "User {$user->username}"]));
    }

    public function show(User $user)
    {
        return view($this->viewpath . '.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view($this->viewpath . '.edit', compact('user'));
    }

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

        return redirect()->route('user.index')->with('success',trans('message.update', ['data' => "User {$user->username}"]));
    }

    public function destroy(User $user)
    {
        $message = $user->username;
        $user->delete();

        return back()->with('success',trans('message.delete', ['data' => "User {$message}"]));
    }
}
