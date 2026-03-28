<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-2 h-8 bg-[#2B579A]"></div>
            <h2 class="font-serif font-black text-2xl text-[#1a3a63] tracking-tight">
                {{ __('Modify Program Specification') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="bg-white border border-slate-100 shadow-xl p-12 animate-fade-in-up">
            <form action="{{ route('admin.programs.update', $program) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Institutional Code</label>
                        <input type="text" name="code" required value="{{ $program->code }}"
                               class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Academic Level</label>
                        <select name="level" required class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                            <option value="Diploma" {{ $program->level == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                            <option value="Degree" {{ $program->level == 'Degree' ? 'selected' : '' }}>Degree</option>
                            <option value="Masters" {{ $program->level == 'Masters' ? 'selected' : '' }}>Masters</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Program Designation</label>
                    <input type="text" name="name" required value="{{ $program->name }}"
                           class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                </div>

                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Parent Department</label>
                        <select name="department_id" required class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}" {{ $program->department_id == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Year of Study</label>
                        <select name="duration_years" required class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                            <option value="">Select Year</option>
                            <option value="1" {{ $program->duration_years == 1 ? 'selected' : '' }}>1 Year</option>
                            <option value="2" {{ $program->duration_years == 2 ? 'selected' : '' }}>2 Years</option>
                            <option value="3" {{ $program->duration_years == 3 ? 'selected' : '' }}>3 Years</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Curriculum Overview</label>
                    <textarea name="description" rows="6" required 
                              class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-medium leading-relaxed">{{ $program->description }}</textarea>
                </div>

                <div class="pt-8 flex justify-end gap-6">
                    <a href="{{ route('admin.programs.index') }}" class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest hover:text-slate-600 transition-colors">Discard Changes</a>
                    <button type="submit" class="bg-[#2B579A] text-white px-12 py-4 text-[10px] font-black uppercase tracking-widest hover:bg-[#1a3a63] transition-all shadow-xl">
                        Update Program
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
