<?php

namespace Modules\UnitManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\User;

class UnitHead extends Model implements Auditable
{
    use SoftDeletes;
    use HasFactory;
    use AuditingAuditable;
    public $table = 'unit_heads';

    public $fillable = [
        'unit_id',
        'user_id'
    ];

    protected $casts = [
        'unit_id' => 'integer',
        'user_id' => 'integer',
    ];

    public static array $rules = [
        'unit_id' => 'required',
        'user_id' => 'required'
    ];

    /* public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Shared\Models\Department::class, 'department_id', 'id');
    } */

    /* public function user(): \Illuminate\Database\Eloquent\Relations\hasOne
    {
        return $this->hasOne(\App\Models\User::class);
    } */
    public function unit(): \Illuminate\Database\Eloquent\Relations\hasOne
    {
        return $this->hasOne(\App\Models\Units::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
