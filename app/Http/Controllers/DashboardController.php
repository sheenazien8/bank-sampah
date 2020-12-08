<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userQuery = new User();
        $admin = $userQuery->query()->isAdmin()->get()->count();
        $nasabah = $userQuery->query()->isNasabah()->count();
        $jenis_sampah = Item::get()->count();
        $profit_bank_sampah = TransactionDetail::select(DB::raw("SUM((`harga_sekarang` * `jumlah`) * `profit_bank_sampah` / 100) as profit_bank_sampah"))->first()->profit_bank_sampah;

        return view('app.dashboard.index', [
            'admin' => $admin,
            'jenis_sampah' => $jenis_sampah,
            'profit_bank_sampah' => $profit_bank_sampah,
            'nasabah' => $nasabah
        ]);
    }
}
