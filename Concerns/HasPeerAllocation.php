<?php

namespace Luanardev\Lumis\Promotion\Concerns;
use Illuminate\Database\Eloquent\Model;
use Luanardev\Lumis\Promotion\Entities\Application;
use Luanardev\Lumis\Promotion\Entities\ApplicationView;
use Luanardev\Lumis\Promotion\Entities\AppraiserAllocation;

trait HasPeerAllocation
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function getPeerAllocation()
    {
        return $this->hasManyThrough(
            Application::class, 
            AppraiserAllocation::class, 
            'appraiser_id', 
            'id', 
            'id', 
            'application_id'
        )->get();
    }

    /**
     *
     * @return boolean
     */
    public function hasPeerAllocation()
    {
        return $this->getPeerAllocation()->count()? true:false;
    }

    /**
     *
     * @return boolean
     */
    public function canReviewPeers()
    {
        return $this->hasPeerAllocation();
    }

    /**
     *
     * @param Application $application
     * @return boolean
     */
    public function canReviewPromotion($application)
    {
        if($application instanceof Application){
            $application = $application->getKey();
        }

        return AppraiserAllocation::where('appraiser_id', $this->getKey())
            ->where('application_id', $application)
            ->exists();
    }

    
}
