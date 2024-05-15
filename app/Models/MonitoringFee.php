<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Shared\Models\Branch;

class MonitoringFee extends Model
{
    use HasFactory, SoftDeletes;
    public $table = 'monitoring_fees';

    protected $fillable = [
        'service_id', 'amount', 'branch_id', 'processing_type_id', 'name',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function processingType()
    {
        return $this->belongsTo(ProcessingType::class);
    }
}
