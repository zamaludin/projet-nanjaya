<?php

namespace App\Repositories;

use App\Models\service;
use InfyOm\Generator\Common\BaseRepository;

class serviceRepository extends BaseRepository
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
        return service::class;
    }
}
