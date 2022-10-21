<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Application\Tables;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Luanardev\Lumis\Employees\Entities\Staff;
use Luanardev\Lumis\Employees\Entities\Experience;


class ExperienceTable extends DataTableComponent
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
		return 'promotion::livewire.application.experience.table-row';
	}

	public function delete($id)
	{
		Experience::destroy($id);
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
			Column::make('Employer'),			
			Column::make('Address'),
			Column::make('Phone'),
			Column::make('Start Date'),
			Column::make('End Date'),
			Column::make('Action'),
		];
	}

	public function query()
	{
		return $this->staff->experience()->orderby('start_date', 'desc');
	}


}
