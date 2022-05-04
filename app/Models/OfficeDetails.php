<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Office Details
 * @package App\Models
 * @version March 6, 2022, 5:38 pm +07
 *
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $ntn_no
 * @property string $strn_no
 * @property integer $created_by
 */
class OfficeDetails extends Model
{
    use SoftDeletes;


    public $table = 'office_details';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'address',
        'phone',
        'ntn_no',
        'strn_no',
        'created_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'phone' => 'string',
        'ntn_no' => 'string',
        'strn_no' => 'string',
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
