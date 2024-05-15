<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;

class IpRestrict extends Model
{
    protected $fillable = [
        'ip',
        'created_by',
    ];
}
