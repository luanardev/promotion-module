<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Application;
use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Lumis\Promotion\Entities\Application;

class DutiesForm extends LivewireUI
{
    public Application $application;

    public function mount(Application $application)
    {
        $this->application = $application;       
    }

    public function save()
    {
        $this->validate();
        $this->application->save();
        $this->toastr('Current duties saved');
    }

    public function rules()
    {
        return [
            'application.duties' => 'required|string',
        ];
    }

    public function render()
    {
        return view('promotion::livewire.application.duties.index');
    }


}
