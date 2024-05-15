<?php

namespace Modules\WorkflowEngine\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * @OA\Schema(
 *      schema="Workflow",
 *      required={},
 *      @OA\Property(
 *          property="id",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
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
 *      ),
 *      @OA\Property(
 *          property="workflow_name",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="workflow_type_id",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */ class Workflow extends Model implements Auditable
{
    use SoftDeletes;
    use HasFactory;
    use AuditingAuditable;
    public $table = 'workflows';

    public $fillable = [
        'workflow_name',
        'workflow_type_id'
    ];

    protected $casts = [
        'id' => 'integer',
        'workflow_name' => 'string',
        'workflow_type_id' => 'integer'
    ];

    public static array $rules = [
        'workflow_name' => 'required|unique:workflows,workflow_name',
        'workflow_type_id' => 'required'
    ];

    public function workflowType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\WorkflowEngine\Models\WorkflowType::class, 'workflow_type_id', 'id');
    }

    public function form(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\Modules\WorkflowEngine\Models\Form::class, 'workflow_id');
    }
}
