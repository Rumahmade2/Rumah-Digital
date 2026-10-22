@extends('front.layouts.app')
@section('title', __('Manfaat') . ' - Rumahmade Marketplace')
@section('content')

    {{-- Hero Section --}}
    <header class="w-full pt-[140px] pb-[80px] relative overflow-hidden">
        <div
            class="absolute top-0 left-1/2 -translate-x-1/2 w-[1200px] h-[600px] bg-gradient-to-br from-[#B05CB0]/20 to-[#FCB16B]/20 blur-[150px] -z-10">
        </div>

        <div class="container max-w-[1130px] mx-auto px-4 text-center">
            <div class="flex flex-col gap-6 items-center" data-aos="fade-up">
                <span
                    class="px-6 py-2 bg-gradient-to-r from-[#B05CB0] to-[#FCB16B] text-white rounded-full font-bold text-xs tracking-widest uppercase shadow-lg">
                    {{ __('Keunggulan Kami') }}
                </span>
                <h1
                    class="font-bold text-[48px] md:text-[64px] leading-tight text-Rumahmade-black dark:text-white max-w-[800px]">
                    {{ __('Mengapa Harus') }} <span
                        class="bg-clip-text text-transparent bg-gradient-to-r from-[#B05CB0] to-[#FCB16B]">Rumahmade</span>?
                </h1>
                <p class="text-xl text-Rumahmade-grey max-w-[600px] font-medium leading-relaxed">
                    {{ __('Kami membangun ekosistem digital terbaik untuk mendukung pertumbuhan ekonomi kreatif di Indonesia.') }}
                </p>
            </div>
        </div>
    </header>

    {{-- Benefits Grid --}}
    <section class="container max-w-[1130px] mx-auto mb-[100px] px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-[30px]">

            {{-- Benefit 1 --}}
            <div class="p-10 bg-white dark:bg-Rumahmade-darker-grey rounded-[30px] border border-gray-100 dark:border-[#414141] shadow-lg dark:shadow-none hover:-translate-y-2 transition-all duration-300 flex flex-col gap-6"
                data-aos="fade-up">
                <div
                    class="w-16 h-16 bg-indigo-500/10 rounded-2xl flex items-center justify-center border border-indigo-500/20">
                    <svg class="w-8 h-8 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-Rumahmade-black dark:text-white">{{ __('Akses Instan & Mudah') }}</h3>
                <p class="text-Rumahmade-grey leading-relaxed">
                    {{ __('Lupakan proses birokrasi yang rumit. Di Rumahmade, setelah pembayaran diverifikasi, aset digital Anda langsung tersedia untuk diunduh dalam hitungan detik.') }}
                </p>
                <div
                    class="mt-auto pt-6 border-t border-gray-100 dark:border-white/5 flex items-center gap-2 text-[#B05CB0] font-bold text-sm uppercase tracking-wider">
                    <span>{{ __('Efisien & Cepat') }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </div>
            </div>

            {{-- Benefit 2 --}}
            <div class="p-10 bg-white dark:bg-Rumahmade-darker-grey rounded-[30px] border border-gray-100 dark:border-[#414141] shadow-lg dark:shadow-none hover:-translate-y-2 transition-all duration-300 flex flex-col gap-6"
                data-aos="fade-up" data-aos-delay="200">
                <div
                    class="w-16 h-16 bg-orange-500/10 rounded-2xl flex items-center justify-center border border-orange-500/20">
                    <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-Rumahmade-black dark:text-white">{{ __('Kualitas Produk Terjamin') }}
                </h3>
                <p class="text-Rumahmade-grey leading-relaxed">
                    {{ __('Kami mengutamakan kualitas di atas kuantitas. Setiap produk di Rumahmade melewati seleksi ketat untuk memastikan standar desain dan teknis yang tinggi.') }}
                </p>
                <div
                    class="mt-auto pt-6 border-t border-gray-100 dark:border-white/5 flex items-center gap-2 text-[#FCB16B] font-bold text-sm uppercase tracking-wider">
                    <span>{{ __('Premium Only') }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </div>
            </div>

            {{-- Benefit 3 --}}
            <div class="p-10 bg-white dark:bg-Rumahmade-darker-grey rounded-[30px] border border-gray-100 dark:border-[#414141] shadow-lg dark:shadow-none hover:-translate-y-2 transition-all duration-300 flex flex-col gap-6"
                data-aos="fade-up" data-aos-delay="400">
                <div
                    class="w-16 h-16 bg-pink-500/10 rounded-2xl flex items-center justify-center border border-pink-500/20">
                    <svg class="w-8 h-8 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-Rumahmade-black dark:text-white">{{ __('Bagi Hasil Transparan') }}</h3>
                <p class="text-Rumahmade-grey leading-relaxed">
                    {{ __('Bagi Kreator, kami memberikan skema bagi hasil yang paling kompetitif. Tidak ada biaya tersembunyi, semua pendapatan Anda bisa dipantau langsung melalui dasbor.') }}
                </p>
                <div
                    class="mt-auto pt-6 border-t border-gray-100 dark:border-white/5 flex items-center gap-2 text-pink-500 font-bold text-sm uppercase tracking-wider">
                    <span>{{ __('Adil & Menguntungkan') }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </div>
            </div>

            {{-- Benefit 4 --}}
            <div class="p-10 bg-white dark:bg-Rumahmade-darker-grey rounded-[30px] border border-gray-100 dark:border-[#414141] shadow-lg dark:shadow-none hover:-translate-y-2 transition-all duration-300 flex flex-col gap-6"
                data-aos="fade-up" data-aos-delay="600">
                <div
                    class="w-16 h-16 bg-teal-500/10 rounded-2xl flex items-center justify-center border border-teal-500/20">
                    <svg class="w-8 h-8 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-Rumahmade-black dark:text-white">{{ __('Dukungan Komunitas') }}</h3>
                <p class="text-Rumahmade-grey leading-relaxed">
                    {{ __('Bergabunglah dengan ribuan talenta digital Indonesia. Kami aktif membantu pemasaran produk Anda melalui berbagai channel sosial media kami.') }}
                </p>
                <div
                    class="mt-auto pt-6 border-t border-gray-100 dark:border-white/5 flex items-center gap-2 text-teal-500 font-bold text-sm uppercase tracking-wider">
                    <span>{{ __('Growing Together') }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </div>
            </div>

        </div>
    </section>

    {{-- CTA Section --}}
    <section class="container max-w-[1130px] mx-auto mb-[100px] px-4" data-aos="zoom-in">
        <div
            class="bg-gradient-to-r from-[#B05CB0] to-[#FCB16B] rounded-[20px] p-10 md:p-16 text-center text-white relative overflow-hidden">
            <div class="relative z-10 flex flex-col gap-6 items-center">
                <h2 class="text-2xl md:text-4xl font-semibold leading-snug max-w-[700px]">
                    {{ __('Siap Memberikan Sentuhan Terbaik untuk Proyek Anda?') }}
                </h2>
                <p class="text-white/70 text-base max-w-[500px]">
                    {{ __('Jelajahi ribuan aset digital berkualitas dari kreator lokal terbaik di Rumahmade.') }}
                </p>
                <div class="flex justify-center mt-2">
                    <a href="{{ route('front.index') }}"
                        class="px-8 py-3.5 bg-white text-Rumahmade-black rounded-full font-bold text-sm hover:bg-gray-100 transition-all shadow-lg shadow-black/10">
                        {{ __('Mulai Eksplorasi') }} →
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection