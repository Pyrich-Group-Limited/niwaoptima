<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClickedLink extends Model
{
    use HasFactory;
    public $table = 'dm_clicked_links';
    protected $fillable = ['user_id', 'link_url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
