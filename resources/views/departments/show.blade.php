@extends('layouts.cict')

@section('content')
    <!-- Department Hero (Institutional Style) -->
    <section class="bg-[#1a3a63] py-24 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-[#2B579A]"></div>
            <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <nav class="flex mb-8 text-white/50 text-[10px] font-black uppercase tracking-[0.2em]">
                <a href="{{ route('home') }}" class="hover:text-[#FDB913]">Home</a>
                <span class="mx-3 text-white/20">/</span>
                <a href="{{ route('departments.index') }}" class="hover:text-[#FDB913]">Academic Units</a>
                <span class="mx-3 text-white/20">/</span>
                <span class="text-[#FDB913]">Unit Profile</span>
            </nav>

            <div class="flex flex-col lg:flex-row justify-between items-center lg:items-end gap-12">
                <div class="text-center lg:text-left max-w-3xl">
                    <div class="mb-8">
                        <span class="px-6 py-2 text-[10px] font-black uppercase tracking-widest bg-[#2B579A] text-white shadow-lg">
                            Institutional Excellence
                        </span>
                    </div>
                    <h1 class="text-4xl md:text-70 font-serif font-black mb-8 leading-tight tracking-tight">
                        {{ $department->name }}
                    </h1>
                    <div class="flex flex-wrap justify-center lg:justify-start gap-8 text-white/60 text-[10px] font-black uppercase tracking-widest">
                        <div class="flex items-center gap-2"><span class="text-[#FDB913]">🎓</span> {{ $department->programs->count() }} Programs</div>
                        <div class="flex items-center gap-2"><span class="text-[#FDB913]">👥</span> {{ $department->staff->count() }} Faculty</div>
                        @if($department->head_of_department)
                        <div class="flex items-center gap-2"><span class="text-[#FDB913]">👤</span> HOD: {{ $department->head_of_department }}</div>
                        @endif
                    </div>
                </div>
                <div class="hidden lg:block shrink-0 pb-4">
                    <div class="w-48 h-48 bg-white/10 p-1 border-4 border-white/20 shadow-2xl backdrop-blur-sm transition-all duration-500 flex items-center justify-center text-8xl">
                        🏛️
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content & Sidebar -->
    <section class="py-24 bg-[#F3F4F6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                <!-- Main Content -->
                <div class="lg:col-span-8">
                    <div class="space-y-16 animate-fade-in-up">
                        <!-- About -->
                        <div class="coict-card bg-white p-12">
                            <h2 class="text-2xl font-serif font-black text-[#1a3a63] mb-8 flex items-center">
                                <span class="w-2 h-8 bg-[#FDB913] mr-4"></span>
                                Academic Mandate
                            </h2>
                            <div class="prose prose-slate max-w-none text-slate-600 leading-[1.8] text-sm font-medium">
                                {{ $department->description }}
                            </div>
                        </div>

                        <!-- Specialized Programs -->
                        @if($department->programs->count() > 0)
                        <div class="coict-card bg-white p-12">
                            <h2 class="text-2xl font-serif font-black text-[#1a3a63] mb-8 flex items-center">
                                <span class="w-2 h-8 bg-[#FDB913] mr-4"></span>
                                Degree Pathways
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                @foreach($department->programs as $program)
                                    <div class="p-8 bg-slate-50 border border-slate-100 hover:border-[#2B579A]/20 transition-all group flex flex-col">
                                        <div class="flex justify-between items-center mb-6">
                                            <span class="px-3 py-1 text-[9px] uppercase tracking-widest font-black text-white
                                                @if($program->level === 'Diploma') bg-green-500
                                                @elseif($program->level === 'Degree') bg-[#2B579A]
                                                @else bg-purple-500
                                                @endif">
                                                {{ $program->level }}
                                            </span>
                                            <span class="text-slate-400 text-[10px] font-black">{{ $program->duration_years }}Y</span>
                                        </div>
                                        <h3 class="text-lg font-bold text-[#1a3a63] mb-4 group-hover:text-[#2B579A] transition-colors leading-snug">
                                            {{ $program->name }}
                                        </h3>
                                        <div class="mt-auto pt-6 flex justify-between items-center border-t border-slate-200">
                                            <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Code: {{ $program->code }}</span>
                                            <a href="{{ route('programs.show', $program) }}" class="text-[#2B579A] text-[10px] font-black uppercase tracking-widest hover:text-black">
                                                Syllabus →
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Facilities -->
                        <div class="coict-card bg-white p-12">
                            <h2 class="text-2xl font-serif font-black text-[#1a3a63] mb-8 flex items-center">
                                <span class="w-2 h-8 bg-[#FDB913] mr-4"></span>
                                Strategic Assets
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="flex gap-6 p-8 bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-xl transition-all group">
                                    <div class="w-14 h-14 bg-white flex items-center justify-center text-3xl shadow-sm group-hover:bg-[#1a3a63] group-hover:text-white transition-all shrink-0">💻</div>
                                    <div>
                                        <h4 class="text-sm font-black text-[#1a3a63] mb-2 uppercase tracking-tight">Advanced Laboratories</h4>
                                        <p class="text-xs text-slate-500 leading-relaxed font-medium">Enterprise computing environments optimized for systems research and development.</p>
                                    </div>
                                </div>
                                <div class="flex gap-6 p-8 bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-xl transition-all group">
                                    <div class="w-14 h-14 bg-white flex items-center justify-center text-3xl shadow-sm group-hover:bg-[#1a3a63] group-hover:text-white transition-all shrink-0">🔍</div>
                                    <div>
                                        <h4 class="text-sm font-black text-[#1a3a63] mb-2 uppercase tracking-tight">Research Clusters</h4>
                                        <p class="text-xs text-slate-500 leading-relaxed font-medium">Collaborative hubs focusing on AI, Cloud Infrastructure, and Cyber Defense.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-4">
                    <div class="sticky top-24 space-y-8 animate-fade-in-up delay-200">
                        <!-- Contact Card -->
                        <div class="bg-white border border-slate-200 shadow-xl overflow-hidden">
                            <div class="bg-[#1a3a63] p-8 text-center text-white relative">
                                <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle,white_1px,transparent_1px)] [background-size:10px_10px]"></div>
                                <h3 class="text-xl font-serif font-black mb-2 relative z-10 text-white">Registry Office</h3>
                                <p class="text-[#FDB913] text-[9px] font-black uppercase tracking-widest relative z-10 italic">Official Communications</p>
                            </div>
                            <div class="p-10">
                                <div class="space-y-6 mb-10">
                                    @if($department->email)
                                    <div>
                                        <span class="text-slate-400 text-[9px] font-black uppercase tracking-widest block mb-1">Office Email</span>
                                        <a href="mailto:{{ $department->email }}" class="text-xs font-black text-[#1a3a63] hover:text-[#FDB913] transition-colors truncate block">
                                            {{ $department->email }}
                                        </a>
                                    </div>
                                    @endif
                                    @if($department->phone)
                                    <div>
                                        <span class="text-slate-400 text-[9px] font-black uppercase tracking-widest block mb-1">Direct Line</span>
                                        <span class="text-xs font-black text-[#1a3a63]">{{ $department->phone }}</span>
                                    </div>
                                    @endif
                                </div>
                                <a href="{{ route('contact.create') }}" class="btn-blue w-full py-4 text-center block text-[10px] font-black uppercase tracking-widest shadow-xl">
                                    Submit Inquiry
                                </a>
                            </div>
                        </div>

                        <!-- Sidebar Links -->
                        <div class="bg-white p-8 border border-slate-200">
                            <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-[#1a3a63] mb-8 pb-4 border-b border-slate-100">Quick Navigation</h3>
                            <div class="space-y-4">
                                <a href="{{ route('staff.index') }}" class="group flex items-center justify-between p-5 bg-slate-50 hover:bg-[#1a3a63] transition-all duration-300">
                                    <span class="text-[10px] font-black uppercase tracking-widest text-[#1a3a63] group-hover:text-white transition-colors">Faculty Directory</span>
                                    <span class="text-[#FDB913]">→</span>
                                </a>
                                <a href="{{ route('news.index') }}" class="group flex items-center justify-between p-5 bg-slate-50 hover:bg-[#1a3a63] transition-all duration-300">
                                    <span class="text-[10px] font-black uppercase tracking-widest text-[#1a3a63] group-hover:text-white transition-colors">Departmental News</span>
                                    <span class="text-[#FDB913]">→</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Staff Expertise Section -->
    @if($department->staff->count() > 0)
    <section class="py-24 bg-white border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-3xl md:text-5xl font-serif font-black text-[#1a3a63] mb-4">
                    Expertise <span class="text-[#FDB913]">&</span> Leadership
                </h2>
                <div class="w-24 h-1 bg-[#FDB913] mx-auto mb-6"></div>
                <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Research Leads and Senior Academic Core</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($department->staff as $staff)
                    <div class="coict-card group bg-white p-10 text-center flex flex-col items-center">
                        <div class="relative mb-8">
                            <div class="w-32 h-32 bg-slate-50 flex items-center justify-center text-5xl shadow-inner group-hover:scale-105 transition-transform duration-500 ring-4 ring-[#1a3a63]/5 group-hover:ring-[#FDB913]/20">
                                👤
                            </div>
                        </div>
                        <h3 class="text-lg font-serif font-black text-[#1a3a63] mb-2 group-hover:text-[#FDB913] transition-colors leading-tight">{{ $staff->name }}</h3>
                        <p class="text-[9px] font-black uppercase tracking-widest text-[#2B579A] mb-8">{{ $staff->title }}</p>
                        
                        <div class="mt-auto w-full pt-8 border-t border-slate-50">
                            <a href="{{ route('staff.show', $staff) }}" class="text-[10px] uppercase font-black tracking-widest text-slate-400 hover:text-[#1a3a63] transition-colors">
                                View Profile
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection
