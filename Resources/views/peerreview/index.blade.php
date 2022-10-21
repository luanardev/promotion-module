@extends('promotion::layouts.app')

@section('content')

<div class="container-fluid">

	<div class="content-header">

		<div class="row mb-2">
			<div class="col-sm-6">
				<h4 class="m-0">Peer Review </h4>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ url('promotion') }}">Home</a></li>
					<li class="breadcrumb-item active">My Peers</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="content">

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="row">   
                            <div class="col-md-12">
                                @if($staff->hasPeerAllocation() )
                                <div class="list-group">
                                    @foreach($staff->getPeerAllocation() as $application)
                                    <div class="list-group-item">
                                        <div class="row">
                                            
                                            <div class="col-auto">
                                                @if(!is_null($application->staff->avatar))
                                                    <img src="{{ asset("storage/".$application->staff->avatar) }}" class="img-fluid" style="max-height: 100px;"/>
                                                @else
                                                    <img src="{{ asset('img/default.png') }}" class="img-fluid"  style="max-height: 100px;"/>
                                                @endif
                                            </div>
                                            <div class="col px-4">   
                                                <h5>{{$application->staff->fullname()}} ({{$application->staff->id}})</h5>
                                                <h6 class="mb-1 text-muted">{{$application->staff->getPosition()}}</h6>
                                                <h6 class="mb-1 text-muted">{{$application->financial_year}} promotion</h6>
                                                <a href="{{route('promotion.peer.review', $application)}}" >Peer Review</a> 
                                            </div>                   
                                        </div>               
                                    </div>  
                                    @endforeach
                                </div>
                                @else
                                    <h5>No Peers for review</h5> 
                                @endif
                            </div>
                        </div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection