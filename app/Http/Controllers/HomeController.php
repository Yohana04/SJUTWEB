<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Department;
use App\Models\Staff;
use App\Models\News;
use App\Models\Announcement;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->take(6)->get();
        $departments = Department::latest()->take(6)->get();
        $news = News::where('status', 'published')
                   ->latest('published_at')
                   ->take(5)
                   ->get();
        $announcements = Announcement::active()
                                    ->latest('published_at')
                                    ->take(5)
                                    ->get();

        return view('home', compact('programs', 'departments', 'news', 'announcements'));
    }
}
