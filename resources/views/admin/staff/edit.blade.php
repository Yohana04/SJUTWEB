<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-2 h-8 bg-[#2B579A]"></div>
            <h2 class="font-serif font-black text-2xl text-[#1a3a63] tracking-tight">
                {{ __('Update Staff Profile') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white border border-slate-100 shadow-xl p-12 animate-fade-in-up">
            <form action="{{ route('admin.staff.update', $staff) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Full Identity</label>
                        <input type="text" name="name" required value="{{ $staff->name }}"
                               class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Academic/Official Title</label>
                        <input type="text" name="title" required value="{{ $staff->title }}"
                               class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Publication Status</label>
                        <select name="status" required class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                            <option value="active" {{ $staff->status == 'active' ? 'selected' : '' }}>Active (Visible)</option>
                            <option value="inactive" {{ $staff->status == 'inactive' ? 'selected' : '' }}>Inactive (Archived)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Primary Department</label>
                        <select name="department_id" required class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}" {{ $staff->department_id == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Contact Email</label>
                        <input type="email" name="email" value="{{ $staff->email }}"
                               class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Hotline Extension</label>
                        <input type="text" name="phone" value="{{ $staff->phone }}"
                               class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                    </div>
                </div>

                <div>
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Official Portrait</label>
                    @if($staff->photo)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $staff->photo) }}" class="w-20 h-20 rounded-full object-cover border border-slate-100">
                        </div>
                    @endif
                    <input type="file" name="photo" class="w-full text-xs text-slate-400 font-bold uppercase tracking-widest file:mr-4 file:py-3 file:px-8 file:rounded-sm file:border-0 file:text-[9px] file:font-black file:uppercase file:tracking-widest file:bg-[#2B579A]/10 file:text-[#2B579A] hover:file:bg-[#2B579A]/20 transition-all">
                </div>

                <div>
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Professional Bio</label>
                    <textarea name="bio" rows="6" 
                              class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-medium leading-relaxed">{{ $staff->bio }}</textarea>
                </div>

                <div class="pt-8 flex justify-end gap-6">
                    <a href="{{ route('admin.staff.index') }}" class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest hover:text-slate-600 transition-colors">Discard Changes</a>
                    <button type="submit" class="bg-[#2B579A] text-white px-12 py-4 text-[10px] font-black uppercase tracking-widest hover:bg-[#1a3a63] transition-all shadow-xl">
                        Commit Profile Updates
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
