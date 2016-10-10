<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="customer",
 *      required={},
 *      @SWG\Property(
 *          property="id_customer",
 *          description="id_customer",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="phone_number",
 *          description="phone_number",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class customer extends Model
{
    use SoftDeletes;

    public $table = 'customer';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id_customer';

    public $fillable = [
        'name',
        'phone_number'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_customer' => 'integer',
        'name' => 'string',
        'phone_number' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function vehicle(){
        return $this->hasMany('App\\Models\\vehicle');
    }
}
