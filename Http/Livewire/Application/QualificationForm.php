<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Application;
use Luanardev\Lumis\Employees\Entities\QualificationLevel;
use Luanardev\Lumis\Employees\Entities\Qualification;
use Luanardev\Lumis\Employees\Entities\Staff;
use Luanardev\Lumis\Employees\Enums\WithEnums;

class QualificationForm extends ApplicationForm
{
    use WithEnums;
    
    public Qualification $qualification;

    public function __construct()
    {
        parent::__construct();
        $this->qualification = new Qualification();
    }

    public function mount(Staff $staff)
    {
        parent::mount($staff);      
    }

    public function render()
    {
        return view('promotion::livewire.application.qualification.index');
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
        $this->qualification->staff()->associate($this->staff);
        $this->qualification->save();
        $this->reset(['qualification']);
        $this->browseMode()->emitRefresh()->toastr('Qualification saved');
    }

    public function rules()
    {
        return[
            'qualification.name' => 'required|string',
            'qualification.level' => 'required',
            'qualification.specialization' => 'nullable|string',
            'qualification.institution' => 'required|string',
            'qualification.country' => 'required|string',
            'qualification.year' => 'required|string',
        ];

    }

    public function viewData()
    {
        $this->with('country', $this->country());
        $this->with('level', QualificationLevel::pluck('id','name')->flip()->toArray());
    }


}
