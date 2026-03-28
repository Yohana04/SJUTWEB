<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Announcement;
use App\Models\News;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        View::composer('*', function ($view) {
            $threshold = Carbon::now()->subHours(48);
            
            $readAnnouncements = session()->get('read_announcements', []);
            $readNews = session()->get('read_news', []);

            $newAnnouncements = Announcement::active()
                ->where('published_at', '>=', $threshold)
                ->whereNotIn('id', $readAnnouncements)
                ->count();
                
            $newNews = News::where('status', 'published')
                ->where('published_at', '>=', $threshold)
                ->whereNotIn('id', $readNews)
                ->count();
                
            $view->with([
                'globalNewCount' => $newAnnouncements + $newNews,
                'readAnnouncements' => $readAnnouncements,
                'readNews' => $readNews,
            ]);
        });
    }
}
