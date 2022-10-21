<div class="card card-outline">
    <div class="card-header">
        <h3 class="card-title text-bold">Peer Review</h3>
       
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <p>You should score these achievements using the following key: </p>
                <table class="table">
                    <tr>
                        <th>1 = Does not meet expectation</th>
                        <th>2 = Meets expectation</th>
                        <th>3 = Exceeds expectation</th>
                    </tr>
                </table>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive">   
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Key Area</th>
                                <th>Description</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($this->getCriteria() as $key => $criterion )
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$criterion->name}}</td>
                                <td style="font-style:italic">{{$criterion->description}}</td>
                                <td><input type="text" wire:model="criteria.{{$criterion->id}}" style="width:80px" /></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>     
</div>