<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Scottlaurent\Accounting\ModelTraits\AccountingJournal;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class Account
 *
 * @property    int                     $id
 * @property 	string					$name
 *
 */
class Account extends Model
{
	use AccountingJournal;
    protected $fillable=['name','head_id','level','type','type_id'];
    protected $appends = ['current_balance'];

    public function morphed(): MorphTo
    {
        return $this->morphTo();
    }

    public function getCurrentBalanceAttribute(){
        return $this->journal->getCurrentBalanceInDollars();
    }

    public function bank(){
        return $this->belongsTo(Banks::class, 'type_id');
    }
}
