<div>
    @if($browseMode)
    <div class="card card-outline">
        <div class="card-header">
            <h3 class="card-title text-bold">Referees</h3>          
            <div class="float-right">
                <button wire:click="create()" class=" btn btn-sm btn-primary">
                    <i class="fas fa-plus-circle"></i> Add
                </button>              
            </div>
        </div>
        <div class="card-body">
            @livewire('promotion::application.tables.referee-table', ['staff' => $staff])
        </div>
    </div>
    @endif

    @if($createMode)
        @include('promotion::livewire.application.referee.create')
    @endif
</div>