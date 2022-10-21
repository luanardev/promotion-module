@extends('promotion::layouts.app')

@section('content')

<div class="container-fluid">

	<div class="content-header">

		<div class="row mb-2">
			<div class="col-sm-6">
				<h4 class="m-0">Dean Evaluation</h4>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ url('promotion') }}">Home</a></li>
					<li class="breadcrumb-item active">Faculty Members</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
						<h4 class="card-title">Applications</h4>
					</div>
                    <div class="card-body">
                        <x-adminlte-flash />
						<div class="table-responsive">
                            <livewire:promotion::deanreview.application-table :staff="$staff" />
						</div>
					</div>
				</div>
			</div>
		</div>
        
	</div>
</div>


@endsection