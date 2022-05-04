<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Purchaseorderproducts
 * @package App\Models
 * @version March 14, 2022, 2:56 am +07
 *
 * @property string $name
 * @property string $description
 * @property string $model
 * @property string $brand
 * @property integer $unitprice
 * @property integer $qty
 * @property integer $total
 * @property integer $purchaseorder_id
 */
class Purchaseorderproducts extends Model
{
    use SoftDeletes;


    public $table = 'purchaseorderproducts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'model',
        'brand',
        'unitprice',
        'qty',
        'total',
        'purchaseorder_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'model' => 'string',
        'brand' => 'string',
        'unitprice' => 'integer',
        'qty' => 'integer',
        'total' => 'integer',
        'purchaseorder_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
