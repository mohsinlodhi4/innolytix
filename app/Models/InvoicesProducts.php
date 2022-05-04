<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class InvoicesProducts
 * @package App\Models
 * @version March 7, 2022, 4:12 am +07
 *
 * @property string $name
 * @property string $description
 * @property string $model_no
 * @property string $brand
 * @property integer $unitprice
 * @property integer $qty
 * @property integer $total
 * @property integer $vendor_id
 * @property integer $invoice_id
 */
class InvoicesProducts extends Model
{
    use SoftDeletes;


    public $table = 'invoices_products';
    

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
        'invoice_id'
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
        'model_no' => 'string',
        'brand' => 'string',
        'unitprice' => 'integer',
        'qty' => 'integer',
        'total' => 'integer',
        'vendor_id' => 'integer',
        'invoice_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
