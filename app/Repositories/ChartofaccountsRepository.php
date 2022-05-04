<?php

namespace App\Repositories;

use App\Models\Chartofaccounts;
use App\Repositories\BaseRepository;

/**
 * Class ChartofaccountsRepository
 * @package App\Repositories
 * @version April 3, 2022, 12:02 am +07
*/

class ChartofaccountsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name'
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
        return Chartofaccounts::class;
    }
}
