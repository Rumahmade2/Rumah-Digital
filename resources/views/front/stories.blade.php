@extends('front.layouts.app')
@section('title', __('Kisah Sukses') . ' - Rumahmade')
@section('content')

    {{-- Hero --}}
    <header class="w-full pt-[160px] pb-[80px] relative overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] bg-gradient-to-br from-[#B05CB0]/10 to-[#FCB16B]/10 blur-[120px] -z-10"></div>

        <div class="container max-w-[900px] mx-auto px-4 text-center">
            <div class="flex flex-col gap-8 items-center" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white dark:bg-Rumahmade-darker-grey border border-gray-100 dark:border-white/10 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-[#FCB16B] animate-pulse"></span>
                    <span class="text-xs font-bold text-Rumahmade-grey uppercase tracking-widest">{{ __('Inspirasi') }}</span>
                </div>
                <h1 class="font-bold text-5xl md:text-7xl leading-tight text-Rumahmade-black dark:text-white transition-all duration-500">
                    {{ __('Kisah') }} <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#B05CB0] to-[#FCB16B]">{{ __('Sukses') }}</span> {{ __('Mereka') }}
                </h1>
                <p class="text-xl text-Rumahmade-grey max-w-[600px] leading-relaxed">
                    {{ __('Dengarkan langsung bagaimana Rumahmade telah membantu kreator dan pelanggan mencapai tujuan mereka.') }}
                </p>
            </div>
        </div>
    </header>

    {{-- Stories --}}
    <section class="container max-w-[1130px] mx-auto mb-[120px] px-4 flex flex-col gap-20">

        {{-- Story 1 --}}
        <div class="group relative p-[1px] rounded-[40px] bg-gradient-to-br from-gray-200 to-transparent dark:from-white/10 dark:to-transparent hover:from-[#B05CB0] hover:to-[#FCB16B] transition-all duration-500" data-aos="fade-up">
            <div class="bg-white dark:bg-Rumahmade-darker-grey rounded-[39px] overflow-hidden">
                <div class="flex flex-col md:flex-row">
                    <div class="w-full md:w-1/2 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1471&q=80" alt="story" class="w-full h-[420px] object-cover group-hover:scale-105 transition-all duration-700">
                        <div class="absolute top-6 left-6">
                            <span class="px-4 py-2 bg-indigo-500 text-white rounded-full font-bold text-xs uppercase tracking-widest shadow-lg">{{ __('Kreator Pilihan') }}</span>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-10 md:p-14 flex flex-col justify-center gap-8">
                        <svg class="w-10 h-10 text-[#B05CB0]/20" fill="currentColor" viewBox="0 0 32 32"><path d="M10 8c-3.3 0-6 2.7-6 6v10h10V14H8c0-1.1.9-2 2-2V8zm14 0c-3.3 0-6 2.7-6 6v10h10V14h-6c0-1.1.9-2 2-2V8z"/></svg>
                        <h2 class="text-3xl font-bold text-Rumahmade-black dark:text-white leading-snug">
                            {{ __('Bagaimana Rumahmade Mengubah Hidup Saya Sebagai Desainer Freelance') }}
                        </h2>
                        <p class="text-Rumahmade-grey text-lg leading-relaxed">
                            {{ __('Sejak bergabung dengan Rumahmade setahun yang lalu, saya berhasil menjual lebih dari 500+ aset digital. Platform ini memberikan saya kebebasan untuk berkarya sambil mendapatkan penghasilan pasif yang stabil.') }}
                        </p>
                        <div class="flex items-center gap-4 pt-6 border-t border-gray-100 dark:border-white/5">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#B05CB0] to-[#FCB16B] flex items-center justify-center text-white font-bold text-lg">R</div>
                            <div>
                                <p class="font-bold text-Rumahmade-black dark:text-white">RUMAHMADE</p>
                                <p class="text-sm text-Rumahmade-grey">UI/UX Designer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Story 2 --}}
        <div class="group relative p-[1px] rounded-[40px] bg-gradient-to-br from-gray-200 to-transparent dark:from-white/10 dark:to-transparent hover:from-[#FCB16B] hover:to-[#B05CB0] transition-all duration-500" data-aos="fade-up">
            <div class="bg-white dark:bg-Rumahmade-darker-grey rounded-[39px] overflow-hidden">
                <div class="flex flex-col md:flex-row-reverse">
                    <div class="w-full md:w-1/2 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80" alt="story" class="w-full h-[420px] object-cover group-hover:scale-105 transition-all duration-700">
                        <div class="absolute top-6 right-6">
                            <span class="px-4 py-2 bg-orange-500 text-white rounded-full font-bold text-xs uppercase tracking-widest shadow-lg">{{ __('Studi Kasus') }}</span>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-10 md:p-14 flex flex-col justify-center gap-8">
                        <svg class="w-10 h-10 text-[#FCB16B]/20" fill="currentColor" viewBox="0 0 32 32"><path d="M10 8c-3.3 0-6 2.7-6 6v10h10V14H8c0-1.1.9-2 2-2V8zm14 0c-3.3 0-6 2.7-6 6v10h10V14h-6c0-1.1.9-2 2-2V8z"/></svg>
                        <h2 class="text-3xl font-bold text-Rumahmade-black dark:text-white leading-snug">
                            {{ __('Membangun Startup Lebih Cepat dengan Aset Terkurasi') }}
                        </h2>
                        <p class="text-Rumahmade-grey text-lg leading-relaxed">
                            {{ __('Kami menghemat waktu pengembangan hingga 60% berkat template dan aset berkualitas dari Rumahmade. Proses instalasi instan sangat membantu tim kami yang gesit.') }}
                        </p>
                        <div class="flex items-center gap-4 pt-6 border-t border-gray-100 dark:border-white/5">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#FCB16B] to-[#B05CB0] flex items-center justify-center text-white font-bold text-lg">I</div>
                            <div>
                                <p class="font-bold text-Rumahmade-black dark:text-white">PT. Inovasi Digital Jaya</p>
                                <p class="text-sm text-Rumahmade-grey">{{ __('Tech Startup') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
