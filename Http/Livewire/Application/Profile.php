<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Application;
use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Lumis\Promotion\Entities\Application;

class Profile extends LivewireUI
{
    public Application $application;

    public function mount(Application $application)
    {
        $this->application = $application;
    }

    public function render()
    {
        return view('promotion::livewire.application.profile.view');
    }



}
