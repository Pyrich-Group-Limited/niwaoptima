<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;

class ProposalProduct extends Model
{
    protected $fillable = [
        'product_id',
        'proposal_id',
        'quantity',
        'tax',
        'discount',
        'total',
    ];

    public function product()
    {
        return $this->hasOne('Modules\Accounting\Models\ProductService', 'id', 'product_id');
    }
}
