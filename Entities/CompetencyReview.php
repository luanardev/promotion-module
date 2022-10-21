<?php

namespace Luanardev\Lumis\Promotion\Entities;

use Illuminate\Database\Eloquent\Model;
use Luanardev\Lumis\Employees\Entities\Staff;

class CompetencyReview extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hrm_promo_competency_review';

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
        'id', 'application_id', 'head_id', 'criteria_id', 'score',  'comment',
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
    public function head()
    {
        return $this->belongsTo(Staff::class, 'head_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function criteria()
    {
        return $this->belongsTo(Competency::class, 'criteria_id');
    }

    /**
     * Add review
     *
     * @param mixed $application
     * @param mixed $head
     * @param mixed $criteria
     * @param int $score
     * @return void
     */
    public function addReview($application, $head, $criteria, $score)
    {
        try{         
            $review = $this->searchReview($application, $head, $criteria);
            if(!empty($review)){
                $review->score = $score;
                $review->save();
            }else{
                $this->application()->associate($application);
                $this->head()->associate($head);
                $this->criteria()->associate($criteria);
                $this->setAttribute('score', $score);
                $this->save();
            }          
        }catch(Exception $ex){}
        
    }

    /**
     * Search review
     *
     * @param mixed $application
     * @param mixed $head
     * @param mixed $criteria
     * @return void
     */
    private function searchReview($application, $head, $criteria)
    {
        if($application instanceof Application){
            $application = $application->getKey();
        }
        if($head instanceof Staff){
            $head = $head->getKey();
        }
        if($criteria instanceof Competency){
            $criteria = $criteria->getKey();
        }
        $record = self::where('application_id', $application)
                ->where('head_id', $head)
                ->where('criteria_id', $criteria)
                ->first();
        return $record;
    }
    
}
