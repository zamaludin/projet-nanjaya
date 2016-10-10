<?php

namespace App\Repositories;

use App\Models\component;
use InfyOm\Generator\Common\BaseRepository;

class componentRepository extends BaseRepository
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
        return component::class;
    }
}
