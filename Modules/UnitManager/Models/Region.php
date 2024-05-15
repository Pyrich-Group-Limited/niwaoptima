<?php

namespace Modules\UnitManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shared\Models\Branch;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

 class Region extends Model implements Auditable
{
    use SoftDeletes;
    use HasFactory;
    use AuditingAuditable;
    public $table = 'regions';

    public $fillable = [
        'name'
    ];

    protected $casts = [
        'name' => 'string'
    ];

    public static array $rules = [
        'name' => 'required'
    ];

    public function department(): \Illuminate\Database\Eloquent\Relations\hasOne
    {
        return $this->hasOne(\Modules\Shared\Models\Department::class, 'id', 'department_id');
    }
    public function department1(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Shared\Models\Department::class, 'department_id', 'id');
    }

    public function unit_head(): \Illuminate\Database\Eloquent\Relations\hasOne
    {
        return $this->hasOne(\Modules\UnitManager\Models\UnitHead::class, 'id', 'unit_head_id');
    }

    public function branch(){
        return $this->hasMany(Branch::class);
    }
}
