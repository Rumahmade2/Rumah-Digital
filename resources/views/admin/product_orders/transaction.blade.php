<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12 text-Rumahmade-black dark:text-white transition-all duration-500">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            {{-- Header Action --}}
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 bg-white dark:bg-Rumahmade-darker-grey p-6 rounded-[24px] border border-gray-100 dark:border-[#333] shadow-sm">
                <div class="flex flex-col">
                    <h1 class="text-2xl font-black">{{ __('Riwayat Pembelian Saya') }}</h1>
                    <p class="text-Rumahmade-grey text-sm italic">{{ __('Daftar semua produk digital yang telah Anda beli.') }}</p>
                </div>
                <div class="flex gap-2 w-full md:w-auto">
                    <a href="{{ route('product-orders.export_pdf') }}" class="flex-1 md:flex-none flex items-center justify-center gap-2 py-3 px-6 bg-red-50 dark:bg-red-500/10 text-red-600 dark:text-red-400 font-bold rounded-xl hover:bg-red-100 transition-all border border-red-100 dark:border-red-500/20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        {{ __('Export PDF') }}
                    </a>
                    <a href="{{ route('front.index') }}" class="flex-1 md:flex-none flex items-center justify-center gap-2 py-3 px-6 bg-gray-50 dark:bg-white/5 text-Rumahmade-grey font-bold rounded-xl hover:bg-gray-100 transition-all">
                        {{ __('Ke Toko') }}
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

            {{-- Transaction List --}}
            <div class="bg-white dark:bg-Rumahmade-darker-grey rounded-[30px] border border-gray-100 dark:border-[#333] shadow-sm overflow-hidden">
                <div class="flex flex-col divide-y dark:divide-[#333]">
                    @forelse ($my_transactions as $transaction)
                        <div class="p-6 md:p-8 flex flex-col lg:flex-row justify-between items-center gap-6 group hover:bg-gray-50 dark:hover:bg-white/5 transition-all duration-300">
                            
                            <div class="flex flex-col md:flex-row items-center gap-6 w-full lg:flex-1">
                                {{-- Thumbnail --}}
                                <div class="w-20 h-20 rounded-2xl overflow-hidden shrink-0 shadow-md border border-gray-100 dark:border-[#444] group-hover:scale-105 transition-all">
                                    <img src="{{ $transaction->product ? $transaction->product->cover_url : asset('images/default-product.png') }}" class="w-full h-full object-cover" alt="">
                                </div>
                                
                                {{-- Info --}}
                                <div class="flex flex-col flex-1 min-w-0 text-center md:text-left gap-1">
                                    <div class="flex items-center justify-center md:justify-start gap-2 mb-1">
                                        <span class="px-2 py-0.5 bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 text-[10px] font-bold rounded uppercase">
                                            {{ $transaction->product?->category?->name ?? __('Digital') }}
                                        </span>
                                    </div>
                                    <h3 class="font-black text-lg md:text-xl truncate">{{ $transaction->product?->name ?? __('Produk Terhapus') }}</h3>
                                    <div class="flex items-center justify-center md:justify-start gap-2">
                                        <span class="text-xs text-Rumahmade-grey font-medium">{{ __('oleh') }}</span>
                                        <span class="text-xs font-bold text-indigo-600">{{ $transaction->product?->creator?->name ?? 'Unknown' }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row items-center gap-8 w-full lg:w-auto">
                                {{-- Price --}}
                                <div class="flex flex-col items-center md:items-end">
                                    <span class="text-[10px] text-Rumahmade-grey uppercase font-bold tracking-widest leading-none mb-1">{{ __('Total Bayar') }}</span>
                                    <span class="text-lg font-black italic">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</span>
                                </div>

                                {{-- Status --}}
                                <div class="shrink-0">
                                    @if($transaction->is_paid)
                                        <span class="px-5 py-2 inline-flex bg-green-50 dark:bg-green-500/10 text-green-600 dark:text-green-400 text-xs font-black rounded-full uppercase tracking-tighter border border-green-200 dark:border-green-500/20">
                                            {{ __('BERHASIL') }}
                                        </span>
                                    @else
                                        <span class="px-5 py-2 inline-flex bg-orange-50 dark:bg-orange-500/10 text-orange-600 dark:text-orange-400 text-xs font-black rounded-full uppercase tracking-tighter border border-orange-200 dark:border-orange-500/20">
                                            {{ __('MENUNGGU') }}
                                        </span>
                                    @endif
                                </div>

                                {{-- Action --}}
                                <a href="{{ route('admin.product_orders.transaction.detail', $transaction) }}" class="w-full md:w-auto py-3 px-8 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl transition-all shadow-lg shadow-indigo-200 dark:shadow-none text-center">
                                    {{ __('Detail Transaksi') }}
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="py-24 text-center flex flex-col items-center gap-4">
                            <div class="w-20 h-20 rounded-full bg-gray-50 dark:bg-white/5 flex items-center justify-center mb-2">
                                <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            </div>
                            <p class="text-Rumahmade-grey font-medium">{{ __('Anda belum melakukan pembelian apapun.') }}</p>
                            <a href="{{ route('front.index') }}" class="text-indigo-600 font-bold hover:underline">{{ __('Cari Produk Digital') }}</a>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
