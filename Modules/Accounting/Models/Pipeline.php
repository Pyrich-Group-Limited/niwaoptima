<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pipeline extends Model
{
    protected $fillable = [
        'name',
        'created_by',
    ];

    public function stages()
    {
        return $this->hasMany('Modules\Accounting\Models\Stage', 'pipeline_id', 'id')->where('created_by', '=', Auth::user()->ownerId())->orderBy('order');
    }

    public function leadStages()
    {
        return $this->hasMany('Modules\Accounting\Models\LeadStage', 'pipeline_id', 'id')->where('created_by', '=', Auth::user()->ownerId())->orderBy('order');
    }
}
