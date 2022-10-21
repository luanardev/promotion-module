<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Peerreview;
use Illuminate\Support\Collection;
use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Lumis\Employees\Entities\Staff;
use Luanardev\Lumis\Promotion\Entities\Application;
use Luanardev\Lumis\Promotion\Entities\Competency;
use Luanardev\Lumis\Promotion\Entities\PeerReview as Review;

class PeerReview extends LivewireUI
{
    public Application $application;
    public Staff $appraiser;
    public Collection $criteria;

    public function __construct()
    {
        $this->appraiser = auth()->user()->getStaff();
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
        $review->addReview($this->application, $this->appraiser, $criterion, $score);
    }

    public function getReview()
    {
        return $this->application->peerReview()
            ->where('appraiser_id', $this->appraiser->id)
            ->orderBy('criteria_id')
            ->pluck('score', 'criteria_id');
    }
    
    public function getCriteria()
    {
        return Competency::all();
    }

    public function render()
    {
        return view('promotion::livewire.peerreview.index');
    }


}
