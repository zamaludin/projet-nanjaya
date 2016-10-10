<?php

namespace App\Repositories;

use App\Models\detail_service;
use InfyOm\Generator\Common\BaseRepository;

class detail_serviceRepository extends BaseRepository
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
        return detail_service::class;
    }
}
