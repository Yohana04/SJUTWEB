@extends('layouts.cict')

@section('content')
    <!-- Page Header -->
    <section class="bg-[#1a3a63] py-16 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-[#2B579A]"></div>
            <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <nav class="flex justify-center mb-6 text-white/50 text-[10px] font-black uppercase tracking-[0.2em]">
                <a href="{{ route('home') }}" class="hover:text-[#FDB913]">Home</a>
                <span class="mx-3 text-white/20">/</span>
                <span class="text-[#FDB913]">Student Hub</span>
            </nav>
            <h1 class="text-2xl md:text-4xl font-serif font-black mb-4">Student Resources</h1>
            <div class="w-16 h-1 bg-[#FDB913] mx-auto mb-6"></div>
            <p class="text-base text-slate-300 max-w-xl mx-auto font-medium leading-relaxed">
                Everything you need to succeed at SJUT, from academic portals to campus life and support services.
            </p>
        </div>
    </section>

    <!-- Essential Portals -->
    <section class="py-16 bg-[#F3F4F6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-[10px] font-black uppercase tracking-[0.3em] text-[#2B579A] mb-3">Academic Ecosystem</h2>
                <h3 class="text-2xl font-serif font-black text-[#1a3a63]">Primary Essential Portals</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- ARIS -->
                <div class="coict-card p-8 bg-white group hover:bg-[#1a3a63] transition-all duration-500">
                    <div class="w-12 h-12 bg-slate-50 flex items-center justify-center text-2xl mb-6 group-hover:bg-white/10 group-hover:text-white transition-all shadow-sm">
                        📊
                    </div>
                    <h4 class="text-lg font-serif font-black text-[#1a3a63] group-hover:text-white mb-3">Student Portal (ARIS)</h4>
                    <p class="text-xs text-slate-500 group-hover:text-slate-300 leading-relaxed mb-6">
                        Access your academic records, register for courses, and check your examination results.
                    </p>
                    <a href="https://sims.sjut.ac.tz/login/?callback=https://sims.sjut.ac.tz/" target="_blank" class="inline-flex items-center text-[10px] font-black uppercase tracking-widest text-[#2B579A] group-hover:text-[#FDB913]">
                        Launch Portal <span>→</span>
                    </a>
                </div>

                <!-- LMS -->
                <div class="coict-card p-8 bg-white group hover:bg-[#1a3a63] transition-all duration-500">
                    <div class="w-12 h-12 bg-slate-50 flex items-center justify-center text-2xl mb-6 group-hover:bg-white/10 group-hover:text-white transition-all shadow-sm">
                        🎓
                    </div>
                    <h4 class="text-lg font-serif font-black text-[#1a3a63] group-hover:text-white mb-3">Learning Management</h4>
                    <p class="text-xs text-slate-500 group-hover:text-slate-300 leading-relaxed mb-6">
                        Access lecture materials, submit assignments, and participate in online discussions.
                    </p>
                    <a href="http://elms.sjut.ac.tz/" target="_blank" class="inline-flex items-center text-[10px] font-black uppercase tracking-widest text-[#2B579A] group-hover:text-[#FDB913]">
                        Enter Classroom <span>→</span>
                    </a>
                </div>

                <!-- Library -->
                <div class="coict-card p-8 bg-white group hover:bg-[#1a3a63] transition-all duration-500">
                    <div class="w-12 h-12 bg-slate-50 flex items-center justify-center text-2xl mb-6 group-hover:bg-white/10 group-hover:text-white transition-all shadow-sm">
                        📚
                    </div>
                    <h4 class="text-lg font-serif font-black text-[#1a3a63] group-hover:text-white mb-3">E-Library Resources</h4>
                    <p class="text-xs text-slate-500 group-hover:text-slate-300 leading-relaxed mb-6">
                        Browse thousands of digital journals, books, and research papers from our global database.
                    </p>
                    <a href="https://library.sjut.ac.tz/" target="_blank" class="inline-flex items-center text-[10px] font-black uppercase tracking-widest text-[#2B579A] group-hover:text-[#FDB913]">
                        Start Research <span>→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Support & Life -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-[10px] font-black uppercase tracking-[0.3em] text-[#FDB913] mb-4">Student Support</h2>
                    <h3 class="text-2xl font-serif font-black text-[#1a3a63] mb-6 leading-tight">We are here to support your academic journey.</h3>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="shrink-0 w-10 h-10 bg-slate-50 flex items-center justify-center text-lg text-[#2B579A] shadow-sm">🛠️</div>
                            <div>
                                <h4 class="text-base font-serif font-bold text-[#1a3a63] mb-1">Technical Support</h4>
                                <p class="text-xs text-slate-500 leading-relaxed font-medium">Get assistance with your institutional email, Wi-Fi access, and software issues.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="shrink-0 w-10 h-10 bg-slate-50 flex items-center justify-center text-lg text-[#2B579A] shadow-sm">💬</div>
                            <div>
                                <h4 class="text-base font-serif font-bold text-[#1a3a63] mb-1">Counseling Services</h4>
                                <p class="text-xs text-slate-500 leading-relaxed font-medium">Access confidential counseling and wellness support for a balanced student life.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="shrink-0 w-10 h-10 bg-slate-50 flex items-center justify-center text-lg text-[#2B579A] shadow-sm">🏛️</div>
                            <div>
                                <h4 class="text-base font-serif font-bold text-[#1a3a63] mb-1">Administration</h4>
                                <p class="text-xs text-slate-500 leading-relaxed font-medium">Submit requests to the registrar, pay fees, and manage your student ID.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative max-w-md mx-auto">
                    <div class="aspect-square bg-slate-100 overflow-hidden shadow-xl">
                        <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&q=80&w=1000" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-[#FDB913] p-6 hidden md:block">
                        <div class="text-2xl font-serif font-black text-[#1a3a63] mb-1">24/7</div>
                        <div class="text-[8px] font-black uppercase tracking-widest text-[#1a3a63]">Support Access</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
