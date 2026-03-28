<?php

namespace App\Providers;

use App\Models\AuditLog;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AuditServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $models = [
            \App\Models\User::class,
            \App\Models\Department::class,
            \App\Models\Program::class,
            \App\Models\Staff::class,
            \App\Models\News::class,
            \App\Models\Announcement::class,
            \App\Models\Gallery::class,
            \App\Models\Project::class,
            \App\Models\Contact::class,
        ];

        foreach ($models as $model) {
            $this->observeModelEvents($model);
        }

        // Log user authentication events
        Event::listen('Illuminate\Auth\Events\Login', function ($event) {
            AuditLog::log('login', $event->user);
        });

        Event::listen('Illuminate\Auth\Events\Logout', function ($event) {
            AuditLog::log('logout', $event->user);
        });
    }

    /**
     * Observe model events for audit logging.
     */
    protected function observeModelEvents($model): void
    {
        $model::created(function ($instance) {
            AuditLog::log('created', $instance, null, $instance->getAttributes());
        });

        $model::updated(function ($instance) {
            $oldValues = $instance->getOriginal();
            $newValues = $instance->getChanges();
            
            // Remove timestamp fields from changes
            unset($newValues['updated_at']);
            
            if (!empty($newValues)) {
                AuditLog::log('updated', $instance, $oldValues, $newValues);
            }
        });

        $model::deleted(function ($instance) {
            AuditLog::log('deleted', $instance, $instance->getOriginal(), null);
        });

        // Only observe restored event if the model has the trait
        if (method_exists($model, 'restored')) {
            $model::restored(function ($instance) {
                AuditLog::log('restored', $instance, null, $instance->getAttributes());
            });
        }
    }
}
