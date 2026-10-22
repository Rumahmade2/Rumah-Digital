<nav class="w-full fixed top-0 bg-white/80 dark:bg-[#00000010] backdrop-blur-lg z-50 transition-all duration-500">
    <div class="container max-w-[1130px] mx-auto flex items-center justify-between h-[74px]">
        <div class="flex items-center gap-[26px]">
            <a href="{{ route('front.index') }}" class="flex shrink-0 items-center transition-all duration-500">
                <img src="{{ asset('images/logos/RumahDigital.svg') }}"
                    class="h-9 w-auto brightness-0 dark:brightness-100 transition-all duration-500" alt="Logo">
            </a>
            <ul class="flex gap-6 items-center">
                <li
                    class="text-Rumahmade-grey hover:text-Rumahmade-black dark:hover:text-white transition-all duration-500">
                    <a href="{{ route('front.index') }}">{{ __('Home') }}</a>
                </li>
                <li
                    class="text-Rumahmade-grey hover:text-Rumahmade-black dark:hover:text-white transition-all duration-500 relative">
                    <button id="menu-button"
                        class="flex items-center gap-1 focus:text-Rumahmade-black dark:focus:text-white transition-all">
                        <span>{{ __('Categories') }}</span>
                        <img src="{{ asset('images/icons/arrow-down.svg') }}" class="dark:invert transition-all"
                            alt="icon">
                    </button>
                    <div
                        class="dropdown-menu hidden absolute top-[52px] grid grid-cols-2 p-4 gap-[10px] w-[526px] rounded-[20px] bg-white dark:bg-Rumahmade-black border border-[#e5e7eb] dark:border-[#333333] shadow-lg dark:shadow-none z-10 transition-all duration-500">
                        <div
                            class="col-span-2 group flex justify-between items-center rounded-2xl p-[12px_16px] border border-[#e5e7eb] dark:border-[#333333] hover:bg-gray-100 dark:hover:bg-Rumahmade-darker-grey transition-all duration-500">
                            <div class="flex items-center">
                                <a href="{{ route('front.index') }}"
                                    class="w-[58px] h-[58px] flex shrink-0 items-center justify-center">
                                    <img src="{{ asset('images/icons/cart.svg') }}" class="transition-all" alt="icon">
                                </a>
                                <a href="{{ route('front.index') }}" class="flex flex-col ml-3">
                                    <p
                                        class="font-bold text-sm text-Rumahmade-black dark:text-white transition-all duration-500">
                                        {{ __('All Products') }}
                                    </p>
                                </a>
                            </div>
                        </div>
                        @foreach($categories as $category)
                            <div
                                class="group flex justify-between items-center rounded-2xl p-[12px_16px] border border-[#e5e7eb] dark:border-[#333333] hover:bg-gray-100 dark:hover:bg-Rumahmade-darker-grey transition-all duration-500">
                                <div class="flex items-center">
                                    <a href="{{ route('front.category', $category->slug) }}"
                                        class="w-[58px] h-[58px] flex shrink-0 items-center justify-center">
                                        <img src="{{ $category->icon_url }}" class="transition-all" alt="icon">
                                    </a>
                                    <a href="{{ route('front.category', $category->slug) }}" class="flex flex-col ml-3">
                                        <p
                                            class="font-bold text-sm text-Rumahmade-black dark:text-white transition-all duration-500">
                                            {{ $category->name }}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </li>
                <li
                    class="text-Rumahmade-grey hover:text-Rumahmade-black dark:hover:text-white transition-all duration-500">
                    <a href="{{ route('front.stories') }}">{{ __('Stories') }}</a>
                </li>
                <li
                    class="text-Rumahmade-grey hover:text-Rumahmade-black dark:hover:text-white transition-all duration-500">
                    <a href="{{ route('front.benefits') }}">{{ __('Benefits') }}</a>
                </li>
                <li
                    class="text-Rumahmade-grey hover:text-Rumahmade-black dark:hover:text-white transition-all duration-500">
                    <a href="{{ route('front.about') }}">{{ __('About') }}</a>
                </li>
            </ul>
        </div>
        <div class="flex gap-6 items-center">
            <button id="theme-toggle"
                class="p-2 rounded-xl bg-white dark:bg-Rumahmade-darker-grey border border-[#e5e7eb] dark:border-[#414141] hover:bg-gray-50 dark:hover:bg-[#2A2A2A] transition-all duration-500 shadow-sm dark:shadow-none">
                <!-- Moon Icon (Dark Mode) -->
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5 text-Rumahmade-black dark:text-white"
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <!-- Sun Icon (Light Mode) -->
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5 text-yellow-500" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464l-.707-.707a1 1 0 00-1.414 1.414l.707.707a1 1 0 001.414-1.414zm2.12 10.607a1 1 0 010-1.414l.706-.707a1 1 0 111.414 1.414l-.707.707a1 1 0 01-1.414 0zM3 11a1 1 0 100-2H2a1 1 0 100 2h1z"
                        fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>

            @guest
                <a href="{{ route('login') }}"
                    class="text-Rumahmade-grey hover:text-Rumahmade-black dark:text-Rumahmade-grey dark:hover:text-Rumahmade-light-grey transition-all duration-500 font-semibold">{{ __('Log in') }}</a>
                <a href="{{ route('register') }}"
                    class="p-[8px_16px] w-fit h-fit rounded-[12px] text-Rumahmade-black dark:text-Rumahmade-grey border border-[#e5e7eb] dark:border-Rumahmade-dark-grey hover:bg-gray-50 dark:hover:bg-[#2A2A2A] hover:text-Rumahmade-black dark:hover:text-white transition-all duration-500 font-semibold shadow-sm dark:shadow-none">{{ __('Sign up') }}</a>
            @endguest

            @auth
                <a href="{{ route('front.my_orders') }}"
                    class="p-[8px_16px] w-fit h-fit rounded-[12px] text-Rumahmade-black dark:text-Rumahmade-grey border border-[#e5e7eb] dark:border-Rumahmade-dark-grey hover:bg-gray-50 dark:hover:bg-[#2A2A2A] hover:text-Rumahmade-black dark:hover:text-white transition-all duration-500 font-semibold shadow-sm dark:shadow-none flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    {{ __('My Orders') }}
                </a>
                <a href="{{ route('admin.dashboard') }}"
                    class="p-[8px_16px] w-fit h-fit rounded-[12px] text-Rumahmade-black dark:text-Rumahmade-grey border border-[#e5e7eb] dark:border-Rumahmade-dark-grey hover:bg-gray-50 dark:hover:bg-[#2A2A2A] hover:text-Rumahmade-black dark:hover:text-white transition-all duration-500 font-semibold shadow-sm dark:shadow-none">
                    {{ __('Dashboard') }}</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="button"
                        onclick="window.showConfirmLogout(this.closest('form'))"
                        class="text-Rumahmade-grey hover:text-Rumahmade-black dark:hover:text-white transition-all duration-500 font-semibold">{{ __('Log Out') }}</button>
                </form>
            @endauth
        </div>
    </div>
</nav>
@push('after-script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuButton = document.getElementById('menu-button');
            const dropdownMenu = document.querySelector('.dropdown-menu');

            if (menuButton && dropdownMenu) {
                menuButton.addEventListener('click', function () {
                    dropdownMenu.classList.toggle('hidden');
                });

                document.addEventListener('click', function (event) {
                    const isClickInside = menuButton.contains(event.target) || dropdownMenu.contains(event.target);
                    if (!isClickInside) {
                        dropdownMenu.classList.add('hidden');
                    }
                });
            }

            // Dark Mode Toggle Logic
            const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
            const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
            const themeToggleBtn = document.getElementById('theme-toggle');

            // Change the icons inside the button based on previous settings
            if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                themeToggleLightIcon.classList.remove('hidden');
            } else {
                themeToggleDarkIcon.classList.remove('hidden');
            }

            themeToggleBtn.addEventListener('click', function () {
                // toggle icons inside button
                themeToggleDarkIcon.classList.toggle('hidden');
                themeToggleLightIcon.classList.toggle('hidden');

                // if set via local storage previously
                if (localStorage.getItem('theme')) {
                    if (localStorage.getItem('theme') === 'light') {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('theme', 'light');
                    }

                    // if NOT set via local storage previously
                } else {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('theme', 'dark');
                    }
                }
            });
        });
    </script>
@endpush