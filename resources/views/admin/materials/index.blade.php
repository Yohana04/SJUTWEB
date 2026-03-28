<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-2 h-8 bg-[#2B579A]"></div>
            <h2 class="font-serif font-black text-2xl text-[#1a3a63] tracking-tight">
                Program Materials Management
            </h2>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 shadow-sm animate-fade-in" role="alert">
            <p class="text-[10px] font-black uppercase tracking-widest">{{ session('success') }}</p>
        </div>
    @endif

    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-4">
                <div class="w-2 h-8 bg-[#2B579A]"></div>
                <h2 class="font-serif font-black text-2xl text-[#1a3a63] tracking-tight">
                    Program Materials Management
                </h2>
            </div>
            <a href="{{ route('admin.materials.create') }}" class="inline-flex items-center gap-2 bg-[#1a3a63] text-white px-5 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-[#2B579A] transition-all shadow active:scale-95">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Upload Material
            </a>
        </div>

        <!-- Materials Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Total Materials</p>
                        <p class="text-3xl font-serif font-black text-[#1a3a63]">{{ $materials->count() }}</p>
                        <p class="text-[9px] text-slate-400 mt-1">Uploaded files</p>
                    </div>
                    <div class="w-12 h-12 bg-[#2B579A]/10 rounded-lg flex items-center justify-center text-2xl">📚</div>
                </div>
            </div>
            
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Programs</p>
                        <p class="text-3xl font-serif font-black text-[#1a3a63]">{{ $materials->pluck('program_id')->unique()->count() }}</p>
                        <p class="text-[9px] text-slate-400 mt-1">Active programs</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-2xl">🎓</div>
                </div>
            </div>
            
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Total Size</p>
                        <p class="text-3xl font-serif font-black text-[#1a3a63]">{{ number_format($materials->sum('file_size') / 1048576, 1) }} MB</p>
                        <p class="text-[9px] text-slate-400 mt-1">Storage used</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center text-2xl">💾</div>
                </div>
            </div>
            
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">File Types</p>
                        <p class="text-3xl font-serif font-black text-[#1a3a63]">{{ $materials->pluck('file_type')->unique()->count() }}</p>
                        <p class="text-[9px] text-slate-400 mt-1">Different formats</p>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center text-2xl">📄</div>
                </div>
            </div>
        </div>

        <!-- Materials Table -->
        <div class="bg-white border border-slate-100 shadow-sm overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Title</th>
                        <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Program</th>
                        <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">File</th>
                        <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Size</th>
                        <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Uploaded</th>
                        <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($materials as $material)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-6 py-4">
                            <div>
                                <div class="text-sm font-bold text-[#1a3a63] group-hover:text-[#2B579A] transition-colors leading-tight">
                                    {{ $material->title }}
                                </div>
                                @if($material->description)
                                    <div class="text-[10px] text-slate-400 mt-1">{{ Str::limit($material->description, 50) }}</div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-[10px] font-bold text-[#2B579A] uppercase tracking-tight">{{ $material->program->name }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <span class="text-xl">{{ $material->file_icon }}</span>
                                <div>
                                    <div class="text-xs font-mono text-slate-600">{{ $material->file_name }}</div>
                                    <div class="text-[9px] text-slate-400">{{ $material->file_type }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm font-bold text-slate-600">{{ $material->file_size_formatted }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-[10px] text-slate-400">{{ $material->created_at->format('M d, Y') }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ url('storage/' . $material->file_path) }}" download="{{ $material->file_name }}" 
                                   class="p-2 bg-green-100 text-green-600 rounded-lg hover:bg-green-200 transition-colors" title="Download">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.materials.edit', $material) }}" 
                                   class="p-2 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 transition-colors" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form method="POST" action="{{ route('admin.materials.destroy', $material) }}" onsubmit="return confirm('Delete this material?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition-colors" title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-8 py-20 text-center">
                            <div class="text-4xl mb-4">📚</div>
                            <p class="text-slate-400 text-xs font-black uppercase tracking-widest">No materials found.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
