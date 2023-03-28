<?php

namespace App\Models\Job;

use App\Models\JobPosition\JobPosition;
use App\Models\ModelTrait;
use App\Models\Province\Province;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job\Traits\JobAttribute;
use App\Models\Job\Traits\JobRelationship;

class Job extends Model
{
    use ModelTrait,
        JobAttribute,
    	JobRelationship {
            // JobAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/6.x/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'jobs';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'title',
        'title_eng',
        'deadline',
        'deadline',
        'province_id',
        'position_id',
        'created_at',
        'updated_at',
        'post',
        'status',
        'responsibilities',
        'responsibilities_eng',
        'requirements',
        'requirements_eng',
    ];

    /**
     * Default values for model fields
     * @var array
     */
    protected $attributes = [

    ];

    /**
     * Dates
     * @var array
     */
    protected $dates = [

        'created_at',
        'updated_at'
    ];

    /**
     * Guarded fields of model
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function province()
    {
        return $this->belongsTo(Province::class,'province_id','id');
    }

    public function position()
    {
        return $this->belongsTo(JobPosition::class,'position_id','id');
    }
}
