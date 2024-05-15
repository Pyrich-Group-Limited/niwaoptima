<?php

namespace Modules\UnitManager\Models;

use App\Models\User;
use Modules\Shared\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Modules\UnitManager\Models\UnitHead;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

 class Units extends Model implements Auditable
{
    use SoftDeletes;
    use HasFactory;
    use AuditingAuditable;
    public $table = 'units';

    public $fillable = [
        'unit_name',
        'unit_id',
        'department_id'
    ];

    protected $casts = [
        'unit_name' => 'string',
        'department_id' => 'integer',
        'unit_id' => 'integer'
    ];

    public static array $rules = [
        'unit_name' => 'required',
        'department_id' => 'required'
    ];

    // public function department(): \Illuminate\Database\Eloquent\Relations\hasOne
    // {
    //     return $this->hasOne(\Modules\Shared\Models\Department::class, 'id', 'department_id');
    // }
    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function user (){
        return $this->hasMany(User::class);

    }
    public function unit_head(): \Illuminate\Database\Eloquent\Relations\hasOne
    {
        return $this->hasOne(UnitHead::class, 'id', 'unit_head_id');
    }
}
