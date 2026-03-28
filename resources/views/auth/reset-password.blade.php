<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center p-6 bg-cover bg-center relative" style="background-image: url('https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80&w=2000');">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-[#1a3a63]/80 backdrop-blur-sm"></div>

        <!-- Reset Card -->
        <div class="relative z-10 w-full max-w-[450px] bg-white shadow-2xl overflow-hidden animate-fade-in-up">
            <!-- Branding Header -->
            <div class="bg-[#1a3a63] p-12 text-center border-b-8 border-[#FDB913]">
                <div class="text-4xl mb-6">🔐</div>
                <h2 class="text-white text-xs font-black uppercase tracking-[0.3em] mb-2">Password Reset</h2>
                <h1 class="text-white text-xl font-serif font-black leading-tight">Create New Password</h1>
            </div>

            <div class="p-12">
                <div class="mb-8 text-[11px] font-medium text-slate-500 leading-relaxed uppercase tracking-wider">
                    Enter your email and create a new secure password for your account.
                </div>

                <form method="POST" action="{{ route('password.store') }}" class="space-y-8">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">Institutional Email</label>
                        <input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus 
                               class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold placeholder-slate-300"
                               placeholder="identity@sjut.ac.tz">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">New Password</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                               class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold placeholder-slate-300"
                               placeholder="Enter new password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                               class="w-full px-6 py-4 bg-slate-50 border border-slate-100 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold placeholder-slate-300"
                               placeholder="Confirm new password">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-[#2B579A] text-white py-5 text-[10px] font-black uppercase tracking-[0.4em] hover:bg-[#1a3a63] transition-all shadow-xl active:scale-[0.98]">
                            Reset Password
                        </button>
                    </div>

                    <div class="text-center pt-4">
                        <a href="{{ route('login') }}" class="text-[10px] font-black text-[#2B579A] uppercase tracking-widest hover:text-black transition-colors">
                            Return to Login
                        </a>
                    </div>
                </form>

                <div class="mt-12 text-center pt-8 border-t border-slate-50">
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest leading-loose">
                        SECURE RESET PROTOCOL ACTIVE. <br> LOGGED BY SJUT SECURITY SYSTEMS.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
