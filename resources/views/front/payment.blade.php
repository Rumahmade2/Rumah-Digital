@extends('front.layouts.app')
@section('title', __('Complete Your Payment'))
@section('content')

    <!-- Background Gradients -->
    <div class="fixed inset-0 z-[-1] bg-Rumahmade-black overflow-hidden pointer-events-none">
        <div class="absolute top-[-20%] left-[-10%] w-[500px] h-[500px] rounded-full bg-[#2D68F8]/30 blur-[120px]"></div>
        <div class="absolute bottom-[-20%] right-[-10%] w-[600px] h-[600px] rounded-full bg-[#6b2df8]/20 blur-[150px]"></div>
    </div>

    <section id="payment" class="container max-w-[1130px] mx-auto pt-[80px] pb-[120px] relative z-10 flex min-h-[85vh] items-center justify-center">
        <!-- Main Card with Glassmorphism -->
        <div class="relative w-full max-w-[550px] mx-auto">
            <!-- Decorative border glow -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#2D68F8] to-[#8c49fa] rounded-[30px] blur-md opacity-40 animate-pulse"></div>
            
            <div class="relative flex flex-col p-[40px] gap-[30px] rounded-[30px] border border-white/10 bg-white/5 dark:bg-[#1A1C23]/80 backdrop-blur-xl shadow-2xl overflow-hidden text-center transition-all duration-500 hover:-translate-y-2">
                
                <!-- Icon Header -->
                <div class="mx-auto flex h-[80px] w-[80px] items-center justify-center rounded-full bg-gradient-to-br from-[#2D68F8] to-[#8c49fa] text-white shadow-lg shadow-[#2D68F8]/40 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                    </svg>
                </div>

                <div class="flex flex-col gap-2">
                    <h1 class="font-bold text-3xl text-Rumahmade-black dark:text-white tracking-tight">{{ __('Secure Checkout') }}</h1>
                    <p class="text-Rumahmade-grey text-sm">{{ __('Please complete your payment securely.') }}</p>
                </div>

                <!-- Invoice Details -->
                <div class="flex flex-col gap-4 bg-white/5 dark:bg-black/30 rounded-2xl p-6 border border-white/5 text-left">
                    <div class="flex justify-between items-center pb-4 border-b border-white/10">
                        <span class="text-Rumahmade-grey text-sm font-medium">{{ __('Order ID') }}</span>
                        <span class="text-white font-mono bg-white/10 px-3 py-1 rounded-lg text-sm select-all">#{{ $order->id }}</span>
                    </div>
                    <div class="flex justify-between items-center pt-2">
                        <span class="text-Rumahmade-grey text-sm font-medium">{{ __('Total Amount') }}</span>
                        <span class="text-[#2D68F8] dark:text-[#5e8bfa] font-black text-2xl tracking-tight">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                    </div>
                </div>

                <!-- Trust Badges -->
                <div class="flex items-center justify-center gap-3 text-xs text-white/50 pt-2 pb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                    <span>{{ __('256-bit SSL Encrypted') }}</span>
                    <span class="w-1 h-1 rounded-full bg-white/20"></span>
                    <span>{{ __('Midtrans Secured') }}</span>
                </div>

                <!-- Call to Action -->
                <button id="pay-button" class="group relative flex w-full items-center justify-center gap-3 overflow-hidden rounded-full bg-gradient-to-r from-[#2D68F8] to-[#6b2df8] p-[16px_30px] font-bold text-white transition-all duration-300 hover:scale-[1.02] hover:shadow-[0_15px_30px_-10px_rgba(45,104,248,0.6)] active:scale-95">
                    <span class="absolute inset-0 bg-white opacity-0 transition-opacity duration-300 group-hover:opacity-20 z-0"></span>
                    <span class="relative z-10 text-lg shadow-black/20">{{ __('Pay Now') }}</span>
                    <svg class="relative z-10 w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </button>
            </div>
        </div>
    </section>

@endsection

@push('after-script')
    <script 
        src="{{ config('midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}" 
        data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('{{ $snapToken }}', {
          // Optional
          onSuccess: function(result){
            /* You may add your own js here, this is only example */
            window.location.href = "{{ route('front.success_checkout') }}";
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is only example */
            window.location.href = "{{ route('front.success_checkout') }}"; // Can be redirected to pending page
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is only example */
            alert("Payment failed!");
          }
        });
      };
    </script>
@endpush
