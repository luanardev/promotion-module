<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Application;
use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Lumis\Employees\Entities\Staff;
use Luanardev\Lumis\Employees\Entities\JobGrade;
use Luanardev\Lumis\Employees\Entities\JobRank;
use Luanardev\Lumis\Promotion\Entities\Application;

class ApplicationForm extends LivewireUI
{
    public Staff $staff;
    public $rank;
    public $grade;

    public function mount(Staff $staff)
    {
        $this->staff = $staff;
        $this->grade = $this->nextgrade();
    }

    public function save()
    {
        $application = new Application();
 
        if($application->appliedBy($this->staff)){
            $this->emitRefresh()->toastrError('Application already exists');
            return $this->redirect(route('promotion.application.index'));
        }else{
            $application->apply($this->staff, $this->rank, $this->grade);
            $this->emitRefresh()->toastr('Application created');
            return $this->redirect(route('promotion.application.show', $application));
        }
       
    }

    public function render()
    {
        return view('promotion::livewire.application.position.create');
    }

    public function ranks()
    {
        $category = $this->staff->employment->category_id;
        return JobRank::getByCategory($category)
            ->pluck('id', 'name')->flip()->toArray();
    }

    public function nextgrade()
    {
        $jobCategory = $this->staff->employment->category;
        $currentGrade = $this->staff->employment->grade;
        $nextGrade = JobGrade::getNextGradeInCategory($currentGrade, $jobCategory);
        return ($nextGrade)? $nextGrade: $currentGrade;
    }

}
