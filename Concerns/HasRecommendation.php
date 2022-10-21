<?php

namespace Luanardev\Lumis\Promotion\Concerns;
use Luanardev\Lumis\Employees\Entities\Staff;
use Luanardev\Lumis\Promotion\Entities\Recommendation;

trait HasRecommendation
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recommendations()
    {
        return $this->hasMany(Recommendation::class, 'application_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recommendation(Staff $appraiser)
    {
        return $this->hasMany(Recommendation::class, 'application_id')
            ->where('appraiser_id', $appraiser->id)
            ->first();
    }

    /**
     *
     * @return boolean
     */
    public function hasRecommendation()
    {
        return $this->recommendation()->count();
    }
}
