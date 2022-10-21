<div class="card card-outline">
    <div class="card-header">
        <h3 class="card-title text-bold">Luanar Service</h3>      
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <span class="text-bold">Starting Date</span>
                        <a class="float-right">
                            <span class="text-bold">{{$staff->employment->startDate()}}</span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <span class="text-bold">
                            Ending Date
                        </span>
                        <a class="float-right">
                            <span class="text-bold">{{$staff->employment->endDate()}}</span>
                        </a>
                    </li>

                    <li class="list-group-item">
                        <span class="text-bold">Period of Service</span>
                        <a class="float-right">
                            <span class="text-bold">{{$staff->employment->elapsedPeriod()}}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <ul class="list-group list-group-unbordered">

                    <li class="list-group-item">
                        <span class="text-bold">Job Status</span>
                        <div class="float-right">
                            <span class="text-bold">{!! $staff->employment->statusBadge() !!}</span>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <span class="text-bold">Confirmed</span>
                        <div class="float-right">
                            <span class="text-bold">{!! $staff->employment->confirmationBadge() !!}</span>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <span class="text-bold">Appointed</span>
                        <div class="float-right">
                            <span class="text-bold">{!! $staff->employment->appointmentBadge() !!}</span>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-outline">
                    <div class="card-header">
                        <h3 class="card-title text-bold">Career Progress</h3>      
                    </div>
                    <div class="card-body">
                    
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>Rank</th> 
                                    <th>Grade</th>
                                    <th>Progress</th>                     
                                    <th>Start Date</th>
                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($staff->progress as $progress)
                                <tr>
                                    <td>{{$progress->getPosition()}}</td>
                                    <td>{{$progress->getRank()}}</td>
                                    <td>{{$progress->grade}}</td>
                                    <td>{{$progress->getType()}}</td>
                                    <td>{{$progress->startDate()}}</td>
                                
                                </tr>
                                @endforeach
            
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>          
        </div>
    </div>
</div>