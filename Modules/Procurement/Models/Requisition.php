<?php

namespace Modules\Procurement\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Procurement\Models\Procurement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Procurement\Database\factories\RequisitionFactory;

class Requisition extends Model
{
    use HasFactory;

    protected $fillable = [
        'procurement_id',
        'item',

        'quantity',
        'rate',
        'amount',
    ];

    public static array $rules = [];

    public function procurement()
    {
        return $this->belongsTo(Procurement::class);
    }

    public $casts = [
        // 'quantity' => 'integer',
        // 'rate' => 'integer',
        // 'amount' => 'integer',


    ];
    // protected static function newFactory()
    // {
    //     return RequisitionFactory::new();
    // }
}
