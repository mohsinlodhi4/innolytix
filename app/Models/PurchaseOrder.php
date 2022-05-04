<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class PurchaseOrder
 * @package App\Models
 * @version March 13, 2022, 11:07 pm +07
 *
 * @property integer $joborder_id
 * @property integer $vendor_id
 * @property integer $officedetail_id
 * @property string $reference_no
 * @property string $date
 * @property string $payment_terms
 * @property integer $sub_total
 * @property integer $tax
 * @property integer $grand_total
 * @property integer $bank_id
 */
class PurchaseOrder extends Model
{
    use SoftDeletes;


    public $table = 'purchase_orders';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'joborder_id',
        'vendor_id',
        'officedetail_id',
        'reference_no',
        'date',
        'payment_terms',
        'sub_total',
        'tax',
        'grand_total',
        'bank_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'joborder_id' => 'integer',
        'vendor_id' => 'integer',
        'officedetail_id' => 'integer',
        'reference_no' => 'string',
        'date' => 'date',
        'payment_terms' => 'string',
        'sub_total' => 'integer',
        'tax' => 'integer',
        'grand_total' => 'integer',
        'bank_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function products(): HasMany
    {
        return $this->hasMany(Purchaseorderproducts::class, 'purchaseorder_id', 'id');
    }


}
