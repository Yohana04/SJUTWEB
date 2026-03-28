<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'author',
        'description',
        'category',
        'file_path',
        'image',
        'year',
        'status'
    ];
}
