<?php

namespace Modules\DTARequests\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DTAReview extends Model
{
    use HasFactory;
    //
    public $table = 'dta_reviews';
    public $primarykey='id';
    public $fillable = [
        'dtarequest_id',
        'comments',
        'staff_id',
        'user_id',
        'review_status',
        'status',
        'dta_id',
    ];
}
