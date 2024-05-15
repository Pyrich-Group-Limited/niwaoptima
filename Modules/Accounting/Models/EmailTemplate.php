<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class EmailTemplate extends Model
{
    protected $fillable = [
        'name',
        'from',
        'created_by',
    ];

    public function template()
    {
        return $this->hasOne('Modules\Accounting\Models\UserEmailTemplate', 'template_id', 'id')->where('user_id', '=', Auth::user()->id);
    }
}
