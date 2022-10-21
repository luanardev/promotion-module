<?php

namespace Luanardev\Lumis\Promotion\Entities;

use Illuminate\Database\Eloquent\Model;
use Luanardev\Lumis\Institution\Entities\Campus;
use Luanardev\Lumis\Institution\Concerns\CampusPicker;
use Luanardev\Lumis\Calendar\Entities\FinancialYear;
use Luanardev\Lumis\Employees\Entities\Staff;

class ApplicationView extends Model
{
    use CampusPicker;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hrm_promo_application_view';


    /**
     * Search Scope for Laravel Livewire DataTable
     * @var Illuminate\Database\Eloquent\Builder $query
     * @var string $term
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $term)
    {
        return $query->where(
            fn ($query) => $query->where('id', 'like', "%{$term}%")
                ->orWhere('staff_id', 'like', "%{$term}%")
                ->orWhere('staff_name', 'like', "%{$term}%")
                ->orWhere('position', 'like', "%{$term}%")
                ->orWhere('financial_year', 'like', "%{$term}%")
        );
    }

    /**
     * Get Employees By Authenticated User Campus
     * @return Illuminate\Database\Eloquent\Builder
     */
    public static function getByCampus($financialYear=null)
    { 
        if(empty($financialYear)){
            $financialYear = FinancialYear::getCurrentYear();
        }     
        $campus = static::getUserCampus();
        if(empty($campus)){
            return static::query()->where('financial_year', $financialYear);        
        }else{
            return static::where('campus', $campus->name)->where('financial_year', $financialYear);
        }         
    }
   
    /**
     * Search Scope for Laravel Livewire DataTable
     * @var string $term
     */
    public static function search($term)
    {
        return static::where('id', 'like', "%{$term}%")
            ->orWhere('staff_id', 'like', "%{$term}%")
            ->orWhere('staff_name', 'like', "%{$term}%")
            ->orWhere('position', 'like', "%{$term}%")
            ->orWhere('financial_year', 'like', "%{$term}%");
    }

    public static function forSubordinates(Staff $supervisor, $financialYear=null)
    {
        if(empty($financialYear)){
            $financialYear = FinancialYear::getCurrentYear();
        }    
        $subordinates = $supervisor->subordinates()->pluck('id')->toArray();
        return static::whereIn('staff_id', $subordinates)
                        ->where('financial_year', $financialYear);
    }

    public static function forStaff(Staff $staff, $financialYear=null)
    {
        if(empty($financialYear)){
            $financialYear = FinancialYear::getCurrentYear();
        }
        
        return static::where('staff_id', $staff->id)
                    ->where('financial_year', $financialYear);

    }

    public static function getByStaff(Staff $staff, $financialYear=null)
    {
        return static::forStaff($staff, $financialYear)->get();
    }
    
    public static function getBySupervisor(Staff $supervisor, $financialYear)
    {
        return static::forSubordinates($supervisor, $financialYear)->get();
    }

}
