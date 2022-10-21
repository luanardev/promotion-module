<div class="card card-outline">
    <x-adminlte-validation />
    <form wire:submit.prevent="save">
        <div class="card-header">
            <h3 class="card-title text-bold">Referees</h3>
            <div class="float-right">
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="fas fa-check-circle"></i> Save
                </button>  
                <button type="button" wire:click="show()" class="btn btn-sm btn-secondary">
                    <i class="fas fa-times-circle"></i> Cancel
                </button>               
            </div>
           
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Title *</label>
                        <select wire:model.lazy="referee.title" class="form-control select2" >
                            <option value="">--select--</option>
                            @foreach ($viewBag->get('title') as $name)
                                <option value="{{$name}}" >{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">First Name *</label>
                        <input type="text" wire:model.lazy="referee.firstname" name="firstname" class="form-control " placeholder="Enter Firstname"  />
                    </div>

                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Last Name *</label>
                        <input type="text" wire:model.lazy="referee.lastname" name="lastname" class="form-control" placeholder="Enter Lastname" />
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Relation *</label>
                        <input type="text" wire:model.lazy="referee.relation" name="relation" class="form-control" placeholder="Enter Relationship" />
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Organisation *</label>
                        <input type="text" wire:model.lazy="referee.organisation" name="organisation"   class="form-control" placeholder="Enter Organisation" />
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Contact Address *</label>
                        <input type="text" wire:model.lazy="referee.contact_address" name="contact_address" class="form-control " placeholder="Enter Contact Address" />
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Email Address *</label>
                        <input type="text" wire:model.lazy="referee.email_address" name="email_address" class="form-control " placeholder="Enter Contact Address" />
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Phone One *</label>
                        <input type="tel" wire:model.lazy="referee.phone1" name="phone_number1" class="form-control" placeholder="Enter Phone One"/>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Phone Two</label>
                        <input type="tel" wire:model.lazy="referee.phone2"  name="phone_number2" class="form-control " placeholder="Enter Phone Two">
                    </div>
                </div>

            </div>

        </div>
    </form>
</div>