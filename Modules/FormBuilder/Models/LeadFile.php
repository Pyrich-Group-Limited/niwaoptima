<?php

namespace Modules\FormBuilder\Models;

use Illuminate\Database\Eloquent\Model;

class LeadFile extends Model
{
    protected $fillable = [
        'lead_id',
        'file_name',
        'file_path',
    ];
}
