<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Application;
use Luanardev\Lumis\Employees\Entities\Experience;
use Luanardev\Lumis\Employees\Entities\Staff;

class ExperienceForm extends ApplicationForm
{
    public Experience $experience;

    public function __construct()
    {
        parent::__construct();
        $this->experience = new Experience();
    }

    public function mount(Staff $staff)
    {
        parent::mount($staff);     
    }

    public function render()
    {
        return view('promotion::livewire.application.experience.index');
    }

    public function create()
    {
        $this->createMode();
    }

    public function show()
    {
        $this->browseMode();
    }

    public function delete($keys)
    {
        Experience::destroy($keys);
        $this->browseMode()->emitRefresh()->toastr('Experience deleted');
    }

    public function save()
    {
        $this->validate();
        $this->experience->staff()->associate($this->staff);
        $this->experience->save();
        $this->reset(['experience']);
        $this->browseMode()->emitRefresh()->toastr('Experience saved');
    }

    public function rules()
    {
        return[
            'experience.job_position' => 'required|string',
            'experience.employer_name' => 'required|string',
            'experience.employer_address' => 'nullable|string',
            'experience.employer_phone' => 'nullable|string',
            'experience.start_date' => 'required|date',
            'experience.end_date' => 'required|date',
        ];

    }

}
