<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Application\Tables;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Luanardev\Lumis\Employees\Entities\Staff;
use Luanardev\Lumis\Employees\Entities\Qualification;


class QualificationTable extends DataTableComponent
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
		return 'promotion::livewire.application.qualification.table-row';
	}

	public function delete($id)
	{
		Qualification::destroy($id);
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
			Column::make('Level'),
			Column::make('Specialization'),
			Column::make('Institution'),
			Column::make('Country'),
			Column::make('Year'),
		];
	}

	public function query()
	{
		return $this->staff->qualifications()->orderby('year', 'desc');
	}


}
