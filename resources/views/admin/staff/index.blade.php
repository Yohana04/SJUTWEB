<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-2 h-8 bg-[#2B579A]"></div>
            <h2 class="font-serif font-black text-2xl text-[#1a3a63] tracking-tight">
                {{ __('Manage Staff Directory') }}
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
            <a href="{{ route('admin.staff.create') }}" class="inline-flex items-center gap-2 bg-[#1a3a63] text-white px-5 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-[#2B579A] transition-all shadow active:scale-95">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Add Staff Member
            </a>
        </div>
        <div class="text-[9px] text-slate-400">
            {{ $staff->count() }} Total Staff
        </div>
    </div>

    <div class="bg-white border border-slate-100 shadow-sm overflow-hidden animate-fade-in-up">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-100">
                    <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Photo</th>
                    <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Name / Title</th>
                    <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none">Department</th>
                    <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none text-center">Status</th>
                    <th class="px-6 py-4 text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($staff as $member)
                <tr class="hover:bg-slate-50/50 transition-colors group">
                    <td class="px-6 py-4">
                        @if($member->photo)
                        <img src="{{ asset('storage/' . $member->photo) }}" class="w-8 h-8 object-cover rounded-full border border-slate-100 shadow-sm">
                        @else
                        <div class="w-8 h-8 bg-slate-50 rounded-full flex items-center justify-center text-[10px] text-slate-400 border border-slate-100 grayscale">👤</div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-xs font-bold text-slate-700 leading-tight">{{ $member->name }}</div>
                        <div class="text-[8px] font-black text-slate-400 mt-0.5 uppercase tracking-widest">{{ $member->title }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-[10px] font-bold text-slate-500 uppercase tracking-tighter">{{ $member->department->name }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center">
                            <span class="px-2 py-0.5 text-[8px] font-black uppercase tracking-widest rounded-full 
                                {{ $member->status == 'active' ? 'bg-green-100 text-green-600' : 'bg-slate-100 text-slate-400' }}">
                                {{ $member->status }}
                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-1.5">
                            <a href="{{ route('staff.show', $member) }}" target="_blank" title="View Profile"
                               class="p-1.5 bg-slate-100 text-slate-400 hover:bg-[#2B579A]/10 hover:text-[#2B579A] rounded-sm transition-all grayscale hover:grayscale-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </a>
                            <a href="{{ route('admin.staff.edit', $member) }}" title="Update Credentials"
                               class="p-1.5 bg-slate-100 text-slate-400 hover:bg-[#2B579A]/10 hover:text-[#2B579A] rounded-sm transition-all grayscale hover:grayscale-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            <form action="{{ route('admin.staff.destroy', $member) }}" method="POST" onsubmit="return confirm('Remove this staff member from the directory?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Remove Member"
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
                        <div class="text-xs font-black text-slate-300 uppercase tracking-[0.2em]">No staff members found.</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        @if($staff->hasPages())
        <div class="px-8 py-4 bg-slate-50 border-t border-slate-100">
            {{ $staff->links() }}
        </div>
        @endif
    </div>
</x-app-layout>
