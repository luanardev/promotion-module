<div>
    @if($browseMode)
    <div class="card card-outline">
        <div class="card-header">
            <h3 class="card-title text-bold">Qualifications</h3>          
        </div>
        <div class="card-body">
            @livewire('promotion::application.tables.qualification-table', ['staff' => $staff])
        </div>
    </div>
    @endif

    @if($createMode)
        @include('promotion::livewire.application.qualification.create')
    @endif
</div>