@extends('layouts.cict')

@section('content')
    <!-- Page Header (Institutional Style) -->
    <section class="bg-[#1a3a63] py-16 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-[#2B579A]"></div>
            <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <nav class="flex justify-center mb-8 text-white/50 text-[10px] font-black uppercase tracking-[0.2em]">
                <a href="{{ route('home') }}" class="hover:text-[#FDB913]">Home</a>
                <span class="mx-3 text-white/20">/</span>
                <span class="text-[#FDB913]">Centre Profile</span>
            </nav>
            <h1 class="text-3xl md:text-5xl font-serif font-black mb-4">About the Centre</h1>
            <div class="w-16 h-1 bg-[#FDB913] mx-auto mb-6"></div>
            <p class="text-base text-slate-300 max-w-2xl mx-auto font-medium leading-relaxed">
                Empowering innovation through excellence in education, research, and technical service at St. John's University.
            </p>
        </div>
    </section>

    <!-- Centre History & Stats -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="animate-fade-in">
                    <h2 class="section-title-udsm">Our Legacy and Mission</h2>
                    <div class="prose prose-slate prose-sm text-slate-600 leading-[1.8]">
                        <p class="mb-6">
                            The Centre for Information and Communication Technology (CICT) was established with a clear mandate: to become a leading hub for ICT excellence at St. John's University and the region.
                        </p>
                        <p class="mb-6">
                            We bridge the gap between academic theory and industry practice, ensuring our students are not just degree holders, but innovators prepared for the global digital economy.
                        </p>
                        <div class="p-6 bg-[#F3F4F6] border-l-4 border-[#2B579A] italic text-xs font-serif font-bold text-[#1a3a63]">
                            "Empowering Tanzania through Digital Leadership and Innovation."
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4 animate-fade-in">
                    <div class="p-8 border border-slate-100 text-center">
                        <div class="text-4xl font-serif font-black text-[#2B579A] mb-2">25+</div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Years of Service</p>
                    </div>
                    <div class="p-8 bg-[#2B579A] text-center text-white">
                        <div class="text-4xl font-serif font-black text-[#FDB913] mb-2">3k+</div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-white/60">Global Alumni</p>
                    </div>
                    <div class="p-8 bg-[#F3F4F6] text-center">
                        <div class="text-4xl font-serif font-black text-[#2B579A] mb-2">85+</div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Expert Staff</p>
                    </div>
                    <div class="p-8 border border-slate-100 text-center">
                        <div class="text-4xl font-serif font-black text-[#2B579A] mb-2">12</div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Research Labs</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision (UDSM Blue/Gold) -->
    <section class="py-24 bg-[#F3F4F6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-12 border-t-4 border-[#2B579A] shadow-sm">
                    <div class="text-4xl mb-8">🎯</div>
                    <h3 class="text-2xl font-serif font-black text-[#1a3a63] mb-6">Our Mission</h3>
                    <p class="text-slate-500 text-xs leading-[2] uppercase tracking-wide">
                        To provide quality education and research in Information and Communication Technologies, fostering innovation and producing graduates who are equipped with the knowledge, skills, and values to contribute meaningfully to society and the global digital economy.
                    </p>
                </div>
                <div class="bg-white p-12 border-t-4 border-[#FDB913] shadow-sm">
                    <div class="text-4xl mb-8">🔮</div>
                    <h3 class="text-2xl font-serif font-black text-[#1a3a63] mb-6">Our Vision</h3>
                    <p class="text-slate-500 text-xs leading-[2] uppercase tracking-wide">
                        To be a leading center of excellence in ICT education and research in Africa, recognized for our innovative programs, research contributions, and the impact of our graduates on technological advancement.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Leadership (Refined View) -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-3xl md:text-4xl font-serif font-black text-[#2B579A] mb-4">Centre Leadership</h2>
                <div class="w-16 h-1 bg-[#FDB913] mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($staff->take(4) as $member)
                    <div class="text-center group">
                        <div class="w-48 h-48 bg-slate-50 mx-auto mb-8 relative border-4 border-slate-100 p-2 group-hover:border-[#2B579A] transition-all duration-500 overflow-hidden">
                            @if($member->photo)
                                <img src="{{ asset('storage/' . $member->photo) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-slate-200 flex items-center justify-center text-7xl">
                                    👤
                                </div>
                            @endif
                        </div>
                        <h3 class="text-xl font-serif font-black text-[#1a3a63] mb-2 group-hover:text-[#2B579A] transition-colors leading-tight">
                            {{ $member->name }}
                        </h3>
                        <p class="text-[10px] font-black uppercase tracking-widest text-[#FDB913] mb-4">{{ $member->title }}</p>
                        <p class="text-[11px] text-slate-400 font-bold tracking-tight mb-8">{{ $member->email }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('staff.show', $member) }}" class="text-[10px] font-black uppercase tracking-[0.2em] text-[#2B579A] hover:text-black border-b border-transparent hover:border-[#FDB913] pb-1 transition-all">
                                View Profile
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($staff->count() > 4)
            <div class="mt-20 text-center">
                <a href="{{ route('staff.index') }}" class="inline-flex items-center gap-4 text-[10px] font-black uppercase tracking-[0.2em] text-[#1a3a63] hover:text-[#2B579A] transition-colors">
                    View All Faculty and Staff
                    <span class="w-8 h-[1px] bg-[#FDB913]"></span>
                </a>
            </div>
            @endif
        </div>
    </section>
@endsection
