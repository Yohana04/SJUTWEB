@extends('layouts.cict')

@section('content')
    <!-- Page Header (Compact Institutional Style) -->
    <section class="bg-[#1a3a63] py-16 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-[#2B579A]"></div>
            <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <nav class="flex mb-6 text-white/50 text-[9px] font-black uppercase tracking-[0.2em]">
                <a href="{{ route('home') }}" class="hover:text-[#FDB913]">Home</a>
                <span class="mx-3 text-white/20">/</span>
                <a href="{{ route('news.index') }}" class="hover:text-[#FDB913]">News Feed</a>
                <span class="mx-3 text-white/20">/</span>
                <span class="text-[#FDB913]">Full Report</span>
            </nav>
            
            <h1 class="text-2xl md:text-4xl font-serif font-black mb-6 leading-tight max-w-4xl">
                {{ $news->title }}
            </h1>
            <div class="w-12 h-1 bg-[#FDB913]"></div>
        </div>
    </section>

    <!-- Main Content Area -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                
                <!-- Main Article (Left) -->
                <div class="lg:col-span-8">
                    <div class="prose prose-slate prose-base max-w-none">
                        <div class="text-slate-600 leading-[1.8] font-medium space-y-6 first-letter:text-4xl first-letter:font-serif first-letter:font-black first-letter:text-[#1a3a63] first-letter:mr-2 first-letter:float-left">
                            {!! nl2br(e($news->content)) !!}
                        </div>
                    </div>

                    <!-- Share Section -->
                    <div class="mt-16 pt-8 border-t border-slate-100">
                        <div class="flex items-center gap-6">
                            <span class="text-[9px] font-black uppercase tracking-[0.2em] text-[#1a3a63]">Distribute this story</span>
                            <div class="flex gap-2.5">
                                <a href="#" class="w-8 h-8 bg-slate-50 flex items-center justify-center text-[#1a3a63] hover:bg-[#1a3a63] hover:text-white transition-all border border-slate-100 font-bold uppercase text-[8px]">fb</a>
                                <a href="#" class="w-8 h-8 bg-slate-50 flex items-center justify-center text-[#1a3a63] hover:bg-[#1a3a63] hover:text-white transition-all border border-slate-100 font-bold uppercase text-[8px]">tw</a>
                                <a href="#" class="w-8 h-8 bg-slate-50 flex items-center justify-center text-[#1a3a63] hover:bg-[#1a3a63] hover:text-white transition-all border border-slate-100 font-bold uppercase text-[8px]">in</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar (Right) -->
                <div class="lg:col-span-4">
                    <div class="sticky top-24 space-y-8">
                        <!-- Featured Image Card -->
                        @if($news->image)
                        <div class="coict-card p-1.5 bg-slate-50 border border-slate-100 overflow-hidden shadow-sm">
                            <div class="aspect-[4/3] overflow-hidden">
                                <img src="{{ asset('storage/' . $news->image) }}" 
                                     alt="{{ $news->title }}" 
                                     class="w-full h-full object-cover">
                            </div>
                        </div>
                        @endif

                        <!-- Story Metadata -->
                        <div class="bg-[#F3F4F6] p-6 border-l-4 border-[#FDB913]">
                            <div class="space-y-4">
                                <div>
                                    <span class="block text-[8px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Publish Date</span>
                                    <span class="block text-xs font-serif font-black text-[#1a3a63]">
                                        {{ \Carbon\Carbon::parse($news->published_at)->format('d F, Y') }}
                                    </span>
                                </div>
                                <div class="h-px bg-slate-200"></div>
                                <div>
                                    <span class="block text-[8px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Reference</span>
                                    <span class="block text-[10px] font-bold text-[#2B579A] uppercase tracking-tight">CICT-NR-{{ $news->id }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Back Action -->
                        <div>
                            <a href="{{ route('news.index') }}" class="inline-flex items-center gap-4 text-[9px] font-black uppercase tracking-[0.2em] text-[#1a3a63] hover:text-[#2B579A] transition-colors">
                                <span class="w-6 h-[1px] bg-[#FDB913]"></span>
                                Return to Feed
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Contextual Footer -->
    <section class="py-12 bg-[#F3F4F6] border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-slate-400 uppercase tracking-[0.3em] font-black text-[9px]">
            Official Release — St. John's University of Tanzania
        </div>
    </section>
@endsection
