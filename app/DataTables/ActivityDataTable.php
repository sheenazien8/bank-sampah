<?php

namespace App\DataTables;

use App\Models\Activity;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ActivityDataTable extends DataTable
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
            ->addColumn('action', function ($model)
            {
                $resources = 'activity';
                $action = [
                    'resources' => $resources,
                    'model' => $model
                ];
                if (auth()->user()->whoami == 'nasabah') {
                    $action = array_merge($action, [
                        'tanpaedit' => true,
                        'tanpadelete' => true
                    ]);
                }

                return view('partials.table.action', $action);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Activity $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Activity $model)
    {
        return $model->orderBy('created_at', 'DESC')->newQuery();
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
            Column::make('tanggal')->title(trans('app.activity.column.tanggal')),
            Column::make('title')->title(trans('app.activity.column.title')),
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
        return 'Activitys_' . date('YmdHis');
    }
}
