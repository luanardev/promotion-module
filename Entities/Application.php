<?php

namespace Luanardev\Lumis\Promotion\Entities;

use Illuminate\Database\Eloquent\Model;
use Luanardev\Lumis\Employees\Entities\Staff;
use Luanardev\Lumis\Employees\Entities\Position;
use Luanardev\Lumis\Employees\Entities\JobRank;
use Luanardev\Lumis\Employees\Entities\JobCategory;
use Luanardev\Lumis\Institution\Entities\Campus;
use Luanardev\Lumis\Institution\Entities\Department;
use Luanardev\Lumis\Institution\Entities\Section;
use Luanardev\Lumis\Calendar\Entities\FinancialYear;
use Luanardev\Lumis\Promotion\Concerns\HasAchievement;
use Luanardev\Lumis\Promotion\Concerns\HasAppraiserAllocation;
use Luanardev\Lumis\Promotion\Concerns\HasCompetencyReview;
use Luanardev\Lumis\Promotion\Concerns\HasPeerReview;
use Luanardev\Lumis\Promotion\Concerns\HasRecommendation;
use Luanardev\Lumis\Promotion\Concerns\WithApplicationHelper;

class Application extends Model
{
    use HasAppraiserAllocation,
        HasCompetencyReview,
        HasAchievement,
        HasPeerReview,
        HasRecommendation,
        WithApplicationHelper;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hrm_promo_applications';

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
        'id', 'staff_id', 'campus_id', 'department_id', 'section_id', 'position_id', 'category_id',
        'financial_year', 'current_rank', 'current_grade', 'rank_applied','grade_applied', 'duties', 'status', 'comment'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campus()
    {
        return $this->belongsTo(Campus::class, 'campus_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(JobCategory::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currentRank()
    {
        return $this->belongsTo(JobRank::class, 'current_rank');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rankApplied()
    {
        return $this->belongsTo(JobRank::class, 'rank_applied');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currentStage()
    {
        return $this->belongsTo(Stage::class, 'stage');
    }

    /**
     * Set financial year
     * @param mixed $financialYear
     *
     */
    public function setFinancialYear($financialYear=null)
    {
        if(empty($financialYear)){
            $financialYear = FinancialYear::getCurrentYear();
        }
        $this->setAttribute('financial_year', $financialYear);
    }

    /**
     * Check staff category
     *
     * @param mixed $category
     * @return boolean
     */
    public function isCategory($category)
    {
        if(is_string($category)){
            $category = JobCategory::findKey($category);
            return ($this->category_id == $category )? true:false;
        }
        elseif(is_numeric($category)){
            return ($this->category_id == $category )? true:false;
        }
        elseif($category instanceof JobCategory){
            return ($this->category_id == $category->getKey() )? true:false;
        }
    }

    /**
     * Save Application
     *
     * @param Staff $staff
     * @param mixed $rankApplied
     * @param mixed $gradeApplied
     * @return void
     */
    public function apply(Staff $staff, $rankApplied, $gradeApplied)
    {
        $this->setFinancialYear();
        $this->staff()->associate($staff);
        $this->campus()->associate($staff->campus);
        $this->department()->associate($staff->department);
        $this->section()->associate($staff->section);      
        $this->position()->associate($staff->position);
        $this->category()->associate($staff->category);
        $this->currentRank()->associate($staff->rank);
        $this->rankApplied()->associate($rankApplied);
        $this->current_grade = $staff->employment->grade;
        $this->grade_applied = $gradeApplied;
        return $this->save();
    }

    /**
     * Application exists
     *
     * @param Staff $staff
     * @return void
     */
    public function appliedBy(Staff $staff)
    {
        return static::where('staff_id', $staff->getKey())
            ->where('financial_year', FinancialYear::getCurrentYear())
            ->exists();
    }

    
}
