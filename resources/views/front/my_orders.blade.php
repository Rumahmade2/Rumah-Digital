@extends('front.layouts.app')
@section('title', __('My Orders') . ' - RUMAHMADE Marketplace')
@section('content')

    <header class="w-full pt-[74px] pb-[74px] bg-[url('{{ asset('images/backgrounds/hero-image.png') }}')] bg-cover bg-no-repeat bg-center relative z-0 transition-all duration-500">
        <div class="container max-w-[1130px] mx-auto flex flex-col items-center justify-center gap-[34px] z-10 relative">
            <div class="flex flex-col gap-2 text-center w-fit mt-10 z-10">
                <h1 class="font-black italic text-[70px] leading-[100%] tracking-tighter text-Rumahmade-black dark:text-white transition-all duration-500 uppercase">{{ __('Riwayat Pesanan') }}</h1>
                <p class="text-xl text-Rumahmade-grey italic font-medium transition-all duration-300">{{ __('Semua transaksi pembelian produk digital Anda.') }}</p>
            </div>
        </div>
        <div class="w-full h-full absolute top-0 bg-gradient-to-b from-white/90 via-white/40 to-white dark:from-Rumahmade-black/80 dark:via-Rumahmade-black/95 dark:to-Rumahmade-black z-0 transition-all duration-500"></div>
    </header>

    <section id="MyOrders" class="container max-w-[1130px] mx-auto mb-[102px] flex flex-col gap-8 min-h-[500px]">

        <!-- Header + Stats -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b dark:border-[#333] pb-6">
            <h2 class="font-black italic text-4xl tracking-tight text-Rumahmade-black dark:text-white flex items-center gap-3">
                <span class="w-10 h-10 bg-blue-100 dark:bg-blue-500/10 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-[#2D68F8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                </span>
                {{ __('Pesanan Saya') }}
            </h2>
            <div class="flex items-center gap-3">
                <span class="text-xs font-black uppercase tracking-widest text-Rumahmade-grey bg-gray-100 dark:bg-white/5 py-2 px-4 rounded-full">{{ $my_orders->count() }} Transaksi</span>
                @if($my_orders->count() > 0)
                <a href="{{ route('product-orders.export_pdf') }}" class="flex items-center gap-2 text-xs font-bold text-[#2D68F8] dark:text-[#5e8bfa] bg-[#2D68F8]/10 hover:bg-[#2D68F8]/20 py-2 px-4 rounded-full transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Export PDF
                </a>
                @endif
            </div>
        </div>

        <!-- Order Cards -->
        <div class="flex flex-col gap-5">
            @forelse($my_orders as $order)
            <div class="group flex flex-col sm:flex-row items-start sm:items-center gap-5 p-6 rounded-[24px] bg-white dark:bg-Rumahmade-darker-grey border border-gray-100 dark:border-[#333] shadow-sm hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 overflow-hidden relative">
                
                <!-- Status badge indicator bar at left -->
                <div class="absolute left-0 top-0 h-full w-1 rounded-l-[24px] {{ $order->is_paid ? 'bg-gradient-to-b from-emerald-400 to-emerald-600' : 'bg-gradient-to-b from-amber-400 to-amber-600' }}"></div>

                <!-- Product Thumbnail -->
                <a href="{{ $order->product ? route('front.details', $order->product->slug) : '#' }}" class="shrink-0">
                    <div class="w-[100px] h-[70px] rounded-xl overflow-hidden bg-gray-100 dark:bg-[#1a1a1a]">
                        @if($order->product)
                        <img src="{{ $order->product->cover_url }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $order->product->name }}">
                        @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        @endif
                    </div>
                </a>

                <!-- Order Info -->
                <div class="flex flex-col gap-1 flex-1 min-w-0">
                    <a href="{{ $order->product ? route('front.details', $order->product->slug) : '#' }}" class="font-black italic text-lg tracking-tight text-Rumahmade-black dark:text-white hover:text-[#2D68F8] transition-all line-clamp-1">
                        {{ $order->product ? $order->product->name : 'Produk Tidak Tersedia' }}
                    </a>
                    <div class="flex items-center gap-3 flex-wrap">
                        <span class="text-xs text-Rumahmade-grey font-medium">Order #{{ $order->id }}</span>
                        <span class="w-1 h-1 rounded-full bg-gray-300 dark:bg-gray-600"></span>
                        <span class="text-xs text-Rumahmade-grey">{{ $order->created_at->format('d M Y, H:i') }}</span>
                        @if($order->product)
                        <span class="w-1 h-1 rounded-full bg-gray-300 dark:bg-gray-600"></span>
                        <span class="text-[10px] font-black uppercase tracking-widest text-indigo-500 bg-indigo-50 dark:bg-indigo-500/10 px-2 py-0.5 rounded-md">{{ $order->product->category?->name }}</span>
                        @endif
                    </div>
                </div>

                <!-- Price -->
                <div class="shrink-0 text-right">
                    <p class="font-black text-xl bg-clip-text text-transparent bg-gradient-to-r from-[#B05CB0] to-[#FCB16B]">
                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                    </p>
                </div>

                <!-- Status & Actions -->
                <div class="shrink-0 flex flex-col items-end gap-2">
                    @if($order->is_paid)
                        <span class="flex items-center gap-1.5 text-xs font-bold text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-500/10 px-3 py-1.5 rounded-full">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            {{ __('Lunas') }}
                        </span>
                        @if($order->product && $order->download_count < 1)
                        <a href="{{ route('admin.product_orders.download', $order) }}" class="flex items-center gap-1.5 text-xs font-bold text-[#2D68F8] bg-[#2D68F8]/10 hover:bg-[#2D68F8]/20 px-3 py-1.5 rounded-full transition-all whitespace-nowrap">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            {{ __('Download') }}
                        </a>
                        @elseif($order->download_count >= 1)
                        <span class="text-xs text-Rumahmade-grey bg-gray-100 dark:bg-white/5 px-3 py-1.5 rounded-full">
                            {{ __('Sudah Diunduh') }}
                        </span>
                        @endif
                    @else
                        <span class="flex items-center gap-1.5 text-xs font-bold text-amber-600 dark:text-amber-400 bg-amber-50 dark:bg-amber-500/10 px-3 py-1.5 rounded-full">
                            <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                            {{ __('Menunggu Pembayaran') }}
                        </span>
                    @endif
                </div>
            </div>

            @empty
            <!-- Empty State -->
            <div class="flex flex-col items-center justify-center py-24 bg-white dark:bg-white/5 rounded-[40px] border border-dashed border-gray-200 dark:border-gray-800 space-y-6">
                <div class="w-24 h-24 bg-gray-50 dark:bg-[#1a1a1a] rounded-[32px] flex items-center justify-center text-gray-300">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                </div>
                <div class="text-center space-y-2">
                    <h3 class="text-2xl font-black italic tracking-tight text-Rumahmade-black dark:text-white uppercase">{{ __('Belum Ada Pesanan') }}</h3>
                    <p class="text-Rumahmade-grey italic">{{ __('Anda belum pernah melakukan pembelian produk digital apapun.') }}</p>
                </div>
                <a href="{{ route('front.index') }}" class="py-4 px-10 bg-gradient-to-r from-[#2D68F8] to-[#6b2df8] hover:opacity-90 text-white font-black italic uppercase rounded-2xl shadow-xl shadow-blue-100 dark:shadow-none transition-all transform hover:scale-105 active:scale-95 tracking-widest text-xs">
                    {{ __('Mulai Belanja') }}
                </a>
            </div>
            @endforelse
        </div>

    </section>

@endsection
