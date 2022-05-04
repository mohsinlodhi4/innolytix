<?php

namespace App\Repositories;

use App\Models\AccountsHead;
use App\Repositories\BaseRepository;

/**
 * Class AccountsHeadRepository
 * @package App\Repositories
 * @version April 11, 2022, 3:59 pm +07
*/

class AccountsHeadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'ledger_id',
        'type',
        'parent_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AccountsHead::class;
    }
}
