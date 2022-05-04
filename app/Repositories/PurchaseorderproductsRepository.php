<?php

namespace App\Repositories;

use App\Models\Purchaseorderproducts;
use App\Repositories\BaseRepository;

/**
 * Class PurchaseorderproductsRepository
 * @package App\Repositories
 * @version March 14, 2022, 2:56 am +07
*/

class PurchaseorderproductsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'model',
        'brand',
        'unitprice',
        'qty',
        'total',
        'purchaseorder_id'
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
        return Purchaseorderproducts::class;
    }
}
