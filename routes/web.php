<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\Admin\ProgramMaterialController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    $staff = \App\Models\Staff::where('status', 'active')->get();
    return view('about', compact('staff'));
})->name('about');

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Public routes
Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('/departments/{department}', [DepartmentController::class, 'show'])->name('departments.show');
Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/programs/{program}', [ProgramController::class, 'show'])->name('programs.show');
Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
Route::get('/staff/{staff}', [StaffController::class, 'show'])->name('staff.show');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::get('/announcements/{announcement}', [AnnouncementController::class, 'show'])->name('announcements.show');
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Utility Bar Hubs
Route::get('/students', function () { return view('students'); })->name('students');
Route::get('/alumni', function () { return view('alumni'); })->name('alumni');
Route::get('/visitors', function () { return view('visitors'); })->name('visitors');

// Pages
Route::view('/terms', 'terms')->name('terms');
Route::view('/policies', 'policies')->name('policies');

// Academic & Research
Route::get('/academic', function () { return view('academic'); })->name('academic');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

// News Dropdown Routes (placeholder routes for future implementation)
Route::get('/campus-life', [GalleryController::class, 'campusLife'])->name('campus-life');
Route::get('/cict-games', function () { return view('cict-games'); })->name('cict-games');
Route::get('/classroom', function () { return view('classroom'); })->name('classroom');
Route::get('/resources', function () { return view('resources'); })->name('resources');

// Subscribe and notification routes
Route::post('/subscribe', [App\Http\Controllers\SubscribeController::class, 'subscribe'])->name('subscribe');
Route::get('/check-notifications', [App\Http\Controllers\SubscribeController::class, 'checkNotifications'])->name('check.notifications');

// Admin routes (protected)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('departments', DepartmentController::class);
    Route::resource('programs', ProgramController::class);
    Route::resource('materials', ProgramMaterialController::class);
    Route::resource('staff', StaffController::class);
    Route::resource('news', NewsController::class);
    Route::post('news/bulk', [NewsController::class, 'bulk'])->name('news.bulk');
    Route::post('news/import', [NewsController::class, 'import'])->name('news.import');
    Route::get('news/template', [NewsController::class, 'downloadTemplate'])->name('news.template');
    
    Route::resource('announcements', AnnouncementController::class);
    Route::post('announcements/bulk', [AnnouncementController::class, 'bulk'])->name('announcements.bulk');
    Route::post('announcements/import', [AnnouncementController::class, 'import'])->name('announcements.import');
    Route::get('announcements/template', [AnnouncementController::class, 'downloadTemplate'])->name('announcements.template');
    
    Route::resource('projects', ProjectController::class);
    Route::post('projects/bulk', [ProjectController::class, 'bulk'])->name('projects.bulk');
    Route::post('projects/import', [ProjectController::class, 'import'])->name('projects.import');
    Route::post('projects/bulk-upload', [ProjectController::class, 'bulkUpload'])->name('projects.bulk.upload');
    Route::get('projects/template', [ProjectController::class, 'downloadTemplate'])->name('projects.template');
    
    // Gallery Management
    Route::resource('galleries', GalleryController::class);
    Route::post('galleries/{gallery}/toggle-status', [GalleryController::class, 'toggleStatus'])->name('galleries.toggle-status');
    Route::post('galleries/reorder', [GalleryController::class, 'reorder'])->name('galleries.reorder');
    
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::patch('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
    Route::post('/contacts/{contact}/reply', [ContactController::class, 'reply'])->name('contacts.reply');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    
    // Audit Trail
    Route::get('audit', [AuditController::class, 'index'])->name('audit.index');
    Route::get('audit/{auditLog}', [AuditController::class, 'show'])->name('audit.show');
    Route::get('audit/export', [AuditController::class, 'export'])->name('audit.export');
    Route::post('audit/clear', [AuditController::class, 'clear'])->name('audit.clear');
    Route::get('audit/stats', [AuditController::class, 'stats'])->name('audit.stats');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
