<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="vehicle",
 *      required={},
 *      @SWG\Property(
 *          property="number_plate",
 *          description="number_plate",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="info",
 *          description="info",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="id_user",
 *          description="id_user",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_type_transportation",
 *          description="id_type_transportation",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class vehicle extends Model
{
    use SoftDeletes;

    public $table = 'vehicle';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'number_plate';

    public $fillable = [
        'number_plate',
        'info',
        'id_customer',
        'id_type_transportation'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'number_plate' => 'string',
        'info' => 'string',
        'id_customer' => 'integer',
        'id_type_transportation' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
}
