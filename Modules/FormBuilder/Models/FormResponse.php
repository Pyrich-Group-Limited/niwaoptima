<?php

namespace Modules\FormBuilder\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Approval;

class FormResponse extends Model
{
    use Approval;
    public $table = 'form_responses';
    public $primarykey='id';
    protected $fillable = [
        'form_id',
        'response',
    ];
}
