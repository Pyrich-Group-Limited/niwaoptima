<?php

namespace Modules\Leaves\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * @OA\Schema(
 *      schema="leaves",
 *      required={"days","title","age"},
 *      @OA\Property(
 *          property="days",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *          format="date"
 *      ),
 *      @OA\Property(
 *          property="title",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="age",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="created_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="updated_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */class leaves extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'leaves';

    public $fillable = [
        'days',
        'title',
        'age'
    ];

    protected $casts = [
        'days' => 'date',
        'title' => 'string',
        'age' => 'integer'
    ];

    public static array $rules = [
        'days' => 'required',
        'title' => 'required',
        'age' => 'required'
    ];

    
}
