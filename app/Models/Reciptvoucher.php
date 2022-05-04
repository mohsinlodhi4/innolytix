<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Reciptvoucher
 * @package App\Models
 * @version April 6, 2022, 2:36 am +07
 *
 * @property integer $bank_account
 * @property integer $credit_account
 * @property string $description
 * @property integer $amount
 * @property integer $created_by
 */
class Reciptvoucher extends Model
{
    use SoftDeletes;


    public $table = 'recipt_voucher';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'bank_account',
        'credit_account',
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
        'credit_account' => 'integer',
        'description' => 'string',
        'amount' => 'integer',
    ];

    protected $appends = ['bank'];

    public function getBankAttribute(){
        return Banks::find($this->bank_account_class->type_id);
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function account(){
        return $this->belongsTo(Account::class, 'credit_account');
    }
    public function bank_account_class(){
        return $this->belongsTo(Account::class, 'bank_account');
    }

    public function taxes(){
        return $this->morphMany(VoucherTax::class,'voucher');
    }
    

    
}
