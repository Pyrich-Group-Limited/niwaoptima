<?php

namespace Modules\HRMSystem\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Asset extends Model
{
    protected $fillable = [
        'name',
        'purchase_date',
        'supported_date',
        'amount',
        'description',
        'created_by',
        'branch_id',
    ];

    public function employees()
    {
        return $this->belongsToMany('App\Models\User', 'employees', '', 'user_id');
    }

    public function users($users)
    {
        $userArr = explode(',', $users);
        $users  = [];
        foreach($userArr as $user)
        {
            $emp=User::where('id',$user)->first();

            if(!empty($emp)){
                $users[] = User::where('id',$emp->user_id)->first();
            }

        }
        return $users;
    }


}
