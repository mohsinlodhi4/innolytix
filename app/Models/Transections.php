<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Transections
 * @package App\Models
 * @version March 13, 2022, 7:37 pm +07
 *
 * @property integer $joborder_id
 * @property string $title
 * @property string $description
 * @property string $type
 * @property integer $amount
 * @property integer $bank_id
 * @property string $cheque_no
 * @property integer $created_by
 */
class Transections extends Model
{
    use SoftDeletes;


    public $table = 'transections';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'joborder_id',
        'title',
        'description',
        'type',
        'amount',
        'bank_id',
        'cheque_no',
        'created_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'joborder_id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'type' => 'string',
        'amount' => 'integer',
        'bank_id' => 'integer',
        'cheque_no' => 'string',
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
