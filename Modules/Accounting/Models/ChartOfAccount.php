<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Accounting\Models\JournalItem;
use Illuminate\Support\Facades\DB;

class ChartOfAccount extends Model
{
    protected $fillable = [
        'name',
        'code',
        'type',
        'sub_type',
        'is_enabled',
        'description',
        'created_by',
    ];

    public function types()
    {
        return $this->hasOne('Modules\Accounting\Models\ChartOfAccountType', 'id', 'type');
    }

    public function accounts()
    {
        return $this->hasOne('Modules\Accounting\Models\JournalItem', 'account', 'id');
    }

    public function balance()
    {
        $journalItem         = JournalItem::select(DB::raw('sum(credit) as totalCredit'), DB::raw('sum(debit) as totalDebit'), DB::raw('sum(credit) - sum(debit) as netAmount'))->where('account', $this->id);
        $journalItem         = $journalItem->first();
        $data['totalCredit'] = $journalItem->totalCredit;
        $data['totalDebit']  = $journalItem->totalDebit;
        $data['netAmount']   = $journalItem->netAmount;

        return $data;
    }

    public function subType()
    {
        return $this->hasOne('Modules\Accounting\Models\ChartOfAccountSubType', 'id', 'sub_type');
    }
}
