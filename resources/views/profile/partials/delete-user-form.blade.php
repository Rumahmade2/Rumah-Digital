<section class="space-y-6">
    <header class="border-b border-red-200 dark:border-red-500/20 pb-6">
        <h2 class="text-2xl font-black italic tracking-tight text-red-600 dark:text-red-400">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-2 text-sm text-Rumahmade-grey italic leading-relaxed">
            {{ __('Setelah akun Anda dihapus, semua sumber daya dan data di dalamnya akan dihapus secara permanen. Mohon berhati-hati.') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="py-4 px-10 bg-red-600 hover:bg-red-700 text-white font-black rounded-2xl shadow-xl shadow-red-200 dark:shadow-none hover:scale-105 transition-all transform active:scale-95 uppercase tracking-widest text-xs"
    >{{ __('Hapus Akun Sekarang') }}</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-10 bg-white dark:bg-Rumahmade-darker-grey rounded-[32px] border border-gray-100 dark:border-[#333]">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-black italic tracking-tight text-Rumahmade-black dark:text-white mb-2">
                {{ __('Apakah Anda yakin?') }}
            </h2>

            <p class="text-sm text-Rumahmade-grey italic leading-relaxed mb-8">
                {{ __('Tindakan ini tidak dapat dibatalkan. Silakan masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun secara permanen.') }}
            </p>

            <div class="space-y-2">
                <x-input-label for="password" value="{{ __('Konfirmasi Kata Sandi') }}" class="text-xs font-black uppercase tracking-widest text-Rumahmade-grey ml-1" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="block w-full rounded-2xl border-gray-100 dark:border-[#444] dark:bg-[#1a1a1a] focus:ring-red-500"
                    placeholder="{{ __('Kata Sandi Anda') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-10 flex flex-col md:flex-row justify-end gap-4">
                <button type="button" x-on:click="$dispatch('close')" class="py-4 px-8 border border-gray-200 dark:border-[#444] text-Rumahmade-grey font-black rounded-2xl hover:bg-gray-50 dark:hover:bg-white/5 transition-all uppercase tracking-widest text-xs">
                    {{ __('Batal') }}
                </button>

                <button type="submit" class="py-4 px-8 bg-red-600 hover:bg-red-700 text-white font-black rounded-2xl shadow-xl shadow-red-200 dark:shadow-none transition-all uppercase tracking-widest text-xs">
                    {{ __('Ya, Hapus Akun') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
