<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;

class DealEmail extends Model
{
    protected $fillable = [
        'deal_id',
        'to',
        'subject',
        'description',
    ];
}
