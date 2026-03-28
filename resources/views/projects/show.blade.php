@extends('layouts.cict')

@section('content')
    <!-- Page Header -->
    <section class="bg-[#1a3a63] py-24 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-[#2B579A]"></div>
            @if($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-full object-cover">
            @endif
        </div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <nav class="flex justify-center mb-10 text-white/50 text-[10px] font-black uppercase tracking-[0.2em]">
                <a href="{{ route('home') }}" class="hover:text-[#FDB913]">Home</a>
                <span class="mx-3 text-white/20">/</span>
                <a href="{{ route('academic') }}" class="hover:text-[#FDB913]">Academic Hub</a>
                <span class="mx-3 text-white/20">/</span>
                <a href="{{ route('projects.index') }}" class="hover:text-[#FDB913]">Repository</a>
                <span class="mx-3 text-white/20">/</span>
                <span class="text-[#FDB913]">Details</span>
            </nav>
            
            <div class="text-center">
                <div class="inline-block px-4 py-1.5 bg-[#FDB913] text-[#1a3a63] text-[9px] font-black uppercase tracking-[0.3em] mb-8">
                    {{ $project->category === 'research' ? 'Academic Research' : 'Innovation Project' }}
                </div>
                <h1 class="text-3xl md:text-5xl font-serif font-black mb-8 leading-[1.15]">
                    {{ $project->title }}
                </h1>
                <div class="flex flex-col md:flex-row items-center justify-center gap-6 text-slate-300">
                    <div class="flex items-center gap-3">
                        <span class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-sm">👤</span>
                        <span class="text-xs font-black uppercase tracking-widest">{{ $project->author }}</span>
                    </div>
                    <div class="hidden md:block w-px h-4 bg-white/20"></div>
                    <div class="flex items-center gap-3">
                        <span class="text-[#FDB913]">📅</span>
                        <span class="text-xs font-black uppercase tracking-widest">Released: {{ $project->year ?? '2024' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-16">
                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky top-24 space-y-12">
                        <div>
                            <h4 class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-400 mb-6">Documentation</h4>
                            @if($project->file_path)
                                <a href="{{ asset('storage/' . $project->file_path) }}" target="_blank" class="flex flex-col p-6 bg-slate-50 border-l-4 border-[#2B579A] hover:bg-slate-100 transition-all group">
                                    <span class="text-[#2B579A] text-2xl mb-3">📄</span>
                                    <span class="text-[10px] font-black uppercase tracking-widest text-[#1a3a63] mb-1">Full Document</span>
                                    <span class="text-[9px] text-slate-400 font-bold uppercase italic">PDF Format</span>
                                </a>
                            @else
                                <div class="p-6 bg-slate-50 border-l-4 border-slate-200 opacity-60">
                                    <p class="text-[9px] text-slate-400 font-bold italic">No document available for download.</p>
                                </div>
                            @endif
                        </div>

                        <div>
                            <h4 class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-400 mb-6">Sharing</h4>
                            <div class="flex gap-4">
                                <button class="w-10 h-10 bg-slate-50 flex items-center justify-center text-[#1a3a63] hover:bg-[#1a3a63] hover:text-white transition-all shadow-sm">f</button>
                                <button class="w-10 h-10 bg-slate-50 flex items-center justify-center text-[#1a3a63] hover:bg-[#1a3a63] hover:text-white transition-all shadow-sm">t</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Abstract / Body -->
                <div class="lg:col-span-3">
                    <div class="prose prose-slate max-w-none">
                        <h2 class="text-2xl font-serif font-black text-[#1a3a63] mb-8 after:block after:w-16 after:h-1 after:bg-[#FDB913] after:mt-4">Overview & Abstract</h2>
                        <div class="text-slate-600 leading-[1.8] space-y-8 text-sm">
                            {!! nl2br(e($project->description)) !!}
                        </div>
                    </div>

                    <div class="mt-20 pt-10 border-t border-slate-100">
                        <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-4 text-[10px] font-black uppercase tracking-[0.2em] text-[#1a3a63] hover:text-[#2B579A] transition-colors">
                            <span class="w-8 h-[1px] bg-[#FDB913]"></span>
                            Back to Repository
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
