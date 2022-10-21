<?php

namespace Luanardev\Lumis\Promotion\Entities;

use Illuminate\Database\Eloquent\Model;


class PromotionStage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hrm_promo_config_stage';

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
        'id', 'name', 'approver'
    ];
    
}
