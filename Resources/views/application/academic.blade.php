@extends('promotion::layouts.app')

@section('content')

<div class="container-fluid">
	<div class="content-header">
	
		<div class="row mb-2">
			<div class="col-sm-6">
				<h4 class="m-0">{{$application->financial_year}} Promotion Form ({{$application->getCategory()}} Staff)</h4>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ url('promotion') }}">Home</a></li>
					<li class="breadcrumb-item active">Application</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="content">
	
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
                    My Application
                </h3>
                <div class="float-right">
                    <a href="{{route('promotion.application.show', $application)}}" class="btn btn-sm btn-outline-primary" >
                        <i class="fas fa-sync-alt"></i>
                        Refresh
                    </a>
                    <a href="#" class="btn btn-sm btn-outline-primary" target="_blank" >
                        <i class="fas fa-file-pdf"></i>
                        Download
                    </a>
                    <a href="{{route('promotion.application.delete', $application)}}" class="btn btn-sm btn-outline-danger" >
                        <i class="fas fa-trash"></i>
                        Remove
                    </a>
                </div>
			</div>
			<div class="card-body">
                <div class="row">
                    <div class="col-lg-2 col-md-12 col-sm-12">                    
                        <div class="nav flex-column nav-pills offset-lg-1" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" data-toggle="pill" href="#position" role="tab" aria-controls="position" aria-selected="true">Application</a>
                            <a class="nav-link"  data-toggle="pill" href="#supervisor" role="tab" aria-controls="supervisor" aria-selected="true">Supervisor</a>
                            <a class="nav-link"  data-toggle="pill" href="#service" role="tab" aria-controls="service" aria-selected="false">Staff Service</a>
                            <a class="nav-link"  data-toggle="pill" href="#experience" role="tab" aria-controls="experience" aria-selected="false">Experience</a>
                            <a class="nav-link"  data-toggle="pill" href="#qualifications" role="tab" aria-controls="qualifications" aria-selected="false">Qualifications</a>
                            <a class="nav-link"  data-toggle="pill" href="#awards" role="tab" aria-controls="awards" aria-selected="false">Awards</a>
                            <a class="nav-link"  data-toggle="pill" href="#achievements" role="tab" aria-controls="achievements" aria-selected="false">Achievements</a>
                            <a class="nav-link"  data-toggle="pill" href="#reference" role="tab" aria-controls="reference" aria-selected="false">Referees</a>
                            
                        </div>                      
                    </div>
                    <div class="col-lg-10 col-md-12 col-sm-12">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="position" role="tabpanel" >
                                <livewire:promotion::application.position-applied :application="$application"  />
                            </div>

                            <div class="tab-pane fade" id="supervisor" role="tabpanel" >
                                <livewire:promotion::application.supervisor-form :staff="$staff"  />
                            </div>
                
                            <div class="tab-pane fade" id="service" role="tabpanel" >
                                <livewire:promotion::application.service-table :staff="$staff"  />
                            </div>

                            <div class="tab-pane fade" id="experience" role="tabpanel" >
                                <livewire:promotion::application.experience-table :staff="$staff"  />
                            </div>
                
                            <div class="tab-pane fade" id="qualifications" role="tabpanel" >
                                
                            </div>
                            
                            <div class="tab-pane fade" id="awards" role="tabpanel" >
                                
                            </div>
                
                            <div class="tab-pane fade" id="achievements" role="tabpanel" >
                               
                            </div>
                
                            <div class="tab-pane fade" id="reference" role="tabpanel" >
                                
                            </div>
 
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection


