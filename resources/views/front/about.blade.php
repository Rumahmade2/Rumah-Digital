@extends('front.layouts.app')
@section('title', __('Tentang Kami') . ' - Rumahmade')
@section('content')

    {{-- Hero Section --}}
    <header class="w-full pt-[160px] pb-[80px] relative overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] bg-gradient-to-br from-[#B05CB0]/10 to-[#FCB16B]/10 blur-[120px] -z-10"></div>
        
        <div class="container max-w-[900px] mx-auto px-4 relative z-10 text-center">
            <div class="flex flex-col gap-8 items-center" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white dark:bg-Rumahmade-darker-grey border border-gray-100 dark:border-white/10 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-[#B05CB0] animate-pulse"></span>
                    <span class="text-xs font-bold text-Rumahmade-grey uppercase tracking-widest">{{ __('Cerita Kami') }}</span>
                </div>
                <h1 class="font-bold text-5xl md:text-7xl leading-tight text-Rumahmade-black dark:text-white transition-all duration-500">
                    {{ __('Membangun') }} <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#B05CB0] to-[#FCB16B]">{{ __('Ekosistem Kreatif') }}</span> {{ __('Tanpa Batas') }}
                </h1>
                <p class="text-xl text-Rumahmade-grey leading-relaxed max-w-[700px]">
                    {{ __('Rumahmade lahir dari kegelisahan akan sulitnya akses bagi kreator lokal untuk memasarkan karya digital secara profesional dan adil.') }}
                </p>
            </div>
        </div>
    </header>

    {{-- Vision & Mission --}}
    <section class="container max-w-[1130px] mx-auto mb-[120px] px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="relative rounded-[40px] overflow-hidden group shadow-2xl" data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="About Image" class="w-full h-full object-cover grayscale transition-all duration-700 group-hover:grayscale-0 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <div class="absolute bottom-10 left-10 text-white">
                    <p class="text-xs font-bold uppercase tracking-widest opacity-80 mb-2">{{ __('Berdiri Sejak') }}</p>
                    <p class="text-3xl font-bold italic">2022. Bali, Indonesia.</p>
                </div>
            </div>

            <div class="flex flex-col gap-10" data-aos="fade-left">
                <div class="flex flex-col gap-4">
                    <h2 class="text-4xl font-bold text-Rumahmade-black dark:text-white">{{ __('Visi Kami') }}</h2>
                    <p class="text-lg text-Rumahmade-grey leading-loose italic border-l-4 border-[#B05CB0] pl-6">
                        "{{ __('Menjadi jembatan utama bagi talenta digital Indonesia untuk menjangkau pasar dunia dengan cara yang lebih bermakna.') }}"
                    </p>
                </div>
                
                <div class="flex flex-col gap-6">
                    <h2 class="text-4xl font-bold text-Rumahmade-black dark:text-white">{{ __('Misi Kami') }}</h2>
                    <ul class="flex flex-col gap-6">
                        <li class="flex items-start gap-4">
                            <div class="mt-1 w-6 h-6 rounded-lg bg-green-500/10 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <p class="text-Rumahmade-grey text-lg font-medium">{{ __('Menyediakan platform jual-beli aset digital yang aman dan intuitif.') }}</p>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="mt-1 w-6 h-6 rounded-lg bg-pink-500/10 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <p class="text-Rumahmade-grey text-lg font-medium">{{ __('Memberikan bagi hasil yang paling adil bagi seluruh kreator.') }}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Value Section --}}
    <section class="w-full py-20 bg-gray-50 dark:bg-Rumahmade-darker-grey/30 border-y border-gray-100 dark:border-white/5 mb-[120px]">
        <div class="container max-w-[1130px] mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-Rumahmade-black dark:text-white">{{ __('Nilai-Nilai Rumahmade') }}</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-10 bg-white dark:bg-Rumahmade-darker-grey rounded-[40px] shadow-sm hover:shadow-xl transition-all duration-500 border border-transparent hover:border-[#B05CB0]/20 group" data-aos="fade-up">
                    <div class="text-5xl font-black text-[#B05CB0]/10 mb-6 group-hover:text-[#B05CB0]/20 transition-all">01</div>
                    <h3 class="text-2xl font-bold text-Rumahmade-black dark:text-white mb-4">{{ __('Integritas') }}</h3>
                    <p class="text-Rumahmade-grey leading-relaxed text-lg">{{ __('Kami sangat menghargai orisinalitas dan kejujuran dalam setiap karya yang dipublikasikan.') }}</p>
                </div>
                <div class="p-10 bg-white dark:bg-Rumahmade-darker-grey rounded-[40px] shadow-sm hover:shadow-xl transition-all duration-500 border border-transparent hover:border-[#FCB16B]/20 group" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-5xl font-black text-[#FCB16B]/10 mb-6 group-hover:text-[#FCB16B]/20 transition-all">02</div>
                    <h3 class="text-2xl font-bold text-Rumahmade-black dark:text-white mb-4">{{ __('Kualitas') }}</h3>
                    <p class="text-Rumahmade-grey leading-relaxed text-lg">{{ __('Setiap aset digital melewati review ketat untuk memastikan kegunaannya bagi pembeli.') }}</p>
                </div>
                <div class="p-10 bg-white dark:bg-Rumahmade-darker-grey rounded-[40px] shadow-sm hover:shadow-xl transition-all duration-500 border border-transparent hover:border-indigo-500/20 group" data-aos="fade-up" data-aos-delay="400">
                    <div class="text-5xl font-black text-indigo-500/10 mb-6 group-hover:text-indigo-500/20 transition-all">03</div>
                    <h3 class="text-2xl font-bold text-Rumahmade-black dark:text-white mb-4">{{ __('Kolaborasi') }}</h3>
                    <p class="text-Rumahmade-grey leading-relaxed text-lg">{{ __('Membangun komunitas di mana kreator bisa saling belajar dan tumbuh bersama.') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Team Section --}}
    <section class="container max-w-[1130px] mx-auto mb-[120px] px-4">
        <div class="flex flex-col md:flex-row justify-between items-end gap-6 mb-12" data-aos="fade-up">
            <div class="flex flex-col gap-4 max-w-[600px]">
                <h2 class="text-4xl md:text-5xl font-bold text-Rumahmade-black dark:text-white leading-tight">
                    {{ __('Dibalik Layar') }} <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#B05CB0] to-[#FCB16B]">{{ __('Rumahmade') }}</span>
                </h2>
                <p class="text-xl text-Rumahmade-grey">{{ __('Kolektif individu yang berdedikasi tinggi untuk memajukan industri digital.') }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            {{-- Member 1 --}}
            <div class="flex flex-col gap-4 group" data-aos="fade-up">
                <div class="aspect-square rounded-[40px] overflow-hidden grayscale group-hover:grayscale-0 transition-all duration-500">
                    <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Team" class="w-full h-full object-cover">
                </div>
                <div class="flex flex-col text-center">
                    <h5 class="text-xl font-bold text-Rumahmade-black dark:text-white">{{ __('Made Widhiyana') }}</h5>
                    <p class="text-Rumahmade-grey text-sm font-bold uppercase tracking-[3px] mt-1">{{ __('Founder') }}</p>
                </div>
            </div>
            {{-- Member 2 --}}
            <div class="flex flex-col gap-4 group" data-aos="fade-up" data-aos-delay="200">
                <div class="aspect-square rounded-[40px] overflow-hidden grayscale group-hover:grayscale-0 transition-all duration-500">
                    <img src="https://images.unsplash.com/photo-1542909168-82c3e7fdca5c?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Team" class="w-full h-full object-cover">
                </div>
                <div class="flex flex-col text-center">
                    <h5 class="text-xl font-bold text-Rumahmade-black dark:text-white">{{ __('Arka Kusuma') }}</h5>
                    <p class="text-Rumahmade-grey text-sm font-bold uppercase tracking-[3px] mt-1">{{ __('Tech Lead') }}</p>
                </div>
            </div>
            {{-- Member 3 --}}
            <div class="flex flex-col gap-4 group" data-aos="fade-up" data-aos-delay="400">
                <div class="aspect-square rounded-[40px] overflow-hidden grayscale group-hover:grayscale-0 transition-all duration-500">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Team" class="w-full h-full object-cover">
                </div>
                <div class="flex flex-col text-center">
                    <h5 class="text-xl font-bold text-Rumahmade-black dark:text-white">{{ __('Siti Aminah') }}</h5>
                    <p class="text-Rumahmade-grey text-sm font-bold uppercase tracking-[3px] mt-1">{{ __('Creative Director') }}</p>
                </div>
            </div>
            {{-- Member 4 --}}
            <div class="flex flex-col gap-4 group" data-aos="fade-up" data-aos-delay="600">
                <div class="aspect-square rounded-[40px] overflow-hidden grayscale group-hover:grayscale-0 transition-all duration-500">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Team" class="w-full h-full object-cover">
                </div>
                <div class="flex flex-col text-center">
                    <h5 class="text-xl font-bold text-Rumahmade-black dark:text-white">{{ __('Budi Santoso') }}</h5>
                    <p class="text-Rumahmade-grey text-sm font-bold uppercase tracking-[3px] mt-1">{{ __('Community') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Final CTA --}}
    <section class="container max-w-[1130px] mx-auto mb-[120px] px-4" data-aos="zoom-in">
        <div class="relative bg-white dark:bg-Rumahmade-darker-grey rounded-[60px] p-12 md:p-24 overflow-hidden border border-gray-100 dark:border-white/5 shadow-2xl text-center">
            <div class="absolute -top-24 -left-24 w-64 h-64 bg-[#B05CB0]/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-[#FCB16B]/10 rounded-full blur-3xl"></div>
            
            <div class="relative z-10 flex flex-col gap-8 items-center">
                <h2 class="text-4xl md:text-6xl font-bold text-Rumahmade-black dark:text-white">
                    {{ __('Mari Melangkah') }} <br> {{ __('Bersama Kami') }}
                </h2>
                <p class="text-xl text-Rumahmade-grey max-w-[600px]">
                    {{ __('Jadilah bagian dari revolusi ekonomi digital Indonesia sekarang juga.') }}
                </p>
                <div class="flex gap-4">
                    <a href="{{ route('register') }}" class="px-12 py-5 bg-gradient-to-r from-[#B05CB0] to-[#FCB16B] text-white rounded-full font-bold text-lg hover:scale-105 transition-all shadow-xl">
                        {{ __('Daftar Sekarang') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
