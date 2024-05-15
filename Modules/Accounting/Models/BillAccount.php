<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'chart_account_id',
        'price',
        'description',
        'type',
        'ref_id',
    ];


}
