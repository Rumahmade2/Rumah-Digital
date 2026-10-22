<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 text-Rumahmade-black dark:text-white transition-all duration-500">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-12">
            
            {{-- Header --}}
            <div class="flex flex-col md:flex-row justify-between items-center bg-white dark:bg-Rumahmade-darker-grey p-8 rounded-[32px] border border-gray-100 dark:border-[#333] shadow-sm">
                <div class="flex flex-col">
                    <h1 class="text-3xl font-black italic tracking-tighter">{{ __('Pengaturan Profil') }}</h1>
                    <p class="text-Rumahmade-grey text-sm italic">{{ __('Kelola informasi akun, keamanan, dan preferensi pembayaran Anda.') }}</p>
                </div>
                <div class="mt-4 md:mt-0 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-indigo-50 dark:bg-indigo-500/10 flex items-center justify-center text-indigo-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                </div>
            </div>

            {{-- Form Sections --}}
            <div class="space-y-8">
                {{-- Profile Info --}}
                <div class="bg-white dark:bg-Rumahmade-darker-grey p-8 md:p-12 rounded-[32px] border border-gray-100 dark:border-[#333] shadow-xl hover:shadow-2xl transition-all duration-500">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                {{-- Password Update --}}
                <div class="bg-white dark:bg-Rumahmade-darker-grey p-8 md:p-12 rounded-[32px] border border-gray-100 dark:border-[#333] shadow-xl hover:shadow-2xl transition-all duration-500">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                {{-- Delete Account (Carefully styled) --}}
                <div class="bg-red-50 dark:bg-red-500/5 p-8 md:p-12 rounded-[32px] border border-red-100 dark:border-red-500/20 shadow-sm">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
