<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Scottlaurent\Accounting\ModelTraits\AccountingJournal;

/**
 * Class Banks
 * @package App\Models
 * @version March 7, 2022, 3:54 am +07
 *
 * @property string $bank_name
 * @property string $branch
 * @property string $account_title
 * @property string $account_no
 * @property string $iban
 * @property integer $opening_balance
 * @property integer $created_by
 */
class Banks extends Model
{
    use AccountingJournal, SoftDeletes;


    public $table = 'banks';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'bank_name',
        'branch',
        'account_title',
        'account_no',
        'iban',
        'opening_balance',
        'created_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'bank_name' => 'string',
        'branch' => 'string',
        'account_title' => 'string',
        'account_no' => 'string',
        'iban' => 'string',
        'opening_balance' => 'integer',
        'created_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function account(): MorphOne
    // public function account()
    {
        return $this->morphOne(Account::class, 'morphed');
    }

}
