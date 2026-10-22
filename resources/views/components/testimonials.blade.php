<section id="Testimonial" class="mb-[102px] flex flex-col gap-8">
    <div class="container max-w-[1130px] mx-auto flex justify-between items-center">
        <h2 class="font-semibold text-[32px] text-Rumahmade-black dark:text-white transition-all duration-300">
            {{ __('Customers Are Happy') }} <br>{{ __('With Our Products') }}</h2>
        <div class="flex gap-[14px] items-center">
            <button
                class="btn-prev w-10 h-10 shrink-0 rounded-full flex items-center justify-center border border-gray-200 dark:border-[#414141] bg-white dark:bg-Rumahmade-black hover:bg-gray-50 dark:hover:bg-Rumahmade-darker-grey transition-all duration-300 shadow-sm dark:shadow-none group">
                <img src="{{ asset('images/icons/circle-arrow-r.svg') }}"
                    class="rotate-180 dark:invert transition-all opacity-50 group-hover:opacity-100" alt="icon">
            </button>
            <button
                class="btn-next w-10 h-10 shrink-0 rounded-full flex items-center justify-center border border-gray-200 dark:border-[#414141] bg-white dark:bg-Rumahmade-black hover:bg-gray-50 dark:hover:bg-Rumahmade-darker-grey transition-all duration-300 shadow-sm dark:shadow-none group">
                <img src="{{ asset('images/icons/circle-arrow-r.svg') }}"
                    class="dark:invert transition-all opacity-50 group-hover:opacity-100" alt="icon">
            </button>
        </div>
    </div>
    <div class="w-full overflow-x-hidden no-scrollbar">
        <div class="testi-carousel" data-flickity>
            <div class="flex w-[calc((100vw-1130px-20px)/2)] shrink-0"></div>

            {{-- Testimonial 1 --}}
            <div class="testimonial-card bg-white dark:bg-[#181818] border border-[#e5e7eb] dark:border-[#414141] shadow-sm dark:shadow-none rounded-[20px] flex mr-5 w-[420px] min-h-[256px] shrink-0 overflow-hidden transition-all duration-300">
                <div class="p-6 flex flex-col w-full gap-[42px] shrink-0 bg-[url('{{ asset('images/backgrounds/Testimonials-image.png') }}')] bg-contain bg-no-repeat bg-top">
                    <div class="flex flex-col gap-4">
                        <div class="flex items-center gap-[6px]">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                        </div>
                        <p class="leading-[26px] text-Rumahmade-black dark:text-white transition-all duration-300">{{ __('Platform ini benar-benar mengubah cara saya bekerja. Koleksi produk digital yang lengkap dan berkualitas tinggi membuat proyek desain saya selesai lebih cepat.') }}</p>
                    </div>
                    <div class="flex gap-[14px] items-center">
                        <div class="w-12 h-12 flex shrink-0 rounded-full overflow-hidden">
                            <img src="{{ asset('images/icons/foto1.jpg') }}" class="w-full h-full object-cover" alt="photo">
                        </div>
                        <div class="flex flex-col">
                            <p class="font-semibold text-left leading-[170%] bg-clip-text text-transparent bg-gradient-to-r from-[#B05CB0] to-[#FCB16B]">Andi Wijaya</p>
                            <p class="font-semibold text-left text-xs text-Rumahmade-grey">UI/UX Designer</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Testimonial 2 --}}
            <div class="testimonial-card bg-white dark:bg-[#181818] border border-[#e5e7eb] dark:border-[#414141] shadow-sm dark:shadow-none rounded-[20px] flex mr-5 w-[420px] min-h-[256px] shrink-0 overflow-hidden transition-all duration-300">
                <div class="p-6 flex flex-col w-full gap-[42px] shrink-0 bg-[url('{{ asset('images/backgrounds/Testimonials-image.png') }}')] bg-contain bg-no-repeat bg-top">
                    <div class="flex flex-col gap-4">
                        <div class="flex items-center gap-[6px]">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                        </div>
                        <p class="leading-[26px] text-Rumahmade-black dark:text-white transition-all duration-300">{{ __('Saya sangat terkesan dengan variasi template dan aset yang tersedia. Produktivitas tim desain saya meningkat drastis sejak menggunakan marketplace ini.') }}</p>
                    </div>
                    <div class="flex gap-[14px] items-center">
                        <div class="w-12 h-12 flex shrink-0 rounded-full overflow-hidden">
                            <img src="{{ asset('images/icons/foto2.jpg') }}" class="w-full h-full object-cover" alt="photo">
                        </div>
                        <div class="flex flex-col">
                            <p class="font-semibold text-left leading-[170%] bg-clip-text text-transparent bg-gradient-to-r from-[#B05CB0] to-[#FCB16B]">Siti Nurhaliza</p>
                            <p class="font-semibold text-left text-xs text-Rumahmade-grey">Graphic Designer</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Testimonial 3 --}}
            <div class="testimonial-card bg-white dark:bg-[#181818] border border-[#e5e7eb] dark:border-[#414141] shadow-sm dark:shadow-none rounded-[20px] flex mr-5 w-[420px] min-h-[256px] shrink-0 overflow-hidden transition-all duration-300">
                <div class="p-6 flex flex-col w-full gap-[42px] shrink-0 bg-[url('{{ asset('images/backgrounds/Testimonials-image.png') }}')] bg-contain bg-no-repeat bg-top">
                    <div class="flex flex-col gap-4">
                        <div class="flex items-center gap-[6px]">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                        </div>
                        <p class="leading-[26px] text-Rumahmade-black dark:text-white transition-all duration-300">{{ __('Kualitas premium dengan harga yang terjangkau. Saya sudah merekomendasikan RUMAHMADE kepada seluruh tim developer dan designer saya.') }}</p>
                    </div>
                    <div class="flex gap-[14px] items-center">
                        <div class="w-12 h-12 flex shrink-0 rounded-full overflow-hidden">
                            <img src="{{ asset('images/icons/foto3.jpg') }}" class="w-full h-full object-cover" alt="photo">
                        </div>
                        <div class="flex flex-col">
                            <p class="font-semibold text-left leading-[170%] bg-clip-text text-transparent bg-gradient-to-r from-[#B05CB0] to-[#FCB16B]">Rinto Harahap</p>
                            <p class="font-semibold text-left text-xs text-Rumahmade-grey">Web Developer</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Testimonial 4 --}}
            <div class="testimonial-card bg-white dark:bg-[#181818] border border-[#e5e7eb] dark:border-[#414141] shadow-sm dark:shadow-none rounded-[20px] flex mr-5 w-[420px] min-h-[256px] shrink-0 overflow-hidden transition-all duration-300">
                <div class="p-6 flex flex-col w-full gap-[42px] shrink-0 bg-[url('{{ asset('images/backgrounds/Testimonials-image.png') }}')] bg-contain bg-no-repeat bg-top">
                    <div class="flex flex-col gap-4">
                        <div class="flex items-center gap-[6px]">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                        </div>
                        <p class="leading-[26px] text-Rumahmade-black dark:text-white transition-all duration-300">{{ __('Interface yang intuitif membuat navigasi sangat mudah. Integrasi seamless dengan tools favorit saya membuat workflow jadi lebih efisien.') }}</p>
                    </div>
                    <div class="flex gap-[14px] items-center">
                        <div class="w-12 h-12 flex shrink-0 rounded-full overflow-hidden">
                            <img src="{{ asset('images/icons/foto4.jpeg') }}" class="w-full h-full object-cover" alt="photo">
                        </div>
                        <div class="flex flex-col">
                            <p class="font-semibold text-left leading-[170%] bg-clip-text text-transparent bg-gradient-to-r from-[#B05CB0] to-[#FCB16B]">Lena Wijaya</p>
                            <p class="font-semibold text-left text-xs text-Rumahmade-grey">Creative Director</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Testimonial 5 --}}
            <div class="testimonial-card bg-white dark:bg-[#181818] border border-[#e5e7eb] dark:border-[#414141] shadow-sm dark:shadow-none rounded-[20px] flex mr-5 w-[420px] min-h-[256px] shrink-0 overflow-hidden transition-all duration-300">
                <div class="p-6 flex flex-col w-full gap-[42px] shrink-0 bg-[url('{{ asset('images/backgrounds/Testimonials-image.png') }}')] bg-contain bg-no-repeat bg-top">
                    <div class="flex flex-col gap-4">
                        <div class="flex items-center gap-[6px]">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                            <img src="{{ asset('images/icons/star.svg') }}" alt="star">
                        </div>
                        <p class="leading-[26px] text-Rumahmade-black dark:text-white transition-all duration-300">{{ __('Koleksi ebook dan kursus berkualitas tinggi yang selalu diperbarui. Platform ini adalah investasi terbaik untuk pengembangan skill tim tech saya.') }}</p>
                    </div>
                    <div class="flex gap-[14px] items-center">
                        <div class="w-12 h-12 flex shrink-0 rounded-full overflow-hidden">
                            <img src="{{ asset('images/icons/foto1.jpg') }}" class="w-full h-full object-cover" alt="photo">
                        </div>
                        <div class="flex flex-col">
                            <p class="font-semibold text-left leading-[170%] bg-clip-text text-transparent bg-gradient-to-r from-[#B05CB0] to-[#FCB16B]">Budi Santoso</p>
                            <p class="font-semibold text-left text-xs text-Rumahmade-grey">Software Engineer</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>