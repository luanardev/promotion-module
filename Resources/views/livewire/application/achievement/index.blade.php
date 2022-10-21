<div>
    @if($browseMode)
    <div class="card card-outline">
        <div class="card-header">
            <h3 class="card-title text-bold">Achievements</h3>          
            <div class="float-right">
                <button wire:click="create()" class=" btn btn-sm btn-primary">
                    <i class="fas fa-plus-circle"></i> Add
                </button>              
            </div>
        </div>
        <div class="card-body">
            @livewire('promotion::application.tables.achievement-table', ['application' => $application])
        </div>
    </div>
    @endif

    @if($createMode)
        @include('promotion::livewire.application.achievement.create')
    @endif
</div>