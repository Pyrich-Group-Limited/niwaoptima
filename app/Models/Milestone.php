<?php

namespace App\Models;

use App\Models\ProjectTask;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Milestone extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'title',
        'status',
        'description',
    ];

    public function tasks()
    {
        return $this->hasMany(ProjectTask::class, 'milestone_id', 'id');
    }
}
