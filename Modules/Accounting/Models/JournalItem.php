<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;

class JournalItem extends Model
{
    protected $fillable = [
        'journal',
        'account',
        'debit',
        'credit',
    ];

    public function accounts()
    {
        return $this->hasOne('Modules\Accounting\Models\ChartOfAccount', 'id', 'account');
    }


}
