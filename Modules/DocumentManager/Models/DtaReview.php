<?php

namespace Modules\DTARequests\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * @OA\Schema(
 *      schema="DtaReview",
 *      required={"comments","review_status","status"},
 *      @OA\Property(
 *          property="officer_id",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="comments",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="review_status",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="status",
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
 */class DtaReview extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'dta_reviews';

    public $fillable = [
        'dta_reviewid',
        'officer_id',
        'comments',
        'review_status',
        'status'
    ];

    protected $casts = [
        'officer_id' => 'integer',
        'comments' => 'string',
        'review_status' => 'integer',
        'status' => 'integer'
    ];

    public static array $rules = [
        'dta_reviewid' => 'numeric',
        'officer_id' => 'numeric',
        'comments' => 'required',
        'review_status' => 'required',
        'status' => 'required'
    ];


}
