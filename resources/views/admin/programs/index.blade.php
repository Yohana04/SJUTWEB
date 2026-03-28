<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-2 h-8 bg-[#2B579A]"></div>
            <h2 class="font-serif font-black text-2xl text-[#1a3a63] tracking-tight">
                {{ __('Manage Academic Programs') }}
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
            <a href="{{ route('admin.programs.create') }}" class="inline-flex items-center gap-2 bg-[#1a3a63] text-white px-5 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-[#2B579A] transition-all shadow active:scale-95">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Add Program
            </a>
            <a href="{{ route('admin.materials.index') }}" class="inline-flex items-center gap-2 bg-[#FDB913] text-[#1a3a63] px-5 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-[#FDB913]/80 transition-all shadow active:scale-95">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                Manage Materials
            </a>
        </div>
        <div class="text-[9px] text-slate-400">
            {{ $programs->count() }} Total Programs
        </div>
    </div>

    <div class="bg-white border border-slate-100 shadow-sm overflow-hidden animate-fade-in-up">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-100">
                    <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Code</th>
                    <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Name</th>
                    <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Level</th>
                    <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Year of Study</th>
                    <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($programs as $program)
                <tr class="hover:bg-slate-50/50 transition-colors group">
                    <td class="px-6 py-4">
                        <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest bg-slate-100 px-1.5 py-0.5 rounded">{{ $program->code }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-xs font-bold text-slate-700 leading-tight">{{ $program->name }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-0.5 text-[8px] font-black uppercase tracking-widest rounded-full bg-slate-100 text-[#1a3a63]">
                            {{ $program->level }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            @for($i = 1; $i <= $program->duration_years; $i++)
                                <span class="inline-flex items-center px-2 py-1 text-[8px] font-black uppercase tracking-widest rounded-full
                                    @if($i == 1) bg-green-100 text-green-700
                                    @elseif($i == 2) bg-blue-100 text-blue-700
                                    @else bg-purple-100 text-purple-700
                                    @endif">
                                    {{ $i == 1 ? '1st' : ($i == 2 ? '2nd' : '3rd') }} Year
                                </span>
                                @if($i < $program->duration_years)
                                    <span class="text-slate-300">→</span>
                                @endif
                            @endfor
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-1.5">
                            <a href="{{ route('programs.show', $program) }}" target="_blank" title="Preview Syllabus"
                               class="p-1.5 bg-slate-100 text-slate-400 hover:bg-[#2B579A]/10 hover:text-[#2B579A] rounded-sm transition-all grayscale hover:grayscale-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </a>
                            <a href="{{ route('admin.programs.edit', $program) }}" title="Modify Curriculum"
                               class="p-1.5 bg-slate-100 text-slate-400 hover:bg-[#2B579A]/10 hover:text-[#2B579A] rounded-sm transition-all grayscale hover:grayscale-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            <form action="{{ route('admin.programs.destroy', $program) }}" method="POST" onsubmit="return confirm('Remove this academic program?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Remove Program"
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
                        <div class="text-xs font-black text-slate-300 uppercase tracking-[0.2em]">No programs found.</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
