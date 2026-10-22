<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center p-6 sm:p-0">
        <div class="w-full sm:max-w-md" data-aos="zoom-in">
            <!-- Header Section -->
            <div class="mb-8 text-center">
                <a href="/" class="inline-block mb-6 transform hover:scale-105 transition-transform">
                    <img src="{{ asset('images/logos/RumahDigital.svg') }}"
                        class="h-12 w-auto mx-auto brightness-0 dark:brightness-100" alt="Logo">
                </a>
                <h1 class="text-3xl font-black text-Rumahmade-black dark:text-white mb-2">{{ __('Welcome Back!') }}</h1>
                <p class="text-Rumahmade-grey">{{ __('Silakan masuk untuk melanjutkan petualangan digital Anda.') }}</p>
            </div>

            <!-- Session Status / Pesan Sukses Registrasi -->
            @if(session('status'))
            <div id="reg-success-banner"
                 class="mb-6 flex items-start gap-3 p-4 rounded-2xl border"
                 style="background: linear-gradient(135deg, rgba(16,185,129,0.12), rgba(52,211,153,0.08));
                        border-color: rgba(16,185,129,0.3);
                        animation: slideDown 0.5s cubic-bezier(0.34,1.56,0.64,1) both;">
                <div class="w-8 h-8 rounded-xl flex items-center justify-center shrink-0 mt-0.5"
                     style="background: linear-gradient(135deg, #10b981, #34d399);">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-emerald-400 text-sm">Registrasi Berhasil! 🎉</p>
                    <p class="text-emerald-300/80 text-xs mt-0.5">{{ session('status') }}</p>
                </div>
            </div>
            <style>
                @keyframes slideDown {
                    from { opacity: 0; transform: translateY(-12px); }
                    to   { opacity: 1; transform: translateY(0); }
                }
            </style>
            @endif

            <div
                class="bg-white/70 dark:bg-Rumahmade-darker-grey/50 backdrop-blur-xl p-8 rounded-[32px] border border-white dark:border-white/10 shadow-2xl relative overflow-hidden">
                <!-- Decorative element -->
                <div class="absolute -top-10 -right-10 w-24 h-24 bg-[#B05CB0]/20 rounded-full blur-2xl"></div>

                <form method="POST" action="{{ route('login') }}" class="relative z-10">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-5">
                        <label for="email"
                            class="block text-sm font-bold text-Rumahmade-black dark:text-gray-300 mb-2 ms-1">{{ __('Email Address') }}</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" />
                                </svg>
                            </span>
                            <input id="email"
                                class="block w-full pl-11 pr-4 py-4 rounded-2xl bg-gray-50/50 dark:bg-Rumahmade-black/50 border-gray-200 dark:border-[#444] text-Rumahmade-black dark:text-white placeholder:text-gray-400 focus:ring-2 focus:ring-[#B05CB0] focus:border-transparent transition-all outline-none"
                                type="email" name="email" :value="old('email')" required autofocus
                                placeholder="name@example.com" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-5">
                        <div class="flex items-center justify-between mb-2 ms-1">
                            <label for="password"
                                class="block text-sm font-bold text-Rumahmade-black dark:text-gray-300">{{ __('Password') }}</label>
                            @if (Route::has('password.request'))
                                <a class="text-xs font-bold text-[#B05CB0] hover:text-[#FCB16B] transition-colors"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot?') }}
                                </a>
                            @endif
                        </div>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                            <input id="password"
                                class="block w-full pl-11 pr-4 py-4 rounded-2xl bg-gray-50/50 dark:bg-Rumahmade-black/50 border-gray-200 dark:border-[#444] text-Rumahmade-black dark:text-white placeholder:text-gray-400 focus:ring-2 focus:ring-[#B05CB0] focus:border-transparent transition-all outline-none"
                                type="password" name="password" required placeholder="••••••••" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between mb-8 ms-1">
                        <label for="remember_me" class="inline-flex items-center group cursor-pointer">
                            <input id="remember_me" type="checkbox"
                                class="w-5 h-5 rounded-lg border-gray-300 dark:border-[#444] text-[#B05CB0] shadow-sm focus:ring-[#B05CB0] dark:bg-Rumahmade-black transition-all"
                                name="remember">
                            <span
                                class="ms-3 text-sm font-semibold text-Rumahmade-grey group-hover:text-Rumahmade-black dark:group-hover:text-white transition-colors">{{ __('Ingat saya') }}</span>
                        </label>
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-[#B05CB0] to-[#FCB16B] text-white font-black py-4 px-8 rounded-2xl shadow-xl hover:shadow-2xl hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 text-lg">
                        {{ __('Masuk Sekarang') }}
                    </button>
                </form>
            </div>

            <!-- Footer Section -->
            <p class="mt-8 text-center text-Rumahmade-grey font-medium">
                {{ __('Belum punya akun?') }}
                <a href="{{ route('register') }}"
                    class="text-[#B05CB0] font-bold hover:underline ml-1 transition-all">{{ __('Daftar Gratis') }}</a>
            </p>
        </div>
    </div>

    <!-- Styles to support the custom layout -->
    <style>
        body {
            background-image: radial-gradient(at 0% 0%, hsla(253, 16%, 7%, 1) 0, transparent 50%),
                radial-gradient(at 50% 0%, hsla(225, 39%, 30%, 1) 0, transparent 50%),
                radial-gradient(at 100% 0%, hsla(339, 49%, 30%, 1) 0, transparent 50%);
            background-color: #0d0d0d;
        }

        .dark body {
            background-color: #050505;
        }
    </style>
</x-guest-layout>