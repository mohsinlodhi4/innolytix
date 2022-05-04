<?php

namespace App\Repositories;

use App\Models\PurchaseOrder;
use App\Repositories\BaseRepository;

/**
 * Class PurchaseOrderRepository
 * @package App\Repositories
 * @version March 13, 2022, 11:07 pm +07
*/

class PurchaseOrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'joborder_id',
        'vendor_id',
        'officedetail_id',
        'reference_no',
        'date',
        'payment_terms',
        'sub_total',
        'tax',
        'grand_total',
        'bank_id'
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
        return PurchaseOrder::class;
    }
}
