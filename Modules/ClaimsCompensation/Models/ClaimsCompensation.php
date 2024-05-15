<?php

namespace Modules\ClaimsCompensation\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

 class ClaimsCompensation extends Model implements Auditable
{
    use SoftDeletes;
    use HasFactory;
    use AuditingAuditable;
    public $table = 'claims_compensations';

    public $fillable = [
        'name',
        'description',
        'branch_id',
        'user_id',
        'claimstype_id',
        'images',
        'regional_manager_status',
        'head_office_status',
        'medical_team_status',
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'branch_id' => 'integer',
        'user_id' => 'integer'
    ];

    public static array $rules = [
        'name' => 'required',
        'description' => 'required',
        'branch_id' => 'required'
    ];

    public function claimscompensation():\Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongTo(claimstype::class,'claimstype_id','id');
    }
    public function branch(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Shared\Models\Branch::class, 'branch_id', 'id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
