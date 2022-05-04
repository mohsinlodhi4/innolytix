<?php

namespace App\Repositories;

use App\Models\Reciptvoucher;
use App\Repositories\BaseRepository;

/**
 * Class ReciptvoucherRepository
 * @package App\Repositories
 * @version April 6, 2022, 2:36 am +07
*/

class ReciptvoucherRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bank_account',
        'credit_account',
        'description',
        'amount',
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
        return Reciptvoucher::class;
    }
}
