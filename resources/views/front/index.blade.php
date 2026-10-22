@extends('front.layouts.app')
@section('title', __('Home') . ' - RUMAHMADE Marketplace')
@section('content')

    <header
        class="w-full pt-[74px] pb-[34px] bg-[url('{{ asset('images/backgrounds/hero-image.png') }}')] bg-cover bg-no-repeat bg-center relative z-0 transition-all duration-500">
        <div class="container max-w-[1130px] mx-auto flex flex-col items-center justify-center gap-[34px] z-10 relative">
            <div class="flex flex-col gap-2 text-center w-fit mt-20 z-10" data-aos="fade-up">
                <h1
                    class="font-semibold text-[60px] leading-[130%] text-Rumahmade-black dark:text-white transition-all duration-300">
                    {{ __('Explore High Quality') }}<br>{{ __('Digital Products') }}</h1>
                <p class="text-lg text-Rumahmade-grey dark:text-Rumahmade-grey transition-all duration-300">{{ __('Change the way') }}
                    {{ __('you work to achieve better results.') }}</p>
            </div>
            <div class="flex w-full justify-center mb-[34px] z-10" data-aos="fade-up" data-aos-delay="200">
                <form action="{{ route('front.search') }}" method="GET"
                    class="group/search-bar p-[14px_18px] bg-white dark:bg-Rumahmade-darker-grey ring-1 ring-[#e5e7eb] dark:ring-[#414141] hover:ring-[#888888] max-w-[560px] w-full rounded-full transition-all duration-300 shadow-xl dark:shadow-none">
                    <div class="relative text-left flex items-center">
                        <button class="absolute inset-y-0 left-0 flex items-center">
                            <img src="{{ asset('images/icons/search-normal.svg') }}"
                                class="dark:brightness-100 brightness-0 transition-all" alt="icon">
                        </button>
                        <input type="text" name="query" id="searchInput"
                            class="bg-transparent w-full pl-[36px] focus:outline-none focus:ring-0 border-none placeholder:text-[#595959] pr-9 text-Rumahmade-black dark:text-white transition-all duration-300"
                            placeholder="{{ __('Type anything to search...') }}" />
                        <input type="reset" id="resetButton"
                            class="close-button hidden w-[38px] h-[38px] flex shrink-0 bg-[url('{{ asset('images/icons/close.svg') }}')] hover:bg-[url('{{ asset('images/icons/close-white.svg') }}')] transition-all duration-300 appearance-none transform -translate-x-1/2 -translate-y-1/2 absolute top-1/2 -right-5"
                            value="">
                    </div>
                    <div id="liveSearchResult" class="absolute top-full left-0 w-full mt-2 bg-white dark:bg-Rumahmade-black border border-gray-200 dark:border-[#414141] rounded-[20px] shadow-2xl z-50 hidden overflow-hidden"></div>
                </form>
            </div>
        </div>
        <div
            class="w-full h-full absolute top-0 bg-gradient-to-b from-white/80 via-white/50 to-white dark:from-Rumahmade-black/70 dark:via-Rumahmade-black/90 dark:to-Rumahmade-black z-0 transition-all duration-500">
        </div>
    </header>

    <section id="Category" class="container max-w-[1130px] mx-auto mb-[102px] flex flex-col gap-8" data-aos="fade-up">
        <h2 class="font-semibold text-[32px] text-Rumahmade-black dark:text-white transition-all duration-300">{{ __('Category') }}</h2>
        <div class="flex flex-wrap justify-center items-center gap-8">
            <a href="{{ route('front.index') }}#NewProduct"
                class="group category-card w-fit h-fit p-[1px] rounded-2xl bg-white dark:bg-Rumahmade-darker-grey hover:bg-img-purple-to-orange transition-all duration-300 shadow-md dark:shadow-none" data-aos="zoom-in">
                <div
                    class="flex flex-col p-[18px] rounded-2xl w-[210px] bg-white dark:bg-Rumahmade-black border border-[#e5e7eb] dark:border-[#333333] group-hover:dark:bg-Rumahmade-darker-grey transition-all duration-300">
                    <div class="w-[58px] h-[58px] flex shrink-0 items-center justify-center">
                        <img src="{{ asset('images/icons/cart.svg') }}" class="transition-all opacity-80 group-hover:opacity-100"
                            alt="icon">
                    </div>
                    <div class="px-[6px] flex flex-col text-left">
                        <p class="font-bold text-sm text-Rumahmade-black dark:text-white transition-all duration-500">
                            {{ __('All Products') }}
                        </p>
                    </div>
                </div>
            </a>
            @forelse($categories as $category)
                <a href="{{ route('front.category', $category->slug) }}"
                    class="group category-card w-fit h-fit p-[1px] rounded-2xl bg-white dark:bg-Rumahmade-darker-grey hover:bg-img-purple-to-orange transition-all duration-300 shadow-md dark:shadow-none" data-aos="zoom-in" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <div
                        class="flex flex-col p-[18px] rounded-2xl w-[210px] bg-white dark:bg-Rumahmade-black border border-[#e5e7eb] dark:border-[#333333] group-hover:dark:bg-Rumahmade-darker-grey transition-all duration-300">
                        <div class="w-[58px] h-[58px] flex shrink-0 items-center justify-center">
                            <img src="{{ $category->icon_url }}" class="transition-all opacity-80 group-hover:opacity-100"
                                alt="icon">
                        </div>
                        <div class="px-[6px] flex flex-col text-left">
                            <p class="font-bold text-sm text-Rumahmade-black dark:text-white transition-all duration-300">
                                {{ $category->name }}
                            </p>
                        </div>
                    </div>
                </a>
            @empty
                <p class="text-Rumahmade-grey dark:text-Rumahmade-light-grey">{{ __('No categories found.') }}</p>
            @endforelse
        </div>
    </section>

    <section id="NewProduct" class="container max-w-[1130px] mx-auto mb-[102px] flex flex-col gap-8" data-aos="fade-up">
        <h2 class="font-semibold text-[32px] text-Rumahmade-black dark:text-white transition-all duration-300">{{ __('New Product') }}
        </h2>
        <div class="grid grid-cols-4 gap-[30px]">
            @forelse($products as $product)
                <div
                    class="product-card flex flex-col rounded-[18px] bg-white dark:bg-[#181818] shadow-sm dark:shadow-none overflow-hidden transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 100 }}">
                    <a href="{{ route('front.details', $product->slug) }}"
                        class="thumbnail w-full h-[180px] flex shrink-0 overflow-hidden relative skeleton">
                        <img src="{{ $product->cover_url }}" class="w-full h-full object-cover transition-opacity duration-300 opacity-0" alt="thumbnail" onload="this.classList.remove('opacity-0'); this.parentElement.classList.remove('skeleton')">


                        @if($product->original_price > $product->price)
                        <div class="absolute top-3 right-3 bg-red-500 text-white text-[10px] font-bold px-2 py-1 rounded shadow-md z-20">
                            PROMO {{ round((($product->original_price - $product->price) / $product->original_price) * 100) }}%
                        </div>
                        @endif

                        <p class="backdrop-blur bg-black/30 rounded-[4px] p-[4px_8px] absolute bottom-3 right-[14px] z-10 text-white font-semibold flex flex-col items-end">
                            @if($product->original_price > $product->price)
                                <span class="text-[10px] line-through opacity-70 leading-none mb-1">Rp {{ number_format($product->original_price, 0, ',', '.') }}</span>
                            @endif
                            <span>Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </p>
                    </a>
                    <div class="p-[10px_14px_12px] h-full flex flex-col justify-between gap-[14px]">
                        <div class="flex flex-col gap-1">
                            <a href="{{ route('front.details', $product->slug) }}"
                                class="font-semibold line-clamp-2 hover:line-clamp-none text-Rumahmade-black dark:text-white transition-all duration-300">{{ $product->name }}</a>
                            <div class="flex items-center gap-1">
                                <div class="flex items-center gap-[2px]">
                                    @php $avgRating = round($product->averageRating()); @endphp
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-3 h-3 {{ $i <= $avgRating ? 'text-[#FCB16B]' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    @endfor
                                </div>
                                <span class="text-[10px] text-Rumahmade-grey">({{ $product->reviews->count() }})</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <p
                                    class="bg-[#f3f4f6] dark:bg-[#2A2A2A] font-semibold text-xs text-Rumahmade-black dark:text-Rumahmade-grey rounded-[4px] p-[4px_6px] w-fit transition-all duration-300">
                                    {{ $product->category->name }}
                                </p>
                                <p class="font-semibold text-xs text-Rumahmade-grey flex items-center gap-1">
                                    <svg class="w-3 h-3 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                    {{ $product->salesCount() }} {{ __('Terjual') }}
                                </p>
                            </div>
                        </div>
                        <a href="{{ route('front.creator', $product->creator->id) }}" class="flex items-center gap-[6px] group">
                            <div class="w-6 h-6 flex shrink-0 items-center justify-center rounded-full overflow-hidden">
                                <img src="{{ $product->creator->avatar_url }}" class="w-full h-full object-cover" alt="logo">
                            </div>
                            <span
                                class="font-semibold text-xs text-Rumahmade-grey dark:text-Rumahmade-grey group-hover:text-Rumahmade-black dark:group-hover:text-white transition-all duration-300">{{ $product->creator->name }}</span>
                        </a>
                    </div>
                </div>
            @empty
                <p>{{ __('No products found.') }}</p>
            @endforelse
        </div>
    </section>

    <x-testimonials />
    <x-tools />
@endsection

@push('after-script')
    <script>
        $('.testi-carousel').flickity({
            // options
            cellAlign: 'left',
            contain: true,
            pageDots: false,
            prevNextButtons: false,
        });

        // previous
        $('.btn-prev').on('click', function () {
            $('.testi-carousel').flickity('previous', true);
        });

        // next
        $('.btn-next').on('click', function () {
            $('.testi-carousel').flickity('next', true);
        });
    </script>

    <script>
        const searchInput = document.getElementById('searchInput');
        const resetButton = document.getElementById('resetButton');

        if (searchInput && resetButton) {
            searchInput.addEventListener('input', function () {
                if (this.value.trim() !== '') {
                    resetButton.classList.remove('hidden');
                } else {
                    resetButton.classList.add('hidden');
                    if(liveSearchResult) {
                        liveSearchResult.classList.add('hidden');
                        liveSearchResult.innerHTML = '';
                    }
                }
            });

            resetButton.addEventListener('click', function () {
                searchInput.value = '';
                resetButton.classList.add('hidden');
                if(liveSearchResult) {
                    liveSearchResult.classList.add('hidden');
                    liveSearchResult.innerHTML = '';
                }
                searchInput.focus();
            });
        }

        const liveSearchResult = document.getElementById('liveSearchResult');
        let searchTimeout = null;

        if (searchInput && liveSearchResult) {
            searchInput.addEventListener('input', function () {
                const query = this.value.trim();
                clearTimeout(searchTimeout);

                if (query.length < 2) {
                    liveSearchResult.innerHTML = '';
                    liveSearchResult.classList.add('hidden');
                    return;
                }

                searchTimeout = setTimeout(() => {
                    fetch(`{{ route('front.live_search') }}?query=${query}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.length > 0) {
                                let html = '';
                                data.forEach(product => {
                                    html += `
                                        <a href="${product.url}" class="flex items-center gap-4 p-4 hover:bg-gray-100 dark:hover:bg-Rumahmade-darker-grey transition-all border-b border-gray-100 dark:border-[#333] last:border-0 text-left">
                                            <img src="${product.cover_url}" class="w-12 h-12 rounded-lg object-cover" alt="">
                                            <div class="flex flex-col">
                                                <span class="font-bold text-sm text-Rumahmade-black dark:text-white">${product.name}</span>
                                                <span class="text-xs text-indigo-500 font-semibold">${product.price}</span>
                                            </div>
                                        </a>
                                    `;
                                });
                                liveSearchResult.innerHTML = html;
                                liveSearchResult.classList.remove('hidden');
                            } else {
                                liveSearchResult.innerHTML = '<p class="p-4 text-center text-sm text-gray-500 italic">Produk tidak ditemukan</p>';
                                liveSearchResult.classList.remove('hidden');
                            }
                        });
                }, 300);
            });

            document.addEventListener('click', function (e) {
                if (!searchInput.contains(e.target) && !liveSearchResult.contains(e.target)) {
                    liveSearchResult.classList.add('hidden');
                }
            });
        }
    </script>
@endpush