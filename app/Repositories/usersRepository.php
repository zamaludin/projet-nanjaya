<?php

namespace App\Repositories;

use App\Models\users;
use InfyOm\Generator\Common\BaseRepository;

class usersRepository extends BaseRepository
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
        return users::class;
    }
}
