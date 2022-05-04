<?php

namespace App\Repositories;

use App\Models\Clients;
use App\Repositories\BaseRepository;

/**
 * Class ClientsRepository
 * @package App\Repositories
 * @version February 20, 2022, 7:47 pm +07
*/

class ClientsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'phone',
        'ntn_no',
        'srtn_no',
        'address',
        'contact_person',
        'person_phone',
        'designation'
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
        return Clients::class;
    }
}
