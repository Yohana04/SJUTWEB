<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Staff;
use App\Models\News;
use App\Models\Announcement;
use App\Models\Department;
use App\Models\Contact;
use App\Models\AuditLog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'programs' => Program::count(),
            'staff' => Staff::count(),
            'news' => News::count(),
            'announcements' => Announcement::count(),
            'departments' => Department::count(),
            'contacts' => Contact::where('status', 'new')->count(),
        ];

        // Get recent audit logs for dashboard
        $recentLogs = AuditLog::with('user')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('dashboard', compact('stats', 'recentLogs'));
    }
}
