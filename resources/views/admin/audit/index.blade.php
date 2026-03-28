<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-2 h-8 bg-[#2B579A]"></div>
            <h2 class="font-serif font-black text-2xl text-[#1a3a63] tracking-tight">
                Audit Trail
            </h2>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 shadow-sm animate-fade-in" role="alert">
            <p class="text-[10px] font-black uppercase tracking-widest">{{ session('success') }}</p>
        </div>
    @endif

    {{-- Action Toolbar --}}
    <div class="flex flex-wrap items-center justify-between gap-4 mb-6 px-6 py-4 bg-white border border-slate-100 rounded-xl shadow-sm">
        <div class="flex items-center gap-2">
            <button onclick="toggleFilters()" class="inline-flex items-center gap-2 bg-slate-50 hover:bg-slate-100 text-slate-700 px-4 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest transition-all">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                </svg>
                Filters
            </button>
            <a href="{{ route('admin.audit.export') }}?{{ http_build_query(request()->query()) }}" class="inline-flex items-center gap-2 bg-[#1a3a63] text-white px-4 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-[#2B579A] transition-all shadow">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
                Export CSV
            </a>
            <button onclick="confirmClearLogs()" class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest transition-all">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
                Clear Old
            </button>
        </div>
        <div class="text-[9px] text-slate-400">
            {{ $auditLogs->total() }} Total Logs
        </div>
    </div>

    {{-- Filters Panel --}}
    <div id="filters-panel" class="hidden mb-6 px-6 py-4 bg-white border border-slate-100 rounded-xl shadow-sm">
        <form method="GET" action="{{ route('admin.audit.index') }}">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <label class="block text-[8px] font-black text-slate-600 uppercase tracking-widest mb-1">User</label>
                    <select name="user_id" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-[10px] focus:outline-none focus:ring-2 focus:ring-[#2B579A]">
                        <option value="">All Users</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-[8px] font-black text-slate-600 uppercase tracking-widest mb-1">Action</label>
                    <select name="action" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-[10px] focus:outline-none focus:ring-2 focus:ring-[#2B579A]">
                        <option value="">All Actions</option>
                        @foreach($actions as $action)
                            <option value="{{ $action }}" {{ request('action') == $action ? 'selected' : '' }}>
                                {{ ucfirst($action) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-[8px] font-black text-slate-600 uppercase tracking-widest mb-1">Model</label>
                    <select name="model_type" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-[10px] focus:outline-none focus:ring-2 focus:ring-[#2B579A]">
                        <option value="">All Models</option>
                        @foreach($modelTypes as $modelType)
                            <option value="{{ $modelType }}" {{ request('model_type') == $modelType ? 'selected' : '' }}>
                                {{ class_basename($modelType) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-[8px] font-black text-slate-600 uppercase tracking-widest mb-1">Date Range</label>
                    <div class="flex gap-2">
                        <input type="date" name="start_date" value="{{ request('start_date') }}" class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-[10px] focus:outline-none focus:ring-2 focus:ring-[#2B579A]">
                        <input type="date" name="end_date" value="{{ request('end_date') }}" class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-[10px] focus:outline-none focus:ring-2 focus:ring-[#2B579A]">
                    </div>
                </div>
            </div>
            <div class="flex justify-end gap-2 mt-4">
                <button type="submit" class="bg-[#1a3a63] text-white px-4 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-[#2B579A] transition-all">
                    Apply Filters
                </button>
                <a href="{{ route('admin.audit.index') }}" class="bg-slate-50 text-slate-700 px-4 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-slate-100 transition-all">
                    Clear
                </a>
            </div>
        </form>
    </div>

    <div class="bg-white border border-slate-100 rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Timestamp</th>
                        <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">User</th>
                        <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Action</th>
                        <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Model</th>
                        <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Model ID</th>
                        <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">IP Address</th>
                        <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Changes</th>
                        <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($auditLogs as $log)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="text-xs font-bold text-slate-700">{{ $log->created_at->format('M j, Y H:i') }}</div>
                                <div class="text-[8px] text-slate-500">{{ $log->created_at->diffForHumans() }}</div>
                            </td>
                            <td class="px-6 py-4">
                                @if($log->user)
                                    <div class="flex items-center gap-2">
                                        <div class="w-6 h-6 rounded-full bg-[#2B579A]/10 flex items-center justify-center text-[#2B579A] font-black text-[8px]">
                                            {{ substr($log->user->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <div class="text-xs font-bold text-slate-700">{{ $log->user->name }}</div>
                                            <div class="text-[8px] text-slate-500">{{ $log->user->email }}</div>
                                        </div>
                                    </div>
                                @else
                                    <div class="flex items-center gap-2">
                                        <div class="w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 font-black text-[8px]">
                                            S
                                        </div>
                                        <div>
                                            <div class="text-xs font-bold text-slate-700">System</div>
                                            <div class="text-[8px] text-slate-500">Automated</div>
                                        </div>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-[8px] font-black uppercase tracking-widest rounded-full
                                    {{ $log->action === 'created' ? 'bg-green-100 text-green-700' : '' }}
                                    {{ $log->action === 'updated' ? 'bg-blue-100 text-blue-700' : '' }}
                                    {{ $log->action === 'deleted' ? 'bg-red-100 text-red-700' : '' }}
                                    {{ !in_array($log->action, ['created', 'updated', 'deleted']) ? 'bg-slate-100 text-slate-700' : '' }}">
                                    {{ $log->formatted_action }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-xs font-bold text-slate-700">{{ $log->formatted_model }}</div>
                                <div class="text-[8px] text-slate-500 truncate max-w-[150px]">{{ $log->model_type }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-xs font-mono text-slate-600">#{{ $log->model_id }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-xs font-mono text-slate-600">{{ $log->ip_address }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-xs text-slate-600 max-w-[200px] truncate" title="{{ $log->changes_summary }}">
                                    {{ $log->changes_summary }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.audit.show', $log) }}" class="inline-flex items-center gap-1 bg-slate-50 hover:bg-slate-100 text-slate-700 px-2 py-1 rounded text-[8px] font-black uppercase tracking-widest transition-colors">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-8 py-20 text-center">
                                <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-black text-[#1a3a63] mb-2">No Audit Logs Found</h3>
                                <p class="text-slate-500 mb-6">No audit logs match your current filters.</p>
                                <a href="{{ route('admin.audit.index') }}" class="inline-flex items-center gap-2 bg-[#1a3a63] text-white px-6 py-3 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-[#2B579A] transition-all">
                                    Clear Filters
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($auditLogs->hasPages())
            <div class="px-6 py-4 bg-slate-50 border-t border-slate-100">
                {{ $auditLogs->links() }}
            </div>
        @endif
    </div>
</x-app-layout>

@push('scripts')
<script>
function toggleFilters() {
    const panel = document.getElementById('filters-panel');
    panel.classList.toggle('hidden');
}

function confirmClearLogs() {
    if (confirm('Are you sure you want to delete audit logs older than 90 days? This action cannot be undone.')) {
        window.location.href = '{{ route('admin.audit.clear') }}';
    }
}

// Auto-refresh every 30 seconds for real-time updates
setInterval(() => {
    // Only refresh if no filters are applied
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.toString() === '') {
        window.location.reload();
    }
}, 30000);
</script>
@endpush
