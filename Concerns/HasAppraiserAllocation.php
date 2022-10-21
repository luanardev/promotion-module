<?php

namespace Luanardev\Lumis\Promotion\Concerns;
use Illuminate\Database\Eloquent\Model;
use Luanardev\Lumis\Employees\Entities\Staff;
use Luanardev\Lumis\Promotion\Entities\AppraiserAllocation;

trait HasAppraiserAllocation
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function appraisers()
    {
        return $this->hasManyThrough(
            Staff::class, 
            AppraiserAllocation::class, 
            'application_id', 'id', 'id', 'appraiser_id'
        );
    }

    /**
     * @return boolean
     */
    public function hasAppraisers()
    {
        return $this->appraisers()->count()? true:false;
    }

    /**
     *
     * @param Staff $appraiser
     * @return void
     */
    public function setAppraiser($appraiser)
    {
        $app = new AppraiserAllocation();
        return $app->addAppraiser($this,$appraiser);
    }

    /**
     *
     * @param Staff $appraiser
     * @return void
     */
    public function removeAppraiser($appraiser)
    {
        $app = new AppraiserAllocation();
        return $app->removeAppraiser($this,$appraiser);
    }
    
}
