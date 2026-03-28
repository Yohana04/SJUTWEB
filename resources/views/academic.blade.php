@extends('layouts.cict')

@section('content')
    <!-- Page Header -->
    <section class="bg-[#1a3a63] py-16 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-[#2B579A]"></div>
            <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <nav class="flex justify-center mb-6 text-white/50 text-[10px] font-black uppercase tracking-[0.2em]">
                <a href="{{ route('home') }}" class="hover:text-[#FDB913]">Home</a>
                <span class="mx-3 text-white/20">/</span>
                <span class="text-[#FDB913]">Academic Hub</span>
            </nav>
            <h1 class="text-2xl md:text-4xl font-serif font-black mb-4">Academic Excellence</h1>
            <div class="w-16 h-1 bg-[#FDB913] mx-auto mb-6"></div>
            <p class="text-base text-slate-300 max-w-xl mx-auto font-medium leading-relaxed">
                Driving innovation through advanced research, student-led projects, and a commitment to digital transformation in CICT.
            </p>
        </div>
    </section>

    <!-- Academic Sections -->
    <section class="py-16 bg-[#F3F4F6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Research & Projects -->
                <div class="coict-card p-10 bg-white border-t-4 border-[#FDB913] group">
                    <h2 class="text-[10px] font-black uppercase tracking-[0.3em] text-[#2B579A] mb-4">Innovation & Discovery</h2>
                    <h3 class="text-2xl font-serif font-black text-[#1a3a63] mb-6">Research & Projects</h3>
                    <p class="text-sm text-slate-500 leading-relaxed font-medium mb-10">
                        Explore the cutting-edge work being done by our faculty and students. From pioneering research to practical innovative projects, we are shaping the future of ICT in Tanzania.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('projects.index', ['category' => 'research']) }}" class="btn-blue px-8 py-3 text-[10px] font-black uppercase tracking-widest text-center">
                            Explore Research
                        </a>
                        <a href="{{ route('projects.index', ['category' => 'student_project']) }}" class="border-2 border-[#1a3a63] text-[#1a3a63] hover:bg-[#1a3a63] hover:text-white px-8 py-3 text-[10px] font-black uppercase tracking-widest transition-all text-center">
                            Student Projects
                        </a>
                    </div>
                </div>

                <!-- Academic Issues -->
                <div class="coict-card p-10 bg-white border-t-4 border-[#2B579A] group">
                    <h2 class="text-[10px] font-black uppercase tracking-[0.3em] text-[#FDB913] mb-4">Faculty Guidelines</h2>
                    <h3 class="text-2xl font-serif font-black text-[#1a3a63] mb-6">Academic Standards</h3>
                    <p class="text-sm text-slate-500 leading-relaxed font-medium mb-10">
                        Our faculty maintains rigorous academic standards to ensure excellence in education. Learn about our evaluation processes, academic policies, and support systems for students.
                    </p>
                    <a href="{{ route('about') }}" class="inline-flex items-center text-[10px] font-black uppercase tracking-widest text-[#2B579A] hover:text-[#1a3a63]">
                        Academic Policies <span>→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Research Showcase -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="section-title-udsm mx-auto after:h-[2px]">Student Innovation</h2>
            <div class="prose prose-slate max-w-2xl mx-auto text-slate-600 leading-[1.6] text-xs mb-12">
                <p>We take pride in our students' creativity and technical prowess. Our repository showcases the best of their final year projects and collaborative research efforts.</p>
            </div>
            
            <a href="{{ route('projects.index') }}" class="btn-gold px-12 py-4 text-[10px] font-black uppercase tracking-widest">
                Browse Full Repository
            </a>
        </div>
    </section>
@endsection
