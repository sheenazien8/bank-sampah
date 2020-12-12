<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Queries\TransactionQuery;
use PDF;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('app.report.index');
    }

    public function generate(Request $request)
    {
        $keyMonth = get_month_by_key($request->bulan)->format('m');
        $transactions = new TransactionQuery();
        $transactions = $transactions->byMonth($keyMonth)->getDetailTransaction();
        $pdf = PDF::loadView('app.report.components.rekap-penjualan-sampah', [
            'data' => $transactions
        ]);
        $bulan = strtolower($request->bulan);

        return $pdf->stream();
    }
}
