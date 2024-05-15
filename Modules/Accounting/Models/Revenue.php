<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    protected $fillable = [
        'date',
        'amount',
        'account_id',
        'customer_id',
        'category_id',
        'recurring',
        'payment_method',
        'reference',
        'description',
        'created_by',
    ];

    public function category()
    {
        return $this->hasOne('Modules\Accounting\Models\ProductServiceCategory', 'id', 'category_id');
    }

    public function customer()
    {
//        return $this->hasOne('Modules\EmployerManager\Models\Employer', 'id', 'customer_id');
return $this->hasOne('App\Models\User', 'id', 'customer_id');

    }

    public function bankAccount()
    {
        return $this->hasOne('Modules\Accounting\Models\BankAccount', 'id', 'account_id');
    }
}
