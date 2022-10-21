@extends('promotion::layouts.app')

@section('content')

<div class="container-fluid">

	<div class="content-header">

		<div class="row mb-2">
			<div class="col-sm-6">
				<h4 class="m-0">My Applications</h4>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ url('promotion') }}">Home</a></li>
					<li class="breadcrumb-item active">My Applications</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
						<div class="float-right">
							
                            <a  class="btn btn-sm btn-primary" href="{{route('promotion.application.create')}}">
                                <i class="fas fa-plus-circle"></i>
                                <span class="d-none d-xs-none d-sm-inline d-md-inline d-lg-inline"> Apply Now</span>
                            </a>
										
						</div>
					</div>
                    <div class="card-body">
                        <x-adminlte-flash />
						<div class="table-responsive">
                            <livewire:promotion::application.application-table  :staff="$staff"/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection