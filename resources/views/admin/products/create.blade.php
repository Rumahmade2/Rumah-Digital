<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-Rumahmade-darker-grey overflow-hidden shadow-xl sm:rounded-[32px] border border-gray-100 dark:border-[#333] transition-all duration-500">
                
                <div class="p-8 md:p-12">
                    {{-- Header --}}
                    <div class="flex items-center justify-between mb-10 border-b dark:border-[#444] pb-6">
                        <div class="flex flex-col gap-1">
                            <h1 class="text-3xl font-black text-Rumahmade-black dark:text-white">{{ __('Tambah Produk Baru') }}</h1>
                            <p class="text-Rumahmade-grey text-sm font-medium">{{ __('Mulai bagikan karya digital Anda dengan dunia sekarang.') }}</p>
                        </div>
                        <a href="{{ route('admin.products.index') }}" class="text-gray-400 hover:text-gray-600 dark:hover:text-white transition-colors">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </a>
                    </div>

                    @if ($errors->has('system_error'))
                        <div class="mb-8 p-4 bg-red-50 dark:bg-red-500/10 border-l-4 border-red-500 rounded-r-xl">
                            <ul class="text-red-600 dark:text-red-400 font-bold text-sm">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="space-y-10">
                        @csrf   

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                            
                            {{-- Left Column: Images & Files --}}
                            <div class="space-y-8">
                                <h2 class="text-lg font-bold text-Rumahmade-black dark:text-white flex items-center gap-2">
                                    <span class="w-8 h-8 rounded-lg bg-indigo-50 dark:bg-indigo-500/10 flex items-center justify-center text-indigo-600">1</span>
                                    {{ __('Media & Berkas') }}
                                </h2>

                                {{-- Cover Upload --}}
                                <div class="space-y-4">
                                    <x-input-label for="cover" :value="__('Thumbnail Produk')" class="font-bold text-gray-700 dark:text-gray-300" />
                                    <div class="relative group w-full aspect-video rounded-3xl overflow-hidden bg-gray-50 dark:bg-white/5 border-2 border-dashed border-gray-200 dark:border-[#444] transition-all hover:border-indigo-400 flex flex-col items-center justify-center gap-3">
                                        <div class="relative z-10 flex flex-col items-center gap-2 pointer-events-none">
                                            <div class="w-16 h-16 bg-white dark:bg-[#111] rounded-2xl shadow-sm flex items-center justify-center text-indigo-600 group-hover:scale-110 transition-transform">
                                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                            </div>
                                            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">{{ __('Klik untuk Unggah') }}</span>
                                        </div>
                                        <input id="cover" type="file" name="cover" class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*" required>
                                    </div>
                                    <p class="text-[10px] text-gray-400 italic">{{ __('Format: JPG, PNG, GIF. Maks: 4MB.') }}</p>
                                    <x-input-error :messages="$errors->get('cover')" class="mt-2" />
                                </div>

                                {{-- File Upload --}}
                                <div class="p-6 bg-gray-50 dark:bg-white/5 rounded-3xl border border-gray-100 dark:border-[#444] space-y-4 text-center">
                                    <x-input-label for="path_file" :value="__('Berkas Digital (ZIP)')" class="font-bold" />
                                    <div class="relative group">
                                        <input id="path_file" type="file" name="path_file" class="hidden" accept=".zip" required>
                                        <label for="path_file" class="flex flex-col items-center justify-center gap-4 py-8 border-2 border-dashed border-gray-200 dark:border-[#333] rounded-2xl text-sm font-bold text-gray-400 hover:border-orange-400 hover:text-orange-600 cursor-pointer transition-all bg-white dark:bg-[#111]">
                                            <div class="w-12 h-12 bg-orange-50 dark:bg-orange-500/10 rounded-xl flex items-center justify-center text-orange-600">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                            </div>
                                            <div class="flex flex-col">
                                                <span>{{ __('Pilih Berkas ZIP') }}</span>
                                                <span class="text-[10px] opacity-70 font-normal">Maks: 40MB</span>
                                            </div>
                                        </label>
                                    </div>
                                    <x-input-error :messages="$errors->get('path_file')" class="mt-2" />
                                </div>
                            </div>

                            {{-- Right Column: Basic Info & Pricing --}}
                            <div class="space-y-8">
                                <h2 class="text-lg font-bold text-Rumahmade-black dark:text-white flex items-center gap-2">
                                    <span class="w-8 h-8 rounded-lg bg-teal-50 dark:bg-teal-500/10 flex items-center justify-center text-teal-600">2</span>
                                    {{ __('Detail Informasi') }}
                                </h2>

                                {{-- Product Name --}}
                                <div class="space-y-2">
                                    <x-input-label for="name" :value="__('Nama Produk')" class="font-bold" />
                                    <x-text-input id="name" class="block w-full bg-gray-50 dark:bg-white/5 border-none rounded-2xl py-4 focus:ring-2 focus:ring-teal-500" type="text" name="name" :value="old('name')" placeholder="Contoh: Digital Planner 2024" required />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                {{-- Category --}}
                                <div class="space-y-2">
                                    <x-input-label for="category" :value="__('Kategori')" class="font-bold" />
                                    <select name="category_id" id="category" class="w-full bg-gray-50 dark:bg-white/5 border-none rounded-2xl py-4 focus:ring-2 focus:ring-teal-500 text-gray-700 dark:text-gray-300" required>
                                        <option value="">{{ __('Pilih Kategori') }}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                                </div>

                                {{-- Pricing Group --}}
                                <div class="grid grid-cols-2 gap-4 bg-indigo-50/50 dark:bg-indigo-500/5 p-6 rounded-3xl border border-indigo-100 dark:border-indigo-500/10">
                                    <div class="space-y-2">
                                        <x-input-label for="price" :value="__('Harga Jual (Rp)')" class="font-bold text-indigo-900 dark:text-indigo-400" />
                                        <x-text-input id="price" class="block w-full bg-white dark:bg-[#111] border-none rounded-2xl py-4 focus:ring-2 focus:ring-indigo-500 font-bold" type="number" name="price" :value="old('price')" placeholder="0" required />
                                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                    </div>
                                    <div class="space-y-2">
                                        <div class="flex items-center justify-between">
                                            <x-input-label for="original_price" :value="__('Harga Coret')" class="font-bold text-gray-500" />
                                            <button type="button" onclick="document.getElementById('original_price').value=''" class="text-[10px] text-red-500 font-bold hover:underline uppercase">{{ __('Batal') }}</button>
                                        </div>
                                        <x-text-input id="original_price" class="block w-full bg-white/50 dark:bg-[#111] border-none rounded-2xl py-4 focus:ring-2 focus:ring-gray-300 text-gray-500 italic" type="number" name="original_price" :value="old('original_price')" placeholder="Nilai potongan, mis: 60000" />
                                        <p class="text-[10px] text-gray-400 italic mt-1">Harga coret = Harga Jual + Potongan ini</p>
                                        <x-input-error :messages="$errors->get('original_price')" class="mt-2" />
                                    </div>
                                </div>

                                {{-- About --}}
                                <div class="space-y-2">
                                    <x-input-label for="about" :value="__('Tentang Produk')" class="font-bold" />
                                    <textarea name="about" id="about" rows="5" class="w-full bg-gray-50 dark:bg-white/5 border-none rounded-2xl p-4 focus:ring-2 focus:ring-teal-500 transition-all font-medium" placeholder="{{ __('Jelaskan detail dan keunggulan produk digital Anda agar pembeli tertarik...') }}">{{ old('about') }}</textarea>
                                    <x-input-error :messages="$errors->get('about')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        {{-- Footer Action --}}
                        <div class="flex items-center justify-between pt-10 border-t dark:border-[#444]">
                            <button type="button" onclick="history.back()" class="text-sm font-bold text-gray-500 hover:text-gray-700 transition-colors uppercase tracking-widest">{{ __('Batal') }}</button>
                            <x-primary-button class="py-4 px-12 bg-gradient-to-r from-indigo-600 to-teal-500 hover:from-indigo-700 hover:to-teal-600 text-white font-black rounded-2xl shadow-xl shadow-indigo-200 dark:shadow-none transition-all transform hover:-translate-y-1 active:scale-95 border-none">
                                {{ __('Publikasikan Produk') }}
                            </x-primary-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>