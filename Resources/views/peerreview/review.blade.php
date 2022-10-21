@extends('promotion::layouts.app')

@section('content')

<div class="container-fluid">
	<div class="content-header">
	
		<div class="row mb-2">
			<div class="col-sm-6">
				<h4 class="m-0">Peer Review ({{$application->financial_year}} Promotion)</h4>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ url('promotion') }}">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('promotion.peer.index') }}">My Peers</a></li>
					<li class="breadcrumb-item active">Peer Review</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="content">
	
		<div class="card">
			
			<div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">                    
						<livewire:promotion::application.profile :application="$application"  />               
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <livewire:promotion::peerreview.peer-review :application="$application"  />
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection


