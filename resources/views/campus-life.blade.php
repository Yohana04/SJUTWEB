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
                <span class="text-[#FDB913]">Campus Life</span>
            </nav>
            <h1 class="text-3xl md:text-5xl font-serif font-black mb-4">🏫 Campus Life</h1>
            <div class="w-16 h-1 bg-[#FDB913] mx-auto mb-6"></div>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto font-medium leading-relaxed">
                Experience the vibrant community and exciting activities that make CICT a place where learning extends beyond the classroom
            </p>
        </div>
    </section>

    <!-- Overview Section -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-serif font-black text-[#2B579A] mb-6">
                    Overview
                </h2>
                <div class="max-w-4xl mx-auto">
                    <p class="text-lg text-slate-600 leading-relaxed mb-8">
                        At CICT, we believe that education extends far beyond the classroom. Our campus life is designed to foster personal growth, 
                        build lasting friendships, and create unforgettable memories. From cutting-edge technology to vibrant social activities, 
                        every aspect of campus life contributes to your holistic development.
                    </p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
                    <div class="h-48 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&q=80&w=600" 
                             alt="Learning Environment" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#1a3a63] mb-3">Learning Environment</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            State-of-the-art facilities, modern laboratories, and innovative teaching methods create an environment 
                            where curiosity thrives and excellence becomes a habit.
                        </p>
                    </div>
                </div>
                <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
                    <div class="h-48 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&q=80&w=600" 
                             alt="Social Life" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#1a3a63] mb-3">Social Life</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            A diverse community of students from various backgrounds creates a rich tapestry of cultures, ideas, 
                            and perspectives that prepare you for global citizenship.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Student Activities -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-serif font-black text-[#2B579A] mb-6">
                    ⚽ Student Activities
                </h2>
                <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                    Discover endless opportunities to explore your interests, develop new skills, and make lifelong connections
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white border border-slate-200 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
                    <div class="h-40 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&q=80&w=400" 
                             alt="Clubs & Societies" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-[#1a3a63] mb-3">Clubs & Societies</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Join diverse clubs ranging from drama and music to debate and cultural exchange. Find your community 
                            and pursue your passions alongside like-minded peers.
                        </p>
                    </div>
                </div>

                <div class="bg-white border border-slate-200 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
                    <div class="h-40 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1517077304055-6e5b5441f9c0?auto=format&fit=crop&q=80&w=400" 
                             alt="Tech Communities" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-[#1a3a63] mb-3">Tech Communities</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Coding clubs, innovation hubs, and tech meetups where you can collaborate on projects, learn new 
                            technologies, and connect with fellow tech enthusiasts.
                        </p>
                    </div>
                </div>

                <div class="bg-white border border-slate-200 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
                    <div class="h-40 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1543286386-713bdd548da4?auto=format&fit=crop&q=80&w=400" 
                             alt="Events & Hackathons" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-[#1a3a63] mb-3">Events & Hackathons</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Regular hackathons, tech fairs, and innovation challenges that push your limits, showcase your 
                            talents, and open doors to exciting opportunities.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sports & Recreation -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-serif font-black text-[#2B579A] mb-6">
                    🎮 Tech Games & Challenges
                </h2>
                <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                    Compete, learn, and excel in exciting technology challenges and skill-building games
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="{{ route('cict-games') }}" class="group block">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                        <div class="h-32 bg-gradient-to-br from-blue-500 to-blue-600 relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1550745165-9bc0b252726a?auto=format&fit=crop&q=80&w=400" 
                                 alt="PC Maintenance" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="text-lg font-bold text-[#2B579A] mb-2 group-hover:text-[#1a3a63] transition-colors">PC Maintenance</h3>
                            <p class="text-sm text-slate-600">Hardware troubleshooting and repair challenges</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('cict-games') }}" class="group block">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                        <div class="h-32 bg-gradient-to-br from-green-500 to-green-600 relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?auto=format&fit=crop&q=80&w=400" 
                                 alt="Coding Battles" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="text-lg font-bold text-[#2B579A] mb-2 group-hover:text-[#1a3a63] transition-colors">Coding Battles</h3>
                            <p class="text-sm text-slate-600">Debugging contests and algorithm challenges</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('cict-games') }}" class="group block">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                        <div class="h-32 bg-gradient-to-br from-purple-500 to-purple-600 relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?auto=format&fit=crop&q=80&w=400" 
                                 alt="Adobe Challenges" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="text-lg font-bold text-[#2B579A] mb-2 group-hover:text-[#1a3a63] transition-colors">Adobe Challenges</h3>
                            <p class="text-sm text-slate-600">Photoshop, Illustrator, and design contests</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('cict-games') }}" class="group block">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                        <div class="h-32 bg-gradient-to-br from-red-500 to-red-600 relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1555949963-aa79dcee981c3?auto=format&fit=crop&q=80&w=400" 
                                 alt="Tech Olympics" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="text-lg font-bold text-[#2B579A] mb-2 group-hover:text-[#1a3a63] transition-colors">Tech Olympics</h3>
                            <p class="text-sm text-slate-600">Multi-discipline tech competitions</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('cict-games') }}" class="inline-flex items-center px-8 py-4 bg-[#2B579A] text-white font-bold uppercase tracking-widest hover:bg-[#1a3a63] transition-colors rounded-lg">
                    Explore Tech Challenges →
                </a>
            </div>
        </div>
    </section>

    <!-- Facilities -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-serif font-black text-[#2B579A] mb-6">
                    🍽️ Facilities
                </h2>
                <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                    World-class facilities designed to support your academic and personal growth
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
                    <div class="h-40 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&q=80&w=400" 
                             alt="Cafeteria" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-[#1a3a63] mb-3">Cafeteria</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Modern dining facilities serving nutritious and delicious meals with diverse menu options 
                            catering to different dietary preferences and cultural backgrounds.
                        </p>
                    </div>
                </div>

                <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
                    <div class="h-40 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1568665256179-d399456cd634?auto=format&fit=crop&q=80&w=400" 
                             alt="Library" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-[#1a3a63] mb-3">Library</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Extensive collection of books, journals, and digital resources with quiet study areas, 
                            group discussion rooms, and 24/7 access during exam periods.
                        </p>
                    </div>
                </div>

                <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
                    <div class="h-40 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1532094349884-543bc11b2345?auto=format&fit=crop&q=80&w=400" 
                             alt="Laboratories" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-[#1a3a63] mb-3">Laboratories</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            State-of-the-art computer labs, electronics workshops, and innovation spaces equipped 
                            with the latest technology and software.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-serif font-black text-[#2B579A] mb-6">
                    📸 Campus Gallery
                </h2>
                <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                    Explore the vibrant moments and memories that define life at CICT
                </p>
            </div>

            <!-- Category Filter -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <button onclick="filterGallery('all')" class="category-btn px-6 py-3 bg-[#2B579A] text-white text-xs font-black uppercase tracking-[0.2em] shadow-lg hover:bg-[#1a3a63] transition-all duration-200">
                    All Media
                </button>
                <button onclick="filterGallery('campus-life')" class="category-btn px-6 py-3 bg-white text-[#2B579A] text-xs font-black uppercase tracking-[0.2em] border-2 border-[#2B579A] hover:bg-[#2B579A] hover:text-white transition-all duration-200">
                    Campus Life
                </button>
                <button onclick="filterGallery('events')" class="category-btn px-6 py-3 bg-white text-[#2B579A] text-xs font-black uppercase tracking-[0.2em] border-2 border-[#2B579A] hover:bg-[#2B579A] hover:text-white transition-all duration-200">
                    Events
                </button>
                <button onclick="filterGallery('sports')" class="category-btn px-6 py-3 bg-white text-[#2B579A] text-xs font-black uppercase tracking-[0.2em] border-2 border-[#2B579A] hover:bg-[#2B579A] hover:text-white transition-all duration-200">
                    Sports
                </button>
                <button onclick="filterGallery('academic')" class="category-btn px-6 py-3 bg-white text-[#2B579A] text-xs font-black uppercase tracking-[0.2em] border-2 border-[#2B579A] hover:bg-[#2B579A] hover:text-white transition-all duration-200">
                    Academic
                </button>
                <button onclick="filterGallery('general')" class="category-btn px-6 py-3 bg-white text-[#2B579A] text-xs font-black uppercase tracking-[0.2em] border-2 border-[#2B579A] hover:bg-[#2B579A] hover:text-white transition-all duration-200">
                    General
                </button>
            </div>

            <!-- Gallery Container -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-12" id="gallery-container">
                @if(isset($galleryItems) && $galleryItems->count() > 0)
                    @foreach($galleryItems->take(3) as $index => $item)
                        <div class="gallery-item group relative overflow-hidden rounded-lg shadow-md hover:shadow-lg transition-all duration-300" data-category="{{ $item->category }}">
                            @if($item->type === 'image')
                                <img src="{{ asset('storage/' . $item->file_path) }}" 
                                     alt="{{ $item->title }}" 
                                     class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                            @elseif($item->type === 'video')
                                <div class="relative w-full h-48 bg-slate-900">
                                    <video class="w-full h-full object-cover" muted>
                                        <source src="{{ asset('storage/' . $item->file_path) }}" type="video/mp4">
                                    </video>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="w-12 h-12 bg-white/90 rounded-full flex items-center justify-center group-hover:bg-white transition-colors">
                                            <svg class="w-6 h-6 text-[#2B579A] ml-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-3 text-white">
                                    <h3 class="font-semibold text-xs mb-0.5">{{ $item->title }}</h3>
                                    <p class="text-[10px] opacity-90">{{ $item->description ?? 'Campus moment' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Placeholder gallery items -->
                    @for($i = 0; $i < 3; $i++)
                        <div class="gallery-item group relative overflow-hidden rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                            <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&q=80&w=400" 
                                 alt="Campus Life" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-3 text-white">
                                    <h3 class="font-semibold text-xs mb-0.5">Campus Moment</h3>
                                    <p class="text-[10px] opacity-90">Experience the vibrant campus life</p>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>

            <!-- View All Button -->
            <div class="text-center mt-8">
                <a href="{{ route('cict-games') }}" class="inline-flex items-center px-8 py-4 bg-[#2B579A] text-white text-xs font-black uppercase tracking-[0.2em] shadow-lg hover:bg-[#1a3a63] hover:shadow-xl transition-all duration-200 transform hover:scale-105">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    Explore CICT Games
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 bg-[#F3F4F6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-serif font-black text-[#2B579A] mb-6 section-title-udsm">
                Join Our Vibrant Community
            </h2>
            <div class="prose prose-slate max-w-2xl mx-auto text-slate-600 leading-[1.6] text-xs mb-12">
                <p>Experience campus life that goes beyond academics. Make friends, discover passions, and create memories that last a lifetime.</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact.create') }}" class="btn-gold px-8 py-3 text-[10px] font-black uppercase tracking-widest">
                    Get More Info
                </a>
                <a href="{{ route('home') }}" class="border-2 border-[#1a3a63] text-[#1a3a63] hover:bg-[#1a3a63] hover:text-white px-8 py-3 text-[10px] font-black uppercase tracking-widest transition-all">
                    Back to Home
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
// Gallery data from server
const galleryItems = @json(isset($galleryItems) ? $galleryItems->toArray() : []);

// Filter gallery by category
function filterGallery(category) {
    // Update button styles
    document.querySelectorAll('.category-btn').forEach(btn => {
        btn.classList.remove('bg-[#2B579A]', 'text-white');
        btn.classList.add('bg-gray-200', 'text-gray-700');
    });
    
    // Highlight active button
    event.target.classList.remove('bg-gray-200', 'text-gray-700');
    event.target.classList.add('bg-[#2B579A]', 'text-white');
    
    // Filter items
    const container = document.getElementById('gallery-container');
    const items = container.querySelectorAll('.gallery-item');
    
    items.forEach(item => {
        if (category === 'all' || item.dataset.category === category) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}

// Close modal on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        // Modal removed - no action needed
    }
});

// Close modal on background click
// Modal removed - no action needed
</script>
@endpush
