<section class="coict-card bg-white p-8 border border-slate-200 rounded-xl shadow-sm">
    <header class="mb-8">
        <div class="flex items-center gap-4 mb-4">
            <div class="w-12 h-12 bg-[#2B579A]/10 rounded-lg flex items-center justify-center text-2xl">🔐</div>
            <div>
                <h2 class="text-2xl font-serif font-black text-[#1a3a63]">Update Password</h2>
                <p class="text-slate-600 text-sm mt-1">Ensure your account is using a long, random password to stay secure</p>
            </div>
        </div>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div>
            <label for="update_password_current_password" class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">Current Password</label>
            <input id="update_password_current_password" name="current_password" type="password" 
                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold placeholder-slate-300 rounded-lg"
                   autocomplete="current-password" placeholder="Enter current password">
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <!-- New Password -->
        <div>
            <label for="update_password_password" class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">New Password</label>
            <input id="update_password_password" name="password" type="password"
                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold placeholder-slate-300 rounded-lg"
                   autocomplete="new-password" placeholder="Enter new password">
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="update_password_password_confirmation" class="block text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">Confirm Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 focus:border-[#2B579A] focus:bg-white outline-none transition-all text-sm font-bold placeholder-slate-300 rounded-lg"
                   autocomplete="new-password" placeholder="Confirm new password">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between pt-6 border-t border-slate-100">
            <div class="flex items-center gap-4">
                <button type="submit" class="px-8 py-3 bg-[#2B579A] text-white text-xs font-black uppercase tracking-widest rounded-lg hover:bg-[#1a3a63] transition-all shadow-sm active:scale-[0.98]">
                    Update Password
                </button>

                @if (session('status') === 'password-updated')
                    <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)" 
                         class="flex items-center gap-2 px-4 py-2 bg-green-100 text-green-700 rounded-lg text-sm font-semibold">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Password Updated Successfully
                    </div>
                @endif
            </div>

            <div class="text-[10px] text-slate-400 uppercase tracking-widest">
                🔒 SECURE UPDATE
            </div>
        </div>
    </form>
</section>
