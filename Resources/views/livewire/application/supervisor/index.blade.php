
<div>
    @if($browseMode)
        @include('promotion::livewire.application.supervisor.view')
    @endif

    @if ($createMode)
        @include('promotion::livewire.application.supervisor.create')
    @endif
</div>
