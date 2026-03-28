<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-2 h-8 bg-[#FDB913]"></div>
            <h2 class="font-serif font-black text-2xl text-[#1a3a63] tracking-tight">
                {{ __('Research & Projects') }}
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
            <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 bg-[#1a3a63] text-white px-5 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-[#2B579A] transition-all shadow active:scale-95">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                New Project
            </a>
            <form action="{{ route('admin.projects.import') }}" method="POST" enctype="multipart/form-data" class="inline" id="import-form">
                @csrf
                <input type="file" name="csv_file" id="csv_file" class="hidden" onchange="document.getElementById('import-form').submit()">
                <button type="button" onclick="document.getElementById('csv_file').click()" class="inline-flex items-center gap-2 bg-slate-50 border border-slate-200 text-slate-600 px-5 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-[#2B579A] hover:text-white hover:border-[#2B579A] transition-all active:scale-95">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                    CSV Upload
                </button>
            </form>
            <button onclick="toggleBulkUpload()" class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest transition-all active:scale-95">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                Bulk Upload
            </button>
            <a href="{{ route('admin.projects.template') }}" class="inline-flex items-center gap-2 bg-slate-50 border border-slate-200 text-slate-600 px-5 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-[#2B579A] hover:text-white hover:border-[#2B579A] transition-all active:scale-95">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                Download Template
            </a>
        </div>
        <div class="text-[9px] text-slate-400">
            {{ $projects->count() }} Total Projects
        </div>
    </div>

    {{-- Bulk Upload Panel --}}
    <div id="bulk-upload-panel" class="hidden mb-6 px-6 py-4 bg-white border border-slate-100 rounded-xl shadow-sm">
        <h4 class="text-sm font-black text-slate-700 mb-4">Bulk Document Upload</h4>
        <form action="{{ route('admin.projects.bulk.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-[8px] font-black text-slate-600 uppercase tracking-widest mb-1">CSV File (Required)</label>
                    <input type="file" name="csv_file" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-[10px] focus:outline-none focus:ring-2 focus:ring-[#2B579A]" accept=".csv" required>
                    <p class="text-[8px] text-slate-500 mt-1">Upload CSV with project information</p>
                </div>
                <div>
                    <label class="block text-[8px] font-black text-slate-600 uppercase tracking-widest mb-1">Document Files (Optional)</label>
                    <input type="file" name="documents[]" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-[10px] focus:outline-none focus:ring-2 focus:ring-[#2B579A]" multiple accept=".pdf,.doc,.docx">
                    <p class="text-[8px] text-slate-500 mt-1">Select multiple PDF/Word files</p>
                </div>
            </div>
            <div class="flex justify-end gap-2">
                <button type="submit" class="bg-[#1a3a63] text-white px-4 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-[#2B579A] transition-all">
                    Upload All
                </button>
                <button type="button" onclick="toggleBulkUpload()" class="bg-slate-50 text-slate-700 px-4 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-slate-100 transition-all">
                    Cancel
                </button>
            </div>
        </form>
    </div>

    
        <div class="bg-white border border-slate-100 shadow-sm overflow-hidden animate-fade-in-up">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Status</th>
                        <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Project Title / Author</th>
                        <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none text-center">Category</th>
                        <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none text-center">Year</th>
                        <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none text-right">Actions</th>
                    </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($projects as $project)
                <tr class="hover:bg-slate-50/50 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <span class="w-2 h-2 rounded-full {{ $project->status === 'active' ? 'bg-green-500' : 'bg-slate-300' }}"></span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-xs font-bold text-slate-700 leading-tight mb-1">{{ $project->title }}</div>
                        <div class="text-[8px] font-black text-[#2B579A] uppercase tracking-widest italic opacity-60">By {{ $project->author }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center">
                            <span class="px-2 py-0.5 text-[8px] font-black uppercase tracking-widest rounded-full 
                                {{ $project->category === 'research' ? 'bg-purple-100 text-purple-600' : 'bg-blue-100 text-blue-600' }}">
                                {{ str_replace('_', ' ', $project->category) }}
                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="text-[10px] font-bold text-slate-400">{{ $project->year ?? 'N/A' }}</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-1.5">
                            <a href="{{ route('admin.projects.edit', $project) }}" title="Edit Entry"
                               class="p-1.5 bg-slate-100 text-slate-400 hover:bg-[#2B579A]/10 hover:text-[#2B579A] rounded-sm transition-all grayscale hover:grayscale-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Permanently remove this work?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Delete Permanent"
                                        class="p-1.5 bg-slate-100 text-slate-400 hover:bg-red-50 hover:text-red-600 rounded-sm transition-all grayscale hover:grayscale-0">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-8 py-20 text-center">
                        <div class="text-xs font-black text-slate-300 uppercase tracking-[0.2em]">No Research or Projects uploaded yet.</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        @if($projects->hasPages())
            <div class="px-8 py-4 bg-slate-50 border-t border-slate-100">
                {{ $projects->links() }}
            </div>
        @endif
    </div>

</x-app-layout>

<script>
function toggleBulkUpload() {
    const panel = document.getElementById('bulk-upload-panel');
    panel.classList.toggle('hidden');
}
</script>
