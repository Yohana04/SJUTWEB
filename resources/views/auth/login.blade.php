<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center p-6 bg-cover bg-center relative" style="background-image: url('https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80&w=2000');">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-[#1a3a63]/80 backdrop-blur-sm"></div>

        <!-- Login Card -->
        <div class="relative z-10 w-full max-w-[450px] bg-white shadow-2xl overflow-hidden animate-fade-in-up">
            <!-- Branding Header -->
            <div class="bg-[#1a3a63] p-12 text-center border-b-8 border-[#FDB913]">
                <div class="text-4xl mb-6">🏛️</div>
                <h2 class="text-white text-xs font-black uppercase tracking-[0.3em] mb-2">SJUT Registry Access</h2>
                <h1 class="text-white text-xl font-serif font-black leading-tight">Centre Management Portal</h1>
            </div>

            <div class="p-12">
                <!-- Session Status -->
                <x-auth-session-status class="mb-8" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-8">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">Institutional Email</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                               class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold placeholder-slate-300"
                               placeholder="identity@sjut.ac.tz">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <label for="password" class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em]">Secret Key</label>
                            @if (Route::has('password.request'))
                                <a class="text-[9px] font-black text-[#2B579A] uppercase tracking-widest hover:text-black transition-colors" href="{{ route('password.request') }}">
                                    Recovery?
                                </a>
                            @endif
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                               class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold placeholder-slate-300"
                               placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 border-slate-300 text-[#2B579A] focus:ring-[#FDB913]">
                        <label for="remember_me" class="ms-3 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Persist Session</label>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-[#2B579A] text-white py-5 text-[10px] font-black uppercase tracking-[0.4em] hover:bg-[#1a3a63] transition-all shadow-xl active:scale-[0.98]">
                            Establish Connection
                        </button>
                    </div>
                </form>

                <div class="mt-12 text-center">
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest leading-loose">
                        OFFICIAL ACCESS ONLY. ALL COMMUNICATIONS ARE <br> MONITORED BY SJUT SECURITY PROTOCOLS.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
