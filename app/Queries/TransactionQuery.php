<?php

namespace App\Queries;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class TransactionQuery
{
    /**
     * @var Builder
     */
    private $query;

    /**
     * @var string
     */
    private $month;


    public function __construct()
    {
        $this->query = Transaction::query();
    }

    public function byMonth(string $bulan)
    {
        $this->month = $bulan;
        return $this;
    }

    public function getDetailTransaction()
    {
        $keyMonth = $this->month;
        $array = [];
        $result = TransactionDetail::whereHas('transaction', function ($transaction) use ($keyMonth) {
            return $transaction->whereMonth('tanggal_transaksi', $keyMonth);
        })->get()->groupBy('item_id');
        $totalUangNasabah = 0;
        $totalProfitTP = 0;
        $totalProfitBS = 0;
        foreach ($result as  $res) {
            $jumlah = array_sum(Arr::pluck($res, "jumlah"));
            $uangMasuk = array_sum(Arr::pluck($res, "harga_sekarang")) * $jumlah;
            $profitPetugas = $uangMasuk * $res[0]->profit_total_petugas / 100;
            $profitBS = $uangMasuk * $res[0]->profit_bank_sampah / 100;
            $uangNasabah = $uangMasuk - $profitBS - $profitPetugas;
            $array[] = [
                'jenis_sampah' => $res[0]->item->nama,
                'volume' => $jumlah,
                'satuan' => $res[0]->item->unit,
                'jumlah' => price_format(array_sum(Arr::pluck($res, "harga_sekarang")) * $jumlah),
                'harga_satuan' => price_format($res[0]->harga_sekarang),
                'profit_bank_sampah' => price_format($profitBS),
                'profit_total_petugas' => price_format($profitPetugas),
                'uang_nasabah' => price_format($uangNasabah),
            ];
            $totalUangNasabah += $uangNasabah;
            $totalProfitTP += $profitPetugas;
            $totalProfitBS += $profitBS;
        }
        $array[] = [
            'jenis_sampah' => 'Total:',
            'volume' => '',
            'satuan' => '',
            'jumlah' => '',
            'harga_satuan' => '',
            'profit_bank_sampah' => price_format($totalProfitBS),
            'profit_total_petugas' => price_format($totalProfitTP),
            'uang_nasabah' => price_format($totalUangNasabah),
        ];

        return $array;
    }
}
