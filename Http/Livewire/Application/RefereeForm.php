<?php

namespace Luanardev\Lumis\Promotion\Http\Livewire\Application;
use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Lumis\Employees\Entities\Referee;
use Luanardev\Lumis\Employees\Entities\Staff;
use Luanardev\Lumis\Employees\Enums\WithEnums;

class RefereeForm extends ApplicationForm
{
    use WithEnums;

    public Referee $referee;

    public function __construct()
    {
        parent::__construct();
        $this->referee = new Referee();
    }

    public function mount(Staff $staff)
    {
        parent::mount($staff);
    }

    public function render()
    {
        return view('promotion::livewire.application.referee.index');
    }

    public function create()
    {
        $this->createMode();
        $this->viewData();
    }

    public function show()
    {
        $this->browseMode();
    }

    public function save()
    {
        $this->validate();
        $this->referee->staff()->associate($this->staff);
        $this->referee->save();
        $this->reset(['referee']);
        $this->browseMode()->emitRefresh()->toastr('Reference saved');
    }

    public function rules()
    {
        return [
            'referee.title' => 'required|string',
            'referee.firstname' => 'required|string',
            'referee.lastname' => 'required|string',
            'referee.relation' => 'required|string',
            'referee.organisation' => 'required|string',
            'referee.contact_address' => 'required|string',
            'referee.email_address' => 'required|string',
            'referee.phone1' => 'required|string',
            'referee.phone2' => 'nullable|string',
        ];

    }

    public function viewData()
    {
        $this->with('title', $this->title());
    }


}
