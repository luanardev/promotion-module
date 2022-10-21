<div class="card card-outline">
    <div class="card-header">
        <h3 class="card-title text-bold">Appraisers</h3>
        <button wire:click="create()" class="float-right btn btn-sm btn-primary">
            <i class="fas fa-plus-circle"></i> Add
        </button>
    </div>
    <div class="card-body">
        <div class="row">   
            <div class="col-md-12">
                @if($application->hasAppraisers() )
                <div class="list-group">
                    @foreach($application->appraisers()->get() as $staff)
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col-auto">
                                @if(!is_null($staff->avatar))
                                    <img src="{{ asset("storage/".$staff->avatar) }}" class="img-fluid" style="max-height: 100px;"/>
                                @else
                                    <img src="{{ asset('img/default.png') }}" class="img-fluid"  style="max-height: 100px;"/>
                                @endif
                            </div>
                            <div class="col px-4">   
                                <h5>{{$staff->fullname()}} ({{$staff->id}})</h5>
                                <h6 class="mb-1 text-muted">{{$staff->getPosition()}}</h6>
                                <h6 class="mb-1 text-muted">{{$staff->getDivision()}}</h6>
                                <a href="#" wire:click="unassign({{$staff}})">Remove Appraiser</a> 
                            </div>                   
                        </div>               
                    </div>  
                    @endforeach
                </div>
                @else
                    <h5>No Appraiser Allocated</h5> 
                @endif
            </div>
        </div>
    </div>
     
</div>