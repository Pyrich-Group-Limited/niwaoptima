<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    protected $fillable = [
        'title',
        'created_by',
    ];
}
