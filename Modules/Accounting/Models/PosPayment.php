<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;

class PosPayment extends Model
{
    protected $fillable = [
        'pos_id',
        'date',
        'amount',
        'discount',
        'created_by',

    ];


    public function bankAccount()
    {
        return $this->hasOne('Modules\Accounting\Models\BankAccount', 'id', 'account_id');
    }
}
