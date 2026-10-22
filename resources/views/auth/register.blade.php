<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center p-4 py-16 sm:p-8">
        <div class="w-full max-w-2xl" data-aos="fade-up">

            <!-- Header -->
            <div class="text-center mb-10">
                <a href="/" class="inline-block mb-6 hover:scale-105 transition-transform">
                    <img src="{{ asset('images/logos/RumahDigital.svg') }}"
                        class="h-10 w-auto mx-auto brightness-0 dark:brightness-100" alt="Logo">
                </a>
                <h1 class="text-4xl font-black text-white mb-2">
                    {{ __('Bergabung Sekarang') }}
                </h1>
                <p class="text-rumahmade-grey">{{ __('Pilih peran Anda dan mulai perjalanan di Rumahmade.') }}</p>
            </div>

            <!-- Form Card -->
            <div
                class="bg-white/80 dark:bg-rumahmade-darker-grey/60 backdrop-blur-3xl p-8 sm:p-10 rounded-[40px] border border-white/20 dark:border-white/5 shadow-2xl space-y-10">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-10"
                    autocomplete="nope">
                    @csrf

                    {{-- Section 0: Pilih Peran --}}
                    <section class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span
                                class="px-3 py-1 rounded-full bg-violet-500/10 text-violet-500 text-xs font-black uppercase tracking-widest">00</span>
                            <h2 class="text-lg font-bold text-rumahmade-black dark:text-white">{{ __('Pilih Peran') }}
                            </h2>
                        </div>
                        <div class="grid grid-cols-2 gap-4" id="role-selector">
                            <!-- Penjual Card -->
                            <label for="role_penjual" class="role-card cursor-pointer rounded-3xl p-5 border-2 transition-all duration-300 flex flex-col items-center gap-3 text-center
                                border-[#B05CB0] bg-[#B05CB0]/5
                                dark:border-[#B05CB0] dark:bg-[#B05CB0]/10" id="card-penjual">
                                <input type="radio" name="role" id="role_penjual" value="penjual" class="hidden" checked
                                    onchange="handleRoleChange(this.value)">
                                <div
                                    class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#B05CB0] to-[#FCB16B] flex items-center justify-center shadow-lg">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-black text-rumahmade-black dark:text-white text-base">
                                        {{ __('Penjual') }}</p>
                                    <p class="text-xs text-rumahmade-grey mt-1">{{ __('Jual produk digital kamu') }}</p>
                                </div>
                                <div class="check-icon w-6 h-6 rounded-full bg-[#B05CB0] flex items-center justify-center opacity-100 transition-all"
                                    id="check-penjual">
                                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                            </label>

                            <!-- Pembeli Card -->
                            <label for="role_pembeli" class="role-card cursor-pointer rounded-3xl p-5 border-2 transition-all duration-300 flex flex-col items-center gap-3 text-center
                                border-gray-200 bg-gray-50/50
                                dark:border-white/10 dark:bg-black/20" id="card-pembeli">
                                <input type="radio" name="role" id="role_pembeli" value="pembeli" class="hidden"
                                    onchange="handleRoleChange(this.value)">
                                <div
                                    class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#3B82F6] to-[#A78BFA] flex items-center justify-center shadow-lg">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-black text-rumahmade-black dark:text-white text-base">
                                        {{ __('Pembeli') }}</p>
                                    <p class="text-xs text-rumahmade-grey mt-1">{{ __('Temukan produk impianmu') }}</p>
                                </div>
                                <div class="check-icon w-6 h-6 rounded-full bg-[#3B82F6] flex items-center justify-center opacity-0 transition-all"
                                    id="check-pembeli">
                                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                            </label>
                        </div>
                        <x-input-error :messages="$errors->get('role')" class="mt-1" />
                    </section>

                    <div class="border-t border-gray-100 dark:border-white/5"></div>

                    <!-- Section 1: Profile -->
                    <section class="space-y-6">
                        <div class="flex items-center gap-3">
                            <span
                                class="px-3 py-1 rounded-full bg-[#B05CB0]/10 text-[#B05CB0] text-xs font-black uppercase tracking-widest">01</span>
                            <h2 class="text-lg font-bold text-rumahmade-black dark:text-white">{{ __('Info Profil') }}
                            </h2>
                        </div>

                        <!-- Avatar -->
                        <div
                            class="flex items-center gap-5 p-5 rounded-3xl bg-gray-50/50 dark:bg-black/20 border border-gray-100 dark:border-white/5">
                            <div class="relative flex-shrink-0">
                                <div
                                    class="w-20 h-20 bg-gray-200 dark:bg-[#222] rounded-2xl overflow-hidden flex items-center justify-center border border-white/10">
                                    <img id="avatar-preview" src="{{ asset('images/icons/user.svg') }}"
                                        class="w-10 h-10 opacity-20 object-cover" alt="preview">
                                </div>
                                <label
                                    class="absolute -bottom-2 -right-2 w-8 h-8 bg-gradient-to-br from-[#B05CB0] to-[#FCB16B] text-white rounded-xl flex items-center justify-center cursor-pointer shadow-md hover:scale-110 transition-transform">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    <input type="file" name="avatar" class="hidden" accept="image/*"
                                        onchange="window.previewAvatar(this)">
                                </label>
                            </div>
                            <div>
                                <p class="font-bold text-rumahmade-black dark:text-white">{{ __('Foto Profil') }}</p>
                                <p class="text-sm text-rumahmade-grey">{{ __('Upload foto terbaik Anda.') }}</p>
                                <x-input-error :messages="$errors->get('avatar')" class="mt-1" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="space-y-2">
                                <label
                                    class="text-xs font-black text-rumahmade-grey uppercase tracking-widest ml-1">{{ __('Nama Lengkap') }}</label>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                    class="block w-full px-5 py-3.5 rounded-2xl bg-gray-50 dark:bg-rumahmade-black/40 border border-transparent text-rumahmade-black dark:text-white placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#B05CB0] transition-all"
                                    placeholder="Made Widhiyana" autocomplete="off">
                                <x-input-error :messages="$errors->get('name')" class="mt-1" />
                            </div>

                            <div class="space-y-2">
                                <label
                                    class="text-xs font-black text-rumahmade-grey uppercase tracking-widest ml-1">{{ __('Pekerjaan') }}</label>
                                <input type="text" name="occupation" value="{{ old('occupation') }}" required
                                    class="block w-full px-5 py-3.5 rounded-2xl bg-gray-50 dark:bg-rumahmade-black/40 border border-transparent text-rumahmade-black dark:text-white placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#B05CB0] transition-all"
                                    placeholder="UI Designer" autocomplete="off">
                                <x-input-error :messages="$errors->get('occupation')" class="mt-1" />
                            </div>

                            <div class="sm:col-span-2 space-y-2">
                                <label
                                    class="text-xs font-black text-rumahmade-grey uppercase tracking-widest ml-1">{{ __('Email') }}</label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                    class="block w-full px-5 py-3.5 rounded-2xl bg-gray-50 dark:bg-rumahmade-black/40 border border-transparent text-rumahmade-black dark:text-white placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#B05CB0] transition-all"
                                    placeholder="hello@rumahmade.com" autocomplete="nope">
                                <x-input-error :messages="$errors->get('email')" class="mt-1" />
                            </div>
                        </div>
                    </section>

                    <div class="border-t border-gray-100 dark:border-white/5"></div>

                    <!-- Section 2: Payout (Only for Seller) -->
                    <section class="space-y-6 transition-all duration-500 overflow-hidden" id="section-rekening">
                        <div class="flex items-center gap-3">
                            <span
                                class="px-3 py-1 rounded-full bg-[#FCB16B]/10 text-[#FCB16B] text-xs font-black uppercase tracking-widest">02</span>
                            <h2 class="text-lg font-bold text-rumahmade-black dark:text-white">{{ __('Info Rekening') }}
                            </h2>
                        </div>

                        <div
                            class="p-4 rounded-2xl bg-amber-50 dark:bg-amber-500/10 border border-amber-200 dark:border-amber-500/20 flex items-start gap-3">
                            <svg class="w-5 h-5 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-xs text-amber-700 dark:text-amber-400">
                                {{ __('Rekening digunakan untuk menerima pembayaran dari produk yang kamu jual.') }}</p>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="space-y-2">
                                <label
                                    class="text-xs font-black text-rumahmade-grey uppercase tracking-widest ml-1">{{ __('Bank') }}</label>
                                <input type="text" name="bank_name" value="{{ old('bank_name') }}" id="input-bank_name"
                                    class="block w-full px-5 py-3.5 rounded-2xl bg-gray-50 dark:bg-rumahmade-black/40 border border-transparent text-rumahmade-black dark:text-white placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#FCB16B] transition-all"
                                    placeholder="BCA, Mandiri, BRI">
                                <x-input-error :messages="$errors->get('bank_name')" class="mt-1" />
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="text-xs font-black text-rumahmade-grey uppercase tracking-widest ml-1">{{ __('Nama Pemilik') }}</label>
                                <input type="text" name="bank_account" value="{{ old('bank_account') }}"
                                    id="input-bank_account"
                                    class="block w-full px-5 py-3.5 rounded-2xl bg-gray-50 dark:bg-rumahmade-black/40 border border-transparent text-rumahmade-black dark:text-white placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#FCB16B] transition-all"
                                    placeholder="Sesuai Rekening">
                                <x-input-error :messages="$errors->get('bank_account')" class="mt-1" />
                            </div>
                            <div class="sm:col-span-2 space-y-2">
                                <label
                                    class="text-xs font-black text-rumahmade-grey uppercase tracking-widest ml-1">{{ __('Nomor Rekening') }}</label>
                                <input type="number" name="bank_account_number" value="{{ old('bank_account_number') }}"
                                    id="input-bank_account_number"
                                    class="block w-full px-5 py-3.5 rounded-2xl bg-gray-50 dark:bg-rumahmade-black/40 border border-transparent text-rumahmade-black dark:text-white placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#FCB16B] transition-all [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                                    placeholder="0000 0000 0000">
                                <x-input-error :messages="$errors->get('bank_account_number')" class="mt-1" />
                            </div>
                        </div>
                    </section>

                    <div class="border-t border-gray-100 dark:border-white/5" id="divider-rekening"></div>

                    <!-- Section 3: Security -->
                    <section class="space-y-6">
                        <div class="flex items-center gap-3">
                            <span
                                class="px-3 py-1 rounded-full bg-red-500/10 text-red-500 text-xs font-black uppercase tracking-widest"
                                id="security-step-num">03</span>
                            <h2 class="text-lg font-bold text-rumahmade-black dark:text-white">{{ __('Password') }}</h2>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="space-y-2">
                                <label
                                    class="text-xs font-black text-rumahmade-grey uppercase tracking-widest ml-1">{{ __('Password Baru') }}</label>
                                <input type="password" name="password" required
                                    class="block w-full px-5 py-3.5 rounded-2xl bg-gray-50 dark:bg-rumahmade-black/40 border border-transparent text-rumahmade-black dark:text-white placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 transition-all"
                                    placeholder="••••••••" autocomplete="new-password">
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="text-xs font-black text-rumahmade-grey uppercase tracking-widest ml-1">{{ __('Konfirmasi') }}</label>
                                <input type="password" name="password_confirmation" required
                                    class="block w-full px-5 py-3.5 rounded-2xl bg-gray-50 dark:bg-rumahmade-black/40 border border-transparent text-rumahmade-black dark:text-white placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 transition-all"
                                    placeholder="••••••••" autocomplete="new-password">
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </section>

                    <!-- Submit -->
                    <div class="pt-2 space-y-5">
                        <button type="submit"
                            class="group relative w-full overflow-hidden flex items-center justify-center py-4 px-8 bg-gradient-to-r from-[#B05CB0] to-[#FCB16B] text-white font-black rounded-[24px] shadow-[0_15px_40px_rgba(176,92,176,0.3)] hover:shadow-[0_15px_40px_rgba(252,177,107,0.4)] hover:scale-[1.02] active:scale-[0.98] transition-all duration-500 text-lg"
                            id="submit-btn">
                            <div
                                class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                            </div>
                            <!-- State: Normal -->
                            <span class="relative z-10 flex items-center gap-3" id="btn-label-normal">
                                {{ __('Daftar Sekarang') }}
                                <svg class="w-5 h-5 group-hover:translate-x-2 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </span>
                            <!-- State: Loading (hidden by default) -->
                            <span class="relative z-10 hidden items-center gap-3" id="btn-label-loading">
                                <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                                </svg>
                                {{ __('Mendaftarkan...') }}
                            </span>
                        </button>

                        <p class="text-center text-rumahmade-grey">
                            {{ __('Sudah punya akun?') }}
                            <a href="{{ route('login') }}"
                                class="text-[#B05CB0] hover:text-[#FCB16B] transition-colors ml-1 font-bold">{{ __('Masuk Disini') }}</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ===== SUCCESS OVERLAY ===== -->
    <div id="success-overlay" class="fixed inset-0 z-50 hidden items-center justify-center" style="background: rgba(0,0,0,0.85); backdrop-filter: blur(12px);">
        <div id="success-card" class="text-center px-10 py-14 rounded-[40px] border border-white/10 shadow-2xl max-w-sm w-full mx-4"
             style="background: linear-gradient(135deg, rgba(176,92,176,0.15), rgba(252,177,107,0.1)); opacity:0; transform: scale(0.8) translateY(30px); transition: all 0.5s cubic-bezier(0.34,1.56,0.64,1);">
            <!-- Checkmark circle -->
            <div class="w-24 h-24 rounded-full mx-auto mb-6 flex items-center justify-center" style="background: linear-gradient(135deg, #B05CB0, #FCB16B); box-shadow: 0 0 60px rgba(176,92,176,0.5);">
                <svg id="check-svg" class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="stroke-dasharray:40; stroke-dashoffset:40; transition: stroke-dashoffset 0.6s ease 0.3s;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <h2 class="text-3xl font-black text-white mb-2">{{ __('Selamat datang! 🎉') }}</h2>
            <p class="text-rumahmade-grey mb-8">{{ __('Akun kamu berhasil dibuat. Sedang masuk...') }}</p>
            <!-- Progress bar -->
            <div class="w-full h-1.5 rounded-full overflow-hidden" style="background: rgba(255,255,255,0.1);">
                <div id="progress-bar" class="h-full rounded-full" style="background: linear-gradient(90deg, #B05CB0, #FCB16B); width: 0%; transition: width 1.8s linear;"></div>
            </div>
        </div>
    </div>

    <style>
        body {
            background-image: radial-gradient(at 0% 0%, hsla(253, 16%, 7%, 1) 0, transparent 50%),
                radial-gradient(at 50% 0%, hsla(225, 39%, 30%, 1) 0, transparent 50%),
                radial-gradient(at 100% 0%, hsla(339, 49%, 30%, 1) 0, transparent 50%);
            background-color: #0d0d0d;
            background-attachment: fixed;
        }

        .role-card {
            user-select: none;
        }

        /* Spinner animation for submit button */
        @keyframes spin {
            from { transform: rotate(0deg); }
            to   { transform: rotate(360deg); }
        }
        .animate-spin { animation: spin 0.8s linear infinite; }
    </style>

    <script>
        // ===== PREVIEW FOTO PROFIL (Base64 Reader) =====
        window.previewAvatar = function(input) {
            const f = input.files[0];
            const p = document.getElementById('avatar-preview');
            if (f && p) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    p.src = e.target.result;
                    p.style.width = '100%';
                    p.style.height = '100%';
                    p.style.opacity = '1';
                    p.style.objectFit = 'cover';
                    p.className = 'w-full h-full object-cover transition-opacity duration-300';
                };
                reader.readAsDataURL(f);
            }
        };

        // ===== ANIMASI SUBMIT FORM =====
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            const btn  = document.getElementById('submit-btn');

            form.addEventListener('submit', function (e) {
                // Cek validasi HTML5 dulu
                if (!form.checkValidity()) return;

                // Ganti label tombol ke loading
                const labelNormal  = document.getElementById('btn-label-normal');
                const labelLoading = document.getElementById('btn-label-loading');
                labelNormal.classList.add('hidden');
                labelLoading.classList.remove('hidden');
                labelLoading.classList.add('flex');
                btn.disabled = true;
                btn.classList.remove('hover:scale-[1.02]', 'active:scale-[0.98]');
                btn.style.opacity = '0.85';

                // Jika ada error dari server (flash), jangan tampilkan overlay
                // Overlay hanya ditampilkan jika kita yakin form valid
            });
        });

        // ===== TAMPILKAN OVERLAY SUKSES (dipanggil dari Blade jika registrasi berhasil) =====
        // Karena redirect dilakukan server, kita tidak bisa intercept.
        // Animasi ini tampil sebelum submit (tombol loading saja).
        // Untuk sukses overlay, kita bisa cek session flash di halaman tujuan.

        function handleRoleChange(role) {
            const sectionRekening = document.getElementById('section-rekening');
            const dividerRekening = document.getElementById('divider-rekening');
            const cardPenjual = document.getElementById('card-penjual');
            const cardPembeli = document.getElementById('card-pembeli');
            const checkPenjual = document.getElementById('check-penjual');
            const checkPembeli = document.getElementById('check-pembeli');
            const stepNum = document.getElementById('security-step-num');

            const bankName = document.getElementById('input-bank_name');
            const bankAccount = document.getElementById('input-bank_account');
            const bankAccountNumber = document.getElementById('input-bank_account_number');

            if (role === 'penjual') {
                // Show rekening section
                sectionRekening.style.maxHeight = sectionRekening.scrollHeight + 'px';
                sectionRekening.style.opacity = '1';
                dividerRekening.style.display = '';
                // Make fields required
                bankName.required = true;
                bankAccount.required = true;
                bankAccountNumber.required = true;
                stepNum.textContent = '03';

                // Style cards
                cardPenjual.classList.remove('border-gray-200', 'dark:border-white/10', 'bg-gray-50/50', 'dark:bg-black/20');
                cardPenjual.classList.add('border-[#B05CB0]', 'bg-[#B05CB0]/5', 'dark:border-[#B05CB0]', 'dark:bg-[#B05CB0]/10');
                cardPembeli.classList.remove('border-[#3B82F6]', 'bg-[#3B82F6]/5', 'dark:border-[#3B82F6]', 'dark:bg-[#3B82F6]/10');
                cardPembeli.classList.add('border-gray-200', 'dark:border-white/10', 'bg-gray-50/50', 'dark:bg-black/20');

                checkPenjual.style.opacity = '1';
                checkPembeli.style.opacity = '0';
            } else {
                // Hide rekening section
                sectionRekening.style.maxHeight = '0';
                sectionRekening.style.opacity = '0';
                dividerRekening.style.display = 'none';
                // Remove required
                bankName.required = false;
                bankAccount.required = false;
                bankAccountNumber.required = false;
                stepNum.textContent = '02';

                // Style cards
                cardPembeli.classList.remove('border-gray-200', 'dark:border-white/10', 'bg-gray-50/50', 'dark:bg-black/20');
                cardPembeli.classList.add('border-[#3B82F6]', 'bg-[#3B82F6]/5', 'dark:border-[#3B82F6]', 'dark:bg-[#3B82F6]/10');
                cardPenjual.classList.remove('border-[#B05CB0]', 'bg-[#B05CB0]/5', 'dark:border-[#B05CB0]', 'dark:bg-[#B05CB0]/10');
                cardPenjual.classList.add('border-gray-200', 'dark:border-white/10', 'bg-gray-50/50', 'dark:bg-black/20');

                checkPembeli.style.opacity = '1';
                checkPenjual.style.opacity = '0';

                // Update submit button gradient for buyer
                document.getElementById('submit-btn').classList.remove('from-[#B05CB0]', 'to-[#FCB16B]');
                document.getElementById('submit-btn').classList.add('from-[#3B82F6]', 'to-[#A78BFA]');
            }

            if (role === 'penjual') {
                document.getElementById('submit-btn').classList.remove('from-[#3B82F6]', 'to-[#A78BFA]');
                document.getElementById('submit-btn').classList.add('from-[#B05CB0]', 'to-[#FCB16B]');
            }
        }

        // Init section height on load
        document.addEventListener('DOMContentLoaded', function () {
            const sec = document.getElementById('section-rekening');
            sec.style.maxHeight = sec.scrollHeight + 'px';
            sec.style.opacity = '1';
            sec.style.overflow = 'hidden';
        });
    </script>
</x-guest-layout>