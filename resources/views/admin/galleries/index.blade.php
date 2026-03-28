<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-2 h-8 bg-[#2B579A]"></div>
            <h2 class="font-serif font-black text-2xl text-[#1a3a63] tracking-tight">
                Gallery Management
            </h2>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 shadow-sm animate-fade-in" role="alert">
            <p class="text-[10px] font-black uppercase tracking-widest">{{ session('success') }}</p>
        </div>
    @endif

    {{-- Action Toolbar --}}
    <div class="flex flex-wrap items-center justify-between gap-4 mb-6 px-6 py-4 bg-white border border-slate-100 rounded-xl shadow-sm">
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.galleries.create') }}" class="inline-flex items-center gap-2 bg-[#1a3a63] text-white px-5 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-[#2B579A] transition-all shadow active:scale-95">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Add Gallery Item
            </a>
        </div>
        <div class="text-[9px] text-slate-400">
            {{ $galleries->count() }} Total Items
        </div>
    </div>

    <div class="animate-fade-in-up">
        <div class="bg-white border border-slate-100 rounded-xl shadow-sm overflow-hidden">
            <div class="p-6">
                @if($galleries->count() > 0)
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4" id="gallery-grid">
                        @foreach($galleries as $gallery)
                            <div class="gallery-item group bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300" data-id="{{ $gallery->id }}">
                                <div class="relative h-32 bg-gradient-to-br from-slate-100 to-slate-200 overflow-hidden">
                                    @if($gallery->type === 'image')
                                        <img src="{{ asset('storage/' . $gallery->file_path) }}" 
                                             alt="{{ $gallery->title }}" 
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    @elseif($gallery->type === 'video')
                                        <div class="w-full h-full bg-gradient-to-br from-slate-900 to-slate-700 flex items-center justify-center">
                                            <div class="w-12 h-12 bg-[#2B579A] rounded-full flex items-center justify-center group-hover:bg-[#FDB913] transition-colors">
                                                <svg class="w-6 h-6 text-white ml-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                                                </svg>
                                            </div>
                                        </div>
                                    @endif
                                    
                                    <!-- Status Badge -->
                                    <div class="absolute top-2 right-2">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-[8px] font-black uppercase tracking-widest
                                            {{ $gallery->is_active ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }} shadow-lg">
                                            {{ $gallery->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </div>

                                    <!-- Type Badge -->
                                    <div class="absolute top-2 left-2">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-[8px] font-black uppercase tracking-widest bg-[#2B579A] text-white shadow-lg">
                                            {{ ucfirst($gallery->type) }}
                                        </span>
                                    </div>

                                    <!-- Hover Overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <div class="absolute bottom-2 left-2 right-2">
                                            <p class="text-white text-[8px] font-black uppercase tracking-widest truncate">{{ $gallery->category }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-4">
                                    <h3 class="font-black text-[#1a3a63] text-sm mb-2 truncate leading-tight group-hover:text-[#2B579A] transition-colors">{{ $gallery->title }}</h3>
                                    
                                    <div class="flex items-center justify-between text-[8px] text-slate-500 mb-3">
                                        <span class="font-black uppercase tracking-widest">{{ ucfirst($gallery->category) }}</span>
                                        <span class="font-black uppercase tracking-widest">Order #{{ $gallery->order }}</span>
                                    </div>

                                    @if($gallery->description)
                                        <p class="text-[8px] text-slate-600 line-clamp-2 mb-3">{{ $gallery->description }}</p>
                                    @endif

                                    <div class="flex gap-1 w-full mt-auto">
                                        <a href="{{ route('admin.galleries.edit', $gallery) }}" 
                                           class="flex-1 bg-slate-50 hover:bg-[#2B579A] hover:text-white text-slate-700 px-2 py-2 rounded-lg text-center transition-all duration-200 group-hover:scale-105" title="Edit">
                                            <svg class="w-4 h-4 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>

                                        <form action="{{ route('admin.galleries.toggle-status', $gallery) }}" method="POST" class="flex-1 m-0">
                                            @csrf
                                            <button type="submit" 
                                                    class="w-full h-full {{ $gallery->is_active ? 'bg-orange-50 hover:bg-orange-500 hover:text-white text-orange-600' : 'bg-green-50 hover:bg-green-500 hover:text-white text-green-600' }} px-2 py-2 rounded-lg transition-all duration-200 group-hover:scale-105"
                                                    title="Toggle Status">
                                                <svg class="w-4 h-4 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    @if($gallery->is_active)
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                                                    @else
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    @endif
                                                </svg>
                                            </button>
                                        </form>

                                        <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this gallery item? This action cannot be undone.')" class="flex-1 m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="w-full h-full bg-red-50 hover:bg-red-500 hover:text-white text-red-600 px-2 py-2 rounded-lg transition-all duration-200 group-hover:scale-105"
                                                    title="Delete Item">
                                                <svg class="w-4 h-4 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-8 flex justify-center">
                        {{ $galleries->links() }}
                    </div>
                @else
                    <div class="text-center py-20">
                        <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-black text-[#1a3a63] mb-2">No Gallery Items</h3>
                        <p class="text-slate-500 mb-6">Get started by adding your first gallery item to showcase your campus life.</p>
                        <a href="{{ route('admin.galleries.create') }}" class="inline-flex items-center gap-2 bg-[#1a3a63] text-white px-6 py-3 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-[#2B579A] transition-all shadow active:scale-95">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                            Add First Gallery Item
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
