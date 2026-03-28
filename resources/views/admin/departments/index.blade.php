<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-2 h-8 bg-[#2B579A]"></div>
            <h2 class="font-serif font-black text-2xl text-[#1a3a63] tracking-tight">
                {{ __('Manage SJUT Departments') }}
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
            <a href="{{ route('admin.departments.create') }}" class="inline-flex items-center gap-2 bg-[#1a3a63] text-white px-5 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-[#2B579A] transition-all shadow active:scale-95">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                New Department
            </a>
        </div>
        <div class="text-[9px] text-slate-400">
            {{ $departments->count() }} Total Departments
        </div>
    </div>

    <div class="bg-white border border-slate-100 shadow-sm overflow-hidden animate-fade-in-up">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-100">
                    <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Name / Unit</th>
                    <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Head (HOD)</th>
                    <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none text-center">Programs</th>
                    <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none text-center">Staff</th>
                    <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($departments as $department)
                <tr class="hover:bg-slate-50/50 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="text-xs font-bold text-slate-700 leading-tight">{{ $department->name }}</div>
                        <div class="text-[8px] font-black text-slate-400 mt-0.5 uppercase tracking-widest">{{ $department->email }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-[10px] font-bold text-slate-500 uppercase tracking-tight">{{ $department->head_of_department ?? 'NOT ASSIGNED' }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center">
                            <span class="text-[10px] font-black text-slate-400 bg-slate-50 px-2 py-0.5 rounded border border-slate-100">{{ $department->programs_count ?? $department->programs->count() }} UNIT</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center">
                            <span class="text-[10px] font-black text-slate-400 bg-slate-50 px-2 py-0.5 rounded border border-slate-100">{{ $department->staff_count ?? $department->staff->count() }} PERS</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-1.5">
                            <a href="{{ route('departments.show', $department) }}" target="_blank" title="View Profile"
                               class="p-1.5 bg-slate-100 text-slate-400 hover:bg-[#2B579A]/10 hover:text-[#2B579A] rounded-sm transition-all grayscale hover:grayscale-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </a>
                            <a href="{{ route('admin.departments.edit', $department) }}" title="Update Department"
                               class="p-1.5 bg-slate-100 text-slate-400 hover:bg-[#2B579A]/10 hover:text-[#2B579A] rounded-sm transition-all grayscale hover:grayscale-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            <form action="{{ route('admin.departments.destroy', $department) }}" method="POST" onsubmit="return confirm('Remove this department? All associated data will be affected.')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Remove Unit"
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
                        <div class="text-xs font-black text-slate-300 uppercase tracking-[0.2em]">No departments registered.</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
