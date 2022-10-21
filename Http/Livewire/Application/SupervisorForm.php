<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Application;
use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Lumis\Employees\Entities\Supervision;
use Luanardev\Lumis\Employees\Entities\Staff;
use Luanardev\Lumis\Employees\Entities\StaffView;

class SupervisorForm extends ApplicationForm
{
    public $searchTerm;
    public $searchResults;
    public Staff $supervisor;

    public function mount(Staff $staff)
    {
        parent::mount($staff);
        if(!empty($staff->supervisor)){
            $this->supervisor = $staff->supervisor;
        }else{
            $this->supervisor = new Staff();
        }    
    }

    public function create()
    {
        $this->createMode();
    }

    public function show()
    {
        $this->reset(['searchTerm', 'searchResults']);
        $this->browseMode();
    }

    public function search()
    {
        if(empty($this->searchTerm)){
            return false;
        }
        $this->searchResults = StaffView::searchByCampus($this->searchTerm)->get();
    }
  
    public function assign(Staff $supervisor)
    {
        try{ 
            $this->supervisor = $supervisor;
            $this->staff->setSupervisorOnce($supervisor);
            $this->reset(['searchTerm', 'searchResults']);          
            $this->browseMode()->toastr('Supervisor assigned');
        }catch(\Exception $ex){
            $this->toastrError('Supervisor already assigned');
        }
        
    }

    public function unassign(Staff $supervisor)
    { 
        $this->staff->removeSupervisor($supervisor);
        $this->browseMode()->toastr('Supervisor removed');
    }

    public function render()
    {
        return view('promotion::livewire.application.supervisor.index');
    }


}
