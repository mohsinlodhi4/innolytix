<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class QuotationProducts
 * @package App\Models
 * @version March 6, 2022, 7:35 pm +07
 *
 * @property string $name
 * @property string $description
 * @property string $model_no
 * @property string $brand
 * @property integer $unitprice
 * @property integer $qty
 * @property integer $total
 * @property integer $vendor_id
 * @property integer $quotation_id
 */
class QuotationProducts extends Model
{
    use SoftDeletes;


    public $table = 'quotation_products';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'model_no',
        'brand',
        'unitprice',
        'qty',
        'total',
        'vendor_id',
        'quotation_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'model_no' => 'string',
        'brand' => 'string',
        'unitprice' => 'integer',
        'qty' => 'integer',
        'total' => 'integer',
        'vendor_id' => 'integer',
        'quotation_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
