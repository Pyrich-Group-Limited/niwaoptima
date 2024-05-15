<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;

class ChartOfAccountSubType extends Model
{
    protected $fillable = [
        'name',
        'type',
        'created_by',
    ];
}
