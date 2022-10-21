<?php

namespace Luanardev\Lumis\Promotion\Entities;

use Illuminate\Database\Eloquent\Model;


class PromotionCalendar extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hrm_promo_config_calendar';

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
        'id', 'financial_year', 'start_date', 'end_date', 'status'
    ];

    public function isActive()
    {
        return (strtolower($this->status) == 'active')? true:false;
    }  
    
    public function isNotActive()
    {
        return (strtolower($this->status) == 'inactive')? true:false;
    }

    public static function getCurrent()
    {
        return static::latest()->first();
    }

  
}
