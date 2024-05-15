<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyPolicy extends Model
{
    protected $fillable = [
        'branch',
        'title',
        'description',
        'file',
        'created_by',
    ];

    public function branches()
    {
        return $this->hasOne('Modules\Shared\Models\Branch', 'id', 'branch');
    }
}
