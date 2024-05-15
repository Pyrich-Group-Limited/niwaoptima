<?php

namespace Modules\DocumentManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @OA\Schema(
 *      schema="CorrespondenceHasDepartment",
 *      required={"correspondence_id","department_id","assigned_by"},
 *      @OA\Property(
 *          property="correspondence_id",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="department_id",
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
 */ class CorrespondenceHasDepartment extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $table = 'correspondence_has_departments';

    public $fillable = [
        'correspondence_id',
        'department_id',
        'assigned_by'
    ];

    protected $casts = [
        'correspondence_id' => 'integer',
        'department_id' => 'integer',
        'assigned_by' => 'integer'
    ];

    public static array $rules = [
        'correspondence_id' => 'required',
        'department_id' => 'required',
        'assigned_by' => 'required'
    ];

    public function assignedBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'assigned_by', 'id');
    }

    public function correspondence(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\DocumentManager\Models\Memo::class, 'correspondence_id', 'id');
    }

    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Shared\Models\Department::class, 'department_id', 'id');
    }
}
