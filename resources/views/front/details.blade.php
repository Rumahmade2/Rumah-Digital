@extends('front.layouts.app')
@section('title', $product->name . ' - RUMAHMADE Marketplace')
@section('content')
    <header class="w-full pt-[74px] pb-[103px] relative z-0 transition-all duration-500">
        <div
            class="container max-w-[1130px] mx-auto flex flex-col items-center justify-center z-10 transition-all duration-300">
            <div class="flex flex-col gap-4 mt-7 z-10 text-center" data-aos="zoom-in">
                <div class="flex flex-col items-center gap-2 mx-auto">
                    <div class="flex items-center gap-2">
                        <p
                            class="bg-gray-100 dark:bg-[#2A2A2A] font-semibold text-Rumahmade-grey rounded-[4px] p-[8px_16px] w-fit transition-all duration-300">
                            {{ $product->category->name }}
                        </p>
                        <p class="font-semibold text-sm text-Rumahmade-grey flex items-center gap-1 bg-white dark:bg-[#1A1A1A] p-[8px_16px] rounded-[4px]">
                            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            {{ $product->salesCount() }} {{ __('Terjual') }}
                        </p>
                    </div>
                    <div class="flex items-center gap-[4px]">
                        @php $avgRating = round($product->averageRating()); @endphp
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="w-5 h-5 {{ $i <= $avgRating ? 'text-[#FCB16B]' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                        <span class="text-Rumahmade-grey font-semibold">({{ $product->reviews->count() }})</span>
                    </div>
                </div>
                <h1 class="font-semibold text-[55px] text-Rumahmade-black dark:text-white transition-all duration-300">
                    {{ $product->name }}
                </h1>
            </div>
        </div>
        <div class="background-image w-full h-full absolute top-0 overflow-hidden z-0 transition-all duration-500">
            <img src="{{ $product->cover_url }}" class="w-full h-full object-cover opacity-10 dark:opacity-20"
                alt="hero image">
        </div>
        <div
            class="w-full h-full absolute top-0 bg-gradient-to-b from-white/80 via-white/50 to-white dark:from-Rumahmade-black/70 dark:via-Rumahmade-black/90 dark:to-Rumahmade-black z-0 transition-all duration-500">
        </div>
    </header>

    <section id="DetailsContent" class="container max-w-[1130px] mx-auto mb-[32px] relative -top-[70px]">
        <div class="flex flex-col gap-8">
            <div class="w-[1130px] h-[700px] flex shrink-0 rounded-[20px] overflow-hidden shadow-2xl skeleton" data-aos="fade-up">
                <img src="{{ $product->cover_url }}" class="w-full h-full object-cover transition-opacity duration-300 opacity-0" alt="hero image" onload="this.classList.remove('opacity-0'); this.parentElement.classList.remove('skeleton')">
            </div>
            <div class="flex gap-8 relative -mt-[93px]">
                <div
                    class="flex flex-col p-[30px] gap-5 bg-white dark:bg-Rumahmade-darker-grey rounded-[20px] w-[700px] shrink-0 mt-[90px] h-fit border border-[#e5e7eb] dark:border-[#414141] shadow-xl dark:shadow-none transition-all duration-300" data-aos="fade-right">
                    <div class="flex flex-col gap-4">
                        <p class="font-semibold text-xl text-Rumahmade-black dark:text-white">{{ __('Overview') }}</p>
                        <p class="text-Rumahmade-grey leading-[30px]">
                            {{ $product->about }}
                        </p>
                    </div>

                    <hr class="border-[#e5e7eb] dark:border-[#414141]">

                    <div class="flex flex-col gap-6">
                        <div class="flex items-center justify-between">
                            <p class="font-semibold text-xl text-Rumahmade-black dark:text-white">{{ __('Reviews') }} ({{ $product->reviews->count() }})</p>
                        </div>

                        @if($canReview)
                            <div class="bg-gray-50 dark:bg-[#2A2A2A] p-6 rounded-2xl border border-dashed border-[#B05CB0]/50 shadow-inner">
                                <p class="font-bold text-Rumahmade-black dark:text-white mb-4">{{ __('Write a Review') }}</p>
                                <form action="{{ route('front.product_review.store', $product->id) }}" method="POST" class="flex flex-col gap-4">
                                    @csrf
                                    <!-- Star Selection -->
                                    <div class="flex items-center gap-2" id="star-rating">
                                        @for($i = 1; $i <= 5; $i++)
                                        <label class="cursor-pointer group">
                                            <input type="radio" name="rating" value="{{ $i }}" class="hidden" required>
                                            <svg data-index="{{ $i }}" class="star-icon w-10 h-10 text-gray-300 dark:text-gray-600 transition-all duration-200" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        </label>
                                        @endfor
                                    </div>
                                    
                                    <textarea name="review" rows="4" 
                                        class="w-full rounded-2xl border border-[#e5e7eb] dark:border-[#444] bg-gray-50 dark:bg-Rumahmade-black p-5 text-Rumahmade-black dark:text-white placeholder-gray-400 focus:ring-2 focus:ring-[#B05CB0] outline-none transition-all shadow-sm" 
                                        style="color: inherit;"
                                        placeholder="{{ __('Ceritakan pengalaman Anda menggunakan produk ini secara detail...') }}" 
                                        required minlength="10"></textarea>
                                        
                                    <button type="submit" class="bg-gradient-to-r from-[#B05CB0] to-[#FCB16B] text-white font-bold py-4 px-8 rounded-full w-full md:w-fit hover:shadow-lg hover:scale-105 transition-all duration-300">
                                        {{ __('Kirim Ulasan Sekarang') }}
                                    </button>
                                </form>
                            </div>
                            
                            @push('after-script')
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const stars = document.querySelectorAll('.star-icon');
                                    const labels = document.querySelectorAll('#star-rating label');

                                    labels.forEach((label, index) => {
                                        label.addEventListener('click', () => {
                                            // Reset all stars
                                            stars.forEach(s => {
                                                s.classList.remove('text-yellow-400', 'scale-110');
                                                s.classList.add('text-gray-300', 'dark:text-gray-600');
                                            });
                                            
                                            // Highlight up to clicked
                                            for(let i = 0; i <= index; i++) {
                                                stars[i].classList.remove('text-gray-300', 'dark:text-gray-600');
                                                stars[i].classList.add('text-yellow-400');
                                            }
                                        });

                                        label.addEventListener('mouseenter', () => {
                                            for(let i = 0; i <= index; i++) {
                                                stars[i].classList.add('scale-110');
                                            }
                                        });

                                        label.addEventListener('mouseleave', () => {
                                            stars.forEach(s => s.classList.remove('scale-110'));
                                        });
                                    });
                                });
                            </script>
                            @endpush
                        @else
                            @auth
                                @php
                                    $alreadyReviewed = \App\Models\ProductReview::where('user_id', Auth::id())->where('product_id', $product->id)->exists();
                                @endphp
                                @if(!$alreadyReviewed)
                                    <div class="p-4 bg-gray-50 dark:bg-[#1A1A1A] rounded-xl border border-dashed border-gray-200 dark:border-[#414141] text-center">
                                        <p class="text-sm text-Rumahmade-grey italic">{{ __('Beli produk ini untuk memberikan ulasan.') }}</p>
                                    </div>
                                @endif
                            @else
                                <div class="p-4 bg-gray-50 dark:bg-[#1A1A1A] rounded-xl border border-dashed border-gray-200 dark:border-[#414141] text-center">
                                    <p class="text-sm text-Rumahmade-grey italic">
                                        <a href="{{ route('login') }}" class="text-[#B05CB0] font-bold underline">{{ __('Login') }}</a> {{ __('untuk memberikan ulasan.') }}
                                    </p>
                                </div>
                            @endauth
                        @endif

                        <div class="flex flex-col gap-6">
                            @forelse($product->reviews as $review)
                                <div class="flex flex-col gap-3 pb-6 border-b border-[#e5e7eb] last:border-0 dark:border-[#414141]">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full overflow-hidden border border-gray-200">
                                                <img src="{{ $review->user->avatar_url }}" class="w-full h-full object-cover" alt="user avatar">
                                            </div>
                                            <div class="flex flex-col">
                                                <p class="font-bold text-Rumahmade-black dark:text-white text-sm">{{ $review->user->name }}</p>
                                                <p class="text-xs text-Rumahmade-grey">{{ $review->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="text-Rumahmade-grey text-sm italic">"{{ $review->review }}"</p>
                                </div>
                            @empty
                                <p class="text-Rumahmade-grey text-sm text-center py-4">{{ __('No reviews found for this product.') }}</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="flex flex-col w-[366px] gap-[30px] flex-nowrap overflow-y-visible">
                    <div
                        class="p-[2px] bg-img-purple-to-orange rounded-[20px] flex w-full h-fit shadow-xl dark:shadow-none transition-all duration-300" data-aos="fade-left">
                        <div
                            class="w-full p-[28px] bg-white dark:bg-Rumahmade-black rounded-[20px] flex flex-col gap-[26px] transition-all duration-300">
                            <div class="flex flex-col gap-3 text-left">
                                @if($product->original_price > $product->price)
                                    <div class="flex items-center gap-2">
                                        <p class="font-bold text-4xl bg-clip-text text-transparent bg-gradient-to-r from-[#B05CB0] to-[#FCB16B]">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </p>
                                        <p class="text-sm text-gray-400 line-through mt-1">
                                            Rp {{ number_format($product->original_price, 0, ',', '.') }}
                                        </p>
                                    </div>
                                    <div class="bg-red-500/10 text-red-500 text-[10px] font-bold px-2 py-1 rounded w-fit uppercase tracking-wider">
                                        {{ __('Hemat') }} {{ round((($product->original_price - $product->price) / $product->original_price) * 100) }}%
                                    </div>
                                @else
                                    <p
                                        class="font-semibold text-4xl bg-clip-text text-transparent bg-gradient-to-r from-[#B05CB0] to-[#FCB16B]">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </p>
                                @endif
                                <div class="flex flex-col gap-[10px]">
                                    <div class="flex items-center gap-[10px]">
                                        <div class="w-4 h-4 flex shrink-0">
                                            <img src="{{ asset('images/icons/check.svg') }}"
                                                class="dark:invert dark:brightness-200 transition-all" alt="icon">
                                        </div>
                                        <p class="text-Rumahmade-grey">{{ __('100% Original Content') }}</p>
                                    </div>
                                    <div class="flex items-center gap-[10px]">
                                        <div class="w-4 h-4 flex shrink-0">
                                            <img src="{{ asset('images/icons/check.svg') }}"
                                                class="dark:invert dark:brightness-200 transition-all" alt="icon">
                                        </div>
                                        <p class="text-Rumahmade-grey">{{ __('Lifetime Support') }}</p>
                                    </div>
                                </div>
                            </div>
                            @if(Auth::check() && Auth::id() == $product->creator_id)
                                <button disabled
                                    class="bg-gray-400 dark:bg-gray-600 cursor-not-allowed text-center font-semibold p-[12px_20px] rounded-full text-white">
                                    {{ __('This is your product') }}
                                </button>
                            @else
                                <button disabled aria-disabled="true"
                                    class="bg-gray-400 dark:bg-gray-600 cursor-not-allowed text-center font-semibold p-[12px_20px] rounded-full text-white">
                                    {{ __('Pembelian sementara tidak tersedia') }}
                                </button>
                            @endif
                        </div>
                    </div>

                    <a href="{{ route('front.creator', $product->creator->id) }}"
                        class="w-full p-[30px] bg-white dark:bg-Rumahmade-darker-grey rounded-[20px] flex flex-col gap-4 h-fit border border-[#e5e7eb] dark:border-[#414141] hover:border-[#B05CB0] transition-all duration-300 group shadow-lg dark:shadow-none">
                        <div class="flex justify-between items-center text-left">
                            <div class="flex gap-3 items-center">
                                <div
                                    class="w-12 h-12 rounded-full overflow-hidden flex shrink-0 border border-[#e5e7eb] dark:border-[#414141]">
                                    <img src="{{ $product->creator->avatar_url }}" alt="creator avatar">
                                </div>
                                <div class="flex flex-col gap-[2px]">
                                    <p
                                        class="font-semibold text-Rumahmade-black dark:text-white group-hover:text-[#B05CB0] transition-all duration-300">
                                        {{ $product->creator->name }}
                                    </p>
                                    <p class="text-[#595959] text-sm leading-[18px]">
                                        <span class="font-semibold mr-1">{{ __('Verified') }}</span> {{ __('Author') }}
                                    </p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-Rumahmade-black dark:text-white">
                                    {{ $product->creator->products_count ?? 0 }}
                                </p>
                                <p class="text-[#595959] text-xs uppercase tracking-[0.2em]">{{ __('Products') }}</p>
                            </div>
                        </div>
                        <p class="text-sm leading-[24px] text-Rumahmade-grey text-left">
                            {{ $product->creator->name }} has {{ $product->creator->products_count ?? 0 }} products in the
                            marketplace.
                        </p>
                    </a>

                    <div class="w-full p-[30px] bg-white dark:bg-Rumahmade-darker-grey rounded-[20px] flex flex-col gap-5 h-fit border border-[#e5e7eb] dark:border-[#414141] shadow-lg dark:shadow-none transition-all duration-300">
                        <p class="font-bold text-Rumahmade-black dark:text-white">{{ __('Bagikan Produk') }}</p>
                        <div class="flex items-center gap-4">
                            <!-- WhatsApp -->
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($product->name . ' - ' . route('front.details', $product->slug)) }}" target="_blank" 
                                class="w-12 h-12 flex items-center justify-center rounded-full bg-[#25D366] dark:bg-[#25D366]/10 border border-transparent dark:border-[#25D366]/30 hover:scale-110 transition-all shadow-md group">
                                <img src="{{ asset('images/icons/whatsapp.svg') }}" class="w-6 h-6 invert dark:invert-0 transition-all" alt="WhatsApp">
                            </a>
                            <!-- Twitter / X -->
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($product->name) }}&url={{ urlencode(route('front.details', $product->slug)) }}" target="_blank" 
                                class="w-12 h-12 flex items-center justify-center rounded-full bg-black dark:bg-white/5 border border-transparent dark:border-white/20 hover:scale-110 transition-all shadow-md group">
                                <img src="{{ asset('images/icons/twitter.svg') }}" class="w-5 h-5 invert transition-all" alt="Twitter">
                            </a>
                            <!-- Copy Link (Instagram context) -->
                            <button onclick="copyToClipboard('{{ route('front.details', $product->slug) }}')" 
                                class="w-12 h-12 flex items-center justify-center rounded-full bg-indigo-600 dark:bg-indigo-600/10 border border-transparent dark:border-indigo-600/40 hover:scale-110 transition-all shadow-md group">
                                <img src="{{ asset('images/icons/link.svg') }}" class="w-5 h-5 invert transition-all" alt="Copy Link">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('after-script')
    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert('Link produk berhasil disalin!');
            });
        }
    </script>
    @endpush

    <section id="MoreProduct" class="container max-w-[1130px] mx-auto mb-[102px]">
        <div class="flex items-center justify-between mb-8">
            <div class="flex flex-col gap-2 text-left">
                <h2 class="font-semibold text-[32px] text-Rumahmade-black dark:text-white transition-all duration-300">{{ __('More Product') }}</h2>
                <p class="text-Rumahmade-grey text-sm">{{ __('Discover more digital products you might like.') }}</p>
            </div>
            <a href="{{ route('front.index') }}"
                class="text-[#B05CB0] font-semibold hover:text-[#FCB16B] transition-all duration-300">{{ __('See all') }}</a>
        </div>
        <div class="grid grid-cols-4 gap-[22px]">
            @forelse($moreProducts as $item)
                <div
                    class="product-card flex flex-col rounded-[18px] bg-white dark:bg-Rumahmade-darker-grey shadow-sm dark:shadow-none overflow-hidden transition-all duration-300">
                    <a href="{{ route('front.details', $item->slug) }}"
                        class="thumbnail w-full h-[180px] flex shrink-0 overflow-hidden relative skeleton">
                        <img src="{{ $item->cover_url }}" class="w-full h-full object-cover transition-opacity duration-300 opacity-0" alt="thumbnail" onload="this.classList.remove('opacity-0'); this.parentElement.classList.remove('skeleton')">
                        <p
                            class="backdrop-blur bg-black/30 rounded-[4px] p-[4px_8px] absolute top-3 right-[14px] z-10 text-white font-semibold">
                            Rp
                            {{ number_format($item->price, 0, ',', '.') }}
                        </p>
                    </a>
                    <div class="p-[10px_14px_12px] h-full flex flex-col justify-between gap-[14px]">
                        <div class="flex flex-col gap-1 text-left">
                            <a href="{{ route('front.details', $item->slug) }}"
                                class="font-semibold line-clamp-2 hover:line-clamp-none text-Rumahmade-black dark:text-white transition-all duration-300">{{ $item->name }}</a>
                            <div class="flex items-center justify-between">
                                <p
                                    class="bg-[#f3f4f6] dark:bg-Rumahmade-dark-grey font-semibold text-xs text-Rumahmade-grey rounded-[4px] p-[4px_6px] w-fit">
                                    {{ $item->category->name }}
                                </p>
                                <p class="font-semibold text-xs text-Rumahmade-grey flex items-center gap-1">
                                    <svg class="w-3 h-3 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                    {{ $item->salesCount() }} {{ __('Terjual') }}
                                </p>
                            </div>
                        </div>
                        <a href="{{ route('front.creator', $item->creator->id) }}" class="flex items-center gap-[6px] group">
                            <div class="w-6 h-6 flex shrink-0 items-center justify-center rounded-full overflow-hidden">
                                <img src="{{ $item->creator->avatar_url }}" class="w-full h-full object-cover" alt="logo">
                            </div>
                            <span
                                class="font-semibold text-xs text-Rumahmade-grey group-hover:text-Rumahmade-black dark:group-hover:text-white transition-all duration-300">{{ $item->creator->name }}</span>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center py-20">
                    <p class="text-Rumahmade-grey text-xl">{{ __('No more products available.') }}</p>
                </div>
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
@endpush