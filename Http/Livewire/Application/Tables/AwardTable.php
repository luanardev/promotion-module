<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Application\Tables;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Luanardev\Lumis\Employees\Entities\Staff;
use Luanardev\Lumis\Employees\Entities\Award;

class AwardTable extends DataTableComponent
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
		return 'promotion::livewire.application.award.table-row';
	}

	public function delete($id)
	{
		Award::destroy($id);
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
			Column::make('Award'),
			Column::make('Institution'),
			Column::make('Country'),
			Column::make('Year'),
			Column::make('Action'),
		];
	}

	public function query()
	{
		return $this->staff->awards()->orderby('year', 'desc');
	}


}
