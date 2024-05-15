<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $table = 'all_payments';
    protected $fillable = [
        'date',
        'amount',
        'account_id',
        'chart_account_id',
        'vender_id',
        'description',
        'category_id',
        'payment_method',
        'reference',
        'created_by',
    ];

    public function category()
    {
        return $this->hasOne('Modules\Accounting\Models\ProductServiceCategory', 'id', 'category_id');
    }

    public function vender()
    {
        return $this->hasOne('App\Models\User', 'id', 'vender_id');
    }


    public function bankAccount()
    {
        return $this->hasOne('Modules\Accounting\Models\BankAccount', 'id', 'account_id');
    }

    public function chartAccount()
    {
        return $this->hasOne('Modules\Accounting\Models\ChartOfAccount', 'id', 'chart_account_id');
    }



}
