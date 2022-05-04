<?php

namespace App\Repositories;

use App\Models\Paymentvoucher;
use App\Repositories\BaseRepository;

/**
 * Class PaymentvoucherRepository
 * @package App\Repositories
 * @version April 6, 2022, 3:54 am +07
*/

class PaymentvoucherRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'bank_account',
        'dabit_account',
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
        return Paymentvoucher::class;
    }
}
