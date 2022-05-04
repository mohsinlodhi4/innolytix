<?php

namespace App\Repositories;

use App\Models\Banks;
use App\Repositories\BaseRepository;

/**
 * Class BanksRepository
 * @package App\Repositories
 * @version March 7, 2022, 3:54 am +07
*/

class BanksRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bank_name',
        'branch',
        'account_title',
        'account_no',
        'iban',
        'opening_balance',
        'created_by'
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
        return Banks::class;
    }
}
