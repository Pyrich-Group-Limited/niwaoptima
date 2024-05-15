<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $fillable = [
        'name', 'rate', 'created_by'
    ];
}
