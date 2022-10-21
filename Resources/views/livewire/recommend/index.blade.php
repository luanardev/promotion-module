



<div class="card card-outline" id="test">

    <form wire:submit.prevent="save">
        <div class="card-header">
            <h3 class="card-title text-bold"> 
				Recommendation
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
                        <label>
                            General comments and overall assessment * <br/> 
                            (Specify employees outstanding achievements based their job description)
                        </label>
                        <textarea wire:model.lazy="recommendation.comment" class="form-control" rows="8" ></textarea>
                    </div>

                    <div class="form-group">
                        <label>Recommendation for promotion/merit award *</label>
                        <textarea wire:model.lazy="recommendation.action"  class="form-control" rows="8"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>


