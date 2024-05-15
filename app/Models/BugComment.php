<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BugComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment', 'bug_id','created_by', 'user_type',
    ];

    public function comment_user(){
        return User::where('id','=',$this->created_by)->first();
     }

     public function user(){
        return $this->hasOne('App\Models\User','id','created_by');
    }
}
