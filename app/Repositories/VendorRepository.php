<?php

namespace App\Repositories;

use App\Models\Vendor;
use App\Repositories\BaseRepository;

/**
 * Class VendorRepository
 * @package App\Repositories
 * @version March 2, 2022, 1:15 am +07
*/

class VendorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'number',
        'ntn_no',
        'strn_no',
        'address',
        'deals_in',
        'user_id'
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
        return Vendor::class;
    }
}
