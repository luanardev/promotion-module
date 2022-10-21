<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Application;
use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Lumis\Promotion\Entities\Achievement;
use Luanardev\Lumis\Promotion\Entities\Application;

class AchievementForm extends LivewireUI
{
    public Achievement $achievement;

    public Application $application;

    public function __construct()
    {
        parent::__construct();
        $this->achievement = new Achievement(); 
    }

    public function mount(Application $application)
    { 
        $this->application = $application;
           
    }

    public function render()
    {
        return view('promotion::livewire.application.achievement.index');
    }

    public function create()
    {
        $this->createMode();
    }

    public function show()
    {
        $this->browseMode();
    }

    public function save()
    {
        $this->validate();
        $this->achievement->application()->associate($this->application);
        $this->achievement->save();
        $this->reset(['achievement']);
        $this->browseMode()->emitRefresh()->toastr('Achievement saved');
    }

    public function rules()
    {
        return [
            'achievement.keyarea' => 'required|string',
            'achievement.achievement' => 'required|string',
        ];

    }


}
