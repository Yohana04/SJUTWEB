@extends('layouts.cict')

@section('content')
    <!-- Page Header -->
    <section class="bg-[#1a3a63] py-16 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-[#2B579A]"></div>
            <img src="https://images.unsplash.com/photo-1541829070764-84a7d30dee62?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <nav class="flex justify-center mb-6 text-white/50 text-[10px] font-black uppercase tracking-[0.2em]">
                <a href="{{ route('home') }}" class="hover:text-[#FDB913]">Home</a>
                <span class="mx-3 text-white/20">/</span>
                <span class="text-[#FDB913]">Visitor Information</span>
            </nav>
            <h1 class="text-2xl md:text-4xl font-serif font-black mb-4">Welcome to Our Campus</h1>
            <div class="w-16 h-1 bg-[#FDB913] mx-auto mb-6"></div>
            <p class="text-base text-slate-300 max-w-xl mx-auto font-medium leading-relaxed">
                Whether you're visiting for a tour, a seminar, or research collaboration, we're delighted to have you at SJUT.
            </p>
        </div>
    </section>

    <!-- Essential Info -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Location -->
                <div class="p-8 border border-slate-100 shadow-sm bg-slate-50 relative overflow-hidden group">
                    <div class="absolute right-0 top-0 p-3 opacity-5 text-5xl">📍</div>
                    <h3 class="text-base font-serif font-black text-[#1a3a63] mb-3">Our Location</h3>
                    <p class="text-xs text-slate-500 leading-relaxed font-medium mb-4">
                        P.O. Box 35194, Kijitonyama Campus, Dar es Salaam, Tanzania.
                    </p>
                    <a href="#" class="text-[9px] font-black uppercase tracking-widest text-[#2B579A] hover:text-[#FDB913] transition-colors">
                        Get Directions <span>→</span>
                    </a>
                </div>

                <!-- Visiting Hours -->
                <div class="p-8 border border-slate-100 shadow-sm bg-slate-50 relative overflow-hidden group">
                    <div class="absolute right-0 top-0 p-3 opacity-5 text-5xl">⏰</div>
                    <h3 class="text-base font-serif font-black text-[#1a3a63] mb-3">Visiting Hours</h3>
                    <ul class="text-xs text-slate-500 leading-relaxed font-medium mb-4 space-y-1.5">
                        <li>Mon - Fri: 08:00 - 16:30</li>
                        <li>Saturday: 09:00 - 13:00</li>
                        <li>Sunday: Closed</li>
                    </ul>
                </div>

                <!-- Security -->
                <div class="p-8 border border-slate-100 shadow-sm bg-slate-50 relative overflow-hidden group">
                    <div class="absolute right-0 top-0 p-3 opacity-5 text-5xl">🛡️</div>
                    <h3 class="text-base font-serif font-black text-[#1a3a63] mb-3">Campus Security</h3>
                    <p class="text-xs text-slate-500 leading-relaxed font-medium mb-4">
                        All visitors must report to the security desk at the main entrance for a temporary visitor badge.
                    </p>
                    <a href="#" class="text-[9px] font-black uppercase tracking-widest text-[#2B579A] hover:text-[#FDB913] transition-colors">
                        Security Guidelines <span>→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Campus Life & Tours -->
    <section class="py-16 bg-[#F3F4F6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center flex-row">
                <div class="relative max-w-lg mx-auto lg:mx-0">
                    <div class="aspect-video bg-slate-100 overflow-hidden shadow-xl">
                        <img src="https://images.unsplash.com/photo-1523050335456-c38a70464b8c?auto=format&fit=crop&q=80&w=1000" class="w-full h-full object-cover">
                    </div>
                </div>
                <div>
                    <h2 class="text-[10px] font-black uppercase tracking-[0.3em] text-[#FDB913] mb-4">Explore Excellence</h2>
                    <h3 class="text-2xl font-serif font-black text-[#1a3a63] mb-6 leading-tight">Book a professional campus tour today.</h3>
                    <p class="text-xs text-slate-500 leading-relaxed font-medium mb-8">
                        Discover our state-of-the-art labs, modern library, and vibrant student spaces. Our guided tours provide a comprehensive look at the CICT ecosystem and its role in SJUT's academic landscape.
                    </p>
                    <a href="{{ route('contact.create') }}" class="btn-blue px-10 py-4 text-[10px] font-black uppercase tracking-widest">
                        Schedule Visit
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
