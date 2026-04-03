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
                <span class="text-[#FDB913]">Privacy Policy</span>
            </nav>
            <h1 class="text-3xl md:text-5xl font-serif font-black mb-4">Privacy & Data Policy</h1>
            <div class="w-16 h-1 bg-[#FDB913] mx-auto mb-6"></div>
            <p class="text-base text-slate-300 max-w-2xl mx-auto font-medium leading-relaxed">
                How we collect, use, and protect your institutional and personal information.
            </p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-24 bg-white relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-slate prose-lg lg:prose-xl max-w-none text-slate-600">
                <p class="lead text-[#2B579A] font-serif italic mb-8 border-l-4 border-[#FDB913] pl-6 py-2 bg-slate-50">
                    Your privacy is critically important to us. At CICT, we follow strict policies on how we handle user data gathered through our platforms securely and transparently.
                </p>

                <h2 class="text-2xl font-serif font-black text-[#1a3a63] mt-12 mb-4">1. Information Collection</h2>
                <p>
                    We collect information to provide better services to all our users. When you use CICT services, we may collect institutional metrics such as your device's Internet Protocol (IP) address, browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages, and other diagnostic data.
                </p>
                <p>
                    If you register for newsletters or accounts, we collect personally identifiable information that can be used to contact or identify you, which may include your Email Address, First Name, Last Name, and Student/Staff ID.
                </p>

                <h2 class="text-2xl font-serif font-black text-[#1a3a63] mt-12 mb-4">2. Use of Data</h2>
                <p>The Centre uses the collected data for various academic and administrative purposes:</p>
                <ul class="list-disc pl-6 space-y-2 mt-4 marker:text-[#2B579A]">
                    <li>To provide and maintain our Service.</li>
                    <li>To notify you about changes to our Service (Announcements and News).</li>
                    <li>To allow you to participate in interactive features of our Service.</li>
                    <li>To provide critical student support.</li>
                    <li>To monitor the usage and security of the university's network.</li>
                </ul>

                <h2 class="text-2xl font-serif font-black text-[#1a3a63] mt-12 mb-4">3. Information Security</h2>
                <p>
                    The security of your data is important to us. We strive to use commercially acceptable means to protect your Personal Data, including modern encryption, secure server architectures, and restricted access protocols. However, remember that no method of transmission over the Internet or method of electronic storage is 100% secure.
                </p>

                <h2 class="text-2xl font-serif font-black text-[#1a3a63] mt-12 mb-4">4. Third-Party Access</h2>
                <p>
                    CICT does not sell, trade, or rent user personal identification information to others. We may share generic aggregated demographic information not linked to any personal identification information regarding visitors and users with our university partners and trusted affiliates for the purposes outlined above.
                </p>

                <h2 class="text-2xl font-serif font-black text-[#1a3a63] mt-12 mb-4">5. Contact Us</h2>
                <p>
                    If you have any questions about this Privacy Policy, please contact us via our official contact page or email us directly at <strong>info@cict.sjut.ac.tz</strong>.
                </p>

                <hr class="my-12 border-slate-200">
                
                <p class="text-sm text-slate-500 font-bold tracking-widest uppercase">
                    Last Updated: {{ date('F d, Y') }}
                </p>
            </div>
        </div>
    </section>
@endsection
