
<div>
    @if($browseMode)
        @include('promotion::livewire.appraiser.view')
    @endif

    @if ($createMode)
        @include('promotion::livewire.appraiser.create')
    @endif
</div>
