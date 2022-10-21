<?php

namespace Luanardev\Lumis\Promotion\Concerns;
use Luanardev\Lumis\Promotion\Entities\CompetencyReview;

trait HasCompetencyReview
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function competencyReview()
    {
        return $this->hasMany(CompetencyReview::class, 'application_id');
    }

    /**
     * @return boolean
     */
    public function hasCompetencyReview()
    {
        return $this->competencyReview()->count();
    }

    /**
     *
     * @return double
     */
    public function getCompetencyPoints()
    {
        $benchmark = 3;  // Maximum Scoring Points
        $targetPoints = 50; // Competency Target Points

        $totalScores = $this->getCompetencyScore();

        $totalPoints = ($totalScores/$benchmark) * $targetPoints;
        
        return round($totalPoints, 2);
    }

    /**
     *
     * @return double
     */
    private function getCompetencyScore()
    {
        if(!$this->hasCompetencyReview()){
            return false;
        }

        $totalScores = 0;
        $numberOfItems = $this->competencyReview()->count();

        foreach( $this->competencyReview()->get() as $review ){
            $totalScores += $review->score;
        }

        $overallPerformance = round($totalScores/$numberOfItems, 2);

        return $overallPerformance;
    }
    
}
