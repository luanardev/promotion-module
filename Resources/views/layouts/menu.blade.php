
<li class="nav-item">
    <a href="{{route('promotion.home')}}" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<!--<li class="nav-header">STAFF FUNCTIONS</li>-->


<li class="nav-item">
	<a href="{{route('promotion.application.create')}}" class="nav-link">
		<i class="nav-icon fas fa-plus-circle"></i>
		<p>Apply Now</p>
	</a>
</li>



<li class="nav-item">
	<a href="{{route('promotion.application.index')}}" class="nav-link">
		<i class="nav-icon fas fa-folder-open"></i>
		<p>My Applications</p>
	</a>
</li>


@can('execute-peer-review')
<li class="nav-item">
	<a href="{{route('promotion.peer.index')}}" class="nav-link">
		<i class="nav-icon fas fa-users"></i>
		<p>Peer Evaluation</p>
	</a>
</li>
@endcan

<!--<li class="nav-header">SUPERVISOR FUNCTIONS</li>-->

@can('execute-head-review')
<li class="nav-item">
	<a href="{{route('promotion.head.index')}}" class="nav-link">
		<i class="nav-icon fas fa-gavel"></i>
		<p>Head Evaluation</p>
	</a>
</li>
@endcan

@can('execute-dean-review')
<li class="nav-item">
	<a href="#" class="nav-link">
		<i class="nav-icon fas fa-gavel"></i>
		<p>Dean Evaluation</p>
	</a>
</li>
@endcan


<!--<li class="nav-header">ADMIN FUNCTIONS</li>-->

@can('create-promotion-appraiser')
<li class="nav-item">
	<a href="{{route('promotion.appraiser.index')}}" class="nav-link">
		<i class="nav-icon fas fa-cog"></i>
		<p>Appraiser Allocation</p>
	</a>
</li>
@endcan

@can('read-promotion')
<li class="nav-item">
	<a href="#" class="nav-link">
		<i class="nav-icon fas fa-folder"></i>
		<p>Get Applications</p>
	</a>
</li>
@endcan




