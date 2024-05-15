<?php

namespace App\Models;

use App\Models\Project;

use App\Models\ProjectTask;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Timesheet extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'task_id',
        'date',
        'time',
        'description',
        'created_by',
    ];

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
    public function task()
    {
        return $this->hasOne(ProjectTask::class, 'id', 'task_id');
    }
}
