<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Announcement;

class SubscribeController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255'
        ]);

        // Save to Database
        \App\Models\Subscriber::firstOrCreate(['email' => $request->email]);

        // Store subscription in session (for frontend notification logic)
        session(['subscribed_email' => $request->email]);

        // Send confirmation email
        try {
            \Illuminate\Support\Facades\Mail::to($request->email)->send(new \App\Mail\SubscriptionConfirmation());
        } catch (\Exception $e) {
            // Log the error but don't fail the request to ensure frontend gets success response
            \Illuminate\Support\Facades\Log::error('Mail sending failed: ' . $e->getMessage());
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Successfully subscribed! Check your email for confirmation.'
        ]);
    }

    public function checkNotifications(Request $request)
    {
        $subscribedEmail = session('subscribed_email');
        
        if (!$subscribedEmail) {
            return response()->json([
                'hasNew' => false,
                'count' => ['news' => 0, 'announcements' => 0]
            ]);
        }

        // Get latest timestamps from session or use defaults
        $lastNewsCheck = session('last_news_check', now()->subDays(7));
        $lastAnnouncementCheck = session('last_announcement_check', now()->subDays(7));

        // Count new items
        $newNews = News::where('status', 'published')
            ->where('published_at', '>', $lastNewsCheck)
            ->count();

        $newAnnouncements = Announcement::where('status', 'active')
            ->where('published_at', '>', $lastAnnouncementCheck)
            ->count();

        // Update last check times
        session([
            'last_news_check' => now(),
            'last_announcement_check' => now()
        ]);

        return response()->json([
            'hasNew' => $newNews > 0 || $newAnnouncements > 0,
            'count' => [
                'news' => $newNews,
                'announcements' => $newAnnouncements
            ]
        ]);
    }
}
