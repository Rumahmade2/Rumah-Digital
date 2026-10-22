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
                
                {{-- Left Side: Details & Proof --}}
                <div class="lg:col-span-2 space-y-8">
                    
                    {{-- Product Info Card --}}
                    <div class="bg-white dark:bg-Rumahmade-darker-grey rounded-[32px] border border-gray-100 dark:border-[#333] shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500">
                        <div class="p-8 md:p-10">
                            <div class="flex flex-col md:flex-row items-center gap-8">
                                <div class="w-32 h-32 md:w-40 md:h-40 rounded-[24px] overflow-hidden shadow-2xl border-4 border-white dark:border-[#444] shrink-0 rotate-2 group-hover:rotate-0 transition-transform duration-500">
                                    <img src="{{ $order->product ? $order->product->cover_url : asset('images/default-product.png') }}" class="w-full h-full object-cover" alt="">
                                </div>
                                <div class="flex-1 text-center md:text-left space-y-2">
                                    <span class="px-4 py-1 bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 text-[10px] font-black rounded-full uppercase tracking-widest">
                                        {{ $order->product?->category?->name ?? __('Digital Assets') }}
                                    </span>
                                    <h1 class="text-3xl font-black italic tracking-tighter">{{ $order->product?->name ?? __('Produk Terhapus') }}</h1>
                                    <div class="flex items-center justify-center md:justify-start gap-4">
                                        <div class="flex flex-col">
                                            <span class="text-[10px] text-Rumahmade-grey uppercase font-bold tracking-widest leading-none mb-1">{{ __('Total Pesanan') }}</span>
                                            <span class="text-2xl font-black text-indigo-600 dark:text-indigo-400 italic">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Payment Proof Card --}}
                    <div class="bg-white dark:bg-Rumahmade-darker-grey rounded-[32px] border border-gray-100 dark:border-[#333] shadow-xl p-8 space-y-6">
                        <div class="flex items-center justify-between border-b dark:border-[#444] pb-6">
                            <h2 class="text-xl font-black italic">{{ __('Bukti Pembayaran') }}</h2>
                            <div class="w-10 h-10 rounded-full bg-orange-50 dark:bg-orange-500/10 flex items-center justify-center text-orange-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                            </div>
                        </div>
                        
                        <div class="relative group">
                            @if($order->proof)
                                <div class="rounded-2xl overflow-hidden shadow-2xl border-2 border-gray-100 dark:border-[#444] transition-all hover:scale-[1.01]">
                                    <img src="{{ Storage::url($order->proof) }}" class="w-full h-auto cursor-zoom-in" alt="Payment Proof" onclick="window.open(this.src)">
                                </div>
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center pointer-events-none">
                                    <span class="bg-white/90 backdrop-blur-sm text-Rumahmade-black px-6 py-2 rounded-full font-bold shadow-xl">{{ __('Klik untuk Lihat Penuh') }}</span>
                                </div>
                            @else
                                <div class="bg-gray-50 dark:bg-white/5 h-64 rounded-2xl flex flex-col items-center justify-center gap-4 border-2 border-dashed border-gray-100 dark:border-[#333]">
                                    <svg class="w-16 h-16 text-gray-200 dark:text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <p class="text-Rumahmade-grey font-bold italic">{{ __('Belum ada bukti yang diunggah') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Right Side: Summary --}}
                <div class="space-y-8">
                    <div class="bg-gradient-to-br from-indigo-600 to-teal-500 rounded-[32px] p-8 text-white shadow-2xl space-y-8">
                        <div class="space-y-4">
                            <h3 class="text-xs font-black uppercase tracking-[0.2em] opacity-80">{{ __('Data Transaksi') }}</h3>
                            <div class="space-y-6">
                                <div class="flex flex-col gap-1">
                                    <span class="text-[10px] opacity-60 uppercase font-bold">{{ __('Pembeli') }}</span>
                                    <span class="text-lg font-black tracking-tight">{{ $order->buyer?->name }}</span>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <span class="text-[10px] opacity-60 uppercase font-bold">{{ __('Tanggal Masuk') }}</span>
                                    <span class="text-lg font-black tracking-tight">{{ $order->created_at?->format('d M Y, H:i') }}</span>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <span class="text-[10px] opacity-60 uppercase font-bold">{{ __('ID Transaksi') }}</span>
                                    <span class="text-sm font-bold tracking-tight opacity-90 family-mono">#RMH-{{ $order->id }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="pt-8 border-t border-white/20">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-sm font-bold opacity-80">{{ __('Status Pembayaran') }}</span>
                                @if($order->is_paid)
                                    <span class="px-4 py-1 bg-white/20 backdrop-blur-md rounded-full text-[10px] font-black uppercase tracking-widest">{{ __('SUKSES') }}</span>
                                @else
                                    <span class="px-4 py-1 bg-white/20 backdrop-blur-md rounded-full text-[10px] font-black uppercase tracking-widest animate-pulse">{{ __('PENDING') }}</span>
                                @endif
                            </div>
                            
                            @if(!$order->is_paid)
                                <form action="{{ route('admin.product_orders.approve', $order) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="w-full py-4 bg-white text-indigo-600 font-black rounded-2xl shadow-xl hover:scale-105 transition-all transform active:scale-95">
                                        {{ __('Terima Pesanan') }}
                                    </button>
                                </form>
                                <p class="text-[8px] text-center mt-3 opacity-60 uppercase font-bold tracking-widest">{{ __('Pastikan bukti transfer sudah sesuai') }}</p>
                            @else
                                <div class="w-full py-4 bg-white/20 backdrop-blur-md border border-white/30 text-white font-black rounded-2xl text-center">
                                    {{ __('Pesanan Selesai') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <a href="{{ route('admin.product_orders.index') }}" class="flex items-center justify-center gap-2 text-sm font-black text-Rumahmade-grey hover:text-indigo-600 transition-all uppercase tracking-widest">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        {{ __('Kembali ke Daftar') }}
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

