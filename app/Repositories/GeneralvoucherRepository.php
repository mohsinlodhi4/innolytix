<?php

namespace App\Repositories;

use App\Models\Generalvoucher;
use App\Repositories\BaseRepository;

/**
 * Class GeneralvoucherRepository
 * @package App\Repositories
 * @version April 6, 2022, 11:00 am +07
*/

class GeneralvoucherRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'credit_account',
        'dabit_account',
        'amount',
        'description',
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
        return Generalvoucher::class;
    }
}
