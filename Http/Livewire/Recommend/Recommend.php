<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Recommend;
use Illuminate\Support\Collection;
use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Lumis\Employees\Entities\Staff;
use Luanardev\Lumis\Promotion\Entities\Application;
use Luanardev\Lumis\Promotion\Entities\Recommendation;

class Recommend extends LivewireUI
{
    public Application $application;
    public Recommendation $recommendation;
    public Staff $appraiser;

    public function __construct()
    {
        $this->recommendation = new Recommendation(); 
        $this->appraiser = auth()->user()->getStaff();
    }

    public function mount(Application $application)
    {
        $this->application = $application;       
        $recommendation = $application->recommendation($this->appraiser);
        if(!empty($recommendation)){
            $this->recommendation = $recommendation;
        }
    }

    public function save()
    {
        $this->validate();
        $this->recommendation->application()->associate($this->application);
        $this->recommendation->appraiser()->associate($this->appraiser);
        $this->recommendation->save();
        $this->toastr('Recommendation saved');
    }

    public function rules()
    {
        return [
            'recommendation.action' => 'required|string',
            'recommendation.comment' => 'required|string',
        ];
    }

    public function render()
    {
        return view('promotion::livewire.recommend.index');
    }


}
