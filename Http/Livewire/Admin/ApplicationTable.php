<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Admin;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Luanardev\Lumis\Employees\Entities\Staff;
use Luanardev\Lumis\Promotion\Entities\ApplicationView;

class ApplicationTable extends DataTableComponent
{

	public array $perPageAccepted = [10, 20, 50];

	public Staff $staff;

	public function mount(Staff $staff)
	{
		$this->staff = $staff;
	}

	public function getTableRowUrl($row): string
	{
		return route('promotion.admin.application.show', $row);
	}

	public function rowView(): string
	{
		return 'promotion::livewire.application.position.table-row';
	}

	public function getListeners()
    {
        return [
            'refresh' => '$refresh',
        ];
    }

	public function columns(): array
	{
		return [
			Column::make('Financial Year'),
			Column::make('Staff Member'),
			Column::make('Position'),
			Column::make('Current Grade'),
			Column::make('Rank Applied'),
			Column::make('Grade Applied'),		
			Column::make('Status'),
			Column::make('Created On'),
		];
	}

	public function query(): Builder
	{
		return ApplicationView::all()
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term) );
	}

}
