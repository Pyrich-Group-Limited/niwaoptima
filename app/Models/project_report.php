<?php

namespace App\Models;

use App\Models\User;
use App\Models\Milestone;
use App\Models\TaskStage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class project_report extends Model
{
    use HasFactory;
    public static function assign_user($user)
    {
        $assignArr  = explode(',', $user);
        $user_name = '';
       foreach($assignArr as $assign_user)
       {
           $assign_user     = User::find($assign_user);
            if(!empty($assign_user)){
                $user_name .= $assign_user->first_name .",";
            }
       }

       return $user_name;
   }
   public static function milestone($id)
   {
       $milistone = Milestone::find($id);
       if($milistone){
           return $milistone->title;
       }else{
           return '';
       }
   }

   public static function status($id)
   {
       $status = TaskStage::find($id);
       if($status){
           return $status->name;
       }else{
           return '';
       }
   }
}
