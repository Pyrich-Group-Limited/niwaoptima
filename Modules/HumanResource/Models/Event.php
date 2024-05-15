<?php

namespace Modules\HumanResource\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Shared\Models\Department;
use Modules\HumanResource\Models\Ranking;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;
use Modules\HumanResource\Models\EventDepartmentRanking;


class Event extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use AuditingAuditable;

    public $table = 'events';
    protected $fillable = ['title', 'start', 'end'];

    public function departmentRankings()
    {
        return $this->hasMany(EventDepartmentRanking::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }

    public function rankings()
    {
        return $this->belongsToMany(Ranking::class);
    }

    
}
