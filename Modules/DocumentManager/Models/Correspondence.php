<?php

namespace Modules\DocumentManager\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @OA\Schema(
 *      schema="Correspondence",
 *      required={"subject","date","sender","reference_number","description"},
 *      @OA\Property(
 *          property="subject",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="date",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="sender",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="reference_number",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="description",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="comments",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *  *      @OA\Property(
 *          property="document_id",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *          format="int32"
 *      ),
 *  *      @OA\Property(
 *          property="created_by",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *      ),
 *  *      @OA\Property(
 *          property="updated_by",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
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
 */ class Correspondence extends Model implements Auditable
{
    use SoftDeletes;
    use HasFactory;
    use AuditingAuditable;
    public $table = 'correspondences';

    public $fillable = [
        'subject',
        'date',
        'sender',
        'reference_number',
        'document_id',
        'description',
        'comments',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'subject' => 'string',
        'date' => 'datetime',
        'sender' => 'string',
        'reference_number' => 'string',
        'description' => 'string',
        'comments' => 'string',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'document_id' => 'integer'
    ];

    public static array $rules = [
        'subject' => 'required',
        'date' => 'required',
        'sender' => 'required',
        'file' => 'required|max:2048',
        'reference_number' => 'required',
        'description' => 'required'
    ];

    public function createdBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by', 'id');
    }

    public function updatedBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'updated_by', 'id');
    }

    public function document(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\DocumentManager\Models\Document::class, 'document_id', 'id');
    }

    public function assignedUsers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\Modules\DocumentManager\Models\CorrespondenceHasUser::class);
    }

    public function assignedDepartments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\Modules\DocumentManager\Models\CorrespondenceHasDepartment::class);
    }
}
