<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-2 h-8 bg-[#FDB913]"></div>
            <h2 class="font-serif font-black text-2xl text-[#1a3a63] tracking-tight">
                {{ __('Upload Discovery') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-4xl animate-fade-in-up">
        <div class="bg-white border border-slate-100 shadow-sm overflow-hidden">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="p-10">
                @csrf
                
                <div class="space-y-8">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2">Scientific/Project Title</label>
                        <input type="text" name="title" id="title" class="w-full bg-slate-50 border-slate-100 text-xs font-bold py-3 focus:ring-[#2B579A] focus:border-[#2B579A] transition-all @error('title') border-red-500 @enderror" value="{{ old('title') }}" required>
                        @error('title') <p class="mt-1 text-[8px] font-black text-red-500 uppercase tracking-widest">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Author -->
                        <div>
                            <label for="author" class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2">Author (Student/Staff)</label>
                            <input type="text" name="author" id="author" class="w-full bg-slate-50 border-slate-100 text-xs font-bold py-3 focus:ring-[#2B579A] focus:border-[#2B579A] transition-all" value="{{ old('author') }}" required>
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="category" class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2">Classification</label>
                            <select name="category" id="category" class="w-full bg-slate-50 border-slate-100 text-xs font-bold py-3 focus:ring-[#2B579A] focus:border-[#2B579A] transition-all" required>
                                <option value="student_project">Student Project</option>
                                <option value="research">Academic Research</option>
                            </select>
                        </div>

                        <!-- Year -->
                        <div>
                            <label for="year" class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2">Publication Year</label>
                            <input type="number" name="year" id="year" class="w-full bg-slate-50 border-slate-100 text-xs font-bold py-3 focus:ring-[#2B579A] focus:border-[#2B579A] transition-all" value="{{ old('year', date('Y')) }}">
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2">Visibility</label>
                            <select name="status" id="status" class="w-full bg-slate-50 border-slate-100 text-xs font-bold py-3 focus:ring-[#2B579A] focus:border-[#2B579A] transition-all" required>
                                <option value="active">Active (Published)</option>
                                <option value="inactive">Inactive (Draft)</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Image Thumbnail -->
                        <div>
                            <label for="image" class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2">Thumbnail (Card Cover)</label>
                            <div class="relative group">
                                <input type="file" name="image" id="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                <div class="bg-slate-50 border-2 border-dashed border-slate-100 p-6 text-center group-hover:bg-slate-100 transition-all">
                                    <span class="text-xl opacity-20 block mb-2">📷</span>
                                    <span class="text-[8px] font-black text-slate-400 uppercase tracking-widest">Upload Cover Image</span>
                                </div>
                            </div>
                        </div>

                        <!-- PDF/Doc File -->
                        <div>
                            <label for="file" class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2">Full Document (PDF/Word)</label>
                            <div class="relative group">
                                <input type="file" name="file" id="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                <div class="bg-slate-50 border-2 border-dashed border-slate-100 p-6 text-center group-hover:bg-slate-100 transition-all">
                                    <span class="text-xl opacity-20 block mb-2">📄</span>
                                    <span class="text-[8px] font-black text-slate-400 uppercase tracking-widest">Upload Scientific File</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2">Scientific Abstract</label>
                        <textarea name="description" id="description" rows="6" class="w-full bg-slate-50 border-slate-100 text-xs font-medium py-4 focus:ring-[#2B579A] focus:border-[#2B579A] transition-all" placeholder="Provide a detailed abstract of the work..." required>{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="mt-12 flex justify-end gap-4 border-t border-slate-50 pt-10">
                    <a href="{{ route('admin.projects.index') }}" class="px-8 py-3 text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-slate-600">Abandon</a>
                    <button type="submit" class="bg-[#2B579A] text-white px-10 py-4 text-[10px] font-black uppercase tracking-widest hover:bg-[#1a3a63] transition-all shadow-lg active:scale-95">
                        Commit Publication
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
