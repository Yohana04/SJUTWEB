@extends('layouts.cict')

@section('content')
    <!-- Page Header -->
    <section class="bg-[#1a3a63] py-16 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-[#2B579A]"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <nav class="flex justify-center mb-8 text-white/50 text-[10px] font-black uppercase tracking-[0.2em]">
                <a href="{{ route('home') }}" class="hover:text-[#FDB913]">Home</a>
                <span class="mx-3 text-white/20">/</span>
                <span class="text-[#FDB913]">Terms of Service</span>
            </nav>
            <h1 class="text-3xl md:text-5xl font-serif font-black mb-4">Terms of Service</h1>
            <div class="w-16 h-1 bg-[#FDB913] mx-auto mb-6"></div>
            <p class="text-base text-slate-300 max-w-2xl mx-auto font-medium leading-relaxed">
                Rules and guidelines for interacting with the CICT digital platforms and services.
            </p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-24 bg-white relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-slate prose-lg lg:prose-xl max-w-none text-slate-600">
                <p class="lead text-[#2B579A] font-serif italic mb-8 border-l-4 border-[#FDB913] pl-6 py-2 bg-slate-50">
                    Welcome to the Centre for Information and Communication Technology (CICT) at St. John's University of Tanzania. Please read these terms carefully before using our services.
                </p>

                <h2 class="text-2xl font-serif font-black text-[#1a3a63] mt-12 mb-4">1. Acceptance of Terms</h2>
                <p>
                    By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement. In addition, when using this website's particular services, you shall be subject to any posted guidelines or rules applicable to such services.
                </p>

                <h2 class="text-2xl font-serif font-black text-[#1a3a63] mt-12 mb-4">2. Academic Integrity</h2>
                <p>
                    All users of CICT academic platforms (including e-learning portals, lab systems, and network resources) must adhere to the St. John's University Academic Honesty Policy. Any form of cheating, plagiarism, or unauthorized access attempts will result in immediate suspension of access rights.
                </p>

                <h2 class="text-2xl font-serif font-black text-[#1a3a63] mt-12 mb-4">3. Acceptable Use of Technology</h2>
                <p>
                    Computing resources provided by CICT are primarily for educational, research, and administrative purposes. Users must not:
                </p>
                <ul class="list-disc pl-6 space-y-2 mt-4 marker:text-[#2B579A]">
                    <li>Engage in illegal online activities.</li>
                    <li>Attempt to bypass security constraints or access unauthorized data.</li>
                    <li>Use the network to distribute malware, spam, or abusive materials.</li>
                    <li>Utilize resources for substantial personal commercial use without prior authorization.</li>
                </ul>

                <h2 class="text-2xl font-serif font-black text-[#1a3a63] mt-12 mb-4">4. Intellectual Property</h2>
                <p>
                    The content, organization, graphics, design, compilation, magnetic translation, digital conversion and other matters related to the Site are protected under applicable copyrights, trademarks and other proprietary (including but not limited to intellectual property) rights. The copying, redistribution, use or publication by you of any such matters or any part of the Site is strictly prohibited.
                </p>

                <h2 class="text-2xl font-serif font-black text-[#1a3a63] mt-12 mb-4">5. Modifications</h2>
                <p>
                    CICT reserves the right to change these conditions from time to time as it sees fit and your continued use of the site will signify your acceptance of any adjustment to these terms.
                </p>

                <hr class="my-12 border-slate-200">
                
                <p class="text-sm text-slate-500 font-bold tracking-widest uppercase">
                    Last Updated: {{ date('F d, Y') }}
                </p>
            </div>
        </div>
    </section>
@endsection
