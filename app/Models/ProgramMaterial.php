<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramMaterial extends Model
{
    protected $fillable = [
        'program_id',
        'title',
        'file_path',
        'file_name',
        'file_type',
        'file_size',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function getFileSizeFormattedAttribute()
    {
        $bytes = $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }

    public function getFileIconAttribute()
    {
        $iconMap = [
            'pdf' => '📄',
            'doc' => '📝',
            'docx' => '📝',
            'xls' => '📊',
            'xlsx' => '📊',
            'ppt' => '📽️',
            'pptx' => '📽️',
            'txt' => '📋',
            'zip' => '🗜️',
            'rar' => '🗜️',
            'jpg' => '🖼️',
            'jpeg' => '🖼️',
            'png' => '🖼️',
            'gif' => '🖼️',
        ];

        $extension = strtolower(pathinfo($this->file_name, PATHINFO_EXTENSION));
        return $iconMap[$extension] ?? '📎';
    }
}
