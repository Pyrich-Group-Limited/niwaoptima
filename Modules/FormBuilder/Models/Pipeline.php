<?php

namespace Modules\FormBuilder\Models;

use Illuminate\Database\Eloquent\Model;

class Pipeline extends Model
{
    protected $fillable = [
        'name',
        'created_by',
    ];

    public function stages()
    {
        return $this->hasMany('Modules\FormBuilder\Models\Stage', 'pipeline_id', 'id')->where('created_by', '=', \Auth::user()->ownerId())->orderBy('order');
    }

    public function leadStages()
    {
        return $this->hasMany('Modules\FormBuilder\Models\LeadStage', 'pipeline_id', 'id')->where('created_by', '=', \Auth::user()->ownerId())->orderBy('order');
    }
}
