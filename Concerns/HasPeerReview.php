<?php

namespace Luanardev\Lumis\Promotion\Concerns;
use Luanardev\Lumis\Promotion\Entities\PeerReview;

trait HasPeerReview
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function peerReview()
    {
        return $this->hasMany(PeerReview::class, 'application_id');
    }

    /**
     *
     * @return boolean
     */
    public function hasPeerReview()
    {
        return $this->peerReview()->count();
    }

    /**
     *
     * @return double
     */
    public function getPeerPoints()
    {
        $benchmark = 3;  // Maximum Scoring Points
        $targetPoints = 20; // Peer Target Points

        $totalScores = $this->getPeerAverageScore(); 

        $totalPoints = ($totalScores/$benchmark) * $targetPoints;

        return round($totalPoints, 2);
    }

    /**
     *
     * @return double
     */
    public function getPeerAverageScore()
    {
        $totalScores = 0;

        $peerScores = $this->getPeerScores();

        $numberOfPeers = count($peerScores);

        foreach($peerScores as $peer => $score){
            $totalScores += $score;
        }
        return round($totalScores/$numberOfPeers, 2);
    }

    /**
     *
     * @return array
     */
    public function getPeerScores()
    {
        $peers = $this->peerReview()->pluck('appraiser_id')->toArray();
        $peerScores = [];
        foreach($peers as $peer){
            $peerScores[$peer] = $this->getPeerScore($peer);
        }
        return $peerScores;
    }

    /**
     * @return double
     */
    private function getPeerScore($peer)
    { 
        $reviews = $this->peerReview()->where('appraiser_id', $peer)->get();

        $totalScores = 0;
        $numberOfItems = $reviews->count();
        
        foreach( $reviews as $review ){
            $totalScores += $review->score;
        }

        $overallScore = round($totalScores/$numberOfItems, 2);

        return $overallScore;
    }
   
}
