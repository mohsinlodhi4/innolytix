<?php

namespace App\Repositories;

use App\Models\Invoices;
use App\Repositories\BaseRepository;

/**
 * Class InvoicesRepository
 * @package App\Repositories
 * @version March 7, 2022, 4:05 am +07
*/

class InvoicesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'subject',
        'client_id',
        'officedetails_id',
        'sub_total',
        'discount',
        'tax',
        'grand_total',
        'bank_id',
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
        return Invoices::class;
    }
}
