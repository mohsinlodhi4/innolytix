<?php

namespace App\Repositories;

use App\Models\OfficeDetails;
use App\Repositories\BaseRepository;

/**
 * Class Office DetailsRepository
 * @package App\Repositories
 * @version March 6, 2022, 5:38 pm +07
*/

class OfficeDetailsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'phone',
        'ntn_no',
        'strn_no',
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
        return OfficeDetails::class;
    }
}
