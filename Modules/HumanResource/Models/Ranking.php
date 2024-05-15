<?php

namespace Modules\HumanResource\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\HumanResource\Models\EventDepartmentRanking;

class Ranking extends Model
{
    use HasFactory;
    
    public $primaryKey='id';

    public $table ='rankings';
    protected $fillable = [
        'name',

    ];

    public static array $rules=[
        'name'=>'required'
   ];

   public function staff()
   {
       return $this->hasMany(staff::class);
   }
//    public function staff()
//    {
//        return $this->belongsTo(staff::class);
//    }

   public function eventRankings()
{
    return $this->hasMany(EventDepartmentRanking::class);
}
    

// public function user()
// {
//     return $this->belongsTo(User::class);
// }
    // protected static function newFactory()
    // {
    //     return \Modules\HumanResource\Database\factories\RankingFactory::new();
    // }
}
