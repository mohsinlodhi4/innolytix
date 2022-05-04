<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Scottlaurent\Accounting\ModelTraits\AccountingJournal;
use App\Models\Clients;
use Scottlaurent\Accounting\Models\Ledger;

/**
 * Class JobOrder
 * @package App\Models
 * @version March 7, 2022, 12:33 am +07
 *
 * @property integer $client_id
 * @property string $title
 * @property string $unique_id
 * @property integer $created_by
 */
class JobOrder extends Model
{
    use AccountingJournal, SoftDeletes;


    public $table = 'job_orders';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'client_id',
        'title',
        'unique_id',
        'created_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'client_id' => 'integer',
        'title' => 'string',
        'unique_id' => 'string',
        'created_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    public function client(){
        return $this->belongsTo(Clients::class);
    }
}
