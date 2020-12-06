<?php

namespace App\DataTables;

use App\Models\TodayPic;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TodayPicTable extends DataTable
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
            ->addColumn('user', function ($model)
            {
                return $model->user->username;
            })
            ->addColumn('tugas', function ($model)
            {
                return $model->pic->nama_jabatan;
            })
            ->addColumn('action', function ($model)
            {
                $resources = 'today-pic';
                return view('partials.table.action', compact('resources', 'model'));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\TodayPic $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TodayPic $model)
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
                    ->setTableId('today_pics-table')
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
            Column::make('tanggal_tugas')->title(trans('app.today_pic.column.date')),
            Column::make('user')->title(trans('app.today_pic.column.user')),
            Column::make('tugas')->title(trans('app.today_pic.column.pics')),
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
        return 'TodayPics_' . date('YmdHis');
    }
}
