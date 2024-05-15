<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = [
        'branch',
        'firstname',
        'lastname',
        'contact',
        'email',
        'address',
        'expertise',
        'created_by',
    ];

    public function branches()
    {
        return $this->hasOne('Modules\Shared\Models\Branch', 'id', 'branch');
    }
}
