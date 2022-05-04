<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\QuotationProducts;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;


/**
 * Class Quotations
 * @package App\Models
 * @version March 6, 2022, 5:49 pm +07
 *
 * @property integer $client_id
 * @property integer $officedetails_id
 * @property string $created_by
 * @property string $date
 * @property string $subject
 * @property integer $sub_total
 * @property integer $discount
 * @property integer $tax
 * @property integer $grand_total
 */
class Quotations extends Model
{
    use SoftDeletes;


    public $table = 'quotation';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'client_id',
        'officedetails_id',
        'created_by',
        'date',
        'subject',
        'sub_total',
        'discount',
        'tax',
        'grand_total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'client_id' => 'integer',
        'officedetails_id' => 'integer',
        'created_by' => 'string',
        'date' => 'date',
        'sub_total' => 'integer',
        'discount' => 'integer',
        'tax' => 'integer',
        'grand_total' => 'integer'
    ];
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
        /**
         * Get all of the comments for the Quotations
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function products(): HasMany
        {
            return $this->hasMany(QuotationProducts::class, 'quotation_id', 'id');
        }

}
