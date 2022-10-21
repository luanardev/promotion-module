<?php

namespace Luanardev\Lumis\Promotion\Entities;

use Illuminate\Database\Eloquent\Model;
use Luanardev\Lumis\Employees\Entities\Staff;

class PeerReview extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hrm_promo_peer_review';

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
        'id', 'application_id', 'appraiser_id', 'criteria_id', 'score',  'comment',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function criteria()
    {
        return $this->belongsTo(Competency::class, 'criteria_id');
    }

    public function addReview($application, $appraiser, $criteria, $score)
    {
        try{         
            $review = $this->searchReview($application, $appraiser, $criteria);
            if(!empty($review)){
                $review->score = $score;
                $review->save();
            }else{
                $this->application()->associate($application);
                $this->appraiser()->associate($appraiser);
                $this->criteria()->associate($criteria);
                $this->setAttribute('score', $score);
                $this->save();
            }          
        }catch(Exception $ex){}
        
    }

    private function searchReview($application, $appraiser, $criteria)
    {
        if($application instanceof Application){
            $application = $application->getKey();
        }
        if($appraiser instanceof Staff){
            $appraiser = $appraiser->getKey();
        }
        if($criteria instanceof Competency){
            $criteria = $criteria->getKey();
        }
        $record = self::where('application_id', $application)
                ->where('appraiser_id', $appraiser)
                ->where('criteria_id', $criteria)
                ->first();
        return $record;
    }
    
}
