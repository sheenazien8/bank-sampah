<?php

namespace App\DataTables;

use App\Models\Transaction;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TransactionTableDataTable extends DataTable
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
            ->addColumn('nasabah', function ($model) {
                return optional($model->nasabah)->nama_lengkap;
            })
            ->addColumn('kasir', function ($model) {
                return optional($model->kasir)->username;
            })
            ->addColumn('action', function ($model) {
                $resources = 'transaction';
                return view('partials.table.action', [
                    'resources' => $resources,
                    'model' => $model,
                    'tanpaedit' => true
                ]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TransactionTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Transaction $model)
    {
        return $model->when(auth()->user()->whoami == 'pic', function ($query) {
            return $query->where('user_id', auth()->id());
        })->orderBy('created_at', 'DESC')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('transactiontable-table')
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
            Column::make('tanggal_transaksi')->title(trans('app.transaction.column.tanggal_transaksi')),
            Column::make('nasabah')->title(trans('app.transaction.column.nasabah')),
            Column::make('kasir')->title(trans('app.transaction.column.cashier')),
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
        return 'TransactionTable_' . date('YmdHis');
    }
}
