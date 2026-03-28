@extends('layouts.cict')

@section('content')
    <!-- Page Header -->
    <section class="bg-[#1a3a63] py-16 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-[#2B579A]"></div>
            <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <nav class="flex justify-center mb-6 text-white/50 text-[10px] font-black uppercase tracking-[0.2em]">
                <a href="{{ route('home') }}" class="hover:text-[#FDB913]">Home</a>
                <span class="mx-3 text-white/20">/</span>
                <a href="{{ route('academic') }}" class="hover:text-[#FDB913]">Academic Hub</a>
                <span class="mx-3 text-white/20">/</span>
                <span class="text-[#FDB913]">Repository</span>
            </nav>
            <h1 class="text-2xl md:text-4xl font-serif font-black mb-4">Research & Projects</h1>
            <div class="w-16 h-1 bg-[#FDB913] mx-auto mb-6"></div>
            <p class="text-base text-slate-300 max-w-xl mx-auto font-medium leading-relaxed">
                A digital archive of innovation and academic discovery within the Centre for Information and Communication Technology.
            </p>
        </div>
    </section>

    <!-- Filters & Listing -->
    <section class="py-16 bg-[#F3F4F6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Filter Bar -->
            <div class="mb-12 flex flex-wrap justify-between items-center gap-4">
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('projects.index') }}" 
                       class="px-6 py-2.5 {{ !request()->has('category') ? 'bg-[#2B579A] text-white shadow-xl' : 'bg-white text-slate-500 hover:bg-slate-100' }} text-[10px] font-black uppercase tracking-widest transition-all">
                        All Innovation
                    </a>
                    <a href="{{ route('projects.index', ['category' => 'research']) }}" 
                       class="px-6 py-2.5 {{ request('category') === 'research' ? 'bg-[#2B579A] text-white shadow-xl' : 'bg-white text-slate-500 hover:bg-slate-100' }} text-[10px] font-black uppercase tracking-widest transition-all">
                        Research & Studies
                    </a>
                    <a href="{{ route('projects.index', ['category' => 'student_project']) }}" 
                       class="px-6 py-2.5 {{ request('category') === 'student_project' ? 'bg-[#2B579A] text-white shadow-xl' : 'bg-white text-slate-500 hover:bg-slate-100' }} text-[10px] font-black uppercase tracking-widest transition-all">
                        Student Projects
                    </a>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                    <article class="coict-card group bg-white flex flex-col h-full overflow-hidden">
                        <div class="aspect-video bg-slate-100 overflow-hidden relative">
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" 
                                     alt="{{ $project->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-[#1a3a63]/5 flex items-center justify-center text-4xl opacity-20">💡</div>
                            @endif
                            <div class="absolute top-4 left-4">
                                <span class="bg-[#FDB913] text-[#1a3a63] text-[8px] font-black px-3 py-1 uppercase tracking-widest">
                                    {{ $project->category === 'research' ? 'Research' : 'Project' }}
                                </span>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h3 class="text-lg font-serif font-black text-[#1a3a63] mb-3 line-clamp-2 leading-tight group-hover:text-[#2B579A] transition-colors">
                                {{ $project->title }}
                            </h3>
                            <div class="flex items-center gap-2 mb-4">
                                <span class="text-[9px] font-black uppercase tracking-wider text-slate-400">By {{ $project->author }}</span>
                                <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                                <span class="text-[9px] font-bold text-slate-400 opacity-60">{{ $project->year ?? 'Current' }}</span>
                            </div>
                            <p class="text-xs text-slate-500 leading-relaxed mb-8 flex-grow line-clamp-3">
                                {{ Str::limit($project->description, 120) }}
                            </p>
                            <a href="{{ route('projects.show', $project) }}" class="mt-auto inline-flex items-center text-[10px] font-black uppercase tracking-widest text-[#2B579A] group-hover:text-[#FDB913]">
                                Full Abstract <span>→</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-20">
                {{ $projects->links() }}
            </div>

            @if($projects->isEmpty())
                <div class="text-center py-32 bg-white">
                    <div class="text-4xl mb-4">📂</div>
                    <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">No entries found in this category.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
