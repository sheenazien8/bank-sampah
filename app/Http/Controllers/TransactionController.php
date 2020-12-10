<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Nasabah;
use App\Models\Saving;
use App\Models\SavingHistory;
use App\Models\TodayPic;
use App\Models\TransactionDetail;
use App\Models\Transaction;
use App\Models\User;
use App\Notifications\SendTodayPicNotification;
use Illuminate\Http\Request;
Use App\DataTables\TransactionTableDataTable as TransactionTable;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    private $viewpath = 'app.transaction';

    public function index(TransactionTable $dataTable)
    {
        $nasabah = User::isNasabah()->get()->map(function($data) {
            if ($data->nasabahProfile) {
                return ['value' => $data->nasabahProfile->id, 'text' => $data->nomor_rekening . ' --- ' . $data->nasabahProfile->nama_lengkap, 'id_user' => $data->id];
            }
        });
        $nasabah = $nasabah->filter(function($data) {
            if (isset($data['id_user']) && session()->get('today-pic') && session()->get('today-pic')->id != $data['id_user']) {
                return $data;
            } else if(isset($data['id_user'])) {
                return $data;
            }
        });

        return $dataTable->render($this->viewpath . '.index', compact('nasabah'));
    }

    public function create()
    {
        return view($this->viewpath . '.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nasabah' => ['required'],
            'item' => ['required', 'array', 'min:1'],
            'price' => ['required', 'array', 'min:1'],
            'satuan' => ['required', 'array', 'min:1'],
            'quantity' => ['required', 'array', 'min:1'],
        ]);
        try {
            DB::beginTransaction();
            $request->merge([
                'tanggal_transaksi' => date('Y-m-d')
            ]);
            $nasabah = Nasabah::find($request->nasabah);
            $transaction = new Transaction();
            $transaction->fill($request->only('tanggal_transaksi'));
            $transaction->kasir()->associate(auth()->user());
            $transaction->nasabah()->associate($nasabah);
            $transaction->save();
            $money = 0;
            foreach ($request->item as $k => $item) {
                $itemData = Item::where('nama', $item)->firstOrCreate([
                    'nama' => $item,
                    'unit' => $request->satuan[$k]
                ]);
                $profit = setting('profit_bank_sampah') ?? 5;
                $data = [
                    'jumlah' => $request->quantity[$k],
                    'harga_sekarang' => $request->price[$k],
                    'profit_bank_sampah' => $profit
                ];
                $price = $data['harga_sekarang'] * $data['jumlah'];
                $money += ($price) - ($price) * $profit / 100;
                $transaction->detailTransaksi()->save((new TransactionDetail($data))->item()->associate($itemData->id));
            }
            // kali upah untuk petugas untuk di masukkan ke tabungan petugas
            $todayPic = session()->get('today-pic');
            if ($todayPic) {
                // mengambil tabungan milik petugas
                $saving = $todayPic->tabungan;
                // mengambil nilai_setiap_tugas
                $nilai_setiap_tugas = TodayPic::where('user_id', $todayPic->id)->where('tanggal_tugas', date('Y-m-d'))->first()->pic->nilai_setiap_tugas;
                $upahPetugas = $money * $nilai_setiap_tugas / 100;
                $money = $money - $money * (setting('profit_total_petugas') ?? 5) / 100;
                $savingHistory = new SavingHistory();
                $savingHistory->fill([
                    'type' => 'upah-petugas',
                    'tanggal' => date('Y-m-d'),
                    'jumlah_uang' => $upahPetugas
                ]);
                $saldo_akhir = $saving->saldo_akhir + $upahPetugas;
                $saving->update([
                    'saldo_akhir' => $saldo_akhir
                ]);
                $savingHistory->tabungan()->associate($saving);
                $savingHistory->save();
            }
            $saving = Saving::where('user_id', $nasabah->user->id)->first();
            if (!$saving) {
                $saving = Saving::create([
                    'user_id' => $nasabah->user->id,
                    'saldo_akhir' => 0,
                ]);
            }
            $savingHistory = new SavingHistory();
            $savingHistory->fill([
                'type' => 'in',
                'tanggal' => date('Y-m-d'),
                'jumlah_uang' => $money
            ]);
            $saldo_akhir = $saving->saldo_akhir + $money;
            $saving->update([
                'saldo_akhir' => $saldo_akhir
            ]);
            $nasabah->saldo_akhir = $saldo_akhir;
            $nasabah->save();
            $savingHistory->tabungan()->associate($saving);
            $savingHistory->save();
            $money = price_format($money);
            $datetime = date('Y-m-d H:i');
            $nasabah->user->notify(new SendTodayPicNotification([
                'text' => "Saudara {$nasabah->nama_lengkap} : Menabung Sebesar {$money} {$datetime}"
            ]));
            DB::commit();

            return redirect()->route('transaction.index')->with('success',trans('message.create', ['data' => "Transaction for {$nasabah->nama_lengkap}"]));
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function show(Transaction $transaction)
    {
        return view($this->viewpath . '.show', compact('transaction'));
    }

    public function destroy(Transaction $transaction)
    {
        try {
            DB::beginTransaction();
            $tabungan = $transaction->savingHistory->tabungan;
            $saldo_akhir = $tabungan->saldo_akhir - $transaction->savingHistory->jumlah_uang;
            $tabungan->update(['saldo_akhir' => $saldo_akhir]);
            $transaction->nasabah->update(['saldo_akhir' => $saldo_akhir]);
            $transaction->savingHistory()->delete();
            $transaction->delete();
            DB::commit();

            return back()->with('success',trans('message.delete', ['data' => 'Transaction']));
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }
}
