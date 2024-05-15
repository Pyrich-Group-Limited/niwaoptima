<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;

class EmailTemplateLang extends Model
{
    protected $fillable = [
        'parent_id',
        'lang',
        'subject',
        'content',
    ];
}
