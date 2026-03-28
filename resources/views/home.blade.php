@extends('layouts.cict')

@section('content')
    <!-- Hero Section (UDSM Slider Style) -->
    <section class="hero-udsm h-[600px] flex items-center justify-center text-center text-white relative overflow-hidden">
        {{-- Background Image Placeholder --}}
        <div class="absolute inset-0 bg-slate-900">
            <div class="absolute inset-0 bg-gradient-to-b from-[#2B579A]/40 to-black/80 z-10"></div>
            <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&q=80&w=2000" 
                 class="w-full h-full object-cover opacity-50 block" 
                 alt="COICT Campus">
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20 animate-fade-in">
            <div class="inline-block px-4 py-1 bg-[#FDB913] text-[#1a3a63] text-[10px] font-black uppercase tracking-[0.3em] mb-6">
                Established Excellence
            </div>
            <h1 class="text-4xl md:text-70 font-serif font-black mb-8 leading-tight max-w-4xl mx-auto">
                Innovating the Future Through <br class="hidden md:block"> Information Technology
            </h1>
            <p class="text-lg md:text-xl text-slate-200 mb-12 font-medium max-w-2xl mx-auto leading-relaxed">
                Empowering the next generation of digital leaders with world-class education and cutting-edge research at SJUT's premier ICT centre.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('programs.index') }}" class="btn-blue px-10 py-4 text-xs uppercase tracking-widest font-black">
                    Explore Programs
                </a>
                <a href="{{ route('contact.create') }}" class="bg-white text-[#2B579A] px-10 py-4 text-xs uppercase tracking-widest font-black hover:bg-slate-100 transition-all">
                    Apply Now
                </a>
            </div>
        </div>
    </section>

    <!-- Introductory Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="section-title-udsm mx-auto">Welcome to CICT</h2>
            <div class="prose prose-slate max-w-3xl mx-auto text-slate-600 leading-[1.8] text-sm">
                <p class="mb-6">The Centre for Information and Communication Technology (CICT) is a pioneer in the field of ICT at St. John's University of Tanzania (SJUT). Our centre is dedicated to providing high-quality education and conducting impactful research that addresses local and global challenges.</p>
                <p class="mb-8">With state-of-the-art laboratories and a community of scholars, CICT stands as a beacon of academic excellence and an incubator for technological innovation at SJUT.</p>
                <div class="flex justify-center">
                    <a href="{{ route('about') }}" class="inline-flex items-center text-[#2B579A] font-bold text-xs uppercase tracking-widest group">
                        Learn more about our mission
                        <span class="ml-2 transform group-hover:translate-x-1 transition-transform">→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Announcements & Highlights (3-column Grid) -->
    <section class="py-24 bg-[#F3F4F6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center mb-16">
                <h2 class="section-title-udsm">Important Announcements</h2>
                <div class="w-16 h-1 bg-[#FDB913] mb-6"></div>
                <a href="{{ route('announcements.index') }}" class="text-[#2B579A] text-xs font-bold uppercase tracking-widest hover:underline">View All Registry Announcements</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($announcements->take(3) as $announcement)
                    <div class="coict-card p-8 flex flex-col group h-full">
                        <div class="flex items-center gap-3 mb-6">
                            <span class="w-2 h-2 bg-[#FDB913] rounded-full"></span>
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                {{ $announcement->published_at->format('M d, Y') }}
                            </span>
                            @if($announcement->published_at->gt(now()->subHours(48)) && !in_array($announcement->id, $readAnnouncements))
                                <span class="bg-red-500 text-white text-[7px] font-black px-1.5 py-0.5 animate-pulse uppercase tracking-tighter">New Registry</span>
                            @endif
                        </div>
                        <h3 class="text-lg font-serif font-bold text-[#1a3a63] mb-4 group-hover:text-[#2B579A] transition-colors leading-snug">
                            {{ $announcement->title }}
                        </h3>
                        <p class="text-xs text-slate-500 leading-relaxed mb-8 flex-grow">
                            {{ Str::limit($announcement->content, 140) }}
                        </p>
                        <a href="{{ route('announcements.show', $announcement) }}" class="mt-auto text-[11px] font-black uppercase tracking-[0.2em] text-[#2B579A] border-b-2 border-transparent hover:border-[#FDB913] transition-all pb-1 inline-flex items-center gap-2">
                            Registry Brief <span>→</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Stats Block (Official Institutional View) -->
    <section class="stats-section py-24 relative overflow-hidden">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-12 text-center">
                <div class="animate-fade-in">
                    <div class="stats-circle">
                        <span class="text-3xl">👥</span>
                    </div>
                    <div class="text-4xl font-serif font-black mb-2">1,500+</div>
                    <div class="text-[10px] font-black uppercase tracking-[0.2em] text-white/60">Active Students</div>
                </div>
                <div class="animate-fade-in">
                    <div class="stats-circle">
                        <span class="text-3xl">👨‍🏫</span>
                    </div>
                    <div class="text-4xl font-serif font-black mb-2">85+</div>
                    <div class="text-[10px] font-black uppercase tracking-[0.2em] text-white/60">Expert Faculty</div>
                </div>
                <div class="animate-fade-in">
                    <div class="stats-circle">
                        <span class="text-3xl">🔬</span>
                    </div>
                    <div class="text-4xl font-serif font-black mb-2">12</div>
                    <div class="text-[10px] font-black uppercase tracking-[0.2em] text-white/60">Research Centers</div>
                </div>
                <div class="animate-fade-in">
                    <div class="stats-circle">
                        <span class="text-3xl">🏆</span>
                    </div>
                    <div class="text-4xl font-serif font-black mb-2">25+</div>
                    <div class="text-[10px] font-black uppercase tracking-[0.2em] text-white/60">Years of Innovation</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News Gallery -->
    <section class="py-16 bg-[#F3F4F6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-2xl md:text-3xl font-serif font-black text-[#2B579A] mb-4">In The Spotlights</h2>
                <div class="w-16 h-1 bg-[#FDB913] mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($news->take(3) as $item)
                    <article class="coict-card flex flex-col group overflow-hidden">
                        <div class="h-32 overflow-hidden relative">
                             @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" 
                                     alt="{{ $item->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-slate-200 flex items-center justify-center text-3xl">📰</div>
                            @endif
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center gap-2 mb-3">
                                <div class="text-[9px] font-black uppercase tracking-widest text-[#FDB913]">News Flash</div>
                                @if($item->published_at->gt(now()->subHours(48)) && !in_array($item->id, $readNews))
                                    <span class="bg-red-500 text-white text-[7px] font-black px-1.5 py-0.5 animate-pulse uppercase tracking-tighter">New Update</span>
                                @endif
                            </div>
                            <h3 class="text-base font-serif font-bold text-[#1a3a63] mb-3 line-clamp-2 group-hover:text-[#2B579A] transition-colors leading-tight">
                                {{ $item->title }}
                            </h3>
                            <p class="text-[11px] text-slate-500 leading-relaxed mb-6 flex-grow">
                                {{ Str::limit($item->content, 100) }}
                            </p>
                            <a href="{{ route('news.show', $item) }}" class="inline-flex items-center text-[9px] font-black uppercase tracking-widest text-[#2B579A]">
                                Full Story
                                <svg class="ml-2 w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
            
            <div class="mt-16 text-center">
                <a href="{{ route('news.index') }}" class="btn-blue inline-flex items-center px-10 py-4 text-xs uppercase tracking-widest">
                    News Archive
                </a>
            </div>
        </div>
    </section>

    <!-- Academic Units Quick Preview -->
    <section class="py-16 bg-[#F3F4F6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-2xl md:text-4xl font-serif font-black text-[#1a3a63] mb-4">Our Academic Units</h2>
                <div class="w-16 h-1 bg-[#FDB913] mx-auto mb-4"></div>
                <p class="text-[9px] font-black uppercase tracking-[0.2em] text-slate-400">Specialized departments driving digital excellence and innovation.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($departments->take(3) as $dept)
                <div class="coict-card group bg-white p-8 flex flex-col items-center text-center relative overflow-hidden">
                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-[#FDB913]"></div>
                    <div class="w-12 h-12 bg-slate-50 flex items-center justify-center text-2xl mb-8 group-hover:bg-[#1a3a63] group-hover:text-white transition-all duration-500 shadow-sm">
                        🏛️
                    </div>
                    <h3 class="text-base font-serif font-black text-[#1a3a63] mb-3 group-hover:text-[#2B579A] transition-colors uppercase tracking-tight">{{ $dept->name }}</h3>
                    <p class="text-[11px] text-slate-500 leading-relaxed mb-6 line-clamp-2 font-medium">{{ $dept->description }}</p>
                    <a href="{{ route('departments.show', $dept) }}" class="mt-auto text-[9px] font-black uppercase tracking-[0.2em] text-[#2B579A] border-b-2 border-transparent hover:border-[#FDB913] transition-all pb-1">Explore Unit</a>
                </div>
                @endforeach
            </div>
            
            <div class="mt-20 text-center">
                <a href="{{ route('departments.index') }}" class="inline-flex items-center gap-4 text-[10px] font-black uppercase tracking-[0.2em] text-[#1a3a63] hover:text-[#2B579A] transition-colors">
                    View All Departments
                    <span class="w-8 h-[1px] bg-[#FDB913]"></span>
                </a>
            </div>
        </div>
    </section>
@endsection
