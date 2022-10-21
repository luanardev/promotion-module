<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Headreview;
use Illuminate\Support\Collection;
use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Lumis\Employees\Entities\Staff;
use Luanardev\Lumis\Promotion\Entities\Application;
use Luanardev\Lumis\Promotion\Entities\Competency;
use Luanardev\Lumis\Promotion\Entities\CompetencyReview as Review;

class CompetencyReview extends LivewireUI
{
    public Application $application;
    public Staff $head;
    public Collection $criteria;

    public function __construct()
    {
        $this->head = auth()->user()->getStaff();
    }

    public function mount(Application $application)
    {
        $this->application = $application;
        $this->criteria = $this->getReview();
    }

    public function updatedCriteria($score, $criterion)
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
        $review = new Review();
        $review->addReview($this->application, $this->head, $criterion, $score);
    }

    public function getReview()
    {
        return $this->application->competencyReview()
            ->orderBy('criteria_id')
            ->pluck('score', 'criteria_id');
    }
    
    public function getCriteria()
    {
        return Competency::all();
    }

    public function render()
    {
        return view('promotion::livewire.headreview.competency');
    }


}
