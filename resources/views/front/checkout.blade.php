@extends('front.layouts.app')
@section('title', __('Checkout Product') . ' - ' . $product->name)
@section('content')
    <section id="checkout" class="container max-w-[1130px] mx-auto px-4 pt-[74px] mt-[30px] mb-[100px]">
        <div class="mx-auto flex max-w-[680px] flex-col gap-8 rounded-[24px] border border-gray-100 bg-white/70 p-8 shadow-2xl dark:border-white/10 dark:bg-[#15161A]/80">
            <div>
                <h1 class="text-3xl font-semibold text-Rumahmade-black dark:text-white">{{ __('Checkout Product') }}</h1>
                <p class="mt-3 text-Rumahmade-grey">{{ __('Pembelian sementara tidak tersedia karena layanan pembayaran sedang dinonaktifkan.') }}</p>
            </div>

            <div class="flex flex-col gap-5 sm:flex-row sm:items-center">
                <img src="{{ $product->cover_url }}" class="h-40 w-full rounded-[20px] object-cover sm:w-56" alt="{{ $product->name }}">
                <div class="flex flex-col gap-2">
                    <h2 class="text-xl font-semibold text-Rumahmade-black dark:text-white">{{ $product->name }}</h2>
                    <p class="text-sm text-Rumahmade-grey">{{ $product->creator->name }}</p>
                    <p class="text-2xl font-bold text-[#2D68F8]">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                </div>
            </div>

            <a href="{{ route('front.details', $product->slug) }}"
                class="rounded-full bg-[#2D68F8] p-[14px_24px] text-center font-semibold text-white transition hover:bg-[#083297]">
                {{ __('Kembali ke produk') }}
            </a>
        </div>
    </section>
@endsection
