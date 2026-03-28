@extends('layouts.cict')

@section('content')
    <!-- Page Header (Institutional Style) -->
    <section class="bg-[#1a3a63] py-16 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-[#2B579A]"></div>
            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&q=80&w=2000" class="w-full h-full object-cover">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <nav class="flex justify-center mb-8 text-white/50 text-[10px] font-black uppercase tracking-[0.2em]">
                <a href="{{ route('home') }}" class="hover:text-[#FDB913]">Home</a>
                <span class="mx-3 text-white/20">/</span>
                <span class="text-[#FDB913]">Support Hub</span>
            </nav>
            <h1 class="text-3xl md:text-5xl font-serif font-black mb-4">Contact Us</h1>
            <div class="w-16 h-1 bg-[#FDB913] mx-auto mb-6"></div>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto font-medium leading-relaxed">
                Connect with our academic administration, research departments, or technical support team.
            </p>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                <!-- Contact Form -->
                <div class="lg:col-span-7">
                    <div class="bg-[#F3F4F6] p-10 md:p-16 border-t-8 border-[#2B579A] animate-fade-in">
                        <h2 class="text-2xl font-serif font-black text-[#1a3a63] mb-8 uppercase tracking-tight">Send Academic Inquiry</h2>
                        
                        @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-6 py-4 mb-8 text-xs font-black uppercase tracking-widest">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">Full Name *</label>
                                    <input type="text" id="name" name="name" required
                                           class="w-full px-6 py-4 bg-white border border-slate-200 focus:border-[#2B579A] outline-none transition-all text-xs font-bold"
                                           placeholder="Enter your name">
                                </div>

                                <div>
                                    <label for="email" class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">Email Address *</label>
                                    <input type="email" id="email" name="email" required
                                           class="w-full px-6 py-4 bg-white border border-slate-200 focus:border-[#2B579A] outline-none transition-all text-xs font-bold"
                                           placeholder="identity@example.com">
                                </div>
                            </div>

                            <div>
                                <label for="subject" class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">Subject *</label>
                                <input type="text" id="subject" name="subject" required
                                       class="w-full px-6 py-4 bg-white border border-slate-200 focus:border-[#2B579A] outline-none transition-all text-xs font-bold"
                                       placeholder="How can we help?">
                            </div>

                            <div>
                                <label for="message" class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-2">Message *</label>
                                <textarea id="message" name="message" rows="5" required
                                          class="w-full px-6 py-4 bg-white border border-slate-200 focus:border-[#2B579A] outline-none transition-all text-xs font-bold resize-none"
                                          placeholder="Type your message here...">{{ old('message') }}</textarea>
                            </div>

                            <div class="flex items-start gap-3 py-2">
                                <input type="checkbox" id="privacy" name="privacy" required 
                                       class="mt-1 w-4 h-4 border-slate-300 text-[#2B579A] focus:ring-[#FDB913]">
                                <label for="privacy" class="text-[9px] font-bold text-slate-400 uppercase tracking-widest leading-relaxed">
                                    I AGREE TO THE SJUT <a href="#" class="text-[#2B579A] underline">DATA PRIVACY POLICY</a> REGARDING SUBMISSION OF COMMUNICATIONS.
                                </label>
                            </div>

                            <button type="submit" 
                                    class="w-full bg-[#2B579A] text-white py-5 text-[10px] font-black uppercase tracking-[0.3em] hover:bg-[#1a3a63] transition-all shadow-lg active:scale-[0.98]">
                                Submit Message
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="lg:col-span-5">
                    <div class="sticky top-24 space-y-8 animate-fade-in">
                        <!-- Headquarter Registry -->
                        <div class="bg-[#2B579A] p-12 text-white relative overflow-hidden border-b-8 border-[#FDB913]">
                            <h3 class="text-xl font-serif font-black mb-10 uppercase tracking-tight">Main Centre Registry</h3>
                            <div class="space-y-8 text-[11px] font-bold uppercase tracking-widest leading-relaxed">
                                <div>
                                    <span class="text-white/40 block mb-2">Postal Address</span>
                                    <p class="text-sm font-black tracking-normal normal-case">
                                        St John's University of Tanzania<br>
                                        Centre for ICT, P.O. Box 222<br>
                                        Dodoma, Tanzania
                                    </p>
                                </div>
                                <div class="grid grid-cols-1 gap-8">
                                    <div>
                                        <span class="text-white/40 block mb-2">Direct Line</span>
                                        <p class="text-lg font-serif font-black">+255 123 456 789</p>
                                    </div>
                                    <div>
                                        <span class="text-white/40 block mb-2">Email Registry</span>
                                        <p class="text-sm font-black lowercase tracking-tighter">info@cict.sjut.ac.tz</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Operational Intervals -->
                        <div class="bg-[#F3F4F6] p-12 border border-slate-100">
                            <h3 class="text-lg font-serif font-black text-[#1a3a63] mb-8 uppercase tracking-tight">Support Hours</h3>
                            <div class="space-y-4 text-[10px] font-black uppercase tracking-widest">
                                <div class="flex justify-between items-center py-3 border-b border-slate-200">
                                    <span class="text-slate-400">Mon — Fri</span>
                                    <span class="text-[#2B579A]">08:00 — 17:00</span>
                                </div>
                                <div class="flex justify-between items-center py-3 border-b border-slate-200">
                                    <span class="text-slate-400">Saturday</span>
                                    <span class="text-[#2B579A]">09:00 — 13:00</span>
                                </div>
                                <div class="flex justify-between items-center py-3">
                                    <span class="text-slate-400">Sunday</span>
                                    <span class="text-red-600">Closed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-24 bg-[#F3F4F6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-2xl font-serif font-black text-[#1a3a63] uppercase tracking-tight">Our Location</h2>
                <div class="w-16 h-1 bg-[#FDB913] mx-auto mt-4"></div>
            </div>
            <div class="bg-white p-2 shadow-2xl border border-slate-200" style="height: 500px;">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!2d35.7617!3d6.7725!2m3!1f0!2f0!3m2!2i1024!2i768!4f13.1!3m3!1m2!1s0x0!2z0!5e0!3m2!1sen!2stz!4v1650485569992!5m2!1sen!2stz" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy"
                    class="grayscale hover:grayscale-0 transition-all duration-700">
                </iframe>
            </div>
        </div>
    </section>
@endsection
