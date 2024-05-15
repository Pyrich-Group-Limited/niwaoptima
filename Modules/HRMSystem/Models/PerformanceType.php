<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;

class PerformanceType extends Model
{
    protected $fillable = [
        'name',
        'created_by',
    ];


    public function types()
    {

        return $this->hasMany('Modules\HRMSystem\Models\Competencies', 'type', 'id');
    }

}
