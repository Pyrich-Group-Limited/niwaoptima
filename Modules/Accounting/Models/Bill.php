<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'vender_id',
        'currency',
        'bill_date',
        'due_date',
        'bill_id',
        'order_number',
        'category_id',
        'created_by',
    ];

    public static $statues = [
        'Draft',
        'Sent',
        'Unpaid',
        'Partialy Paid',
        'Paid',
    ];

    public function customer()
    {
        return $this->hasOne('App\Models\User', 'id', 'vender_id');
    }

    public function employee()
    {
        return $this->hasOne('Modules\Accounting\Models\Employee', 'id', 'vender_id');
    }

    public function vender()
    {
        return $this->hasOne('App\Models\User', 'id', 'vender_id');
    }

    public function tax()
    {
        return $this->hasOne('Modules\Accounting\Models\Tax', 'id', 'tax_id');
    }

    public function items()
    {

        return $this->hasMany('Modules\Accounting\Models\BillProduct', 'bill_id', 'id');
    }

    public function accounts()
    {
        return $this->hasMany('Modules\Accounting\Models\BillAccount', 'ref_id', 'id');
    }



    public function payments()
    {
        return $this->hasMany('Modules\Accounting\Models\BillPayment', 'bill_id', 'id');
    }


    public function getSubTotal()
    {
        $subTotal = 0;

        foreach($this->items as $product)
        {
            $subTotal += ($product->price * $product->quantity);
        }

        $accountTotal = 0;
        foreach ($this->accounts as $account)
        {
            $accountTotal += $account->price;
        }



        return $subTotal + $accountTotal;
    }

    public function getTotalTax()
    {
        $totalTax = 0;
        foreach($this->items as $product)
        {
            $taxes = Utility::totalTaxRate($product->tax);
            $totalTax += ($taxes / 100) * ($product->price * $product->quantity - $product->discount) ;

        }

        return $totalTax ;
    }

    public function getTotalDiscount()
    {
        $totalDiscount = 0;
        foreach($this->items as $product)
        {
            $totalDiscount += $product->discount;
        }

        return $totalDiscount;
    }

    public function getAccountTotal()
    {
        $accountTotal = 0;
        foreach ($this->accounts as $account)
        {
            $accountTotal += $account->price;
        }

        return $accountTotal;
    }

    public function getTotal()
    {
        return ($this->getSubTotal() - $this->getTotalDiscount()) + $this->getTotalTax();
    }

    public function getDue()
    {
        $due = 0;
        foreach($this->payments as $payment)
        {
            $due += $payment->amount;
        }

        return ($this->getTotal() - $due) - ($this->billTotalDebitNote());
    }

    public function category()
    {
        return $this->hasOne('Modules\Accounting\Models\ProductServiceCategory', 'id', 'category_id');
    }

    public function debitNote()
    {
        return $this->hasMany('Modules\Accounting\Models\DebitNote', 'bill', 'id');
    }

    public function billTotalDebitNote()
    {
        return $this->hasMany('Modules\Accounting\Models\DebitNote', 'bill', 'id')->sum('amount');
    }

    public function lastPayments()
    {
        return $this->hasOne('Modules\Accounting\Models\BillPayment', 'id', 'bill_id');
    }

    public function taxes()
    {
        return $this->hasOne('Modules\Accounting\Models\Tax', 'id', 'tax');
    }
}
