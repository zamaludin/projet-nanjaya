<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="service",
 *      required={},
 *      @SWG\Property(
 *          property="id_service",
 *          description="id_service",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="date",
 *          description="date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="total_cost",
 *          description="total_cost",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="number_plate",
 *          description="number_plate",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="id_user",
 *          description="id_user",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="boolean"
 *      )
 * )
 */
class service extends Model
{
    use SoftDeletes;

    public $table = 'service';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id_service';

    public $fillable = [
        'date',
        'total_cost',
        'number_plate',
        'id_user',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_service' => 'integer',
        'date' => 'date',
        'number_plate' => 'string',
        'id_user' => 'integer',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
