@extends('layouts.cict')

@section('content')
    <!-- Announcement Hero (Institutional Style) -->
    <section class="bg-[#1a3a63] py-24 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-[#2B579A]"></div>
            <img src="https://images.unsplash.com/photo-1543269664-76bc3997d9ea?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <nav class="flex mb-8 text-white/50 text-[10px] font-black uppercase tracking-[0.2em]">
                <a href="{{ route('home') }}" class="hover:text-[#FDB913]">Home</a>
                <span class="mx-3 text-white/20">/</span>
                <a href="{{ route('announcements.index') }}" class="hover:text-[#FDB913]">Public Registry</a>
                <span class="mx-3 text-white/20">/</span>
                <span class="text-[#FDB913]">Notice Detail</span>
            </nav>

            <div class="flex flex-col lg:flex-row justify-between items-center lg:items-end gap-12">
                <div class="text-center lg:text-left max-w-4xl">
                    <div class="mb-8 flex flex-wrap justify-center lg:justify-start gap-4 items-center">
                        <span class="px-6 py-2 text-[10px] font-black uppercase tracking-widest shadow-lg
                            @if($announcement->type === 'Urgent') bg-red-600 text-white
                            @elseif($announcement->type === 'Academic') bg-[#2B579A] text-white
                            @else bg-[#FDB913] text-[#1a3a63]
                            @endif">
                            {{ $announcement->type }} Registry Notice
                        </span>
                        <span class="text-white/40 text-[9px] font-black uppercase tracking-widest italic">
                            REF-ID: #{{ str_pad($announcement->id, 6, '0', STR_PAD_LEFT) }}
                        </span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-serif font-black mb-6 leading-tight tracking-tight">
                        {{ $announcement->title }}
                    </h1>
                    <div class="w-16 h-1 bg-[#FDB913] mx-auto lg:mx-0"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Notice Content -->
    <article class="py-24 bg-[#F3F4F6]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="coict-card bg-white p-12 md:p-20 relative overflow-hidden">
                <!-- Watermark -->
                <div class="absolute inset-0 flex justify-center items-center opacity-[0.03] pointer-events-none select-none overflow-hidden">
                    <span class="text-9xl font-serif font-black uppercase -rotate-12 translate-y-12">OFFICIAL</span>
                </div>

                <div class="relative z-10">
                    <div class="flex justify-between items-center mb-16 pb-8 border-b border-slate-100">
                        <div>
                            <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest block mb-2">Issue Date</span>
                            <span class="text-xs font-serif font-black text-[#1a3a63]">{{ $announcement->published_at->format('l, F d, Y') }}</span>
                        </div>
                        @if($announcement->expires_at)
                        <div class="text-right">
                            <span class="text-[9px] font-black text-red-500 uppercase tracking-widest block mb-2">Registry Deactivation</span>
                            <span class="text-xs font-serif font-black text-red-600">{{ $announcement->expires_at->format('l, F d, Y') }}</span>
                        </div>
                        @endif
                    </div>

                    <div class="prose prose-slate max-w-none text-slate-600 leading-[1.8] text-sm font-medium mb-16">
                        {!! nl2br(e($announcement->content)) !!}
                    </div>

                    <div class="pt-12 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-8">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-[#1a3a63] flex items-center justify-center text-white text-lg shadow-lg">🏛️</div>
                            <div>
                                <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest block mb-1">Authorized by</span>
                                <span class="text-[10px] font-black text-[#1a3a63] uppercase tracking-tighter">Centre Administration Bureau</span>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <button onclick="window.print()" class="px-10 py-4 bg-slate-100 text-[#1a3a63] text-[9px] font-black uppercase tracking-widest hover:bg-slate-200 transition-all">
                                🖨 Print Document
                            </button>
                            <a href="{{ route('announcements.index') }}" class="btn-blue px-10 py-4 text-[9px] font-black uppercase tracking-widest shadow-xl">
                                ← Registry Home
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Disclaimer -->
            <div class="mt-12 text-center">
                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest max-w-2xl mx-auto leading-relaxed">
                    This is an electronically generated official notice from the SJUT Centre for ICT digital registry. Integrity and authenticity are guaranteed by the institutional digital signature service.
                </p>
            </div>
        </div>
    </article>

    <!-- Urgent compliance Alert (If Urgent) -->
    @if($announcement->type === 'Urgent')
    <section class="py-24 bg-red-600 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-black/10 flex items-center justify-center">
            <span class="text-[25vw] font-serif font-black text-white/5 select-none leading-none">URGENT</span>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h2 class="text-3xl font-serif font-black mb-6 uppercase tracking-tight">Immediate Compliance Recommended</h2>
            <p class="text-red-100 mb-10 text-lg font-medium max-w-2xl mx-auto leading-relaxed">This notice has been classified as high-priority. Please ensure all relevant stakeholders are informed immediately regarding the contents of this registry notice.</p>
            <div class="inline-block px-12 py-5 bg-white text-red-600 text-[10px] font-black uppercase tracking-widest shadow-2xl">
                Certified Registry Notice
            </div>
        </div>
    </section>
    @endif
@endsection
