<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Shared\Models\Branch;

class ProcessingType extends Model
{
    use HasFactory, SoftDeletes;
    public $table = 'processing_types';

    protected $fillable = [
        'service_id', 'name', 'branch_id'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
