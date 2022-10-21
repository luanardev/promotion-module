<div class="card card-outline">

    <div class="card-header">
        <h3 class="card-title text-bold">Application</h3>
    </div>
    <div class="card-body">
        <div class="row">
           
            <div class="col-lg-12 col-md-6 col-sm-12">
                <div class="box-profile">
                    <div class="text-center">
                        <div class="text-center">
                            @if(!is_null($application->staff->avatar))
                                <img src="{{ asset("storage/".$application->staff->avatar) }}" class="profile-user-img img-fluid img-circle"  />
                            @else
                                <img src="{{ asset('img/default.png') }}" class="profile-user-img img-fluid img-circle"  />
                            @endif
                            <h5 class="profile-username">
                                {{$application->staff->fullname()}}
                            </h5>
                            <h6 class="text-muted">
                                {{$application->staff->employment->getPosition()}}
                                
                            </h6>
                            <h6 class="text-muted">
                                {{$application->staff->employment->getDivision()}}
                            </h6>
                          
                        </div>
                    </div>
                </div>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <span class="text-bold">Employee ID </span>
                        <a class="float-right">
                            <span class="text-bold">{{$application->staff_id}}</span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <span class="text-bold"> Present Grade</span>
                        <a class="float-right">
                            <span class="text-bold">{{$application->currentRank->name}} - Grade {{$application->current_grade}}</span>
                        </a>
                    </li>
                    
                    <li class="list-group-item">
                        <span class="text-bold"> Grade Applied </span>
                        <a class="float-right">
                            <span class="text-bold">{{$application->rankApplied->name}} - Grade {{$application->grade_applied}}</span>
                        </a>
                    </li>

                    <li class="list-group-item">
                        <span class="text-bold"> Application Date </span>
                        <a class="float-right">
                            <span class="text-bold">{{$application->getApplyDate()}}</span>
                        </a>
                    </li>

                    <li class="list-group-item">
                        <span class="text-bold"> Application Status </span>
                        <a class="float-right">
                            <span class="text-bold">{{$application->status}}</span>
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </div>
</div>
