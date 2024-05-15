<?php

namespace Modules\FormBuilder\Models;

use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    public $table = 'forms_fields';
    protected $fillable = [
        'form_id',
        'name',
        'code',
        'type',
        'created_by',
        'is_active',
    ];
}
