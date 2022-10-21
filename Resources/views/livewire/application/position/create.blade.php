<div class="card card-outline">
    <x-adminlte-validation />
    <form wire:submit.prevent="save">
        <div class="card-header">
            <h3 class="card-title text-bold">
				<a href="{{route('staff.show', $staff)}}">{{$staff->fullname()}}</a>
			</h3>
            <div class="float-right">
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="fas fa-check-circle"></i> Apply
                </button>
            </div>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-8">
                   
                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Staff Position *
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="{{$staff->employment->getPosition()}}" disabled />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Current Grade *
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="{{$staff->employment->getGrade()}}" disabled />
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Grade Applied For *
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="{{$grade}}" disabled />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Rank Applied For *
                        </label>
                        <div class="col-sm-6">
                            <select wire:model.lazy="rank" class="form-control select2" >
                                <option value="">--select--</option>
                                @foreach ($this->ranks() as $id => $name)                              
                                    <option value="{{$id}}" >{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </form>
</div>
