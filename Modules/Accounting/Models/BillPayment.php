<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;

class BillPayment extends Model
{
    protected $fillable = [
        'bill_id',
        'date',
        'account_id',
        'payment_method',
        'reference',
        'description',
    ];


    public function bankAccount()
    {
        return $this->hasOne('Modules\Accounting\Models\BankAccount', 'id', 'account_id');
    }
}
