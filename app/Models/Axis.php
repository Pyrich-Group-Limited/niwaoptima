<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Axis extends Model
{
    use HasFactory;
public $table='axis';
    public $fillable = [
        'name',
    ];
    
}
