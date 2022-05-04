<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Ledgers
 * @package App\Models
 * @version April 4, 2022, 8:05 pm +07
 *
 * @property integer $name
 * @property integer $type
 */
class Ledgers extends Model
{


    public $table = 'accounting_ledgers';




    public $fillable = [
        'name',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'type' => 'string',
        'created_at'=>'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
