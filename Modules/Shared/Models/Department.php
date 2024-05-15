<?php

namespace Modules\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;
use Modules\HumanResource\Models\Event;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

/**
 * @OA\Schema(
 *      schema="Department",
 *      required={"name","branch_id"},
 *      @OA\Property(
 *          property="name",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="description",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="branch_id",
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
 */ class Department extends Model implements Auditable
{
    use SoftDeletes;
    use HasFactory;
    use AuditingAuditable;
    public $table = 'departments';

    public $fillable = [
        'name',
        'description',
        'branch_id'
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string'/* ,
        'branch_id' => 'integer' */
    ];

    public static array $rules = [
        'name' => 'required',
       /*  'branch_id' => 'required' */
    ];

    public function unit(){
        return $this->hasMany(Unit::class);
    }
    public function branch(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Shared\Models\Branch::class, 'branch_id', 'id');
    }

    public function staff(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(staff::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
