<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Complaint extends Model
{
    protected $fillable = [
        'complaint_from',
        'complaint_against',
        'title',
        'complaint_date',
        'description',
        'created_by',
    ];


    public function employee()
    {
        return $this->hasOne('App\Models\User', 'id', 'employee_id')->first();
    }

    public function complaintFrom($complaint_from)
    {
        return User::where('id',$complaint_from)->first();
    }
    public function complaintAgainst($complaint_against)
    {
        return User::where('id',$complaint_against)->first();
    }
}
