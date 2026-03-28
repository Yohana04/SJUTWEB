<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-2 h-8 bg-[#2B579A]"></div>
            <h2 class="font-serif font-black text-2xl text-[#1a3a63] tracking-tight">
                {{ __('Draft Official Notice') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="bg-white border border-slate-100 shadow-xl p-12 animate-fade-in-up">
            <form action="{{ route('admin.announcements.store') }}" method="POST" class="space-y-8">
                @csrf

                <div>
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Notice Title</label>
                    <input type="text" name="title" required placeholder="e.g., End of Semester Examination Schedule"
                           class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                </div>

                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Notice Classification</label>
                        <select name="type" required class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                            <option value="General">General</option>
                            <option value="Academic">Academic</option>
                            <option value="Urgent">Urgent</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Current Status</label>
                        <select name="status" required class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                            <option value="active">Active (Visible)</option>
                            <option value="inactive">Inactive (Draft)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Notice Content</label>
                    <textarea name="content" rows="8" required placeholder="Compose the full official message here..."
                              class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-medium leading-relaxed"></textarea>
                </div>

                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Publication Date</label>
                        <input type="date" name="published_at" required value="{{ date('Y-m-d') }}"
                               class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Expiration Date (Optional)</label>
                        <input type="date" name="expires_at"
                               class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold">
                    </div>
                </div>

                <div class="pt-8 flex justify-end gap-6">
                    <a href="{{ route('admin.announcements.index') }}" class="px-8 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest hover:text-slate-600 transition-colors">Abort</a>
                    <button type="submit" class="bg-[#2B579A] text-white px-12 py-4 text-[10px] font-black uppercase tracking-widest hover:bg-[#1a3a63] transition-all shadow-xl">
                        Publish Registry Notice
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
