<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model
{
    use HasFactory;
    public $fillable=[

        'site_title',
        'site_logo',
        'notify_by'

    ];
}
