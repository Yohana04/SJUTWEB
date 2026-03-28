@extends('layouts.cict')

@section('content')
    <!-- Page Header (Institutional Style) -->
    <section class="bg-[#1a3a63] py-24 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-[#2B579A]"></div>
            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <nav class="flex justify-center mb-8 text-white/50 text-[10px] font-black uppercase tracking-[0.2em]">
                <a href="{{ route('home') }}" class="hover:text-[#FDB913]">Home</a>
                <span class="mx-3 text-white/20">/</span>
                <span class="text-[#FDB913]">Academic Units</span>
            </nav>
            <h1 class="text-3xl md:text-5xl font-serif font-black mb-4 tracking-tight">Academic Departments</h1>
            <div class="w-16 h-1 bg-[#FDB913] mx-auto mb-6"></div>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto font-medium leading-relaxed">
                Discover the specialized academic departments driving digital innovation and research excellence at SJUT.
            </p>
        </div>
    </section>

    <!-- Departments Grid -->
    <section class="py-24 bg-[#F3F4F6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($departments as $department)
                    <div class="coict-card group bg-white p-6 flex flex-col items-start relative overflow-hidden h-full shadow-sm hover:shadow-md transition-shadow">
                        <!-- Vertical Accent -->
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-[#FDB913]"></div>
                        
                        <div class="flex items-center gap-4 mb-5 w-full">
                            <div class="w-10 h-10 bg-slate-50 flex items-center justify-center text-lg shrink-0 group-hover:bg-[#1a3a63] group-hover:text-white transition-all duration-500">
                                🏛️
                            </div>
                            <h3 class="text-lg font-serif font-black text-[#1a3a63] group-hover:text-[#2B579A] transition-colors leading-tight uppercase tracking-tight">
                                {{ $department->name }}
                            </h3>
                        </div>
                        
                        <p class="text-[12px] text-slate-500 font-medium leading-relaxed mb-6 line-clamp-2">
                            {{ $department->description }}
                        </p>
                        
                        <div class="flex gap-3 w-full mb-6">
                            <div class="flex-1 p-3 bg-slate-50 border border-slate-100 group-hover:bg-white transition-colors">
                                <div class="text-[8px] font-black text-slate-400 uppercase tracking-widest mb-0.5">Programs</div>
                                <div class="text-base font-serif font-black text-[#1a3a63]">{{ $department->programs->count() }}</div>
                            </div>
                            <div class="flex-1 p-3 bg-slate-50 border border-slate-100 group-hover:bg-white transition-colors">
                                <div class="text-[8px] font-black text-slate-400 uppercase tracking-widest mb-0.5">Faculty</div>
                                <div class="text-base font-serif font-black text-[#1a3a63]">{{ $department->staff->count() }}</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between mt-auto w-full pt-4 border-t border-slate-50">
                            <a href="{{ route('departments.show', $department) }}" class="text-[9px] font-black uppercase tracking-[0.2em] text-[#2B579A] hover:text-[#FDB913] transition-colors flex items-center gap-2">
                                Explore Unit <span>→</span>
                            </a>
                            <a href="mailto:{{ $department->email }}" class="text-slate-300 hover:text-[#1a3a63] transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($departments->count() === 0)
                <div class="text-center py-32 bg-white border border-slate-100">
                    <div class="w-20 h-20 bg-slate-50 flex items-center justify-center mx-auto mb-8 text-4xl">🏛️</div>
                    <h3 class="text-xl font-serif font-black text-[#1a3a63] mb-4 uppercase tracking-widest">No Departments Found</h3>
                    <p class="text-slate-500 text-[10px] font-black uppercase tracking-widest mb-8">Data currently being updated by the registry.</p>
                    <a href="{{ route('contact.create') }}" class="btn-blue px-10 py-4 text-[10px] font-black uppercase tracking-widest">General Inquiry</a>
                </div>
            @endif
        </div>
    </section>
@endsection
