<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;

class PosProduct extends Model
{
    protected $fillable = [
        'product_id',
        'pos_id',
        'quantity',
        'tax',
        'discount',
        'total',
    ];

    public function product(){
        return $this->hasOne('Modules\Accounting\Models\ProductService', 'id', 'product_id')->first();
    }

}
