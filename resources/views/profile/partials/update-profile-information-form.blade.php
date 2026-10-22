<section class="space-y-8">
    <header class="border-b dark:border-[#333] pb-6">
        <h2 class="text-2xl font-black italic tracking-tight text-Rumahmade-black dark:text-white">
            {{ __('Informasi Profil') }}
        </h2>

        <p class="mt-2 text-sm text-Rumahmade-grey italic leading-relaxed">
            {{ __("Perbarui data diri, foto profil, dan detail rekening untuk mencairkan pendapatan karya Anda.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-8 space-y-8">
        @csrf
        @method('patch')

        {{-- Avatar Section --}}
        <div class="flex flex-col md:flex-row items-center gap-8 bg-gray-50 dark:bg-white/5 p-6 rounded-3xl border border-gray-100 dark:border-[#444]">
            <div class="relative shrink-0 group">
                <img src="{{ auth()->user()->avatar_url }}" alt="Avatar" class="w-24 h-24 md:w-28 md:h-28 aspect-square rounded-[32px] object-cover shadow-2xl border-4 border-white dark:border-[#555] group-hover:rotate-3 transition-transform duration-500" />
                <div class="absolute -bottom-2 -right-2 w-10 h-10 bg-indigo-600 rounded-2xl flex items-center justify-center text-white shadow-lg border-2 border-white dark:border-[#444]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
            </div>
            <div class="flex-1 w-full space-y-2">
                <label for="avatar" class="block text-xs font-black uppercase tracking-widest text-Rumahmade-grey">{{ __('Foto Profil Baru') }}</label>
                <input id="avatar" name="avatar" type="file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-black file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" accept="image/*" />
                <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
                <p class="text-[10px] text-Rumahmade-grey font-medium italic italic">Format: JPG, PNG. Max 2MB.</p>
            </div>
        </div>

        {{-- Basic Info Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <x-input-label for="name" :value="__('Nama Lengkap')" class="text-xs font-black uppercase tracking-widest text-Rumahmade-grey ml-1" />
                <x-text-input id="name" name="name" type="text" class="block w-full rounded-2xl border-gray-100 dark:border-[#444] dark:bg-[#1a1a1a] focus:ring-indigo-500" :value="old('name', auth()->user()->name)" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" />
            </div>

            <div class="space-y-2">
                <x-input-label for="email" :value="__('Alamat Email')" class="text-xs font-black uppercase tracking-widest text-Rumahmade-grey ml-1" />
                <x-text-input id="email" name="email" type="email" class="block w-full rounded-2xl border-gray-100 dark:border-[#444] dark:bg-[#1a1a1a] focus:ring-indigo-500" :value="old('email', auth()->user()->email)" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" />

                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                    <div class="mt-2">
                        <p class="text-sm text-red-500 font-bold italic">
                            {{ __('Email Anda belum diverifikasi.') }}
                            <button form="send-verification" class="underline text-xs text-Rumahmade-grey hover:text-indigo-600">
                                {{ __('Kirim ulang link verifikasi?') }}
                            </button>
                        </p>
                    </div>
                @endif
            </div>

            <div class="md:col-span-2 space-y-2">
                <x-input-label for="occupation" :value="__('Profesi / Keahlian')" class="text-xs font-black uppercase tracking-widest text-Rumahmade-grey ml-1" />
                <x-text-input id="occupation" name="occupation" type="text" class="block w-full rounded-2xl border-gray-100 dark:border-[#444] dark:bg-[#1a1a1a] focus:ring-indigo-500 shadow-sm" :value="old('occupation', auth()->user()->occupation)" placeholder="Contoh: Digital Illustrator, Web Developer" />
                <x-input-error :messages="$errors->get('occupation')" />
            </div>
        </div>

        {{-- Bank Info Section --}}
        <div class="bg-indigo-50/50 dark:bg-indigo-500/5 p-8 rounded-[32px] border border-indigo-100/50 dark:border-indigo-500/20 space-y-6">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-indigo-600 flex items-center justify-center text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                </div>
                <h3 class="font-black italic text-indigo-900 dark:text-indigo-200 uppercase tracking-tight">{{ __('Data Rekening Bank') }}</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <x-input-label for="bank_name" :value="__('Nama Bank')" class="text-[10px] font-black uppercase tracking-widest text-indigo-400" />
                    <x-text-input id="bank_name" name="bank_name" type="text" class="block w-full rounded-2xl border-white dark:border-[#555] dark:bg-[#1a1a1a] shadow-sm" :value="old('bank_name', auth()->user()->bank_name)" placeholder="BCA, Mandiri, BNI, dll" />
                    <x-input-error :messages="$errors->get('bank_name')" />
                </div>
                <div class="space-y-2">
                    <x-input-label for="bank_account" :value="__('Pemilik Rekening')" class="text-[10px] font-black uppercase tracking-widest text-indigo-400" />
                    <x-text-input id="bank_account" name="bank_account" type="text" class="block w-full rounded-2xl border-white dark:border-[#555] dark:bg-[#1a1a1a] shadow-sm" :value="old('bank_account', auth()->user()->bank_account)" placeholder="Nama sesuai di buku tabungan" />
                    <x-input-error :messages="$errors->get('bank_account')" />
                </div>
                <div class="md:col-span-2 space-y-2">
                    <x-input-label for="bank_account_number" :value="__('Nomor Rekening')" class="text-[10px] font-black uppercase tracking-widest text-indigo-400" />
                    <x-text-input id="bank_account_number" name="bank_account_number" type="number" class="block w-full rounded-2xl border-white dark:border-[#555] dark:bg-[#1a1a1a] shadow-sm" :value="old('bank_account_number', auth()->user()->bank_account_number)" placeholder="Masukkan hanya angka" />
                    <x-input-error :messages="$errors->get('bank_account_number')" />
                </div>
            </div>
        </div>

        <div class="flex items-center gap-6 pt-4">
            <button type="submit" class="py-4 px-10 bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-2xl shadow-xl shadow-indigo-200 dark:shadow-none hover:scale-105 transition-all transform active:scale-95">
                {{ __('Simpan Perubahan') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-black italic text-green-600 flex items-center gap-2"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                    {{ __('Berhasil disimpan!') }}
                </p>
            @endif
        </div>
    </form>
</section>
