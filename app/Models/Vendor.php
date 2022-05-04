<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Scottlaurent\Accounting\ModelTraits\AccountingJournal;


/**
 * Class Vendor
 * @package App\Models
 * @version March 2, 2022, 1:15 am +07
 *
 * @property string $name
 * @property string $number
 * @property string $ntn_no
 * @property string $strn_no
 * @property string $address
 * @property string $deals_in
 * @property integer $user_id
 */
class Vendor extends Model
{
    use SoftDeletes, AccountingJournal;


    public $table = 'vendors';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'number',
        'ntn_no',
        'strn_no',
        'address',
        'deals_in',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'number' => 'string',
        'ntn_no' => 'string',
        'strn_no' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
