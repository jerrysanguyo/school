<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    public function dataTable($query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('card', function ($user) {
                return view('student.card', compact('user'))->render();
            })
            ->rawColumns(['card']);
    }

    public function query(User $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('user-table')
                    
                    ->columns([
                        // Hidden searchable columns
                        Column::make('id')->visible(false),
                        Column::make('first_name')->visible(false),
                        Column::make('middle_name')->visible(false),
                        Column::make('last_name')->visible(false),
                        Column::make('email')->visible(false),
                        Column::make('contact_number')->visible(false),
                        // The visible card column, not orderable or searchable
                        Column::computed('card')
                              ->title('')
                              ->orderable(false)
                              ->searchable(false),
                    ])
                    ->minifiedAjax()
                    ->orderBy(0, 'desc')
                    ->parameters([
                        'dom' => '<"flex justify-between items-center mb-4"lf>rt<"flex justify-between items-center mt-4"ip>',
                        'pageLength' => 10,
                        'initComplete' => "function() {
                            const table = this.api();
                            const \$searchInput = $('div.dataTables_filter input');
                            \$searchInput.addClass(
                                'ml-2 px-4 py-1 border border-gray-300 rounded focus:outline-none ' +
                                'focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            );
                            const \$lengthSelect = $('div.dataTables_length select');
                            \$lengthSelect.addClass(
                                'px-4 py-1 my-2 border border-gray-300 rounded focus:outline-none ' +
                                'focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            );
                        }",
                        'drawCallback' => "function(settings) {
                            const \$paginateButtons = $('div.dataTables_paginate .paginate_button');
                            \$paginateButtons.addClass(
                                'px-4 py-2 text-black rounded-lg hover:bg-gray-300 disabled:opacity-50 ' +
                                'disabled:cursor-not-allowed transition-colors'
                            );
                            const \$currentPage = $('div.dataTables_paginate .paginate_button.current');
                            \$currentPage.addClass(
                                'px-4 py-2 rounded-lg transition-colors hover:bg-gray-200 hover:text-black bg-gray-700 text-white'
                            );
                        }",
                    ]);
    }

    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
