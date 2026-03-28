<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-2 h-8 bg-[#2B579A]"></div>
            <h2 class="font-serif font-black text-2xl text-[#1a3a63] tracking-tight">
                {{ __('Draft News Story') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white border border-slate-100 shadow-xl p-12 animate-fade-in-up">
            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <div>
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Headline</label>
                    <input type="text" name="title" required placeholder="e.g., Breakthrough in AI Research at SJUT"
                           class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                </div>

                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Publication Status</label>
                        <select name="status" required class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                            <option value="draft">Draft (Hidden)</option>
                            <option value="published">Published (Live)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Release Date</label>
                        <input type="date" name="published_at" value="{{ date('Y-m-d') }}"
                               class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                    </div>
                </div>

                <div>
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Cover Image</label>
                    <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-100 border-dashed rounded-sm bg-slate-50 hover:bg-white hover:border-[#2B579A] transition-all">
                        <div class="space-y-1 text-center">
                            <span class="text-3xl block mb-2">📸</span>
                            <div class="flex text-sm text-slate-600">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-bold text-[#2B579A] hover:text-[#1a3a63] focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-[#2B579A]">
                                    <span>Upload a file</span>
                                    <input id="image" name="image" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-slate-400 font-bold uppercase tracking-widest">PNG, JPG up to 2MB</p>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Story Content</label>
                    <textarea name="content" rows="12" required placeholder="Type the full news article here..."
                              class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-medium leading-relaxed"></textarea>
                </div>

                <div class="pt-8 flex justify-end gap-6">
                    <a href="{{ route('admin.news.index') }}" class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest hover:text-slate-600 transition-colors">Discard</a>
                    <button type="submit" class="bg-[#2B579A] text-white px-12 py-4 text-[10px] font-black uppercase tracking-widest hover:bg-[#1a3a63] transition-all shadow-xl">
                        Commit News Story
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
