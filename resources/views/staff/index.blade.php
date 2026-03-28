@extends('layouts.cict')

@section('content')
    <!-- Page Header (Institutional Style) -->
    <section class="bg-[#1a3a63] py-16 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-[#2B579A]"></div>
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <nav class="flex justify-center mb-8 text-white/50 text-[10px] font-black uppercase tracking-[0.2em]">
                <a href="{{ route('home') }}" class="hover:text-[#FDB913]">Home</a>
                <span class="mx-3 text-white/20">/</span>
                <span class="text-[#FDB913]">Faculty Directory</span>
            </nav>
            <h1 class="text-3xl md:text-5xl font-serif font-black mb-4">Our Faculty & Staff</h1>
            <div class="w-16 h-1 bg-[#FDB913] mx-auto mb-6"></div>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto font-medium leading-relaxed">
                Meet the educators, researchers, and administrators driving the digital transformation at St. John's University of Tanzania.
            </p>
        </div>
    </section>

    <!-- Staff Filter & Directory -->
    <section class="py-12 bg-[#F3F4F6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Filter Bar -->
            <div class="mb-8 flex justify-center">
                <!-- Department Dropdown Only -->
                <select id="departmentFilter" 
                        class="px-4 py-2 bg-white border border-slate-200 text-slate-600 text-[10px] font-black uppercase tracking-widest rounded-lg focus:ring-2 focus:ring-[#2B579A] focus:border-transparent transition-all shadow-sm cursor-pointer">
                    <option value="">All Departments</option>
                    @foreach($departments as $dept)
                        <option value="{{ $dept->id }}" {{ request('department') == $dept->id ? 'selected' : '' }}>
                            {{ $dept->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Staff Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($staff as $member)
                    <div class="coict-card group bg-white p-6 text-center flex flex-col items-center">
                        <div class="relative mb-4">
                            <div class="w-24 h-24 bg-slate-50 relative border-4 border-slate-100 p-1 group-hover:border-[#2B579A] transition-all duration-500">
                                @if($member->photo)
                                    <img src="{{ asset('storage/' . $member->photo) }}" 
                                         alt="{{ $member->name }}" 
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-slate-200 flex items-center justify-center text-3xl">👤</div>
                                @endif
                            </div>
                        </div>
                        <h3 class="text-base font-serif font-black text-[#1a3a63] mb-1 group-hover:text-[#2B579A] transition-colors leading-tight">
                            {{ $member->name }}
                        </h3>
                        <p class="text-[8px] font-black uppercase tracking-[0.2em] text-[#FDB913] mb-2">{{ $member->title }}</p>
                        <p class="text-[9px] text-slate-400 font-bold mb-4 uppercase tracking-widest italic">{{ $member->department->name }}</p>
                        
                        <div class="mt-auto w-full pt-3 border-t border-slate-50">
                            <a href="{{ route('staff.show', $member) }}" class="inline-flex items-center text-[8px] font-black uppercase tracking-widest text-[#2B579A] hover:text-black transition-colors">
                                View Profile
                                <svg class="ml-1 w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-20 flex justify-center">
                {{ $staff->links() }}
            </div>

            @if($staff->count() === 0)
                <div class="text-center py-32 bg-white border border-slate-100">
                    <div class="text-4xl mb-4">👥</div>
                    <p class="text-slate-400 text-xs font-black uppercase tracking-widest">No faculty records found.</p>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('scripts')
<script>
// Department filter only
document.getElementById('departmentFilter')?.addEventListener('change', function(e) {
    const selectedDept = e.target.value.toLowerCase();
    const cards = document.querySelectorAll('.coict-card');
    
    cards.forEach(card => {
        const deptText = card.textContent.toLowerCase();
        if (!selectedDept) {
            card.style.display = '';
        } else {
            card.style.display = deptText.includes(selectedDept) ? '' : 'none';
        }
    });
});
</script>
@endpush
