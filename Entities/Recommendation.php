<?php

namespace Luanardev\Lumis\Promotion\Entities;

use Illuminate\Database\Eloquent\Model;
use Luanardev\Lumis\Employees\Entities\Staff;

class Recommendation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hrm_promo_recommendation';

	/**
     * The primary key associated with the model.
     *
     * @var string
     */
	protected $primaryKey = 'id';

    /**
     * Fillable attributes
     *
     * @var array
     */
    protected $fillable = [
        'id', 'application_id', 'appraiser_id', 'action',  'comment',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function appraiser()
    {
        return $this->belongsTo(Staff::class, 'appraiser_id');
    }

    public function recommend($application, $appraiser, $action, $comment)
    {
        try{         
            $recommend = $this->searchRecommend($application, $appraiser);
            if(!empty($recommend)){
                $recommend->action = $action;
                $recommend->comment = $comment;
                $recommend->save();
            }else{
                $this->application()->associate($application);
                $this->appraiser()->associate($appraiser);
                $this->setAttribute('action', $action);
                $this->setAttribute('comment', $comment);
                $this->save();
            }          
        }catch(Exception $ex){}
        
    }

    private function searchRecommend($application, $appraiser)
    {
        if($application instanceof Application){
            $application = $application->getKey();
        }
        if($appraiser instanceof Staff){
            $appraiser = $appraiser->getKey();
        }
      
        $record = self::where('application_id', $application)
                ->where('appraiser_id', $appraiser)
                ->first();
        return $record;
    }
}
