<?php

namespace Modules\HumanResource\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Models\Department;
use Modules\HumanResource\Models\Event;
use Modules\HumanResource\Models\Ranking;

class EventDepartmentRanking extends Model
{
    protected $table = 'event_department_ranking';

    protected $fillable = [
        'event_id', 'department_id', 'ranking_id',
    ];

    // Relationships
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function ranking()
    {
        return $this->belongsTo(Ranking::class);
    }
}
