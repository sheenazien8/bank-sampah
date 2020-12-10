<?php

namespace App\Http\Controllers;

use App\DataTables\SavingDataTable;
use App\Models\User;
use App\Models\Saving;
use App\Models\SavingHistory;
use App\Notifications\SendTodayPicNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SavingController extends Controller
{
    private $viewpath = 'app.saving';

    public function index(SavingDataTable $dataTable)
    {
        return $dataTable->render($this->viewpath . '.index');
    }

    public function show(Saving $saving)
    {
        return view($this->viewpath . '.show', compact('saving'));
    }

    public function tarikTunai(Request $request)
    {
        $user = User::whereNomorRekening($request->nasabah)->firstOrFail();
        $nasabah = $user->nasabahProfile;
        $this->validate($request, [
            'nasabah' => ['required', function ($attr, $value, $fail) use ($user)
            {
                if (!$user->getSaving) {
                    $fail(trans('app.saving.saving_not_founf'));
                }
            }],
            'jumlah_uang' => ['required', function ($attr, $value, $fail) use ($user)
            {
                if ($value > $user->getSaving->saldo_akhir) {
                    $fail(trans('app.saving.uang_melebihi_saldo', ['jumlah_saldo' => $user->getSaving->saldo_akhir]));
                }
            }]
        ]);
        try {
            DB::beginTransaction();
            $request->merge([
                'tanggal' => date('Y-m-d'),
            ]);
            $saldo_akhir = $nasabah->saldo_akhir - $request->jumlah_uang;
            $savingHistory = new SavingHistory();
            $request->merge([ 'type' => 'out' ]);
            $savingHistory->fill($request->all());
            $savingHistory->tabungan()->associate($nasabah->user->getSaving);
            $savingHistory->save();
            $nasabah->user->getSaving->fill(['saldo_akhir' => $saldo_akhir]);
            $nasabah->user->getSaving->save();
            $nasabah->fill(['saldo_akhir' => $saldo_akhir]);
            $nasabah->save();
            $money = price_format($saldo_akhir);
            $datetime = date('Y-m-d H:i');
            $nasabah->user->notify(new SendTodayPicNotification([
                'text' => "Saudara {$nasabah->nama_lengkap}: Tarik Tunai sebesar {$money} {$datetime}"
            ]));
            DB::commit();

            return back()->with('success',trans('app.saving.message.tarik_tunai', ['data' => "Transaction for {$nasabah->nama_lengkap}"]));
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

}
