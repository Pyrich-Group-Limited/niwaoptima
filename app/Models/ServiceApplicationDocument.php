<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\EmployerManager\Models\Employer;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ServiceApplicationDocument extends Model
{
    use HasFactory;
    public $table = 'service_applications_documents';

    protected $fillable = [
        'service_application_id', 'name', 'path'
    ];
}
