<?php

namespace Modules\HumanResource\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class LeaveType extends Model
{
    use HasFactory;

    public $table ='leavetype';
    public $primaryKey='id';
    protected $fillable = [
        'leave_request_id',
        'name',
        'duration'
    ];
    public static array $rules=[
         'name'=>'required',
        'duration'=>'required',
        
    ];
    
public function leaverequest()
{
    $this->hasOne(LeaveRequest::class,'leavetype_id','id');
}

    // protected static function newFactory()
    // {
    //     return \Modules\HumanResource\Database\factories\LeaveTypeFactory::new();
    // }
}

