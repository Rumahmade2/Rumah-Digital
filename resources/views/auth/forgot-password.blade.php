<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center p-4 sm:p-8">
        <div class="w-full max-w-md" data-aos="fade-up">
            <div class="text-center mb-10">
                <a href="/" class="inline-block mb-6 hover:scale-105 transition-transform">
                    <img src="{{ asset('images/logos/RumahDigital.svg') }}" class="h-10 w-auto mx-auto brightness-0 dark:brightness-100" alt="Logo">
                </a>
                <h1 class="text-3xl font-black text-Rumahmade-black dark:text-white mb-2">{{ __('Lupa Password?') }}</h1>
                <p class="text-Rumahmade-grey text-sm">{{ __('Kami akan kirimkan link reset password ke email Anda.') }}</p>
            </div>

            <div class="bg-white/80 dark:bg-Rumahmade-darker-grey/60 backdrop-blur-3xl p-8 sm:p-10 rounded-[40px] border border-white/20 dark:border-white/5 shadow-2xl">
                <!-- Session Status -->
                <x-auth-session-status class="mb-6" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf

                    <div class="space-y-2">
                        <label for="email" class="text-xs font-black text-Rumahmade-grey uppercase tracking-widest ml-1">{{ __('Email Address') }}</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            class="block w-full px-6 py-4 rounded-[20px] bg-gray-50 dark:bg-Rumahmade-black/40 border-transparent dark:border-white/5 text-Rumahmade-black dark:text-white placeholder:text-gray-400 focus:bg-white dark:focus:bg-Rumahmade-black focus:ring-2 focus:ring-[#B05CB0] outline-none transition-all"
                            placeholder="hello@rumahmade.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <button type="submit" class="group relative w-full overflow-hidden flex items-center justify-center py-5 px-8 bg-gradient-to-r from-[#B05CB0] to-[#FCB16B] text-white font-black rounded-[28px] shadow-[0_20px_50px_rgba(176,92,176,0.3)] hover:shadow-[0_20px_50px_rgba(252,177,107,0.4)] hover:scale-[1.02] active:scale-[0.98] transition-all duration-500 text-lg">
                        <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>
                        <span class="relative z-10">{{ __('Kirim Link Reset') }}</span>
                        <svg class="relative z-10 w-5 h-5 ml-3 group-hover:translate-x-2 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </button>

                    <p class="text-center text-Rumahmade-grey font-semibold">
                        <a href="{{ route('login') }}" class="text-[#B05CB0] hover:text-[#FCB16B] transition-colors font-bold">← {{ __('Kembali ke Login') }}</a>
                    </p>
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
