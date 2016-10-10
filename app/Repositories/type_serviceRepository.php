<?php

namespace App\Repositories;

use App\Models\type_service;
use InfyOm\Generator\Common\BaseRepository;

class type_serviceRepository extends BaseRepository
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
        return type_service::class;
    }
}
