<?php

namespace App\DataTables\admin;

use App\Models\EquipmentDataTable;
use App\Models\admin\Equipment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EquipmentDataTables extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'equipmentdatatables.action')
            ->setRowId('id');
    }
    
    public function query(EquipmentDataTable $model): QueryBuilder
    {
        return $model->newQuery();
    }
    
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('equipmentdatatables-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }
    
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('equipment_name'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }
    
    protected function filename(): string
    {
        return 'EquipmentDataTables_' . date('YmdHis');
    }
}
