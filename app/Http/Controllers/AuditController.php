<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuditController extends Controller
{
    /**
     * Display a listing of the audit logs.
     */
    public function index(Request $request)
    {
        $query = AuditLog::with('user')
            ->orderBy('created_at', 'desc');

        // Filter by user
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // Filter by action
        if ($request->filled('action')) {
            $query->where('action', $request->action);
        }

        // Filter by model type
        if ($request->filled('model_type')) {
            $query->where('model_type', $request->model_type);
        }

        // Filter by date range
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $auditLogs = $query->paginate(50);

        // Get filter options
        $users = DB::table('users')->select('id', 'name')->orderBy('name')->get();
        $actions = AuditLog::distinct()->pluck('action')->sort();
        $modelTypes = AuditLog::distinct()->pluck('model_type')->sort();

        return view('admin.audit.index', compact('auditLogs', 'users', 'actions', 'modelTypes'));
    }

    /**
     * Display the specified audit log.
     */
    public function show(AuditLog $auditLog)
    {
        $auditLog->load('user');
        return view('admin.audit.show', compact('auditLog'));
    }

    /**
     * Export audit logs to CSV.
     */
    public function export(Request $request)
    {
        $query = AuditLog::with('user');

        // Apply same filters as index
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }
        if ($request->filled('action')) {
            $query->where('action', $request->action);
        }
        if ($request->filled('model_type')) {
            $query->where('model_type', $request->model_type);
        }
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $logs = $query->orderBy('created_at', 'desc')->get();

        $csvData = [];
        $csvData[] = ['ID', 'User', 'Action', 'Model', 'Model ID', 'IP Address', 'User Agent', 'Changes', 'Created At'];

        foreach ($logs as $log) {
            $csvData[] = [
                $log->id,
                $log->user ? $log->user->name : 'System',
                $log->formatted_action,
                $log->formatted_model,
                $log->model_id,
                $log->ip_address,
                $log->user_agent,
                $log->changes_summary,
                $log->created_at->format('Y-m-d H:i:s')
            ];
        }

        $filename = 'audit_logs_' . date('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($csvData) {
            $file = fopen('php://output', 'w');
            foreach ($csvData as $row) {
                fputcsv($file, $row);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Clear old audit logs.
     */
    public function clear()
    {
        $days = request('days', 90);
        $deleted = AuditLog::where('created_at', '<', now()->subDays($days))->delete();
        
        return redirect()
            ->route('admin.audit.index')
            ->with('success', "Deleted {$deleted} audit logs older than {$days} days.");
    }

    /**
     * Get audit statistics.
     */
    public function stats()
    {
        $stats = [
            'total_logs' => AuditLog::count(),
            'today_logs' => AuditLog::whereDate('created_at', today())->count(),
            'this_week_logs' => AuditLog::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            'this_month_logs' => AuditLog::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count(),
            'top_actions' => AuditLog::select('action', DB::raw('count(*) as count'))
                ->groupBy('action')
                ->orderByDesc('count')
                ->limit(10)
                ->get(),
            'top_users' => AuditLog::with('user')
                ->select('user_id', DB::raw('count(*) as count'))
                ->groupBy('user_id')
                ->orderByDesc('count')
                ->limit(10)
                ->get(),
            'recent_activity' => AuditLog::with('user')
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get(),
        ];

        return response()->json($stats);
    }
}
