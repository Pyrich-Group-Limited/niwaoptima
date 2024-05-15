<?php

namespace Modules\DocumentManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @OA\Schema(
 *      schema="MemoHasUser",
 *      required={"memo_id","user_id","assigned_by"},
 *      @OA\Property(
 *          property="memo_id",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="user_id",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="assigned_by",
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
 */ class MemoHasUser extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $table = 'memo_has_users';

    public $fillable = [
        'memo_id',
        'user_id',
        'assigned_by'
    ];

    protected $casts = [
        'memo_id' => 'integer',
        'user_id' => 'integer',
        'assigned_by' => 'integer'
    ];

    public static array $rules = [
        'memo_id' => 'required',
        'user_id' => 'required',
        'assigned_by' => 'required'
    ];

    public function assignedBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'assigned_by', 'id');
    }

    public function memo(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\DocumentManager\Models\Memo::class, 'memo_id', 'id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
