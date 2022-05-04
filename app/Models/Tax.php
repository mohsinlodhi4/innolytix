<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Tax
 * @package App\Models
 * @version March 6, 2022, 5:32 pm +07
 *
 * @property integer $percent
 * @property integer $created_by
 */
class Tax extends Model
{
    use SoftDeletes;


    public $table = 'taxs';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'percent',
        'created_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'percent' => 'integer',
        'created_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
