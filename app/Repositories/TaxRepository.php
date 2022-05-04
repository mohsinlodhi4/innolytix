<?php

namespace App\Repositories;

use App\Models\Tax;
use App\Repositories\BaseRepository;

/**
 * Class TaxRepository
 * @package App\Repositories
 * @version March 6, 2022, 5:32 pm +07
*/

class TaxRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'percent',
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
        return Tax::class;
    }
}
