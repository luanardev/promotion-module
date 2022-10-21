<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Application\Tables;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Luanardev\Lumis\Employees\Entities\Progress;
use Luanardev\Lumis\Employees\Entities\Staff;


class ServiceTable extends DataTableComponent
{

	public Staff $staff;

	public bool $showSearch = false;

	public bool $showPerPage = false;

	public function mount(Staff $staff)
	{
		$this->staff = $staff;
	}

	public function rowView(): string
	{
		return 'promotion::livewire.application.service.table-row';
	}

	public function delete($id)
	{
		Progress::destroy($id);
		return $this->emit('refresh');
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
			Column::make('Position'),
			Column::make('Rank'),
			Column::make('Progress'),
			Column::make('Grade'),
			Column::make('Start Date'),
		];
	}

	public function query()
	{
		return $this->staff->progress();
	}


}
