<?php

namespace Modules\EmployerManager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\EmployerManager\Models\Employer;

class Certificate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'employer_id', 'payment_fee', 'processing_status', 'payment_status',
        'branch_id', 'application_letter', 'payment_id',
    ];


    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
