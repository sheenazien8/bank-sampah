<?php

namespace App\DataTables;

use App\Models\Saving;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SavingDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('created_at', function ($model) {
                $date = (new Carbon($model->created_at))->diffForHumans();

                return $date;
            })
            ->addColumn('nasabah', function ($model)
            {
                return $model->nasabahUser->nasabahProfile->nama_lengkap;
            })
            ->addColumn('nomor_rekening', function ($model)
            {
                return $model->nasabahUser->nomor_rekening;
            })
            ->addColumn('transaksi_terakhir', function ($model)
            {
                return $model->nasabahUser->nasabahProfile->transaksi->last()->tanggal_transaksi;
            })
            ->addColumn('saldo_akhir', function ($model)
            {
                return price_format($model->saldo_akhir);
            })
            ->addColumn('action', function ($model)
            {
                $resources = 'saving';
                return view('app.saving.components.action', [
                    'resources' => $resources,
                    'model' => $model
                ]);
            });

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Saving $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Saving $model)
    {
        return $model->orderBy('created_at', 'DESC')->newQuery()->when(auth()->user()->whoami == 'nasabah', function ($query)
        {
            return $query->where('user_id', auth()->user()->id);
        });
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('saving-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('nasabah')->title(trans('app.saving.column.nasabah')),
            Column::make('nomor_rekening')->title(trans('app.saving.column.nomor_rekening')),
            Column::make('transaksi_terakhir')->title(trans('app.saving.column.transaksi_terakhir')),
            Column::make('saldo_akhir')->title(trans('app.saving.column.saldo_akhir')),
            Column::make('created_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(80)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Saving_' . date('YmdHis');
    }
}
