@extends('layouts.cict')

@section('content')
    <!-- Page Header -->
    <section class="bg-[#1a3a63] py-16 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-[#2B579A]"></div>
            <img src="https://images.unsplash.com/photo-1541339907198-e08756ebafe3?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <nav class="flex justify-center mb-6 text-white/50 text-[10px] font-black uppercase tracking-[0.2em]">
                <a href="{{ route('home') }}" class="hover:text-[#FDB913]">Home</a>
                <span class="mx-3 text-white/20">/</span>
                <span class="text-[#FDB913]">Alumni Network</span>
            </nav>
            <h1 class="text-2xl md:text-4xl font-serif font-black mb-4">Our Global Alumni</h1>
            <div class="w-16 h-1 bg-[#FDB913] mx-auto mb-6"></div>
            <p class="text-base text-slate-300 max-w-xl mx-auto font-medium leading-relaxed">
                Celebrating the achievements of our graduates and fostering lifelong connections within the SJUT family.
            </p>
        </div>
    </section>

    <!-- Success & Networking -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center flex-row-reverse">
                <div class="relative max-w-sm mx-auto">
                    <div class="aspect-[4/5] bg-slate-100 overflow-hidden shadow-xl">
                        <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&q=80&w=1000" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute -top-6 -right-6 bg-[#1a3a63] p-6 hidden md:block border-l-4 border-[#FDB913]">
                        <div class="text-2xl font-serif font-black text-white mb-1">5,000+</div>
                        <div class="text-[8px] font-black uppercase tracking-widest text-white/60">Global Leaders</div>
                    </div>
                </div>
                <div>
                    <h2 class="text-[10px] font-black uppercase tracking-[0.3em] text-[#2B579A] mb-4">Connect & Grow</h2>
                    <h3 class="text-2xl font-serif font-black text-[#1a3a63] mb-6 leading-tight">Your journey with CICT continues long after graduation.</h3>
                    <p class="text-xs text-slate-500 leading-relaxed font-medium mb-8">
                        The SJUT Alumni Association is dedicated to helping you stay connected with your peers, mentor current students, and continue your professional development. Join a network that spans across the globe and multiple industries.
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="p-4 bg-slate-50 border-l border-[#FDB913] shadow-sm">
                            <h4 class="text-xs font-black uppercase tracking-widest text-[#1a3a63] mb-1">Mentorship</h4>
                            <p class="text-[9px] text-slate-400 font-bold">Guide the next generation of ICT experts through our mentor program.</p>
                        </div>
                        <div class="p-4 bg-slate-50 border-l border-[#FDB913] shadow-sm">
                            <h4 class="text-xs font-black uppercase tracking-widest text-[#1a3a63] mb-1">Career Hub</h4>
                            <p class="text-[9px] text-slate-400 font-bold">Access exclusive job boards and professional networking events.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ways to Give Back -->
    <section class="py-16 bg-[#F3F4F6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="section-title-udsm mx-auto after:h-[2px]">Foster Excellence</h2>
            <div class="prose prose-slate max-w-2xl mx-auto text-slate-600 leading-[1.6] text-xs mb-10">
                <p>Help us continue our mission of providing world-class ICT education. Your support helps fund scholarships, upgrade laboratories, and drive groundbreaking research at SJUT.</p>
            </div>
            
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#" class="btn-blue px-10 py-4 text-[10px] font-black uppercase tracking-widest">Support the Centre</a>
                <a href="#" class="btn-gold px-10 py-4 text-[10px] font-black uppercase tracking-widest">Share Your Story</a>
            </div>
        </div>
    </section>
@endsection
