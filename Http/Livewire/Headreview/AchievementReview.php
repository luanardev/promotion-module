<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Headreview;
use Illuminate\Support\Collection;
use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Lumis\Employees\Entities\Staff;
use Luanardev\Lumis\Promotion\Entities\Application;
use Luanardev\Lumis\Promotion\Entities\Achievement;

class AchievementReview extends LivewireUI
{
    public Application $application;
    public Collection $criteria;

    public function mount(Application $application)
    {
        $this->application = $application;
        $this->criteria = $this->getReview();
    }

    public function updatedCriteria($score, $key)
    {
        if(empty($score)){
            return false;
        }
        if($score < 1 ){
            return $this->toastrError('Score cannot be less than 0 ');
        }
        if($score > 3 ){
            return $this->toastrError('Score cannot be greater than 3 ');
        }
        $achievement = Achievement::find($key);
        $achievement->score = $score;
        $achievement->save();
    }

    public function getReview()
    {
        return $this->application->achievements()
            ->pluck('score', 'id');
    }

    public function getCriteria()
    {
        return $this->application->achievements()->get();
    }
  
    public function render()
    {
        return view('promotion::livewire.headreview.achievement');
    }


}
