<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Program extends Model
{
    protected $fillable = [
        'name',
        'level',
        'description',
        'department_id',
        'duration_years',
        'code'
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function materials(): HasMany
    {
        return $this->hasMany(ProgramMaterial::class)->where('is_active', true)->orderBy('created_at', 'desc');
    }
}
