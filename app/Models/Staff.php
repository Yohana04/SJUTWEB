<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Staff extends Model
{
    protected $fillable = [
        'name',
        'title',
        'email',
        'phone',
        'photo',
        'bio',
        'department_id',
        'status'
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
