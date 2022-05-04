<?php

namespace App\Repositories;

use App\Models\Transections;
use App\Repositories\BaseRepository;

/**
 * Class TransectionsRepository
 * @package App\Repositories
 * @version March 13, 2022, 7:37 pm +07
*/

class TransectionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'joborder_id',
        'title',
        'description',
        'type',
        'amount',
        'bank_id',
        'cheque_no',
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
        return Transections::class;
    }
}
