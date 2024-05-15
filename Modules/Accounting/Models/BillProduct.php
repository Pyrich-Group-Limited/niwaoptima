<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;

class BillProduct extends Model
{
    protected $fillable = [
        'product_id',
        'bill_id',
        'chart_account_id',
        'quantity',
        'tax',
        'discount',
        'total',
    ];

    public function product()
    {
        return $this->hasOne('Modules\Accounting\Models\ProductService', 'id', 'product_id')->first();
    }
    public function chartAccount()
    {
        return $this->hasOne('Modules\Accounting\Models\ChartOfAccount', 'id', 'chart_account_id');
    }
}
