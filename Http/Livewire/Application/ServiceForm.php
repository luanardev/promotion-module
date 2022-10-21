<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Application;
use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Lumis\Employees\Entities\Staff;

class ServiceForm extends ApplicationForm
{

    public function mount(Staff $staff)
    {
        parent::mount($staff);
    }

    public function render()
    {
        return view('promotion::livewire.application.service.view');
    }


}
