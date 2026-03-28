@extends('layouts.cict')

@section('content')
    <!-- Page Header (Institutional Style) -->
    <section class="bg-[#1a3a63] py-16 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-[#2B579A]"></div>
            <img src="https://images.unsplash.com/photo-1504711432869-efd597cdd0ef?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <nav class="flex justify-center mb-8 text-white/50 text-[10px] font-black uppercase tracking-[0.2em]">
                <a href="{{ route('home') }}" class="hover:text-[#FDB913]">Home</a>
                <span class="mx-3 text-white/20">/</span>
                <span class="text-[#FDB913]">Centre News</span>
            </nav>
            <h1 class="text-3xl md:text-5xl font-serif font-black mb-4">Latest News & Events</h1>
            <div class="w-16 h-1 bg-[#FDB913] mx-auto mb-6"></div>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto font-medium leading-relaxed">
                Stay updated with the latest research, digital innovations, and community highlights from the SJUT Centre for ICT.
            </p>
        </div>
    </section>

    <!-- News List -->
    <section class="py-24 bg-[#F3F4F6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($news as $item)
                    <article class="coict-card group bg-white border border-slate-100 flex flex-col">
                        <div class="relative h-40 overflow-hidden">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" 
                                     alt="{{ $item->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-slate-100 flex items-center justify-center text-3xl">📰</div>
                            @endif
                            <div class="absolute top-0 left-0 bg-[#2B579A] text-white text-[8px] font-black px-3 py-1.5 uppercase tracking-widest">
                                News Registry
                            </div>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center text-[9px] text-slate-400 font-black uppercase tracking-widest mb-4 border-b border-slate-50 pb-3">
                                <span class="text-[#FDB913] mr-2">📅</span> {{ $item->published_at->format('M d, Y') }}
                                <span class="mx-auto"></span>
                                <span class="bg-[#F3F4F6] px-2 py-0.5 text-[8px]">{{ $item->category ?? 'General' }}</span>
                            </div>
                            <h3 class="text-base font-serif font-bold text-[#1a3a63] mb-3 group-hover:text-[#2B579A] transition-colors leading-tight line-clamp-2">
                                {{ $item->title }}
                            </h3>
                            <p class="text-[11px] text-slate-500 leading-relaxed mb-4 line-clamp-2">
                                {{ Str::limit(strip_tags($item->content), 100) }}
                            </p>
                            <div class="mt-auto pt-4 border-t border-slate-50">
                                <a href="{{ route('news.show', $item) }}" class="text-[9px] font-black uppercase tracking-widest text-[#2B579A] hover:text-black flex items-center gap-2">
                                    Full Article
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            @if($news->count() === 0)
                <div class="text-center py-32 bg-white border border-slate-100">
                    <div class="text-5xl mb-6">📰</div>
                    <h3 class="text-xl font-serif font-black text-[#1a3a63] mb-4 uppercase tracking-tight">No news registry found</h3>
                    <p class="text-xs text-slate-400 max-w-sm mx-auto uppercase tracking-widest leading-loose">We are currently gathering the latest updates for you. Please check back later.</p>
                </div>
            @endif

            <div class="mt-16 flex justify-center">
                {{ $news->links() }}
            </div>
        </div>
    </section>

    <!-- Newsletter (Simplified for UDSM Style) -->
    <section class="py-20 bg-[#1a3a63] text-white border-b-8 border-[#FDB913]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl md:text-4xl font-serif font-black mb-6">Join Our Mailing List</h2>
            <p class="text-slate-300 text-sm mb-12 uppercase tracking-widest">Get official news and registry updates directly via email.</p>
            <form class="flex flex-col sm:flex-row gap-4 max-w-xl mx-auto">
                <input type="email" placeholder="official.email@university.ac.tz" 
                       class="flex-grow px-6 py-4 bg-white/10 border border-white/20 text-white placeholder-white/30 text-xs font-bold outline-none focus:border-[#FDB913]">
                <button type="submit" class="bg-[#FDB913] text-[#1a3a63] px-10 py-4 text-[10px] font-black uppercase tracking-widest hover:bg-white transition-all">Subscribe</button>
            </form>
        </div>
    </section>
@endsection
