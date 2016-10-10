<?php

namespace App\Repositories;

use App\Models\vehicle;
use InfyOm\Generator\Common\BaseRepository;

class vehicleRepository extends BaseRepository
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
        return vehicle::class;
    }
}
