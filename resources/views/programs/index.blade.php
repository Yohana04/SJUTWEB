@extends('layouts.cict')

@section('content')
    <!-- Page Header (Institutional Style) -->
    <section class="bg-[#1a3a63] py-16 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-[#2B579A]"></div>
            <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <nav class="flex justify-center mb-8 text-white/50 text-[10px] font-black uppercase tracking-[0.2em]">
                <a href="{{ route('home') }}" class="hover:text-[#FDB913]">Home</a>
                <span class="mx-3 text-white/20">/</span>
                <span class="text-[#FDB913]">Academic Programs</span>
            </nav>
            <h1 class="text-3xl md:text-5xl font-serif font-black mb-4">Academic Programs</h1>
            <div class="w-16 h-1 bg-[#FDB913] mx-auto mb-6"></div>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto font-medium leading-relaxed">
                Embark on a journey of digital expertise at SJUT with specialized academic paths for the tech industry.
            </p>
        </div>
    </section>

    <!-- Filter Options -->
    <section class="py-8 bg-white border-b border-slate-100 sticky top-0 md:top-16 z-40 bg-white/95 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-6">
                    <span class="text-[10px] font-black text-[#1a3a63] uppercase tracking-widest">Filter by Level:</span>
                    <div class="flex flex-wrap gap-2">
                        @php
                            $filters = ['all' => 'All Programs', 'Diploma' => 'Diploma', 'Degree' => 'Undergraduate', 'Masters' => 'Postgraduate'];
                        @endphp
                        @foreach($filters as $key => $label)
                            <button onclick="filterPrograms('{{ $key }}', this)" 
                                    class="filter-btn px-6 py-2 text-[10px] uppercase font-black tracking-widest transition-all duration-300 
                                    {{ $key === 'all' ? 'bg-[#2B579A] text-white shadow-md' : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                                {{ $label }}
                            </button>
                        @endforeach
                    </div>
                </div>
                <div class="text-slate-400 text-[10px] font-black uppercase tracking-widest">
                    Available: <span class="text-[#2B579A] font-black" id="program-count">{{ $programs->count() }}</span> Programs
                </div>
            </div>
        </div>
    </section>

    <!-- Program Cards -->
    <section class="py-24 bg-[#F3F4F6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="programs-container">
                @foreach($programs as $program)
                    <div class="program-card coict-card group flex flex-col h-full bg-white animate-fade-in" data-level="{{ $program->level }}">
                        <div class="p-8 flex-grow flex flex-col">
                            <div class="flex justify-between items-center mb-8">
                                <span class="px-3 py-1 text-[9px] uppercase tracking-widest font-black text-white
                                    @if($program->level === 'Diploma') bg-green-600
                                    @elseif($program->level === 'Degree') bg-[#2B579A]
                                    @else bg-purple-600
                                    @endif">
                                    {{ $program->level }}
                                </span>
                                <div class="flex items-center text-[10px] text-slate-400 font-black uppercase tracking-widest">
                                    {{ $program->duration_years }} Years
                                </div>
                            </div>
                            
                            <h3 class="text-xl font-serif font-bold text-[#1a3a63] mb-4 group-hover:text-[#2B579A] transition-colors leading-snug">
                                {{ $program->name }}
                            </h3>
                            
                            <p class="text-xs text-slate-500 leading-relaxed mb-8 flex-grow">
                                {{ Str::limit($program->description, 140) }}
                            </p>
                            
                            <div class="mb-8 p-6 bg-[#F3F4F6] flex flex-col gap-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Program Code</span>
                                    <span class="text-xs font-serif font-black text-[#1a3a63]">{{ $program->code }}</span>
                                </div>
                                <div class="w-full h-px bg-slate-200"></div>
                                <div class="flex flex-col gap-1">
                                    <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Academic Unit</span>
                                    <span class="text-[11px] font-bold text-[#2B579A] uppercase tracking-tight truncate">{{ $program->department->name }}</span>
                                </div>
                            </div>
                            
                            <div class="mt-auto flex flex-col sm:flex-row gap-3">
                                <a href="{{ route('programs.show', $program) }}" class="flex-1 bg-[#2B579A] text-white py-3 text-center text-[10px] font-black uppercase tracking-widest hover:bg-[#1a3a63] transition-all">
                                    View Syllabus
                                </a>
                                <a href="{{ route('contact.create') }}" class="flex-1 border-2 border-[#FDB913] text-[#1a3a63] py-3 text-center text-[10px] font-black uppercase tracking-widest hover:bg-[#FDB913] transition-all">
                                    Apply Now
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div id="no-programs" class="hidden text-center py-32 bg-white border border-slate-100 animate-fade-in">
                <div class="w-20 h-20 bg-slate-50 flex items-center justify-center mx-auto mb-8 text-4xl">📚</div>
                <h3 class="text-xl font-serif font-black text-[#1a3a63] mb-4">No programs found</h3>
                <p class="text-xs text-slate-500 max-w-sm mx-auto mb-8 uppercase tracking-widest">Please adjust your filters or contact the admission office.</p>
                <a href="{{ route('contact.create') }}" class="btn-blue px-10 py-4 text-[10px] font-black uppercase tracking-widest">Inquire Directly</a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        function filterPrograms(level, btn) {
            const cards = document.querySelectorAll('.program-card');
            const buttons = document.querySelectorAll('.filter-btn');
            const noPrograms = document.getElementById('no-programs');
            const countSpan = document.getElementById('program-count');
            let visibleCount = 0;
            
            buttons.forEach(b => {
                b.classList.remove('bg-[#2B579A]', 'text-white', 'shadow-md');
                b.classList.add('bg-slate-100', 'text-slate-500');
            });
            
            btn.classList.remove('bg-slate-100', 'text-slate-500');
            btn.classList.add('bg-[#2B579A]', 'text-white', 'shadow-md');
            
            cards.forEach(card => {
                if (level === 'all' || card.dataset.level === level) {
                    card.classList.remove('hidden');
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                }
            });

            countSpan.textContent = visibleCount;
            if (visibleCount === 0) {
                noPrograms.classList.remove('hidden');
                document.getElementById('programs-container').classList.add('hidden');
            } else {
                noPrograms.classList.add('hidden');
                document.getElementById('programs-container').classList.remove('hidden');
            }
        }
    </script>
@endpush
