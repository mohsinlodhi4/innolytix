<?php

namespace App\Repositories;

use App\Models\InvoicesProducts;
use App\Repositories\BaseRepository;

/**
 * Class InvoicesProductsRepository
 * @package App\Repositories
 * @version March 7, 2022, 4:12 am +07
*/

class InvoicesProductsRepository extends BaseRepository
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
        'invoice_id'
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
        return InvoicesProducts::class;
    }
}
