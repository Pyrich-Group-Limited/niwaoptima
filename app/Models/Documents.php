<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class Documents extends Model implements Auditable
{
    use SoftDeletes;
    use AuditingAuditable;
    use HasFactory;
    public $table = 'documents_manager';

    public $fillable = [
        'title',
        'description',
        'created_by',
        'category_id',
        'document_url',
        'department_id',
        'branch_id',
    ];

    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'created_by' => 'integer',
        'category_id' => 'integer',
        'department_id' => 'integer',
        'branch_id' => 'integer',
    ];

    public static array $rules = [
        'title' => 'required|unique:documents_manager,title',
        'file' => 'required|file|max:2048',
        'description' => 'required',
        'department_id' => 'required',
        'branch_id' => 'required',
    ];
    

    public function department()
{
    return $this->belongsTo(Department::class, 'department_id', 'id');
}

    public function createdBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by', 'id');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\DocumentsCategory::class, 'category_id', 'id');
    }

    public function assignedUsers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\Modules\DocumentManager\Models\MemoHasUser::class);
    }

    public function assignedRoles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\Modules\DocumentManager\Models\MemoHasDepartment::class);
    }
    public function reminder(){
        return $this->hasMany(Reminder::class,'documents_manager_id');
    }

    /**
     * Get the categories that owns the document.
     */
    public function categories()
    {
        return $this->belongsTo(DocumentsCategory::class, 'category_id');
    }
}
