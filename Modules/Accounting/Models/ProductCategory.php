<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'name', 'created_by', 'description',
    ];


    protected $hidden = [

    ];
}
