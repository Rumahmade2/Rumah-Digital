@extends('front.layouts.app')
@section('title', __('Checkout Product') . ' - ' . $product->name)
@section('content')

    <section id="checkout" class="container max-w-[1130px] mx-auto pt-[74px] mt-[30px] mb-[100px]">
        <div class="w-full flex justify-center gap-[118px]">
            <div class="product-info flex flex-col gap-4 w-min h-fit mt-[18px]">
                <h1 class="font-semibold text-[32px] text-Rumahmade-black dark:text-white transition-all duration-300">
                    {{ __('Checkout Product') }}</h1>
                <div class="product-detail flex flex-col gap-3">
                    <div class="thumbnail w-[412px] h-[255px] flex shrink-0 rounded-[20px] overflow-hidden shadow-md">
                        <img src="{{ $product->cover_url }}" class="w-full h-full object-cover" alt="thumbnail">
                    </div>
                    <div class="product-title flex flex-col gap-[30px]">
                        <div class="flex flex-col gap-3 text-left">
                            <p
                                class="font-semibold text-Rumahmade-black dark:text-white text-xl transition-all duration-300">
                                {{ $product->name }}</p>
                            <div class="flex items-center gap-4">
                                <p
                                    class="bg-[#f3f4f6] dark:bg-Rumahmade-darker-grey font-semibold text-xs text-Rumahmade-grey rounded-[4px] p-[4px_6px] w-fit transition-all duration-300">
                                    {{ $product->category->name }}
                                </p>
                                <p class="font-semibold text-xs text-Rumahmade-grey flex items-center gap-1">
                                    <svg class="w-3 h-3 text-emerald-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    {{ $product->salesCount() }} {{ __('Terjual') }}
                                </p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full flex shrink-0 overflow-hidden">
                                    <img src="{{ $product->creator->avatar_url }}" class="w-full h-full object-cover"
                                        alt="logo">
                                </div>
                                <p class="font-semibold text-Rumahmade-grey text-sm">{{ $product->creator->name }}</p>
                            </div>
                            <p
                                class="font-semibold text-4xl bg-clip-text text-transparent bg-gradient-to-r from-[#B05CB0] to-[#FCB16B]">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <form id="checkout-form" action="{{ route('front.checkout_store', $product->slug) }}" method="POST"
                class="flex flex-col p-[40px] gap-[30px] rounded-[24px] w-[450px] border border-gray-100 dark:border-white/10 bg-white/50 dark:bg-[#15161A]/80 backdrop-blur-md shadow-2xl relative overflow-hidden transition-all duration-300">
                
                <!-- Decorative background glow for form -->
                <div class="absolute top-[-50px] right-[-50px] w-[200px] h-[200px] bg-gradient-to-br from-[#2D68F8]/20 to-[#8c49fa]/20 rounded-full blur-[60px] pointer-events-none"></div>

                @csrf
                
                <div class="w-full flex flex-col gap-5 relative z-10">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-[#2D68F8]/10 dark:bg-white/5 rounded-xl border border-[#2D68F8]/20">
                            <svg class="w-6 h-6 text-[#2D68F8]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h2 class="font-bold text-2xl text-Rumahmade-black dark:text-white tracking-tight">
                            {{ __('Payment Details') }}
                        </h2>
                    </div>

                    <!-- Payment methods highlight -->
                    <div class="flex flex-col gap-3 p-4 rounded-2xl bg-white dark:bg-black/30 border border-gray-100 dark:border-white/5 mt-2">
                        <p class="text-sm font-medium text-Rumahmade-grey dark:text-gray-400">
                            {{ __('Supported Methods via Midtrans:') }}
                        </p>
                        <div class="flex flex-wrap gap-2 mt-1">
                            <span class="px-3 py-1 text-xs font-semibold rounded-md bg-gray-100 text-gray-700 dark:bg-white/10 dark:text-gray-300">QRIS</span>
                            <span class="px-3 py-1 text-xs font-semibold rounded-md bg-green-50 text-green-600 dark:bg-green-500/10 dark:text-green-400">GoPay</span>
                            <span class="px-3 py-1 text-xs font-semibold rounded-md bg-orange-50 text-orange-600 dark:bg-orange-500/10 dark:text-orange-400">ShopeePay</span>
                            <span class="px-3 py-1 text-xs font-semibold rounded-md bg-blue-50 text-blue-600 dark:bg-blue-500/10 dark:text-blue-400">Virtual Account</span>
                            <span class="px-3 py-1 text-xs font-semibold rounded-md bg-slate-50 text-slate-600 dark:bg-slate-500/10 dark:text-slate-400">Credit Card</span>
                        </div>
                    </div>

                    <p class="text-sm text-Rumahmade-grey dark:text-gray-400 leading-relaxed mt-2">
                        {{ __('You will be securely redirected to Midtrans payment gateway to complete your transaction with enterprise-grade encryption.') }}
                    </p>
                </div>
                
                <div class="w-full flex flex-col gap-4 mt-auto relative z-10 pt-4 border-t border-gray-100 dark:border-white/10">
                    <button type="submit" id="checkout-btn"
                        class="group w-full relative overflow-hidden rounded-full bg-gradient-to-r from-[#2D68F8] to-[#6b2df8] p-[16px_30px] font-bold text-white transition-all duration-300 hover:scale-[1.02] hover:shadow-[0_15px_30px_-10px_rgba(45,104,248,0.5)] active:scale-95 text-lg">
                        <span class="absolute inset-0 bg-white opacity-0 transition-opacity duration-300 group-hover:opacity-20 z-0"></span>
                        <div class="relative z-10 flex items-center justify-center gap-2" id="btn-text">
                            <span>{{ __('Proceed to Payment') }}</span>
                            <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </div>
                    </button>
                    <!-- Small security text -->
                    <div class="flex items-center justify-center gap-2 text-xs text-gray-500 dark:text-gray-400 mt-1">
                        <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        <span>{{ __('Guaranteed Safe Checkout') }}</span>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

@push('after-script')
    <script>
        function previewFile() {
            var preview = document.querySelector('.file-preview');
            var fileInput = document.querySelector('input[type=file]').files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                var img = preview.querySelector('.thumbnail-proof');
                img.src = reader.result;
                preview.classList.remove('hidden');
            }

            if (fileInput) {
                reader.readAsDataURL(fileInput);
            } else {
                preview.classList.add('hidden');
            }
        }

        // ===== PREVENT DOUBLE SUBMIT / DUPLICATE CHECKOUT =====
        document.getElementById('checkout-form').addEventListener('submit', function (e) {
            // Cek apakah file bukti pembayaran sudah diunggah
            if (this.checkValidity()) {
                const btn = document.getElementById('checkout-btn');
                const btnText = document.getElementById('btn-text');

                // Matikan aksi klik ganda
                btn.disabled = true;
                btn.style.opacity = '0.75';
                btn.style.cursor = 'not-allowed';

                // Tambahkan spinner dan ganti teks
                btnText.innerHTML = `
                    <svg class="animate-spin" style="width: 18px; height: 18px; display: inline-block; margin-right: 6px; vertical-align: text-bottom; animation: checkout-spin 0.8s linear infinite;" fill="none" viewBox="0 0 24 24">
                        <circle style="opacity: 0.25;" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path style="opacity: 0.75;" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                    </svg>
                    Mencatat Pesanan...
                `;
            }
        });
    </script>
    <style>
        @keyframes checkout-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
@endpush