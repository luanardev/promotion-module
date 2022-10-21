@extends('promotion::layouts.app')

@section('content')

<div class="container-fluid">
	<div class="content-header">
	
		<div class="row mb-2">
			<div class="col-sm-6">
				<h4 class="m-0">{{$application->financial_year}} Promotion Evaluation ({{$application->getCategory()}} Staff)</h4>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ url('promotion') }}">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('promotion.head.index') }}">Department Members</a></li>
					<li class="breadcrumb-item active">Application</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="content">
	
		<div class="card">
			<div class="card-header">
				<h5>
                    {{$application->staff->fullname()}}
                </h5>
                
			</div>
			<div class="card-body">
                <div class="row">
                    <div class="col-lg-2 col-md-12 col-sm-12">                    
                        <div class="nav flex-column nav-pills offset-lg-1" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" data-toggle="pill" href="#position" role="tab" aria-controls="position" aria-selected="true">Application</a>
                            <a class="nav-link"  data-toggle="pill" href="#competency" role="tab" aria-controls="competency" aria-selected="false">Competency Evaluation</a>
                            <a class="nav-link"  data-toggle="pill" href="#achievement" role="tab" aria-controls="achievement" aria-selected="false">Achievement Evaluation</a>    
                            <a class="nav-link"  data-toggle="pill" href="#recommendation" role="tab" aria-controls="recommendation" aria-selected="false">Recommendation</a>    
                        </div>                      
                    </div>
                    <div class="col-lg-10 col-md-12 col-sm-12">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="position" role="tabpanel" >
                                <livewire:promotion::application.position-applied :application="$application"  />
                            </div>

                            <div class="tab-pane fade" id="competency" role="tabpanel" >
                                <livewire:promotion::headreview.competency-review :application="$application"  />
                            </div>

                            <div class="tab-pane fade" id="achievement" role="tabpanel" >
                                <livewire:promotion::headreview.achievement-review :application="$application"  />
                            </div>

                            <div class="tab-pane fade" id="recommendation" role="tabpanel" >
                                <livewire:promotion::recommend.recommend :application="$application"  />
                            </div>
 
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection


