<?php

namespace Luanardev\Lumis\Promotion\Concerns;
use Luanardev\Lumis\Promotion\Entities\Achievement;

trait HasAchievement
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function achievements()
    {
        return $this->hasMany(Achievement::class, 'application_id');
    }

    /**
     * @return boolean
     */
    public function hasAchievement()
    {
        return $this->achievements()->count();
    }

    /**
     *
     * @return double
     */
    public function getAchievementPoints()
    {
        $benchmark = 3;  // Maximum Scoring Points
        $targetPoints = 30; // Special Achievement Target Points

        $totalScores = $this->getAchievementScore();
        $totalPoints = ($totalScores/$benchmark) * $targetPoints;
        return round($totalPoints, 2);
    }

    /**
     *
     * @return double
     */
    private function getAchievementScore()
    {
        if(!$this->hasAchievement()){
            return false;
        }

        $totalScores = 0;
        
        $numberOfItems = $this->achievements()->count();

        foreach( $this->achievements()->get() as $achievement ){
            $totalScores += $achievement->score;
        }

        $overallPerformance = round($totalScores/$numberOfItems, 2);

        return $overallPerformance;
    }

    
    
}
