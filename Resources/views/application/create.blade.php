@extends('promotion::layouts.app')

@section('content')
<div class="container-fluid">

	<div class="content-header">

		<div class="row mb-2">
			<div class="col-sm-6">
				<h4 class="m-0">Apply for Promotion</h4>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ url('promotion') }}">Home</a></li>
					<li class="breadcrumb-item active">Apply</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="content">
		<x-adminlte-flash />
        <livewire:promotion::application.application-form :staff=$staff />
	</div>
</div>

@endsection
