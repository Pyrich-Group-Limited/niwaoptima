<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Warning extends Model
{
    protected $fillable = [
        'warning_to',
        'warning_by',
        'subject',
        'warning_date',
        'description',
        'created_by',
    ];


    public function employee()
    {
        return $this->hasOne('App\Models\User', 'id', 'employee_id')->first();
    }

    public function warningTo($warningto)
    {
        return User::where('id',$warningto)->first();
    }
    public function warningBy($warningby)
    {
        return User::where('id',$warningby)->first();
    }
}
