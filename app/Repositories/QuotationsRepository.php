<?php

namespace App\Repositories;

use App\Models\Quotations;
use App\Repositories\BaseRepository;

/**
 * Class QuotationsRepository
 * @package App\Repositories
 * @version March 6, 2022, 5:49 pm +07
*/

class QuotationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Quotations::class;
    }
}
