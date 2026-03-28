<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-2 h-8 bg-[#2B579A]"></div>
            <h2 class="font-serif font-black text-2xl text-[#1a3a63] tracking-tight">
                Audit Log Details
            </h2>
        </div>
    </x-slot>

    <div class="animate-fade-in-up">
        <div class="bg-white border border-slate-100 rounded-xl shadow-sm overflow-hidden">
            <!-- Header Info -->
            <div class="px-6 py-4 bg-gradient-to-r from-[#1a3a63] to-[#2B579A]">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-white font-black text-lg tracking-tight">Audit Log #{{ $auditLog->id }}</h3>
                            <p class="text-white/70 text-[9px] font-black uppercase tracking-widest">{{ $auditLog->created_at->format('M j, Y H:i:s') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="px-3 py-1 bg-white/20 rounded-full">
                            <span class="text-white text-[8px] font-black uppercase tracking-widest">{{ $auditLog->created_at->diffForHumans() }}</span>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Details Grid -->
            <div class="p-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- User Information -->
                        <div class="bg-slate-50 rounded-lg p-4">
                            <h4 class="text-sm font-black text-slate-700 uppercase tracking-widest mb-3">User Information</h4>
                            @if($auditLog->user)
                                <div class="space-y-2">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-[#2B579A]/10 flex items-center justify-center text-[#2B579A] font-black text-sm">
                                            {{ substr($auditLog->user->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <div class="text-sm font-bold text-slate-900">{{ $auditLog->user->name }}</div>
                                            <div class="text-xs text-slate-500">{{ $auditLog->user->email }}</div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center text-slate-500 font-black text-sm">
                                        S
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-slate-900">System</div>
                                        <div class="text-xs text-slate-500">Automated Process</div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Action Information -->
                        <div class="bg-slate-50 rounded-lg p-4">
                            <h4 class="text-sm font-black text-slate-700 uppercase tracking-widest mb-3">Action Details</h4>
                            <div class="space-y-3">
                                <div>
                                    <div class="text-xs text-slate-500 uppercase tracking-widest">Action Type</div>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="px-2 py-1 text-[8px] font-black uppercase tracking-widest rounded-full
                                            {{ $auditLog->action === 'created' ? 'bg-green-100 text-green-700' : '' }}
                                            {{ $auditLog->action === 'updated' ? 'bg-blue-100 text-blue-700' : '' }}
                                            {{ $auditLog->action === 'deleted' ? 'bg-red-100 text-red-700' : '' }}
                                            {{ !in_array($auditLog->action, ['created', 'updated', 'deleted']) ? 'bg-slate-100 text-slate-700' : '' }}">
                                            {{ $auditLog->formatted_action }}
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <div class="text-xs text-slate-500 uppercase tracking-widest">Model Type</div>
                                    <div class="text-sm font-bold text-slate-900 mt-1">{{ $auditLog->formatted_model }}</div>
                                </div>
                                <div>
                                    <div class="text-xs text-slate-500 uppercase tracking-widest">Model ID</div>
                                    <div class="text-sm font-mono text-slate-900 mt-1">#{{ $auditLog->model_id }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Technical Information -->
                        <div class="bg-slate-50 rounded-lg p-4">
                            <h4 class="text-sm font-black text-slate-700 uppercase tracking-widest mb-3">Technical Information</h4>
                            <div class="space-y-3">
                                <div>
                                    <div class="text-xs text-slate-500 uppercase tracking-widest">IP Address</div>
                                    <div class="text-sm font-mono text-slate-900 mt-1">{{ $auditLog->ip_address ?? 'N/A' }}</div>
                                </div>
                                <div>
                                    <div class="text-xs text-slate-500 uppercase tracking-widest">User Agent</div>
                                    <div class="text-xs text-slate-700 mt-1 break-all">{{ $auditLog->user_agent ?? 'N/A' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Changes Summary -->
                        <div class="bg-slate-50 rounded-lg p-4">
                            <h4 class="text-sm font-black text-slate-700 uppercase tracking-widest mb-3">Changes Summary</h4>
                            <div class="text-sm text-slate-700">
                                {{ $auditLog->changes_summary }}
                            </div>
                        </div>

                        <!-- Old Values -->
                        @if($auditLog->old_values)
                            <div class="bg-slate-50 rounded-lg p-4">
                                <h4 class="text-sm font-black text-slate-700 uppercase tracking-widest mb-3">Previous Values</h4>
                                <div class="space-y-2">
                                    @foreach($auditLog->old_values as $key => $value)
                                        <div class="flex justify-between items-start">
                                            <div class="text-xs text-slate-500 uppercase tracking-widest min-w-[100px]">{{ $key }}</div>
                                            <div class="text-sm text-slate-900 font-mono break-all flex-1">
                                                {{ is_array($value) ? json_encode($value) : $value }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- New Values -->
                        @if($auditLog->new_values)
                            <div class="bg-slate-50 rounded-lg p-4">
                                <h4 class="text-sm font-black text-slate-700 uppercase tracking-widest mb-3">New Values</h4>
                                <div class="space-y-2">
                                    @foreach($auditLog->new_values as $key => $value)
                                        <div class="flex justify-between items-start">
                                            <div class="text-xs text-slate-500 uppercase tracking-widest min-w-[100px]">{{ $key }}</div>
                                            <div class="text-sm text-slate-900 font-mono break-all flex-1">
                                                {{ is_array($value) ? json_encode($value) : $value }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-between items-center mt-8 pt-6 border-t border-slate-200">
                    <a href="{{ route('admin.audit.index') }}" class="inline-flex items-center gap-2 bg-slate-50 hover:bg-slate-100 text-slate-700 px-4 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back to List
                    </a>
                    <div class="flex gap-2">
                        <button onclick="window.print()" class="inline-flex items-center gap-2 bg-slate-50 hover:bg-slate-100 text-slate-700 px-4 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                            </svg>
                            Print
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
