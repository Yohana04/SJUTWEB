<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-2 h-8 bg-[#2B579A]"></div>
            <h2 class="font-serif font-black text-2xl text-[#1a3a63] tracking-tight">
                {{ __('Registry Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="animate-fade-in-up">
        <!-- Global Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <!-- Programs -->
            <a href="{{ route('admin.programs.index') }}" class="bg-white p-6 border border-slate-100 shadow-sm hover:shadow-xl transition-all group">
                <div class="flex items-center justify-between mb-4">
                    <span class="p-2.5 bg-blue-50 text-[#2B579A] text-lg rounded-sm group-hover:bg-[#2B579A] group-hover:text-white transition-all">📚</span>
                    <span class="text-[8px] font-black text-slate-400 uppercase tracking-widest leading-none">Catalog</span>
                </div>
                <h4 class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1.5">Academic Programs</h4>
                <div class="text-2xl font-serif font-black text-[#1a3a63]">{{ $stats['programs'] }}</div>
            </a>

            <!-- Staff -->
            <a href="{{ route('admin.staff.index') }}" class="bg-white p-6 border border-slate-100 shadow-sm hover:shadow-xl transition-all group">
                <div class="flex items-center justify-between mb-4">
                    <span class="p-2.5 bg-orange-50 text-orange-600 text-lg rounded-sm group-hover:bg-orange-600 group-hover:text-white transition-all">🎓</span>
                    <span class="text-[8px] font-black text-slate-400 uppercase tracking-widest leading-none">Directory</span>
                </div>
                <h4 class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1.5">Faculty & Staff</h4>
                <div class="text-2xl font-serif font-black text-[#1a3a63]">{{ $stats['staff'] }}</div>
            </a>

            <!-- News & Notices -->
            <div class="bg-white p-6 border border-slate-100 shadow-sm hover:shadow-xl transition-all group relative">
                <div class="flex items-center justify-between mb-4">
                    <span class="p-2.5 bg-green-50 text-green-600 text-lg rounded-sm group-hover:bg-green-600 group-hover:text-white transition-all">📰</span>
                    <span class="text-[8px] font-black text-slate-400 uppercase tracking-widest leading-none">Live Feed</span>
                </div>
                <h4 class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1.5">News & Notices</h4>
                <div class="text-2xl font-serif font-black text-[#1a3a63]">{{ $stats['news'] + $stats['announcements'] }}</div>
                <div class="absolute bottom-3 right-3 flex gap-2">
                    <a href="{{ route('admin.news.index') }}" class="text-[7px] font-black text-[#2B579A] uppercase tracking-widest hover:underline">News</a>
                    <a href="{{ route('admin.announcements.index') }}" class="text-[7px] font-black text-orange-600 uppercase tracking-widest hover:underline">Notices</a>
                </div>
            </div>

            <!-- Inquiries -->
            <a href="{{ route('admin.contacts.index') }}" class="bg-white p-6 border border-slate-100 shadow-sm hover:shadow-xl transition-all group">
                <div class="flex items-center justify-between mb-4">
                    <span class="p-2.5 bg-purple-50 text-purple-600 text-lg rounded-sm group-hover:bg-purple-600 group-hover:text-white transition-all">📩</span>
                    <span class="text-[8px] font-black text-red-600 uppercase tracking-widest">@if($stats['contacts'] > 0){{ $stats['contacts'] }} NEW @else ALL READ @endif</span>
                </div>
                <h4 class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1.5">Active Inquiries</h4>
                <div class="text-2xl font-serif font-black text-[#1a3a63]">{{ $stats['contacts'] }}</div>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Recent Activity -->
            <div class="lg:col-span-2 bg-white border border-slate-100 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-50 flex items-center justify-between bg-slate-50/50">
                    <h3 class="text-[10px] font-black text-[#1a3a63] uppercase tracking-widest">Recent System Activity</h3>
                    <a href="{{ route('admin.audit.index') }}" class="text-[8px] font-black text-[#2B579A] uppercase tracking-[0.2em] hover:underline">Full Audit Trail</a>
                </div>
                <div class="divide-y divide-slate-50" id="recent-activity">
                    @forelse($recentLogs as $log)
                        <div class="px-6 py-4 flex items-center justify-between hover:bg-slate-50/50 transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="w-8 h-8 {{ $log->action === 'created' ? 'bg-green-100 text-green-700' : ($log->action === 'updated' ? 'bg-blue-100 text-blue-700' : ($log->action === 'deleted' ? 'bg-red-100 text-red-700' : 'bg-slate-100 text-slate-700')) }} flex items-center justify-center font-black text-[10px] rounded-sm">
                                    {{ $log->user ? substr($log->user->name, 0, 2) : 'SY' }}
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-700">
                                        {{ $log->formatted_action }} {{ $log->formatted_model }}
                                        @if($log->model_id)
                                            <span class="text-slate-400">#{{ $log->model_id }}</span>
                                        @endif
                                    </h4>
                                    <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">
                                        {{ $log->user ? $log->user->name : 'System' }} • {{ $log->created_at->format('g:i A') }}
                                    </p>
                                </div>
                            </div>
                            <span class="px-2 py-0.5 {{ $log->action === 'created' ? 'bg-green-100 text-green-700' : ($log->action === 'updated' ? 'bg-blue-100 text-blue-700' : ($log->action === 'deleted' ? 'bg-red-100 text-red-700' : 'bg-slate-100 text-slate-700')) }} text-[8px] font-black uppercase tracking-widest rounded-sm">
                                {{ $log->formatted_action }}
                            </span>
                        </div>
                    @empty
                        <div class="px-6 py-8 text-center">
                            <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <h4 class="text-sm font-bold text-slate-700 mb-2">No Recent Activity</h4>
                            <p class="text-xs text-slate-500">System activity will appear here as actions are performed.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Registry Status -->
            <div class="bg-[#1a3a63] text-white overflow-hidden flex flex-col justify-center p-8 relative border-b-4 border-[#FDB913]">
                <div class="relative z-10">
                    <span class="text-[8px] font-black text-white/40 uppercase tracking-[0.3em] block mb-4">Operational Integrity</span>
                    <h3 class="text-xl font-serif font-black mb-6 leading-tight">Centre Systems are Fully Functional.</h3>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-1.5 h-1.5 rounded-full bg-green-500 shadow-[0_0_8px_rgba(34,197,94,0.5)]"></div>
                            <span class="text-[10px] font-black uppercase tracking-widest">Public Website: Online</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-1.5 h-1.5 rounded-full bg-green-500 shadow-[0_0_8px_rgba(34,197,94,0.5)]"></div>
                            <span class="text-[10px] font-black uppercase tracking-widest">Database Node: Synchronized</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-1.5 h-1.5 rounded-full bg-[#FDB913]"></div>
                            <span class="text-[10px] font-black uppercase tracking-widest border-b border-white/20 pb-0.5">Backup Routine: Pending (04:00 AM)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@push('scripts')
<script>
// Real-time updates for dashboard activity
setInterval(() => {
    fetch('/admin/audit/stats')
        .then(response => response.json())
        .then(data => {
            // Update recent activity if there are new logs
            if (data.recent_activity && data.recent_activity.length > 0) {
                updateRecentActivity(data.recent_activity);
            }
        })
        .catch(error => console.log('Error updating dashboard:', error));
}, 30000); // Update every 30 seconds

function updateRecentActivity(logs) {
    const activityContainer = document.getElementById('recent-activity');
    if (!activityContainer) return;

    const currentLogs = activityContainer.children.length;
    
    // Only update if there are new logs
    if (logs.length > currentLogs) {
        let html = '';
        logs.forEach(log => {
            const actionColor = log.action === 'created' ? 'bg-green-100 text-green-700' : 
                              (log.action === 'updated' ? 'bg-blue-100 text-blue-700' : 
                              (log.action === 'deleted' ? 'bg-red-100 text-red-700' : 'bg-slate-100 text-slate-700'));
            
            const userName = log.user ? log.user.name : 'System';
            const userInitials = log.user ? log.user.name.substring(0, 2) : 'SY';
            const time = new Date(log.created_at).toLocaleTimeString('en-US', { 
                hour: 'numeric', 
                minute: '2-digit',
                hour12: true 
            });
            
            html += `
                <div class="px-6 py-4 flex items-center justify-between hover:bg-slate-50/50 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="w-8 h-8 ${actionColor} flex items-center justify-center font-black text-[10px] rounded-sm">
                            ${userInitials}
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-slate-700">
                                ${log.formatted_action} ${log.formatted_model}
                                ${log.model_id ? `<span class="text-slate-400">#${log.model_id}</span>` : ''}
                            </h4>
                            <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">
                                ${userName} • ${time}
                            </p>
                        </div>
                    </div>
                    <span class="px-2 py-0.5 ${actionColor} text-[8px] font-black uppercase tracking-widest rounded-sm">
                        ${log.formatted_action}
                    </span>
                </div>
            `;
        });
        
        activityContainer.innerHTML = html;
    }
}
</script>
@endpush
