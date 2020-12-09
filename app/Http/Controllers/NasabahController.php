<?php

namespace App\Http\Controllers;

use App\DataTables\NasabahDataTable;
use App\Models\Nasabah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NasabahController extends Controller
{
    private $viewpath = 'app.nasabah';

    public function index(NasabahDataTable $dataTable)
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
            'nama_lengkap' => ['required'],
            'nomor_ktp' => ['required', 'unique:nasabahs'],
            'alamat' => ['required'],
            'nomor_rekening' => ['required', 'unique:users', 'string', 'size:6'],
            'username' => ['unique:users', 'alpha_dash', 'required'],
            'phone' => ['unique:users', 'required'],
            'telegram_account' => ['unique:users', 'required'],
            'password' => ['required']
        ]);
        try {
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

            return redirect()->route('nasabah.index')->with('success',trans('message.create', ['data' => $nasabah->nama_lengkap]));
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function show(Nasabah $nasabah)
    {
        return view($this->viewpath . '.show', compact('nasabah'));
    }

    public function edit(Nasabah $nasabah)
    {
        return view($this->viewpath . '.edit', compact('nasabah'));
    }

    public function update(Request $request, Nasabah $nasabah)
    {
        $this->validate($request, [
            'nama_lengkap' => ['required'],
            'nomor_ktp' => ['required', 'unique:nasabahs,nomor_ktp,'.$nasabah->id],
            'alamat' => ['required'],
            'nomor_rekening' => ['required', 'unique:users,nomor_rekening,'.$nasabah->user->id, 'string', 'size:6'],
            'username' => ['unique:users,username,'.$nasabah->user->id, 'alpha_dash', 'required'],
            'phone' => ['unique:users,phone,'.$nasabah->user->id, 'required'],
            'telegram_account' => ['unique:users,telegram_account,'.$nasabah->user->id, 'required'],
        ]);
        try {
            DB::beginTransaction();
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
            DB::commit();

            return redirect()->route('nasabah.index')->with('success',trans('message.update', ['data' => $nasabah->nama_lengkap]));
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function destroy(Nasabah $nasabah)
    {
        try {
            DB::beginTransaction();
            $message = $nasabah->nama_lengkap;
            $nasabah->delete();
            $nasabah->user()->delete();
            DB::commit();

            return back()->with('success',trans('message.delete', ['data' => $message]));
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }
}
