<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Application;
use Luanardev\Lumis\Employees\Entities\Award;
use Luanardev\Lumis\Employees\Entities\Staff;
use Luanardev\Lumis\Employees\Enums\WithEnums;

class AwardForm extends ApplicationForm
{
	use WithEnums;
	
    public Award $award;

    public function __construct()
    {
        parent::__construct();
        $this->award = new Award();
    }

    public function mount(Staff $staff)
    {
        parent::mount($staff);    
    }

    public function render()
    {
        return view('promotion::livewire.application.award.index');
    }

    public function create()
    {
        $this->createMode();
        $this->viewData();
    }
   
    public function show()
    {
        $this->browseMode();
    }

    public function save()
    {
        $this->validate();
        $this->award->staff()->associate($this->staff);
        $this->award->save();
        $this->reset(['award']);
        $this->browseMode()->emitRefresh()->toastr('Award saved');
    }

    public function rules()
    {
        return[
            'award.name' => 'required|string',
            'award.institution' => 'required|string',
            'award.country' => 'required|string',
            'award.year' => 'required|string',
        ];

    }

    public function viewData()
    {
        $this->with('country', $this->country());
    }


}
