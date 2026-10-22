@extends('front.layouts.app')
@section('title', __('My Wishlist') . ' - RUMAHMADE Marketplace')
@section('content')

    <header
        class="w-full pt-[74px] pb-[34px] bg-[url('{{ asset('images/backgrounds/hero-image.png') }}')] bg-cover bg-no-repeat bg-center relative z-0 transition-all duration-500">
        <div class="container max-w-[1130px] mx-auto flex flex-col items-center justify-center gap-[34px] z-10 relative">
            <div class="flex flex-col gap-2 text-center w-fit mt-20 z-10">
                <h1 class="font-semibold text-[60px] leading-[130%] text-Rumahmade-black dark:text-white transition-all duration-300">{{ __('My Wishlist') }}</h1>
                <p class="text-lg text-Rumahmade-grey italic transition-all duration-300">{{ __('Products you have favorited.') }}</p>
            </div>
        </div>
        <div class="w-full h-full absolute top-0 bg-gradient-to-b from-white/80 via-white/50 to-white dark:from-Rumahmade-black/70 dark:via-Rumahmade-black/90 dark:to-Rumahmade-black z-0 transition-all duration-500"></div>
    </header>

    <header
        class="w-full pt-[74px] pb-[74px] bg-[url('{{ asset('images/backgrounds/hero-image.png') }}')] bg-cover bg-no-repeat bg-center relative z-0 transition-all duration-500">
        <div class="container max-w-[1130px] mx-auto flex flex-col items-center justify-center gap-[34px] z-10 relative">
            <div class="flex flex-col gap-2 text-center w-fit mt-10 z-10">
                <h1 class="font-black italic text-[70px] leading-[100%] tracking-tighter text-Rumahmade-black dark:text-white transition-all duration-500 uppercase">{{ __('Karya Favorit') }}</h1>
                <p class="text-xl text-Rumahmade-grey italic font-medium transition-all duration-300">{{ __('Daftar produk yang Anda impikan dan ingin segera dimiliki.') }}</p>
            </div>
        </div>
        <div class="w-full h-full absolute top-0 bg-gradient-to-b from-white/90 via-white/40 to-white dark:from-Rumahmade-black/80 dark:via-Rumahmade-black/95 dark:to-Rumahmade-black z-0 transition-all duration-500"></div>
    </header>

    <section id="WishlistResults" class="container max-w-[1130px] mx-auto mb-[102px] flex flex-col gap-10 min-h-[500px]">
        <div class="flex items-center justify-between border-b dark:border-[#333] pb-6">
            <h2 class="font-black italic text-4xl tracking-tight text-Rumahmade-black dark:text-white flex items-center gap-3">
                <span class="w-10 h-10 bg-red-100 dark:bg-red-500/10 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-500 fill-current" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                </span>
                {{ __('Koleksi Simpanan') }}
            </h2>
            <span class="text-xs font-black uppercase tracking-widest text-Rumahmade-grey bg-gray-100 dark:bg-white/5 py-2 px-4 rounded-full">{{ $wishlists->count() }} Produk</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-[30px]">
            @forelse($wishlists as $wishlist)
            @php $product = $wishlist->product; @endphp
            @if($product)
            <div class="product-card group flex flex-col rounded-[32px] bg-white dark:bg-Rumahmade-darker-grey border border-gray-100 dark:border-[#333] shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden relative">
                <a href="{{ route('front.details', $product->slug) }}" class="thumbnail w-full h-[220px] flex shrink-0 overflow-hidden relative">
                    <img src="{{ $product->cover_url }}" data-src="{{ $product->cover_url }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="thumbnail">
                    
                    <form action="{{ route('front.wishlist.toggle', $product->id) }}" method="POST" class="absolute top-4 left-4 z-20">
                        @csrf
                        <button type="submit" class="w-10 h-10 flex items-center justify-center rounded-2xl bg-white/90 dark:bg-black/80 backdrop-blur hover:bg-red-500 hover:text-white transition-all shadow-lg text-red-500">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </form>
 
                    <div class="absolute bottom-4 left-4 z-10 px-3 py-1.5 bg-black/60 backdrop-blur-md rounded-xl">
                        <p class="text-white font-black italic text-sm">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                </a>
                <div class="p-6 flex flex-col justify-between h-full gap-4">
                    <div class="flex flex-col gap-2">
                        <a href="{{ route('front.details', $product->slug) }}" class="text-lg font-black italic tracking-tight line-clamp-1 text-Rumahmade-black dark:text-white hover:text-indigo-600 transition-all">{{ $product->name }}</a>
                        <div class="flex items-center gap-1">
                            @php $avgRating = round($product->averageRating()); @endphp
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-3.5 h-3.5 {{ $i <= $avgRating ? 'text-amber-400' : 'text-gray-200 dark:text-gray-700' }} fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            @endfor
                            <span class="text-[10px] font-black text-Rumahmade-grey ml-1">({{ $product->reviews->count() }})</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between mt-2 pt-4 border-t dark:border-[#333]">
                        <a href="{{ route('front.creator', $product->creator->id) }}" class="flex items-center gap-2 group/creator">
                            <img src="{{ $product->creator->avatar_url }}" class="w-8 h-8 rounded-full object-cover border border-gray-100 dark:border-[#444]" alt="creator">
                            <span class="font-black italic text-[11px] text-Rumahmade-grey group-hover/creator:text-Rumahmade-black dark:group-hover/creator:text-white transition-all uppercase tracking-tight">{{ $product->creator->name }}</span>
                        </a>
                        <div class="flex flex-col items-end gap-1">
                            <span class="text-[10px] font-black uppercase tracking-widest text-indigo-500 bg-indigo-50 dark:bg-indigo-500/10 px-2.5 py-1 rounded-lg">{{ $product->category->name }}</span>
                            <p class="font-semibold text-[10px] text-Rumahmade-grey flex items-center gap-1">
                                <svg class="w-3 h-3 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                {{ $product->salesCount() }} {{ __('Terjual') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @empty
            <div class="col-span-1 sm:col-span-2 md:col-span-4 flex flex-col items-center justify-center py-24 bg-white dark:bg-white/5 rounded-[40px] border border-dashed border-gray-200 dark:border-gray-800 space-y-6">
                <div class="w-24 h-24 bg-gray-50 dark:bg-[#1a1a1a] rounded-[32px] flex items-center justify-center text-gray-300">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                </div>
                <div class="text-center space-y-2">
                    <h3 class="text-2xl font-black italic tracking-tight text-Rumahmade-black dark:text-white uppercase">{{ __('Daftar Favorit Masih Kosong') }}</h3>
                    <p class="text-Rumahmade-grey italic">{{ __('Belum ada produk yang menarik hati Anda? Mari mulai mencari!') }}</p>
                </div>
                <a href="{{ route('front.index') }}" class="py-4 px-10 bg-indigo-600 hover:bg-indigo-700 text-white font-black italic uppercase rounded-2xl shadow-xl shadow-indigo-100 dark:shadow-none transition-all transform hover:scale-105 active:scale-95 tracking-widest text-xs">
                    {{ __('Mulai Jelajah') }}
                </a>
            </div>
            @endforelse
        </div>
    </section>
@endsection

@endsection
