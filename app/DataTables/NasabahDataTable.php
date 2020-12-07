<?php

namespace App\DataTables;

use App\Models\Nasabah;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class NasabahDataTable extends DataTable
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
            ->addColumn('username', function ($model)
            {
                return $model->user->username;
            })
            ->addColumn('created_at', function ($model) {
                $date = (new Carbon($model->created_at))->diffForHumans();

                return $date;
            })
            ->addColumn('action', function ($model)
            {
                $resources = 'nasabah';
                return view('partials.table.action', compact('resources', 'model'));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Nasabah $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Nasabah $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('nasabahs-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    /* ->dom('Bfrtip') */
                    ->orderBy(1);
                    /* ->buttons( */
                        /* Button::make('create'), */
                        /* Button::make('export'), */
                        /* Button::make('print'), */
                        /* Button::make('reset'), */
                        /* Button::make('reload') */
                    /* ); */
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('username')->title(trans('app.nasabah.column.username'))->searchable(),
            Column::make('nama_lengkap')->title(trans('app.nasabah.column.full_name')),
            Column::make('nomor_ktp')->title(trans('app.nasabah.column.id_number')),
            Column::make('alamat')->title(trans('app.nasabah.column.address')),
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
        return 'Nasabahs_' . date('YmdHis');
    }
}
