<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-2 h-8 bg-[#2B579A]"></div>
            <h2 class="font-serif font-black text-2xl text-[#1a3a63] tracking-tight">
                {{ __('Refine News Story') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white border border-slate-100 shadow-xl p-12 animate-fade-in-up">
            <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Headline</label>
                    <input type="text" name="title" required value="{{ $news->title }}"
                           class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                </div>

                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Publication Status</label>
                        <select name="status" required class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                            <option value="draft" {{ $news->status == 'draft' ? 'selected' : '' }}>Draft (Hidden)</option>
                            <option value="published" {{ $news->status == 'published' ? 'selected' : '' }}>Published (Live)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Release Date</label>
                        <input type="date" name="published_at" value="{{ $news->published_at ? \Carbon\Carbon::parse($news->published_at)->format('Y-m-d') : '' }}"
                               class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                    </div>
                </div>

                <div>
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Cover Image</label>
                    @if($news->image)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $news->image) }}" class="w-32 h-20 object-cover border border-slate-100">
                        </div>
                    @endif
                    <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-100 border-dashed rounded-sm bg-slate-50 hover:bg-white hover:border-[#2B579A] transition-all">
                        <div class="space-y-1 text-center">
                            <span class="text-3xl block mb-2">📸</span>
                            <div class="flex text-sm text-slate-600">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-bold text-[#2B579A] hover:text-[#1a3a63] focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-[#2B579A]">
                                    <span>Upload new file</span>
                                    <input id="image" name="image" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-slate-400 font-bold uppercase tracking-widest">Keep empty to retain current image</p>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Story Content</label>
                    <textarea name="content" rows="12" required 
                              class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-medium leading-relaxed">{{ $news->content }}</textarea>
                </div>

                <div class="pt-8 flex justify-end gap-6">
                    <a href="{{ route('admin.news.index') }}" class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest hover:text-slate-600 transition-colors">Discard Changes</a>
                    <button type="submit" class="bg-[#2B579A] text-white px-12 py-4 text-[10px] font-black uppercase tracking-widest hover:bg-[#1a3a63] transition-all shadow-xl">
                        Update News Story
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
