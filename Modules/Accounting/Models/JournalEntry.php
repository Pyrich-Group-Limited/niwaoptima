<?php

namespace Modules\Accounting\Models;

use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    protected $fillable = [
        'date',
        'reference',
        'description',
        'journal_id',
        'created_by',
    ];


    public function accounts()
    {
        return $this->hasmany('Modules\Accounting\Models\JournalItem', 'journal', 'id');
    }

    public function totalCredit()
    {
        $total = 0;
        foreach($this->accounts as $account)
        {
            $total += $account->credit;
        }

        return $total;
    }

    public function totalDebit()
    {
        $total = 0;
        foreach($this->accounts as $account)
        {
            $total += $account->debit;
        }

        return $total;
    }


}
