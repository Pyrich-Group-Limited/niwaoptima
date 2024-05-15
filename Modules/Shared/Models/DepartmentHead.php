<?php

namespace Modules\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

 class DepartmentHead extends Model implements Auditable
{
    use SoftDeletes;
    use HasFactory;
    use AuditingAuditable;
    public $table = 'department_heads';

    public $fillable = [
        'department_id',
        'user_id'
    ];

    protected $casts = [
        'department_id' => 'integer',
        'user_id' => 'integer',
    ];

    public static array $rules = [
        'department_id' => 'required',
        'user_id' => 'required'
    ];

    /* public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Shared\Models\Department::class, 'department_id', 'id');
    } */

    public function user(): \Illuminate\Database\Eloquent\Relations\hasOne
    {
        return $this->hasOne(\Modules\Shared\Models\DepartmentHead::class,"department_id","id");
    }
    public function department(): \Illuminate\Database\Eloquent\Relations\hasOne
    {
        return $this->hasOne(\Modules\Shared\Models\DepartmentHead::class);
    }
}
