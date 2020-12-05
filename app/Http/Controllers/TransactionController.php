<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Nasabah;
use App\Models\Saving;
use App\Models\SavingHistory;
use App\Models\TransactionDetail;
use App\Models\Transaction;
use App\Models\User;
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
                return ['value' => $data->nasabahProfile->id, 'text' => $data->nomor_rekening . ' --- ' . $data->nasabahProfile->nama_lengkap];
            }
        });
        $nasabah = $nasabah->filter(fn($data) => $data);

        return $dataTable->render($this->viewpath . '.index', compact('nasabah'));
    }

    public function create()
    {
        return view($this->viewpath . '.create');
    }

    public function store(Request $request)
    {
        /* TODO: Create Transaction <05-12-20, ulil>
         * cari item, jika item belum ada maka akan tersimpan dengan item baru, dan Satuan baru
         * jika sudah ada maka bind idnya untuk di simpen dengan transaksi detail
         * cari nasabah
         * cari kasir
         * simpan total price untuk di mausukkan tabungan nasabah
         * simpan history tabungan dahulu
         * simpan transaksinya
         */

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
                $data = [
                    'jumlah' => $request->quantity[$k],
                    'harga_sekarang' => $request->price[$k],
                    'profit_bank_sampah' => setting('profit_bank_sampah') ?? 5
                ];
                $money += $data['harga_sekarang'] * $data['jumlah'];
                $transaction->detailTransaksi()->save((new TransactionDetail($data))->item()->associate($itemData->id));
            }
            $saving = Saving::where('user_id', $request->nasabah)->firstOrCreate([
                'user_id' => $request->nasabah,
                'saldo_akhir' => 0,
            ]);
            $savingHistory = new SavingHistory();
            $savingHistory->fill([
                'type' => 'in',
                'tanggal_menabung' => date('Y-m-d'),
                'jumlah_uang' => $money
            ]);
            $saving->update([
                'saldo_akhir' => $saving->saldo_akhir + $money
            ]);
            $savingHistory->tabungan()->associate($saving);
            $savingHistory->save();
            DB::commit();

            return redirect()->route('transaction.index');
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function show(Transaction $transaction)
    {
        return view($this->viewpath . '.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        return view($this->viewpath . '.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $transaction->fill($request->all());
        $transaction->save();

        return redirect()->route('transaction.index');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return back();
    }
}
