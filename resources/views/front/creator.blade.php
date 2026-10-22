@extends('front.layouts.app')
@section('title', $user->name . ' - ' . __('Creator Profile'))
@section('content')

    {{-- Hero Section with Creator Avatar & Name --}}
    <header class="w-full pt-[140px] pb-[100px] bg-white dark:bg-Rumahmade-black relative z-0 transition-all duration-500">
        <div class="container max-w-[1130px] mx-auto flex flex-col items-center justify-center relative z-10">
            <div class="flex items-center gap-10">
                {{-- Avatar with gradient ring --}}
                <div class="p-[3px] bg-img-purple-to-orange rounded-full w-fit shrink-0 transition-all duration-500">
                    <div class="w-[180px] h-[180px] rounded-full overflow-hidden border-[6px] border-white dark:border-Rumahmade-black transition-all duration-500">
                        <img src="{{ $user->avatar_url }}" class="w-full h-full object-cover" alt="{{ $user->name }}">
                    </div>
                </div>
                {{-- Creator Name --}}
                <h1 class="font-semibold text-[70px] leading-tight text-Rumahmade-black dark:text-white transition-all duration-500">{{ $user->name }}</h1>
            </div>
        </div>  
    </header>

    {{-- More Product Section --}}
    <section id="MoreProduct" class="container max-w-[1130px] mx-auto mb-[102px]">
        <div class="flex items-center justify-between mb-8">
            <h2 class="font-semibold text-[32px] text-Rumahmade-black dark:text-white transition-all duration-500">{{ __('More Product') }}</h2>
        </div>
        <div class="grid grid-cols-4 gap-[22px]">
            @forelse($products as $product)
                <div class="product-card flex flex-col rounded-[18px] bg-white dark:bg-Rumahmade-darker-grey shadow-sm dark:shadow-none overflow-hidden transition-all duration-500">
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
                        <div class="flex flex-col gap-1 text-left">
                            <a href="{{ route('front.details', $product->slug) }}"
                                class="font-semibold line-clamp-2 hover:line-clamp-none text-Rumahmade-black dark:text-white transition-all duration-500">{{ $product->name }}</a>
                            <div class="flex items-center justify-between">
                                <p class="bg-[#f3f4f6] dark:bg-Rumahmade-dark-grey font-semibold text-xs text-Rumahmade-grey rounded-[4px] p-[4px_6px] w-fit transition-all duration-500">
                                    {{ $product->category->name }}
                                </p>
                                <p class="font-semibold text-xs text-Rumahmade-grey flex items-center gap-1">
                                    <svg class="w-3 h-3 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                    {{ $product->salesCount() }} {{ __('Terjual') }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-[6px]">
                            <div class="w-6 h-6 flex shrink-0 items-center justify-center rounded-full overflow-hidden">
                                <img src="{{ $product->creator->avatar_url }}" class="w-full h-full object-cover"
                                    alt="logo">
                            </div>
                            <span class="font-semibold text-xs text-Rumahmade-grey transition-all duration-500">{{ $product->creator->name }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center py-20">
                    <p class="text-Rumahmade-grey dark:text-Rumahmade-light-grey text-xl font-medium transition-all duration-500">{{ __('No products from this creator yet.') }}</p>
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
            cellAlign: 'left',
            contain: true,
            pageDots: false,
            prevNextButtons: false,
        });

        $('.btn-prev').on('click', function () {
            $('.testi-carousel').flickity('previous', true);
        });

        $('.btn-next').on('click', function () {
            $('.testi-carousel').flickity('next', true);
        });
    </script>
@endpush