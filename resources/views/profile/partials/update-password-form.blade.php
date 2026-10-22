<section class="space-y-8">
    <header class="border-b dark:border-[#333] pb-6">
        <h2 class="text-2xl font-black italic tracking-tight text-Rumahmade-black dark:text-white">
            {{ __('Keamanan Akun') }}
        </h2>

        <p class="mt-2 text-sm text-Rumahmade-grey italic leading-relaxed">
            {{ __('Pastikan akun Anda tetap aman dengan menggunakan kata sandi yang kuat dan unik.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-8 space-y-6">
        @csrf
        @method('put')

        <div class="space-y-2">
            <x-input-label for="update_password_current_password" :value="__('Kata Sandi Saat Ini')" class="text-xs font-black uppercase tracking-widest text-Rumahmade-grey ml-1" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="block w-full rounded-2xl border-gray-100 dark:border-[#444] dark:bg-[#1a1a1a] focus:ring-indigo-500" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="space-y-2">
            <x-input-label for="update_password_password" :value="__('Kata Sandi Baru')" class="text-xs font-black uppercase tracking-widest text-Rumahmade-grey ml-1" />
            <x-text-input id="update_password_password" name="password" type="password" class="block w-full rounded-2xl border-gray-100 dark:border-[#444] dark:bg-[#1a1a1a] focus:ring-indigo-500" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="space-y-2">
            <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Kata Sandi Baru')" class="text-xs font-black uppercase tracking-widest text-Rumahmade-grey ml-1" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="block w-full rounded-2xl border-gray-100 dark:border-[#444] dark:bg-[#1a1a1a] focus:ring-indigo-500" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-6 pt-4">
            <button type="submit" class="py-4 px-10 bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-2xl shadow-xl shadow-indigo-200 dark:shadow-none hover:scale-105 transition-all transform active:scale-95">
                {{ __('Update Kata Sandi') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-black italic text-green-600 flex items-center gap-2"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
