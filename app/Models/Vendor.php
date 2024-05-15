<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Procurement\Models\Procurement;

class Vendor extends Model
{
    // use HasFactory;

    protected $fillable=[

        'name',
        'email',
        'address',
        'phone_number'
    ];

    public function procurement(){
        return $this->hasMany(Procurement::class);
    }
}
