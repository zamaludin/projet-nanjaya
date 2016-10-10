<?php

namespace App\Repositories;

use App\Models\type_transportation;
use InfyOm\Generator\Common\BaseRepository;

class type_transportationRepository extends BaseRepository
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
        return type_transportation::class;
    }
}
