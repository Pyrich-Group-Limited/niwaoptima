<?php

namespace Modules\Procurement\Models;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Model;
use Modules\Procurement\Models\Requisition;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Procurement extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'user_id',
        'issue_date',
        'reference_number',
        'title',
        'status',
        'document',
        'audit_comment',
        'hod_comment',
        'finance_comment',
        'md_comment',
        'unit_comment'

    ];
    public static array $rules=[

        'type'=>'required',
        'user_id'=>'required',
        'issue_date'=>'required',
        'reference_number'=>'required',
        'title'=>'required',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function requisition(){
        return $this->hasMany(Requisition::class);
    }


    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }
    // protected static function newFactory()
    // {
    //     return \Modules\Procurement\Database\factories\ProcurementFactory::new();
    // }
}
