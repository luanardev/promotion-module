<div class="card card-outline">
    <div class="card-header">
        <h3 class="card-title text-bold">Supervisor</h3>
        <button wire:click="create()" class="float-right btn btn-sm btn-primary">
            <i class="fas fa-plus-circle"></i> Add
        </button>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                @if($staff->hasSupervisor())
                <div class="list-group">
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col-auto">
                                @if(!is_null($supervisor->avatar))
                                    <img src="{{ asset("storage/".$supervisor->avatar) }}" class="img-fluid" style="max-height: 100px;"/>
                                @else
                                    <img src="{{ asset('img/default.png') }}" class="img-fluid"  style="max-height: 100px;"/>
                                @endif
                            </div>
                            <div class="col px-4">
                                <h5>{{$supervisor->fullname()}} ({{$supervisor->id}})</h5>
                                <h6 class="mb-1 text-muted">{{$supervisor->getPosition()}}</h6>
                                <h6 class="mb-1 text-muted">{{$supervisor->getCampus()}}</h6>
                                <a href="#" wire:click="unassign({{$supervisor}})" >Remove Supervisor</a>
                            </div>                   
                        </div>               
                    </div>  
                </div>
                @else
                    <h5>No Supervisor Assigned</h5>
                @endif
            </div>
        </div>
    </div>
</div>