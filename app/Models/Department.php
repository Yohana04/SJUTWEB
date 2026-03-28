<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    protected $fillable = [
        'name',
        'description',
        'head_of_department',
        'email',
        'phone'
    ];

    public function programs(): HasMany
    {
        return $this->hasMany(Program::class);
    }

    public function staff(): HasMany
    {
        return $this->hasMany(Staff::class);
    }
}
