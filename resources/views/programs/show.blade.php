@extends('layouts.cict')

@section('content')
    <!-- Program Hero (Institutional Style) -->
    <section class="bg-[#1a3a63] py-24 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-[#2B579A]"></div>
            <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <nav class="flex mb-8 text-white/50 text-[10px] font-black uppercase tracking-[0.2em]">
                <a href="{{ route('home') }}" class="hover:text-[#FDB913]">Home</a>
                <span class="mx-3 text-white/20">/</span>
                <a href="{{ route('programs.index') }}" class="hover:text-[#FDB913]">Academic Programs</a>
                <span class="mx-3 text-white/20">/</span>
                <span class="text-[#FDB913]">Program Details</span>
            </nav>

            <div class="flex flex-col lg:flex-row justify-between items-center lg:items-end gap-12">
                <div class="text-center lg:text-left max-w-3xl">
                    <div class="mb-8">
                        <span class="px-6 py-2 text-[10px] font-black uppercase tracking-widest shadow-lg
                            @if($program->level === 'Diploma') bg-green-500 text-white
                            @elseif($program->level === 'Degree') bg-[#2B579A] text-white
                            @else bg-purple-500 text-white
                            @endif">
                            {{ $program->level }} Excellence
                        </span>
                    </div>
                    <h1 class="text-4xl md:text-70 font-serif font-black mb-8 leading-tight tracking-tight">
                        {{ $program->name }}
                    </h1>
                    <div class="flex flex-wrap justify-center lg:justify-start gap-8 text-white/60 text-[10px] font-black uppercase tracking-widest">
                        <div class="flex items-center gap-2"><span class="text-[#FDB913]">⏱</span> 
                            @if($program->duration_years == 1)
                                First Year
                            @elseif($program->duration_years == 2)
                                Second Year
                            @elseif($program->duration_years == 3)
                                Third Year
                            @else
                                {{ $program->duration_years }} Year
                            @endif
                        </div>
                        <div class="flex items-center gap-2"><span class="text-[#FDB913]">🔖</span> Code: {{ $program->code }}</div>
                        <div class="flex items-center gap-2"><span class="text-[#FDB913]">🏢</span> {{ $program->department->name }}</div>
                    </div>
                </div>
                <div class="hidden lg:block shrink-0 pb-4">
                    <div class="w-48 h-48 bg-white/10 p-1 border-4 border-white/20 shadow-2xl backdrop-blur-sm transition-all duration-500 flex items-center justify-center text-8xl">
                        🎓
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
                        <!-- Overview -->
                        <div class="coict-card bg-white p-12">
                            <h2 class="text-2xl font-serif font-black text-[#1a3a63] mb-8 flex items-center">
                                <span class="w-2 h-8 bg-[#FDB913] mr-4"></span>
                                Program Narrative
                            </h2>
                            <div class="prose prose-slate max-w-none text-slate-600 leading-[1.8] text-sm font-medium">
                                {{ $program->description }}
                            </div>
                        </div>

                        <!-- Notes & Materials -->
                        <div class="coict-card bg-white p-12">
                            <h2 class="text-2xl font-serif font-black text-[#1a3a63] mb-8 flex items-center">
                                <span class="w-2 h-8 bg-[#FDB913] mr-4"></span>
                                📚 Program Notes & Materials
                            </h2>
                            
                            @if($program->materials->count() > 0)
                                <div class="space-y-4">
                                    @foreach($program->materials as $material)
                                        <div class="flex items-center justify-between p-6 bg-slate-50 border border-slate-100 rounded-lg hover:border-[#2B579A]/30 transition-all group">
                                            <div class="flex items-center gap-4">
                                                <div class="text-3xl">{{ $material->file_icon }}</div>
                                                <div>
                                                    <h4 class="font-bold text-[#1a3a63] mb-1 group-hover:text-[#2B579A] transition-colors">
                                                        {{ $material->title }}
                                                    </h4>
                                                    <div class="flex items-center gap-4 text-xs text-slate-400">
                                                        <span>{{ $material->file_name }}</span>
                                                        <span>•</span>
                                                        <span>{{ $material->file_size_formatted }}</span>
                                                        <span>•</span>
                                                        <span>{{ $material->created_at->format('M d, Y') }}</span>
                                                    </div>
                                                    @if($material->description)
                                                        <p class="text-xs text-slate-500 mt-2">{{ $material->description }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <a href="{{ url('storage/' . $material->file_path) }}" download="{{ $material->file_name }}" 
                                               class="px-4 py-2 bg-[#2B579A] text-white text-xs font-black uppercase tracking-widest rounded hover:bg-[#1a3a63] transition-colors">
                                                Download
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-16">
                                    <div class="text-6xl mb-6">📚</div>
                                    <h4 class="text-xl font-black text-[#1a3a63] mb-4">Notes are not yet uploaded</h4>
                                    <p class="text-slate-500 max-w-2xl mx-auto">
                                        Program materials and notes will be available soon. Please check back later or contact the program coordinator for more information.
                                    </p>
                                </div>
                            @endif
                        </div>

                        <!-- Outcomes -->
                        <div class="bg-[#1a3a63] p-12 text-white shadow-2xl relative overflow-hidden group">
                            <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/5 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                            <h2 class="text-2xl font-serif font-black mb-10 relative z-10 flex items-center gap-4">
                                <span class="text-[#FDB913]">🚀</span> 
                                Professional Trajectories
                            </h2>
                            <ul class="grid grid-cols-1 md:grid-cols-2 gap-8 relative z-10">
                                @foreach(['Solution Architect', 'Security Analyst', 'Systems Engineer', 'Cloud Developer', 'IT Consultant', 'Innovation Lead'] as $career)
                                    <li class="flex items-center text-[11px] font-black uppercase tracking-[0.15em] text-white/90">
                                        <span class="w-2 h-2 bg-[#FDB913] mr-4"></span>
                                        {{ $career }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-4">
                    <div class="sticky top-24 space-y-8 animate-fade-in-up delay-200">
                        <!-- Application Card -->
                        <div class="bg-white border border-slate-200 shadow-xl overflow-hidden">
                            <div class="bg-[#1a3a63] p-8 text-center text-white relative">
                                <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle,white_1px,transparent_1px)] [background-size:10px_10px]"></div>
                                <h3 class="text-xl font-serif font-black mb-2 relative z-10">Academic Inquiry</h3>
                                <p class="text-[#FDB913] text-[9px] font-black uppercase tracking-widest relative z-10 italic">Admission Registry Open</p>
                            </div>
                            <div class="p-10">
                                <div class="space-y-6 mb-10">
                                    <div class="flex justify-between items-center text-[10px] uppercase font-black tracking-widest">
                                        <span class="text-slate-400">Path Name</span>
                                        <span class="text-[#1a3a63]">{{ $program->level }} Studies</span>
                                    </div>
                                    <div class="w-full h-px bg-slate-100"></div>
                                    <div class="flex justify-between items-center text-[10px] uppercase font-black tracking-widest">
                                        <span class="text-slate-400">Intake Phase</span>
                                        <span class="text-[#1a3a63]">OCT 2024 Cycle</span>
                                    </div>
                                </div>
                                <a href="{{ route('contact.create') }}" class="btn-blue w-full py-4 text-center block text-[10px] font-black uppercase tracking-widest shadow-xl">
                                    Initiate Application
                                </a>
                                <p class="mt-6 text-center text-slate-400 text-[9px] font-black uppercase tracking-tighter leading-relaxed">
                                    Aligned with <span class="text-[#1a3a63]">SJUT & TCU</span> Regulatory Standards
                                </p>
                            </div>
                        </div>

                        <!-- Secondary Nav -->
                        @if($program->department->programs->count() > 1)
                        <div class="bg-white p-8 border border-slate-200">
                            <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-[#1a3a63] mb-8 pb-4 border-b border-slate-100">Adjacent Programs</h3>
                            <div class="space-y-4">
                                @foreach($program->department->programs->where('id', '!=', $program->id)->take(3) as $related)
                                    <a href="{{ route('programs.show', $related) }}" class="group block p-5 bg-slate-50 hover:bg-[#1a3a63] transition-all duration-300">
                                        <div class="text-[#1a3a63] group-hover:text-[#FDB913] font-bold text-xs mb-1 transition-colors leading-tight">
                                            {{ $related->name }}
                                        </div>
                                        <div class="text-slate-400 group-hover:text-white/40 text-[8px] font-black uppercase tracking-widest transition-colors">
                                            {{ $related->level }} • {{ $related->duration_years }}Y
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <a href="{{ route('programs.index') }}" class="inline-flex items-center gap-4 text-[9px] font-black uppercase tracking-[0.2em] text-[#2B579A] hover:text-black transition-colors px-4">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            Back to Program Directory
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
