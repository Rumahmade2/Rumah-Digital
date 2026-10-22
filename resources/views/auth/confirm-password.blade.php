<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center p-4 sm:p-8">
        <div class="w-full max-w-md" data-aos="fade-up">
            <div class="text-center mb-10">
                <a href="/" class="inline-block mb-6 hover:scale-105 transition-transform">
                    <img src="{{ asset('images/logos/RumahDigital.svg') }}" class="h-10 w-auto mx-auto brightness-0 dark:brightness-100" alt="Logo">
                </a>
                <h1 class="text-3xl font-black text-Rumahmade-black dark:text-white mb-2">{{ __('Konfirmasi Password') }}</h1>
                <p class="text-Rumahmade-grey text-sm">{{ __('Mohon konfirmasi password Anda sebelum melanjutkan.') }}</p>
            </div>

            <div class="bg-white/80 dark:bg-Rumahmade-darker-grey/60 backdrop-blur-3xl p-8 sm:p-10 rounded-[40px] border border-white/20 dark:border-white/5 shadow-2xl">
                <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
                    @csrf

                    <div class="space-y-2">
                        <label for="password" class="text-xs font-black text-Rumahmade-grey uppercase tracking-widest ml-1">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="block w-full px-6 py-4 rounded-[20px] bg-gray-50 dark:bg-Rumahmade-black/40 border-transparent dark:border-white/5 text-Rumahmade-black dark:text-white placeholder:text-gray-400 focus:bg-white dark:focus:bg-Rumahmade-black focus:ring-2 focus:ring-[#B05CB0] outline-none transition-all"
                            placeholder="••••••••" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <button type="submit" class="group relative w-full overflow-hidden flex items-center justify-center py-5 px-8 bg-gradient-to-r from-[#B05CB0] to-[#FCB16B] text-white font-black rounded-[28px] shadow-[0_20px_50px_rgba(176,92,176,0.3)] hover:scale-[1.02] active:scale-[0.98] transition-all duration-500 text-lg">
                        <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>
                        <span class="relative z-10">{{ __('Konfirmasi') }}</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <style>
        body {
            background-image: radial-gradient(at 0% 0%, hsla(253,16%,7%,1) 0, transparent 50%), 
                              radial-gradient(at 50% 0%, hsla(225,39%,30%,1) 0, transparent 50%), 
                              radial-gradient(at 100% 0%, hsla(339,49%,30%,1) 0, transparent 50%);
            background-color: #0d0d0d;
            background-attachment: fixed;
        }
    </style>
</x-guest-layout>
