<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Clients
 * @package App\Models
 * @version February 20, 2022, 7:47 pm +07
 *
 * @property string $name
 * @property string $phone
 * @property string $ntn_no
 * @property string $srtn_no
 * @property string $address
 * @property string $contact_person
 * @property string $person_phone
 * @property string $designation
 */
class Clients extends Model
{



    public $table = 'clients';




    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'phone' => 'string',
        'srtn_no' => 'string',
        'address' => 'string',
        'contact_person' => 'string',
        'person_phone' => 'string',
        'designation' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

}
