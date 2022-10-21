<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Application\Tables;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Luanardev\Lumis\Employees\Entities\Staff;
use Luanardev\Lumis\Employees\Entities\Referee;

class RefereeTable extends DataTableComponent
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
		return 'promotion::livewire.application.referee.table-row';
	}

	public function delete($id)
	{
		Referee::destroy($id);
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
			Column::make('Name'),
			Column::make('Relation'),
			Column::make('Organisation'),
			Column::make('Postal Address'),
			Column::make('Email Address'),
			Column::make('Phone Number'),
			Column::make('Action'),
		];
	}

	public function query()
	{
		return $this->staff->referees()->latest();
	}


}
