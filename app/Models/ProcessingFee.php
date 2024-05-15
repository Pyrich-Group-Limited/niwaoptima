<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Shared\Models\Branch;

class ProcessingFee extends Model
{
    use HasFactory, SoftDeletes;
    public $table = 'processing_fees';

    protected $fillable = [
        'service_id', 'amount', 'processing_type_id', 'branch_id'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function processingType()
    {
        return $this->belongsTo(ProcessingType::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
