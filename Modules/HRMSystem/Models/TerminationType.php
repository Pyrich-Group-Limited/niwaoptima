<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;

class TerminationType extends Model
{
    protected $fillable = [
        'name',
        'created_by',
    ];
}
