<?php

namespace App\Repositories;

use App\Models\QuotationProducts;
use App\Repositories\BaseRepository;

/**
 * Class QuotationProductsRepository
 * @package App\Repositories
 * @version March 6, 2022, 7:35 pm +07
*/

class QuotationProductsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'model_no',
        'brand',
        'unitprice',
        'qty',
        'total',
        'vendor_id',
        'quotation_id'
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
        return QuotationProducts::class;
    }
}
