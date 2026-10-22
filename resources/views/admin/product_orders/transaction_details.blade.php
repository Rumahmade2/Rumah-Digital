<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Details') }}
        </h2>
    </x-slot>

    <div class="py-12 text-Rumahmade-black dark:text-white transition-all duration-500">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            {{-- Notification --}}
            @if (session('success'))
                <div class="bg-green-50 dark:bg-green-500/10 border border-green-200 dark:border-green-500/20 p-6 rounded-[24px] flex items-center gap-4 text-green-600 dark:text-green-400 font-black italic">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-50 dark:bg-red-500/10 border border-red-200 dark:border-red-500/20 p-6 rounded-[24px] flex items-center gap-4 text-red-600 dark:text-red-400 font-black italic">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ session('error') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                {{-- Left Side: Product & Proof --}}
                <div class="lg:col-span-2 space-y-8">
                    
                    {{-- Product Card --}}
                    <div class="bg-white dark:bg-Rumahmade-darker-grey rounded-[32px] border border-gray-100 dark:border-[#333] shadow-xl overflow-hidden group">
                        <div class="p-8 md:p-10">
                            <div class="flex flex-col md:flex-row items-center gap-8">
                                <div class="w-32 h-32 md:w-40 md:h-40 rounded-[28px] overflow-hidden shadow-2xl border-4 border-white dark:border-[#444] shrink-0 group-hover:scale-105 transition-transform duration-500">
                                    <img src="{{ $order->product ? $order->product->cover_url : asset('images/default-product.png') }}" class="w-full h-full object-cover" alt="">
                                </div>
                                <div class="flex-1 text-center md:text-left space-y-3">
                                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-2">
                                        <span class="px-4 py-1 bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 text-[10px] font-black rounded-full uppercase tracking-widest">
                                            {{ $order->product?->category?->name ?? __('Digital Assets') }}
                                        </span>
                                    </div>
                                    <h1 class="text-3xl font-black italic tracking-tighter">{{ $order->product?->name ?? __('Produk Terhapus') }}</h1>
                                    <p class="text-sm font-medium text-Rumahmade-grey">{{ __('Karya dari') }} <span class="text-indigo-600 font-bold">{{ $order->product?->creator?->name ?? 'Unknown' }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Download Section (If Paid) --}}
                    @if($order->is_paid)
                        <div class="bg-indigo-600 rounded-[32px] p-8 md:p-12 text-white shadow-2xl relative overflow-hidden group">
                            <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:scale-110 transition-transform">
                                <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21l-8-8h5V3h6v10h5l-8 8z"/></svg>
                            </div>
                            <div class="relative z-10 space-y-6">
                                <div class="space-y-2">
                                    <h2 class="text-2xl font-black italic uppercase tracking-tight">{{ __('Siap untuk Digunakan!') }}</h2>
                                    <p class="text-indigo-100 text-sm font-medium">{{ __('Pembayaran Anda telah diverifikasi. Silakan unduh berkas digital Anda di bawah ini.') }}</p>
                                </div>
                                
                                @if($order->download_count < 1)
                                    <a href="{{ route('admin.product_orders.download', $order) }}" class="inline-flex items-center gap-3 py-4 px-10 bg-white text-indigo-600 font-black rounded-2xl shadow-xl hover:scale-105 transition-all transform active:scale-95 group">
                                        <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                        {{ __('Unduh Berkas ZIP Sekarang') }}
                                    </a>
                                @else
                                    <div class="inline-flex items-center gap-3 py-4 px-10 bg-white/20 backdrop-blur-md border border-white/30 text-white font-black rounded-2xl cursor-not-allowed">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 15l-3-3m0 0l3-3m-3 3h8M5 12a7 7 0 1114 0 7 7 0 01-14 0z"/></svg>
                                        {{ __('Limit Unduhan Habis') }}
                                    </div>
                                    <p class="text-[10px] font-bold text-red-200 uppercase tracking-widest">{{ __('Maaf, Anda hanya diperbolehkan mengunduh berkas sebanyak 1 kali.') }}</p>
                                @endif
                            </div>
                        </div>
                    @else
                        {{-- Proof Preview --}}
                        <div class="bg-white dark:bg-Rumahmade-darker-grey rounded-[32px] border border-gray-100 dark:border-[#333] shadow-xl p-8 space-y-6">
                            <div class="flex items-center justify-between border-b dark:border-[#444] pb-6">
                                <h2 class="text-xl font-black italic">{{ __('Bukti Pembayaran Anda') }}</h2>
                                <span class="px-4 py-1 bg-orange-50 dark:bg-orange-500/10 text-orange-600 dark:text-orange-400 text-[10px] font-black rounded-full uppercase tracking-widest animate-pulse">{{ __('Menunggu Verifikasi') }}</span>
                            </div>
                            <div class="relative rounded-2xl overflow-hidden border-2 border-dashed border-gray-100 dark:border-[#444]">
                                @if($order->proof)
                                    <img src="{{ Storage::url($order->proof) }}" class="w-full h-auto opacity-70" alt="">
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <span class="bg-white/90 dark:bg-[#111]/80 backdrop-blur-sm p-4 rounded-2xl font-bold shadow-xl text-xs md:text-sm text-center">{{ __('Penjual sedang meninjau pembayaran Anda.') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Right Side: Summary --}}
                <div class="space-y-8">
                    <div class="bg-white dark:bg-Rumahmade-darker-grey rounded-[32px] border border-gray-100 dark:border-[#333] shadow-xl p-8 space-y-8">
                        <div class="space-y-6">
                            <h3 class="text-xs font-black uppercase tracking-[0.2em] text-Rumahmade-grey">{{ __('Ringkasan Pesanan') }}</h3>
                            
                            <div class="space-y-4">
                                <div class="flex justify-between">
                                    <span class="text-sm font-bold text-Rumahmade-grey">{{ __('ID Transaksi') }}</span>
                                    <span class="text-sm font-black italic">#RMH-{{ $order->id }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm font-bold text-Rumahmade-grey">{{ __('Tanggal') }}</span>
                                    <span class="text-sm font-black italic">{{ $order->created_at?->format('d M Y') }}</span>
                                </div>
                                <div class="pt-4 border-t dark:border-[#444] flex flex-col gap-2">
                                    <span class="text-[10px] font-black text-Rumahmade-grey uppercase tracking-widest">{{ __('Total Pembayaran') }}</span>
                                    <div class="flex items-center justify-between">
                                        <span class="text-3xl font-black text-indigo-600 dark:text-indigo-400 italic font-family-mono">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                                        <a href="{{ route('product-orders.download_invoice', $order) }}" class="p-2 bg-red-50 dark:bg-red-500/10 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-100 transition-all shadow-sm border border-red-100 dark:border-red-500/20" title="{{ __('Download Invoice PDF') }}">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 bg-gray-50 dark:bg-white/5 rounded-2xl border border-gray-100 dark:border-[#333] space-y-2">
                            <span class="text-[10px] font-black text-Rumahmade-grey uppercase">{{ __('Status Verifikasi') }}</span>
                            @if($order->is_paid)
                                <div class="flex items-center gap-2 text-green-600 font-black italic">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    {{ __('Terverifikasi') }}
                                </div>
                            @else
                                <div class="flex items-center gap-2 text-orange-600 font-black italic">
                                    <svg class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                                    {{ __('Proses Manual') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <a href="{{ route('admin.product_orders.transaction') }}" class="flex items-center justify-center gap-2 text-sm font-black text-Rumahmade-grey hover:text-indigo-600 transition-all uppercase tracking-widest">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        {{ __('Kembali ke Riwayat') }}
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>