<?php

namespace App\Repositories;

use App\Models\Ledgers;
use App\Repositories\BaseRepository;

/**
 * Class LedgersRepository
 * @package App\Repositories
 * @version April 4, 2022, 8:05 pm +07
*/

class LedgersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'type'
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
        return Ledgers::class;
    }
}
