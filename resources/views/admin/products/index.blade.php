<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            {{-- Header Action --}}
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 bg-white dark:bg-Rumahmade-darker-grey p-6 rounded-[24px] border border-gray-100 dark:border-[#333] shadow-sm">
                <div class="flex flex-col">
                    <h1 class="text-2xl font-black text-Rumahmade-black dark:text-white">{{ __('Katalog Produk Saya') }}</h1>
                    <p class="text-Rumahmade-grey text-sm">{{ __('Kelola dan pantau semua produk digital Anda.') }}</p>
                </div>
                <a href="{{ route('admin.products.create') }}" class="w-full md:w-auto flex items-center justify-center gap-2 py-3 px-6 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl transition-all shadow-lg shadow-indigo-200 dark:shadow-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    {{ __('Tambah Produk Baru') }}
                </a>
            </div>

            {{-- Error Handling --}}
            @if ($errors->has('system_error'))
                <div class="bg-red-50 dark:bg-red-500/10 border border-red-100 dark:border-red-500/20 p-6 rounded-2xl">
                    <ul class="list-disc list-inside text-red-600 dark:text-red-400 font-medium">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Product List --}}
            <div class="bg-white dark:bg-Rumahmade-darker-grey rounded-[30px] border border-gray-100 dark:border-[#333] shadow-sm overflow-hidden">
                <div class="flex flex-col divide-y dark:divide-[#333]">
                    @forelse ($products as $product)
                        <div class="p-6 md:p-8 flex flex-col md:flex-row justify-between items-center gap-6 group hover:bg-gray-50 dark:hover:bg-white/5 transition-all duration-300">
                            <div class="flex flex-col md:flex-row items-center gap-6 w-full">
                                {{-- Thumbnail --}}
                                <div class="w-24 h-24 md:w-32 md:h-32 rounded-[20px] overflow-hidden shrink-0 shadow-md border border-gray-100 dark:border-[#444] relative group-hover:scale-105 transition-all">
                                    <img src="{{ $product->cover_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                    @if($product->original_price > 0)
                                        <div class="absolute top-2 left-2 bg-red-500 text-white text-[8px] font-bold px-1.5 py-0.5 rounded shadow-sm">
                                            PROMO
                                        </div>
                                    @endif
                                </div>
                                
                                {{-- Info --}}
                                <div class="flex flex-col gap-2 text-center md:text-left flex-1 min-w-0">
                                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-2">
                                        <span class="px-3 py-1 bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 text-[10px] font-bold rounded-full uppercase tracking-wider">
                                            {{ $product->category?->name ?? __('Digital Assets') }}
                                        </span>
                                        <span class="px-3 py-1 bg-green-50 dark:bg-green-500/10 text-green-600 dark:text-green-400 text-[10px] font-bold rounded-full uppercase tracking-wider">
                                            Live
                                        </span>
                                    </div>
                                    <h3 class="font-black text-xl md:text-2xl text-Rumahmade-black dark:text-white truncate group-hover:text-indigo-600 transition-colors">{{ $product->name }}</h3>
                                    
                                    <div class="flex items-center justify-center md:justify-start gap-3 mt-1">
                                        <div class="flex flex-col">
                                            @if($product->original_price > 0)
                                                <span class="text-xs text-gray-400 line-through leading-none">Rp {{ number_format($product->price + $product->original_price, 0, ',', '.') }}</span>
                                            @endif
                                            <span class="font-black text-lg text-indigo-600 dark:text-indigo-400 italic">
                                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Actions --}}
                            <div class="flex items-center gap-3 w-full md:w-auto">
                                <a href="{{ route('front.details', $product->slug) }}" target="_blank" class="flex-1 md:w-12 md:h-12 flex items-center justify-center rounded-xl bg-gray-50 dark:bg-white/5 text-gray-500 hover:bg-gray-100 dark:hover:bg-white/10 transition-all" title="{{ __('View Store') }}">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </a>
                                <a href="{{ route('admin.products.edit', $product) }}" class="flex-1 md:w-12 md:h-12 flex items-center justify-center rounded-xl bg-indigo-50 dark:bg-indigo-500/10 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all shadow-sm" title="{{ __('Edit') }}">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('{{ __('Apakah Anda yakin ingin menghapus produk ini?') }}')" class="flex-1 md:flex-none">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full md:w-12 md:h-12 flex items-center justify-center rounded-xl bg-red-50 dark:bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white transition-all shadow-sm" title="{{ __('Hapus') }}">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="p-20 text-center flex flex-col items-center gap-4">
                            <div class="w-20 h-20 rounded-full bg-gray-50 dark:bg-white/5 flex items-center justify-center mb-2">
                                <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                            </div>
                            <p class="text-Rumahmade-grey font-medium">{{ __('Anda belum memiliki produk apapun.') }}</p>
                            <a href="{{ route('admin.products.create') }}" class="text-indigo-600 font-bold hover:underline">{{ __('Mulai jualan sekarang') }}</a>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
