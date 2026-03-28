<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;

class AuditLog extends Model
{
    use HasFactory, Prunable;

    protected $fillable = [
        'user_id',
        'action',
        'model_type',
        'model_id',
        'old_values',
        'new_values',
        'ip_address',
        'user_agent',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'old_values' => 'json',
        'new_values' => 'json',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Get the user that performed the action.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the prunable model query.
     */
    public function prunable()
    {
        return static::where('created_at', '<=', now()->subDays(90));
    }

    /**
     * Scope a query to only include logs for a specific model.
     */
    public function scopeForModel($query, $model)
    {
        return $query->where('model_type', get_class($model))
                    ->where('model_id', $model->getKey());
    }

    /**
     * Scope a query to only include logs for a specific action.
     */
    public function scopeForAction($query, $action)
    {
        return $query->where('action', $action);
    }

    /**
     * Scope a query to only include logs from a specific date range.
     */
    public function scopeBetweenDates($query, $startDate, $endDate)
    {
        return $query->whereBetween('created_at', [$startDate, $endDate]);
    }

    /**
     * Get the model instance that was audited.
     */
    public function auditable()
    {
        return $this->morphTo();
    }

    /**
     * Create an audit log entry.
     */
    public static function log($action, $model, $oldValues = null, $newValues = null)
    {
        return static::create([
            'user_id' => auth()->id(),
            'action' => $action,
            'model_type' => get_class($model),
            'model_id' => $model->getKey(),
            'old_values' => $oldValues,
            'new_values' => $newValues,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

    /**
     * Get formatted action name.
     */
    public function getFormattedActionAttribute()
    {
        $actions = [
            'created' => 'Created',
            'updated' => 'Updated',
            'deleted' => 'Deleted',
            'restored' => 'Restored',
            'login' => 'Login',
            'logout' => 'Logout',
            'viewed' => 'Viewed',
            'exported' => 'Exported',
            'imported' => 'Imported',
        ];

        return $actions[$this->action] ?? ucfirst($this->action);
    }

    /**
     * Get formatted model name.
     */
    public function getFormattedModelAttribute()
    {
        $modelClass = $this->model_type;
        
        $models = [
            'App\Models\User' => 'User',
            'App\Models\Department' => 'Department',
            'App\Models\Program' => 'Program',
            'App\Models\Staff' => 'Staff',
            'App\Models\News' => 'News',
            'App\Models\Announcement' => 'Announcement',
            'App\Models\Gallery' => 'Gallery',
            'App\Models\Project' => 'Project',
            'App\Models\Contact' => 'Contact',
        ];

        return $models[$modelClass] ?? class_basename($modelClass);
    }

    /**
     * Get changes summary.
     */
    public function getChangesSummaryAttribute()
    {
        if ($this->action === 'created') {
            return 'Item was created';
        }

        if ($this->action === 'deleted') {
            return 'Item was deleted';
        }

        if ($this->old_values && $this->new_values) {
            $changes = [];
            
            foreach ($this->new_values as $key => $newValue) {
                $oldValue = $this->old_values[$key] ?? null;
                
                if ($oldValue !== $newValue) {
                    $changes[] = $key;
                }
            }

            if (empty($changes)) {
                return 'No visible changes';
            }

            return 'Changed: ' . implode(', ', $changes);
        }

        return 'Action performed';
    }
}
