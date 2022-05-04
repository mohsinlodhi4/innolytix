<?php

namespace App\Repositories;

use App\Models\JobOrder;
use App\Repositories\BaseRepository;

/**
 * Class JobOrderRepository
 * @package App\Repositories
 * @version March 7, 2022, 12:33 am +07
*/

class JobOrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'client_id',
        'title',
        'unique_id',
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
        return JobOrder::class;
    }
}
