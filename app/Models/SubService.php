<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Models\Branch;

class SubService extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'service_id', 'status', 'branch_id'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
