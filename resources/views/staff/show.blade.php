@extends('layouts.cict')

@section('content')
    <!-- Page Header (Institutional Style) -->
    <section class="bg-[#1a3a63] py-24 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-[#2B579A]"></div>
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <nav class="flex mb-8 text-white/50 text-[10px] font-black uppercase tracking-[0.2em]">
                <a href="{{ route('home') }}" class="hover:text-[#FDB913]">Home</a>
                <span class="mx-3 text-white/20">/</span>
                <a href="{{ route('staff.index') }}" class="hover:text-[#FDB913]">Faculty Directory</a>
                <span class="mx-3 text-white/20">/</span>
                <span class="text-[#FDB913]">Professional Profile</span>
            </nav>

            <div class="flex flex-col md:flex-row items-center md:items-end gap-12">
                <div class="shrink-0">
                    <div class="w-48 h-48 md:w-64 md:h-64 bg-white p-1 border-4 border-white/20 shadow-2xl transition-all duration-500">
                        @if($staff->photo)
                            <img src="{{ asset('storage/' . $staff->photo) }}" 
                                 alt="{{ $staff->name }}" 
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-slate-800 flex items-center justify-center text-8xl">👤</div>
                        @endif
                    </div>
                </div>
                <div class="text-center md:text-left pb-4">
                    <h1 class="text-4xl md:text-6xl font-serif font-black mb-4 leading-tight tracking-tight">
                        {{ $staff->name }}
                    </h1>
                    <div class="flex flex-wrap justify-center md:justify-start gap-4">
                        <span class="px-6 py-2 bg-[#FDB913] text-[#1a3a63] text-[10px] font-black uppercase tracking-widest shadow-lg">
                            {{ $staff->title }}
                        </span>
                        <span class="px-6 py-2 bg-white/10 text-white text-[10px] font-black uppercase tracking-widest border border-white/20 backdrop-blur-sm">
                            {{ $staff->department->name }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Profile Detail -->
    <section class="py-24 bg-[#F3F4F6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                <!-- Main Info -->
                <div class="lg:col-span-8">
                    <div class="space-y-16">
                        <!-- Biography -->
                        <div class="coict-card bg-white p-12">
                            <h2 class="text-2xl font-serif font-black text-[#1a3a63] mb-8 flex items-center">
                                <span class="w-2 h-8 bg-[#FDB913] mr-4"></span>
                                Academic Biography
                            </h2>
                            <div class="prose prose-slate max-w-none text-slate-600 leading-[1.8] text-sm font-medium">
                                @if($staff->bio)
                                    {!! nl2br(e($staff->bio)) !!}
                                @else
                                    <p class="italic text-slate-400">Detailed professional biography for Dr. {{ $staff->name }} is currently being updated. Please check back soon for information on academic background, publications, and administrative roles.</p>
                                @endif
                            </div>
                        </div>

                        <!-- Research Areas -->
                        <div class="coict-card bg-white p-12">
                            <h2 class="text-2xl font-serif font-black text-[#1a3a63] mb-8 flex items-center">
                                <span class="w-2 h-8 bg-[#FDB913] mr-4"></span>
                                Research & Expertise
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @php
                                    $interests = ['Information Systems', 'Network Security', 'Software Engineering', 'IT Management', 'Data Communications'];
                                @endphp
                                @foreach($interests as $interest)
                                    <div class="flex items-center gap-3 p-4 bg-slate-50 border border-slate-100 hover:border-[#2B579A]/20 transition-all group">
                                        <div class="w-1.5 h-1.5 bg-[#2B579A] group-hover:bg-[#FDB913] transition-colors"></div>
                                        <span class="text-[11px] font-black uppercase tracking-widest text-slate-600">{{ $interest }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact & Sidebar -->
                <div class="lg:col-span-4">
                    <div class="sticky top-24 space-y-8">
                        <!-- Direct Contact -->
                        <div class="bg-[#1a3a63] p-10 text-white relative overflow-hidden shadow-2xl">
                            <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/5 rounded-full"></div>
                            <h3 class="text-xl font-serif font-black mb-8 relative z-10 border-b border-white/10 pb-4">Professional Contact</h3>
                            <div class="space-y-8 relative z-10">
                                @if($staff->email)
                                <div>
                                    <span class="text-white/40 text-[9px] font-black uppercase tracking-widest block mb-2 italic">Institutional Email</span>
                                    <a href="mailto:{{ $staff->email }}" class="text-sm font-bold hover:text-[#FDB913] transition-colors tracking-tight">
                                        {{ $staff->email }}
                                    </a>
                                </div>
                                @endif
                                
                                @if($staff->phone)
                                <div>
                                    <span class="text-white/40 text-[9px] font-black uppercase tracking-widest block mb-2 italic">Office Extension</span>
                                    <span class="text-sm font-bold">{{ $staff->phone }}</span>
                                </div>
                                @endif

                                <div class="pt-8 border-t border-white/10">
                                    <button class="w-full bg-[#FDB913] text-[#1a3a63] py-4 text-[10px] font-black uppercase tracking-widest hover:bg-white transition-all shadow-lg active:scale-95">
                                        Request Meeting
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Navigation -->
                        <div class="bg-white p-8 border border-slate-200">
                            <a href="{{ route('staff.index') }}" class="group flex items-center gap-4 text-[10px] font-black uppercase tracking-widest text-[#2B579A]">
                                <span class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center group-hover:bg-[#2B579A] group-hover:text-white transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                                </span>
                                Back to Directory
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
