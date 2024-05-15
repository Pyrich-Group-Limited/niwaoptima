<?php

namespace Modules\WorkflowEngine\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * @OA\Schema(
 *      schema="StepType",
 *      required={"step_type"},
 *      @OA\Property(
 *          property="step_type",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
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
 */ class StepType extends Model implements Auditable
{
    use SoftDeletes;
    use HasFactory;
    use AuditingAuditable;
    public $table = 'step_types';

    public $fillable = [
        'step_type'
    ];

    protected $casts = [
        'step_type' => 'string'
    ];

    public static array $rules = [
        'step_type' => 'required|unique:step_types,step_type'
    ];
}
