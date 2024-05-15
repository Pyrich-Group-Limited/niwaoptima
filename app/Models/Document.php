<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
public $table='documentas';
    public $fillable = [
        'role_id',
        'title',
        'file_name',
        'expired_date',
        'mobile',
        'alarm',
        'vendor',
        'description'
    ];
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
