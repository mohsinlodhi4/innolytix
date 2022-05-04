<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Chartofaccounts
 * @package App\Models
 * @version April 3, 2022, 12:02 am +07
 *
 * @property integer $id
 * @property integer $name
 */
class Chartofaccounts extends Model
{


    public $table = 'accounts';




    public $fillable = [
        'id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
