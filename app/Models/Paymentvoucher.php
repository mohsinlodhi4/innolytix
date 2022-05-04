<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Paymentvoucher
 * @package App\Models
 * @version April 6, 2022, 3:54 am +07
 *
 * @property integer $bank_account
 * @property integer $dabit_account
 * @property integer $description
 * @property integer $amount
 * @property integer $created_by
 */
class Paymentvoucher extends Model
{
    use SoftDeletes;


    public $table = 'payment_vouchers';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'bank_account',
        'dabit_account',
        'description',
        'amount',
        'cheque_ref',
        'cheque_date',
        'ref',
        'grand_total',
        'created_by',
        'vendor_id',
        'tax_id',
        'joborder_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'bank_account' => 'integer',
        'dabit_account' => 'integer',
        'amount' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function account(){
        return $this->belongsTo(Account::class, 'dabit_account');
    }
    public function bank(){
        return $this->belongsTo(Banks::class, 'bank_account');
    }
    public function taxes(){
        return $this->morphMany(VoucherTax::class,'voucher');
    }
    
}
