<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Appraiser;
use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Lumis\Promotion\Entities\Application;
use Luanardev\Lumis\Employees\Entities\Staff;
use Luanardev\Lumis\Employees\Entities\StaffView;

class AppraiserAllocation extends LivewireUI
{
    public $searchTerm;
    public $searchResults;
    public Application $application;

    public function mount(Application $application)
    {
        $this->application = $application;
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
  
    public function assign(Staff $appraiser)
    {
        try{
            $this->application->setAppraiser($appraiser);
            $this->reset(['searchTerm', 'searchResults']);
            $this->browseMode()->emitRefresh()->toastr('Appraiser allocated');
        }catch(Exception $ex){
            return $this->toastError('Cannot allocate Appraiser');
        }
    }

    public function unassign(Staff $appraiser)
    {
        $this->application->removeAppraiser($appraiser);
        $this->browseMode()->emitRefresh()->toastr('Appraiser removed');
    }

    public function render()
    {
        return view('promotion::livewire.appraiser.index');
    }


}
