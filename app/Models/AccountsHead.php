<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Scottlaurent\Accounting\Models\Ledger;


/**
 * Class AccountsHead
 * @package App\Models
 * @version April 11, 2022, 3:59 pm +07
 *
 * @property string $name
 * @property integer $ledger_id
 * @property string $type
 * @property integer $parent_id
 */
class AccountsHead extends Model
{
    use SoftDeletes;


    public $table = 'account_heads';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'code',
        'type',
        'parent_id',
        'has_parent'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'code' => 'string',
        'type' => 'string',
        'parent_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    public function getheadbalancebalance()
    {
        $balance=0;

        $children = $this->children;
        
        $data = $this->subaccounts;

        $this->getChildrenBalance($children,$balance);
        foreach($data as $d){
            $balance+=$d->journal->getCurrentBalanceInDollars();
        }
        return $balance;
    }

    public function getChildrenBalance($children, &$balance){
        foreach($children as $child){
            $accs = $child->subaccounts;
            foreach($accs as $ac){
                $balance+=$ac->journal->getCurrentBalanceInDollars();
            }
            if($child->has('children')){
                $this->getChildrenBalance($child->children, $balance);
            }
        }
    }

    public function ledger(): BelongsTo
    {
        return $this->belongsTo(Ledger::class);
    }

    public function parent()
    {
        return $this->hasOne(AccountsHead::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(AccountsHead::class, 'parent_id');
    }
    public function subaccounts()
    {
        return $this->hasMany(Account::class, 'head_id');
    }

}
