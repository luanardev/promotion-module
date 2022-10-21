<div class="card card-outline">
    <x-adminlte-validation />
    <form wire:submit.prevent="save">
        <div class="card-header">
            <h3 class="card-title text-bold">Special Achievements</h3>
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

                <div class="col-md-8">

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">
                                Key Result Area according to job description *
                            </label>
                            <input type="text" wire:model.lazy="achievement.keyarea" class="form-control" placeholder="Enter Key Area" />
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">
                                Noteworthy achievements or targets * <br/>
                                (Provide documentation in support of the same)
                            </label>
                            <input type="text" wire:model.lazy="achievement.achievement" class="form-control " placeholder="Enter Achievement" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>