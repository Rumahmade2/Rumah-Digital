<footer class="bg-gray-100 dark:bg-[#181818] py-[34px] transition-all duration-500">
    <div
        class="container max-w-[1130px] mx-auto flex flex-col gap-[66px] text-Rumahmade-black dark:text-white transition-all duration-500">
        <div class="flex justify-between">
            <div class="flex flex-col justify-between">
                <div class="flex shrink-0">
                    <img src="{{ asset('images/logos/RumahDigital.svg') }}" class="brightness-0 dark:brightness-100 transition-all duration-500" alt="logo" style="width: 200px; height: auto;">
                </div>
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold text-sm">{{ __('Connect with us') }}</p>
                    <div class="flex items-center gap-5">
                        <a href=""
                            class="w-9 h-9 flex shrink-0 rounded-full overflow-hidden border border-[#595959] items-center justify-center">
                            <img src="{{ asset('images/logos/dribbble.svg') }}" class="w-6 h-6" alt="icon">
                        </a>
                        <a href=""
                            class="w-9 h-9 flex shrink-0 rounded-full overflow-hidden border border-[#595959] items-center justify-center">
                            <img src="{{ asset('images/logos/facebook.svg') }}" class="w-6 h-6" alt="icon">
                        </a>
                        <a href=""
                            class="w-9 h-9 flex shrink-0 rounded-full overflow-hidden border border-[#595959] items-center justify-center">
                            <img src="{{ asset('images/logos/apple.svg') }}" class="w-6 h-6" alt="icon">
                        </a>
                        <a href=""
                            class="w-9 h-9 flex shrink-0 rounded-full overflow-hidden border border-[#595959] items-center justify-center">
                            <img src="{{ asset('images/logos/figma.svg') }}" class="w-6 h-6" alt="icon">
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex gap-[72px]">
                <div class="flex flex-col gap-8">
                    <p class="font-semibold text-sm">{{ __('Browse') }}</p>
                    <div class="flex flex-col gap-[18px]">
                        <a href="{{ route('front.index') }}" class="text-Rumahmade-grey font-semibold text-xs">{{ __('All Products') }}</a>
                        <a href="{{ route('front.category', 'template') }}"
                            class="text-Rumahmade-grey font-semibold text-xs">{{ __('Templates') }}</a>
                        <a href="{{ route('front.category', 'ebook') }}"
                            class="text-Rumahmade-grey font-semibold text-xs">{{ __('Ebooks') }}</a>
                        <a href="{{ route('front.category', 'course') }}"
                            class="text-Rumahmade-grey font-semibold text-xs">{{ __('Courses') }}</a>
                        <a href="{{ route('front.category', 'font') }}"
                            class="text-Rumahmade-grey font-semibold text-xs">{{ __('Fonts') }}</a>
                    </div>
                </div>
                <div class="flex flex-col gap-8">
                    <p class="font-semibold text-sm">{{ __('Company') }}</p>
                    <div class="flex flex-col gap-[18px]">
                        <a href="" class="text-Rumahmade-grey font-semibold text-xs">{{ __('All-Access Pass') }}</a>
                        <a href="" class="text-Rumahmade-grey font-semibold text-xs">{{ __('Become an author') }}</a>
                        <a href="" class="text-Rumahmade-grey font-semibold text-xs">{{ __('Affiliate program') }}</a>
                        <a href="" class="text-Rumahmade-grey font-semibold text-xs">{{ __('Terms & Licensing') }}</a>
                    </div>
                </div>
                <div class="flex flex-col gap-8">
                    <p class="font-semibold text-sm">{{ __('Customer service') }}</p>
                    <div class="flex flex-col gap-[18px]">
                        <a href="" class="text-Rumahmade-grey font-semibold text-xs">{{ __('FAQ') }}</a>
                        <a href="" class="text-Rumahmade-grey font-semibold text-xs">{{ __('Orders') }}</a>
                        <a href="" class="text-Rumahmade-grey font-semibold text-xs">{{ __('Payments') }}</a>
                        <a href="" class="text-Rumahmade-grey font-semibold text-xs">{{ __('refunds') }}</a>
                    </div>
                </div>
                <div class="flex flex-col gap-8">
                    <p class="font-semibold text-sm">{{ __('Contact us') }}</p>
                    <div class="flex flex-col gap-[18px]">
                        {{-- <a href="{{ route('front.about') }}" class="text-Rumahmade-grey font-semibold text-xs">{{ __('About us') }}</a> --}}
                        <a href="" class="text-Rumahmade-grey font-semibold text-xs">{{ __('Company') }}</a>
                        <a href="" class="text-Rumahmade-grey font-semibold text-xs">{{ __('Careers') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-[10px] text-[#595959]">© 2024, Rumahmade.</p>
    </div>
</footer>