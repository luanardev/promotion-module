<?php

namespace Luanardev\Lumis\Promotion\Entities;

use Illuminate\Database\Eloquent\Model;
use Luanardev\Lumis\Employees\Entities\Staff;


class AppraiserAllocation extends Model
{
    
    /** 
     * Disable timestamp
     * var bool
     */
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hrm_promo_appraiser_allocation';

    /**
     * Fillable attributes
     *
     * @var array
     */
    protected $fillable = [
        'application_id', 'appraiser_id'
    ];   

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
    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }

    /**
     * Link Model in Polymorphic relationship
     *
     * @param $application
     * @param $appraiser
     */
    public function addAppraiser($application, $appraiser)
    {
        $this->application()->associate($application);
        $this->appraiser()->associate($appraiser);
        return $this->save();
    }

    /**
     * Unlink Model in Polymorphic relationship
     *
     * @param $application
     * @param $appraiser
     */
    public function removeAppraiser($application, $appraiser)
    {
        if($application instanceof Application){
            $application = $application->getKey();
        }
        if($appraiser instanceof Staff){
            $appraiser = $appraiser->getKey();
        }
        return static::where('application_id', $application)
            ->where('appraiser_id', $appraiser)
            ->delete();
    }


}
