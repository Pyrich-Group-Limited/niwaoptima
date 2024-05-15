<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Shared\Models\Branch;

 class EquipmentAndFee extends Model
{
    use HasFactory;
    public $table = 'equipment_and_fees';

    public $fillable = [
        'service_id',
        'name',
        'price',
        'metric',
        'sub_service_id',
        'branch_id',
        'processing_type_id',
    ];

    protected $casts = [
        'service_id' => 'integer',
        'name' => 'string',
        'price' => 'decimal:2',
        'metric' => 'integer',
        'sub_service_id' => 'integer',
        'processing_type_id' => 'integer',
    ];

    public static array $rules = [
        'service_id' => 'required',
        'name' => 'required',
        'price' => 'required',
        'metric' => 'required',
        'processing_type_id' => 'required',
    ];

    public function service() : BelongsTo {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function subService() : BelongsTo {
        return $this->belongsTo(Service::class, 'sub_service_id', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
