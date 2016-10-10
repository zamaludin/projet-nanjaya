<?php

namespace App\Repositories;

use App\Models\customer;
use InfyOm\Generator\Common\BaseRepository;

class customerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return customer::class;
    }
}
