<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalGovt extends Model
{
    use HasFactory;
    public $table = 'local_govts';

    public $fillable = [
        'name',
        'state_id',
        'status'
    ];
}
