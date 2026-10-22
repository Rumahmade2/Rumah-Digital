<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Orders') }}
        </h2>
    </x-slot>

    <div class="py-12 text-Rumahmade-black dark:text-white transition-all duration-500">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            {{-- Header Action --}}
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 bg-white dark:bg-Rumahmade-darker-grey p-6 rounded-[24px] border border-gray-100 dark:border-[#333] shadow-sm">
                <div class="flex flex-col">
                    <h1 class="text-2xl font-black">{{ __('Kelola Pesanan Masuk') }}</h1>
                    <p class="text-Rumahmade-grey text-sm italic">{{ __('Pantau dan kelola semua pesanan produk digital dari pembeli Anda.') }}</p>
                </div>
                <div class="flex gap-2 w-full md:w-auto">
                    <a href="{{ route('admin.product_orders.export_pdf') }}" class="flex-1 md:flex-none flex items-center justify-center gap-2 py-3 px-6 bg-red-50 dark:bg-red-500/10 text-red-600 dark:text-red-400 font-bold rounded-xl hover:bg-red-100 transition-all border border-red-100 dark:border-red-500/20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        {{ __('Export PDF') }}
                    </a>
                </div>
            </div>

            {{-- Error Handling --}}
            @if ($errors->has('system_error'))
                <div class="bg-red-50 dark:bg-red-500/10 border border-red-100 dark:border-red-500/20 p-6 rounded-2xl">
                    <ul class="list-disc list-inside text-red-600 dark:text-red-400 font-bold">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Order List Table-like --}}
            <div class="bg-white dark:bg-Rumahmade-darker-grey rounded-[30px] border border-gray-100 dark:border-[#333] shadow-sm overflow-hidden">
                <div class="flex flex-col divide-y dark:divide-[#333]">
                    @forelse ($product_orders as $order)
                        <div class="p-6 md:p-8 flex flex-col lg:flex-row justify-between items-center gap-6 group hover:bg-gray-50 dark:hover:bg-white/5 transition-all duration-300">
                            
                            <div class="flex flex-col md:flex-row items-center gap-6 w-full lg:flex-1">
                                {{-- Thumbnail --}}
                                <div class="w-20 h-20 rounded-2xl overflow-hidden shrink-0 shadow-md border border-gray-100 dark:border-[#444] transition-all">
                                    <img src="{{ $order->product ? $order->product->cover_url : asset('images/default-product.png') }}" class="w-full h-full object-cover" alt="">
                                </div>
                                
                                {{-- Order Info --}}
                                <div class="flex flex-col flex-1 min-w-0 text-center md:text-left gap-1">
                                    <h3 class="font-black text-lg md:text-xl truncate">{{ $order->product?->name ?? __('Produk Terhapus') }}</h3>
                                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-3">
                                        <div class="flex items-center gap-2">
                                            <div class="w-5 h-5 rounded-full bg-indigo-100 dark:bg-indigo-500/20 flex items-center justify-center">
                                                <svg class="w-3 h-3 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                            </div>
                                            <span class="text-sm font-bold opacity-80">{{ $order->buyer?->name ?? __('Unknown') }}</span>
                                        </div>
                                        <span class="text-xs text-Rumahmade-grey font-medium tracking-tight truncate max-w-[150px] lowercase italic">{{ $order->buyer?->email }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row items-center gap-6 w-full lg:w-auto">
                                {{-- Financial --}}
                                <div class="flex flex-col items-center md:items-end">
                                    <span class="text-[10px] text-Rumahmade-grey uppercase font-bold tracking-widest leading-none mb-1">{{ __('Total Bayar') }}</span>
                                    <span class="text-lg font-black text-indigo-600 dark:text-indigo-400 italic">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                                </div>

                                {{-- Status --}}
                                <div class="shrink-0">
                                    @if($order->is_paid)
                                        <span class="px-5 py-2 inline-flex bg-green-50 dark:bg-green-500/10 text-green-600 dark:text-green-400 text-xs font-black rounded-full uppercase tracking-tighter border border-green-200 dark:border-green-500/20">
                                            {{ __('SUKSES') }}
                                        </span>
                                    @else
                                        <span class="px-5 py-2 inline-flex bg-orange-50 dark:bg-orange-500/10 text-orange-600 dark:text-orange-400 text-xs font-black rounded-full uppercase tracking-tighter border border-orange-200 dark:border-orange-500/20">
                                            {{ __('PENDING') }}
                                        </span>
                                    @endif
                                </div>

                                {{-- Actions --}}
                                <div class="flex items-center gap-2 w-full md:w-auto">
                                    @if(!$order->is_paid)
                                        <form action="{{ route('admin.product_orders.approve', $order) }}" method="POST" class="flex-1 md:flex-none">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="w-full flex items-center justify-center gap-2 py-3 px-6 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl transition-all shadow-lg shadow-green-200 dark:shadow-none whitespace-nowrap">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                                {{ __('Terima') }}
                                            </button>
                                        </form>
                                    @endif
                                    <a href="{{ route('admin.product_orders.show', $order) }}"
                                        class="flex-1 md:w-12 md:h-12 flex items-center justify-center rounded-xl border border-gray-200 dark:border-[#444] text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-white/10 transition-all" title="{{ __('Lihat Detail') }}">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.product_orders.destroy', $order) }}" method="POST" class="flex-1 md:flex-none" onsubmit="return confirm('Yakin ingin menghapus pesanan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full md:w-12 md:h-12 flex items-center justify-center rounded-xl bg-red-50 dark:bg-red-500/10 text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-500/20 transition-all" title="{{ __('Hapus Pesanan') }}">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="py-24 text-center flex flex-col items-center gap-4">
                            <div class="w-20 h-20 rounded-full bg-gray-50 dark:bg-white/5 flex items-center justify-center mb-2">
                                <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            </div>
                            <p class="text-Rumahmade-grey font-medium">{{ __('Belum ada pesanan masuk untuk produk Anda.') }}</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>