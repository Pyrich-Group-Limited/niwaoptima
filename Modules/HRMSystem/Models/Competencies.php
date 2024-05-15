<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;

class Competencies extends Model
{
    protected $fillable = [
        'name',
        'type',
        'created_by',
    ];

//    public static $types = [
//        'technical' => 'Technical',
//        'organizational' => 'Organizational',
//        'behavioural' => 'Behavioural',
//    ];


    public function performance()
    {
        return $this->hasOne('Modules\HRMSystem\Models\PerformanceType', 'id', 'type');
    }
}
