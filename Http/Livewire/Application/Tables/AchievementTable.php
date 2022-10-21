<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Application\Tables;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Luanardev\Lumis\Promotion\Entities\Application;
use Luanardev\Lumis\Promotion\Entities\Achievement;

class AchievementTable extends DataTableComponent
{
	public Application $application;

	public bool $showSearch = false;

	public bool $showPerPage = false;

	public function mount(Application $application)
	{
		$this->application = $application;
	}

	public function rowView(): string
	{
		return 'promotion::livewire.application.achievement.table-row';
	}

	public function delete($id)
	{
		Achievement::destroy($id);
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
			Column::make('Key Area'),
			Column::make('Achievement'),
			Column::make('Action'),
		];
	}

	public function query()
	{
		return $this->application->achievements();
	}


}
