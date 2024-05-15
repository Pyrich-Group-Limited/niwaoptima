<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'type',
        'created_by',
    ];

    public $customField;
}
