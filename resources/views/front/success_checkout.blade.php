@extends('front.layouts.app')
@section('title', __('Payment Received!') . ' - RUMAHMADE Marketplace')
@section('content')

    <section id="SuccessCheckout" class="min-h-screen flex items-center justify-center pt-[74px] pb-[100px]">
        <div class="container max-w-[1130px] mx-auto flex flex-col items-center gap-[50px]">
            <div class="flex flex-col items-center gap-6 text-center">
                <div class="w-[124px] h-[124px] flex shrink-0 bg-indigo-100 dark:bg-indigo-500/10 rounded-[40px] items-center justify-center animate-bounce">
                    <img src="{{ asset('images/icons/check.svg') }}" class="w-16 h-16 object-contain" alt="success icon"
                        style="filter: invert(48%) sepia(85%) saturate(1518%) hue-rotate(205deg) brightness(101%) contrast(101%);">
                </div>
                <div class="flex flex-col gap-2">
                    <h1 class="font-black italic text-5xl tracking-tighter text-Rumahmade-black dark:text-white transition-all duration-300">
                        {{ __('Yeay! Pembayaran Berhasil!') }}</h1>
                    <p class="text-xl text-Rumahmade-grey italic transition-all duration-300">{{ __('Transaksi Anda telah berhasil diproses oleh Midtrans.') }}<br>{{ __('Produk digital Anda siap untuk diunduh. Selamat berkarya!') }}</p>
                </div>
            </div>
            <div class="flex items-center gap-6 mt-4">
                <a href="{{ route('front.index') }}"
                    class="p-[18px_40px] rounded-2xl bg-white dark:bg-Rumahmade-black border border-gray-200 dark:border-[#333] font-black italic uppercase tracking-widest text-xs text-Rumahmade-black dark:text-white hover:bg-gray-50 dark:hover:bg-Rumahmade-darker-grey transition-all duration-500 shadow-sm">
                    {{ __('Jelajahi Lagi') }}
                </a>
                <a href="{{ route('front.my_orders') }}"
                    class="p-[18px_40px] rounded-2xl bg-indigo-600 font-black italic uppercase tracking-widest text-xs text-white hover:bg-indigo-700 transition-all duration-500 shadow-2xl shadow-indigo-200 dark:shadow-none transform hover:scale-105">
                    {{ __('Lihat Pesanan Saya') }}
                </a>
            </div>
        </div>
    </section>

    {{-- Audio Success --}}
    <audio id="successSound" preload="auto">
        <source src="https://assets.mixkit.co/active_storage/sfx/2013/2013-preview.mp3" type="audio/mpeg">
    </audio>

    @push('after-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sound = document.getElementById('successSound');
            if (sound) {
                // Autoplay sound on page load
                sound.play().catch(error => {
                    console.log('Autoplay was prevented by browser. Click anywhere to play.');
                });
            }
        });
    </script>
    @endpush
@endsection