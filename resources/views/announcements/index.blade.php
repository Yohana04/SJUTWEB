@extends('layouts.cict')

@section('content')
    <!-- Page Header (Institutional Style) -->
    <section class="bg-[#1a3a63] py-16 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-[#2B579A]"></div>
            <img src="https://images.unsplash.com/photo-1506784983877-45594efa4cbe?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <nav class="flex justify-center mb-8 text-white/50 text-[10px] font-black uppercase tracking-[0.2em]">
                <a href="{{ route('home') }}" class="hover:text-[#FDB913]">Home</a>
                <span class="mx-3 text-white/20">/</span>
                <span class="text-[#FDB913]">Public Registry</span>
            </nav>
            <h1 class="text-3xl md:text-5xl font-serif font-black mb-4">Official Announcements</h1>
            <div class="w-16 h-1 bg-[#FDB913] mx-auto mb-6"></div>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto font-medium leading-relaxed">
                Access official notices, academic circulars, and institutional updates from the Centre Registry.
            </p>
        </div>
    </section>

    <!-- Filter Bar (UDSM Professional Style) -->
    <section class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-100 py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-6">
                    <span class="text-[10px] font-black text-[#1a3a63] uppercase tracking-widest">Notice Filter:</span>
                    <div class="flex flex-wrap gap-2">
                        <button onclick="filterAnnouncements('all', this)" class="filter-btn px-6 py-2 text-[10px] font-black uppercase tracking-widest bg-[#2B579A] text-white shadow-md transition-all">All</button>
                        <button onclick="filterAnnouncements('Urgent', this)" class="filter-btn px-6 py-2 text-[10px] font-black uppercase tracking-widest bg-slate-100 text-slate-500 hover:bg-red-600 hover:text-white transition-all">Urgent</button>
                        <button onclick="filterAnnouncements('Academic', this)" class="filter-btn px-6 py-2 text-[10px] font-black uppercase tracking-widest bg-slate-100 text-slate-500 hover:bg-[#2B579A] hover:text-white transition-all">Academic</button>
                        <button onclick="filterAnnouncements('General', this)" class="filter-btn px-6 py-2 text-[10px] font-black uppercase tracking-widest bg-slate-100 text-slate-500 hover:bg-slate-200 transition-all">General</button>
                    </div>
                </div>
                <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest border-l-4 border-[#FDB913] pl-4">
                    Registry Records: <span id="announcement-count" class="text-[#1a3a63]">{{ $announcements->count() }}</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Announcements List -->
    <section class="py-24 bg-[#F3F4F6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="announcements-container">
                @foreach($announcements as $announcement)
                    <div class="announcement-card coict-card p-10 flex flex-col h-full group bg-white border-t-8 transition-all duration-300 animate-fade-in-up
                        @if($announcement->type === 'Urgent') border-red-600
                        @elseif($announcement->type === 'Academic') border-[#2B579A]
                        @else border-slate-300
                        @endif" 
                         data-type="{{ $announcement->type }}">
                        
                        <div class="flex flex-wrap justify-between items-center gap-4 mb-6">
                            <span class="text-[9px] font-black uppercase tracking-widest px-3 py-1 
                                @if($announcement->type === 'Urgent') bg-red-100 text-red-600
                                @elseif($announcement->type === 'Academic') bg-blue-100 text-[#2B579A]
                                @else bg-slate-100 text-slate-500
                                @endif">
                                {{ $announcement->type }} Notice
                            </span>
                            <div class="text-[9px] font-black text-slate-400 uppercase tracking-widest">
                                {{ $announcement->published_at->format('M d, Y') }}
                            </div>
                        </div>

                        <h3 class="text-lg font-serif font-bold text-[#1a3a63] mb-4 group-hover:text-[#2B579A] transition-colors leading-snug line-clamp-2">
                            {{ $announcement->title }}
                        </h3>
                        
                        <p class="text-xs text-slate-500 leading-relaxed mb-8 flex-grow">
                            {{ Str::limit($announcement->content, 140) }}
                        </p>

                        <div class="mt-auto pt-6 border-t border-slate-50 flex flex-col gap-4">
                            @if($announcement->expires_at)
                                <div class="text-[8px] font-black text-orange-600 uppercase tracking-widest bg-orange-50 px-3 py-1.5 border border-orange-100 self-start">
                                    Expires: {{ $announcement->expires_at->format('M d, Y') }}
                                </div>
                            @endif

                            <a href="{{ route('announcements.show', $announcement) }}" class="text-[11px] font-black uppercase tracking-[0.2em] text-[#2B579A] border-b-2 border-transparent hover:border-[#FDB913] transition-all pb-1 inline-flex items-center gap-2 self-start">
                                Registry Brief <span>→</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($announcements->count() === 0)
                <div class="text-center py-32 bg-white border border-slate-100">
                    <div class="text-5xl mb-6">📢</div>
                    <h3 class="text-xl font-serif font-black text-[#1a3a63] mb-4 uppercase tracking-tight">No active notices found</h3>
                    <p class="text-xs text-slate-400 max-w-sm mx-auto uppercase tracking-widest leading-loose">The official registry is currently clear. Please check back later.</p>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        function filterAnnouncements(type, btn) {
            const cards = document.querySelectorAll('.announcement-card');
            const buttons = document.querySelectorAll('.filter-btn');
            let count = 0;
            
            buttons.forEach(b => {
                b.classList.remove('bg-[#2B579A]', 'bg-red-600', 'bg-slate-200', 'text-white', 'shadow-md');
                b.classList.add('bg-slate-100', 'text-slate-500');
            });
            
            btn.classList.remove('bg-slate-100', 'text-slate-500');
            if (type === 'all') btn.classList.add('bg-[#2B579A]', 'text-white', 'shadow-md');
            else if (type === 'Urgent') btn.classList.add('bg-red-600', 'text-white', 'shadow-md');
            else btn.classList.add('bg-[#2B579A]', 'text-white', 'shadow-md');
            
            cards.forEach(card => {
                if (type === 'all' || card.dataset.type === type) {
                    card.classList.remove('hidden');
                    count++;
                } else {
                    card.classList.add('hidden');
                }
            });
            
            document.getElementById('announcement-count').textContent = count;
        }
    </script>
@endpush
