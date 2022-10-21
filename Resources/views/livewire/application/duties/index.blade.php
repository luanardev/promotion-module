



<div class="card card-outline" id="test">

    <form wire:submit.prevent="save">
        <div class="card-header">
            <h3 class="card-title text-bold"> 
				Duties Performed
			</h3>
            <div class="float-right">
                <button type="submit" class="btn btn-sm btn-primary"> 
                    <i class="fas fa-check-circle"></i> Save 
                </button>
            </div>   
        </div>
        
        <div class="card-body">

            <x-adminlte-validation />

            <div class="row">
      
                <div class="col-lg-12" >
                    
                    <div class="form-group">
                        <label>Duties performed *</label>
                        <textarea wire:model.lazy="application.duties"  class="form-control" rows="8"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>


