<x-app-layout>

@if(session('registered'))
{{-- ===== WELCOME OVERLAY (muncul hanya setelah register) ===== --}}
<div id="welcome-overlay" class="fixed inset-0 z-[9999] flex items-center justify-center"
     style="background: rgba(0,0,0,0.92); backdrop-filter: blur(16px);">

    {{-- Animated particles --}}
    <div id="particles-container" class="absolute inset-0 overflow-hidden pointer-events-none"></div>

    {{-- Card --}}
    <div id="welcome-card"
         class="relative text-center px-10 py-14 rounded-[48px] max-w-sm w-full mx-4 border border-white/10 shadow-2xl"
         style="background: linear-gradient(135deg, rgba(176,92,176,0.2) 0%, rgba(252,177,107,0.15) 100%);
                opacity: 0; transform: scale(0.75) translateY(40px);
                transition: all 0.6s cubic-bezier(0.34,1.56,0.64,1);">

        {{-- Glow --}}
        <div class="absolute inset-0 rounded-[48px] pointer-events-none"
             style="box-shadow: 0 0 80px rgba(176,92,176,0.4), inset 0 0 40px rgba(176,92,176,0.05);"></div>

        {{-- Checkmark circle --}}
        <div class="w-28 h-28 rounded-full mx-auto mb-6 flex items-center justify-center relative"
             style="background: linear-gradient(135deg, #B05CB0, #FCB16B); box-shadow: 0 0 60px rgba(176,92,176,0.6);">
            <div class="absolute inset-0 rounded-full animate-ping-slow opacity-30"
                 style="background: linear-gradient(135deg, #B05CB0, #FCB16B);"></div>
            <svg id="check-anim" class="w-14 h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 style="stroke-dasharray: 50; stroke-dashoffset: 50; transition: stroke-dashoffset 0.7s ease 0.5s;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
            </svg>
        </div>

        <p class="text-[#FCB16B] text-sm font-bold uppercase tracking-widest mb-2">Registrasi Berhasil 🎉</p>
        <h2 class="text-3xl font-black text-white mb-1">Halo, {{ Auth::user()->name }}!</h2>
        <p class="text-white/60 text-sm mb-8">Akun kamu sudah aktif. Selamat bergabung di Rumahmade.</p>

        {{-- Progress bar --}}
        <div class="w-full h-1.5 rounded-full overflow-hidden" style="background: rgba(255,255,255,0.1);">
            <div id="welcome-progress"
                 class="h-full rounded-full"
                 style="background: linear-gradient(90deg, #B05CB0, #FCB16B); width: 0%; transition: width 2.2s linear;">
            </div>
        </div>
        <p class="text-white/30 text-xs mt-3">Sedang masuk ke dashboard...</p>
    </div>
</div>

<style>
    @keyframes ping-slow {
        0%, 100% { transform: scale(1); opacity: 0.3; }
        50% { transform: scale(1.15); opacity: 0.1; }
    }
    .animate-ping-slow { animation: ping-slow 2s ease-in-out infinite; }

    @keyframes float-up {
        0%   { transform: translateY(0) rotate(0deg); opacity: 1; }
        100% { transform: translateY(-120px) rotate(360deg); opacity: 0; }
    }
</style>

<script>
    (function () {
        const overlay  = document.getElementById('welcome-overlay');
        const card     = document.getElementById('welcome-card');
        const checkSvg = document.getElementById('check-anim');
        const progress = document.getElementById('welcome-progress');
        const pCont    = document.getElementById('particles-container');

        // --- Particles (confetti dots) ---
        const colors = ['#B05CB0','#FCB16B','#fff','#A78BFA','#60A5FA'];
        for (let i = 0; i < 40; i++) {
            const el = document.createElement('div');
            const size = Math.random() * 10 + 5;
            el.style.cssText = `
                position: absolute;
                width: ${size}px; height: ${size}px;
                border-radius: ${Math.random() > 0.5 ? '50%' : '3px'};
                background: ${colors[Math.floor(Math.random() * colors.length)]};
                left: ${Math.random() * 100}%;
                top: ${70 + Math.random() * 30}%;
                opacity: 0;
                animation: float-up ${1.5 + Math.random() * 2}s ease-out ${Math.random() * 0.8}s forwards;
            `;
            pCont.appendChild(el);
        }

        // --- Animate card in ---
        requestAnimationFrame(() => {
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'scale(1) translateY(0)';
            }, 80);

            // Draw checkmark after card appears
            setTimeout(() => {
                checkSvg.style.strokeDashoffset = '0';
            }, 300);

            // Start progress bar
            setTimeout(() => {
                progress.style.width = '100%';
            }, 200);
        });

        // --- Auto close after 2.8s ---
        setTimeout(() => {
            overlay.style.transition = 'opacity 0.5s ease';
            overlay.style.opacity = '0';
            setTimeout(() => overlay.remove(), 500);
        }, 2800);

        // Click to dismiss early
        overlay.addEventListener('click', () => {
            overlay.style.transition = 'opacity 0.3s ease';
            overlay.style.opacity = '0';
            setTimeout(() => overlay.remove(), 300);
        });
    })();
</script>
@endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            {{-- Welcome Banner --}}
            <div class="bg-gradient-to-r from-[#B05CB0] via-[#D07CC0] to-[#FCB16B] rounded-[30px] p-8 text-white shadow-xl flex flex-col md:flex-row items-center justify-between gap-6 overflow-hidden relative border border-white/20 transition-all duration-500">
                <div class="flex flex-col gap-2 relative z-10 text-center md:text-left">
                    <h3 class="text-3xl font-black">{{ __('Selamat Datang Kembali!') }}</h3>
                    <p class="text-white/80 font-medium">{{ __('Halo,') }} <span class="text-white font-bold">{{ Auth::user()->name }}</span>. {{ __('Pantau performa penjualan produk digital Anda hari ini.') }}</p>
                    <div class="flex items-center gap-2 mt-2 opacity-90 text-sm bg-white/10 w-fit px-4 py-2 rounded-full mx-auto md:mx-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>{{ now()->translatedFormat('l, d F Y') }}</span>
                    </div>
                </div>
                <div class="relative z-10 shrink-0">
                    <img src="{{ Auth::user()->avatar_url }}" class="w-24 h-24 rounded-full border-4 border-white/30 shadow-2xl" alt="Avatar">
                </div>
                {{-- Decorative Shapes --}}
                <div class="absolute -right-10 -top-10 w-48 h-48 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute -left-10 -bottom-10 w-48 h-48 bg-white/5 rounded-full blur-3xl"></div>
            </div>

            {{-- Stat Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Total Product -->
                <div class="bg-white dark:bg-rumahmade-darker-grey p-6 rounded-[24px] border border-gray-100 dark:border-[#333] shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col gap-4 group">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-50 dark:bg-indigo-500/10 flex items-center justify-center group-hover:scale-110 transition-all">
                        <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    </div>
                    <div>
                        <p class="text-rumahmade-grey text-sm font-semibold uppercase tracking-wider">{{ __('Total Product') }}</p>
                        <p class="text-rumahmade-black dark:text-white font-black text-3xl mt-1">{{ $my_products->count() }}</p>
                    </div>
                </div>

                <!-- Total Order -->
                <div class="bg-white dark:bg-rumahmade-darker-grey p-6 rounded-[24px] border border-gray-100 dark:border-[#333] shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col gap-4 group">
                    <div class="w-12 h-12 rounded-2xl bg-green-50 dark:bg-green-500/10 flex items-center justify-center group-hover:scale-110 transition-all">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    </div>
                    <div>
                        <p class="text-rumahmade-grey text-sm font-semibold uppercase tracking-wider">{{ __('Total Order') }}</p>
                        <p class="text-rumahmade-black dark:text-white font-black text-3xl mt-1">{{ $my_order_success }}</p>
                    </div>
                </div>

                <!-- Pending Orders -->
                <div class="bg-white dark:bg-rumahmade-darker-grey p-6 rounded-[24px] border border-gray-100 dark:border-[#333] shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col gap-4 group text-orange-600 dark:text-orange-400">
                    <div class="w-12 h-12 rounded-2xl bg-orange-50 dark:bg-orange-500/10 flex items-center justify-center group-hover:scale-110 transition-all">
                        <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <p class="text-rumahmade-grey text-sm font-semibold uppercase tracking-wider">{{ __('Pending') }}</p>
                        <p class="text-rumahmade-black dark:text-white font-black text-3xl mt-1 text-orange-500">{{ $my_order_pending }}</p>
                    </div>
                </div>

                <!-- Total Revenue -->
                <div class="bg-[#181818] p-6 rounded-[24px] border border-white/5 shadow-2xl flex flex-col gap-4 group overflow-hidden relative">
                    <div class="w-12 h-12 rounded-2xl bg-teal-500/10 flex items-center justify-center group-hover:scale-110 transition-all relative z-10">
                        <svg class="w-6 h-6 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3 1.343 3 3-1.343 3-3 3m0-13c-1.11 0-2.08.402-2.599 1M12 8V7m0 1v8m0 0v1m0-1c1.11 0 2.08-.402 2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="relative z-10">
                        <p class="text-white/60 text-sm font-semibold uppercase tracking-wider">{{ __('Total Revenue') }}</p>
                        <p class="text-white font-black text-2xl mt-1">Rp {{ number_format($my_revenue, 0, ',', '.') }}</p>
                    </div>
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-teal-500/5 rounded-full blur-2xl"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Chart Section --}}
                <div class="lg:col-span-2 bg-white dark:bg-rumahmade-darker-grey p-8 rounded-[30px] border border-gray-100 dark:border-[#333] shadow-sm transition-all duration-300">
                    <div class="flex items-center justify-between mb-8">
                        <h4 class="font-bold text-rumahmade-black dark:text-white text-xl flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-purple-50 dark:bg-purple-500/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/></svg>
                            </div>
                            {{ __('Statistik Pendapatan') }}
                        </h4>
                        <div class="text-xs text-rumahmade-grey font-medium uppercase tracking-widest">{{ __('12 Bulan Terakhir') }}</div>
                    </div>
                    <div class="h-[350px] w-full">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>

                {{-- Quick Actions --}}
                <div class="flex flex-col gap-6">
                    <div class="bg-white dark:bg-rumahmade-darker-grey p-8 rounded-[30px] border border-gray-100 dark:border-[#333] shadow-sm flex flex-col h-full">
                        <h4 class="font-bold text-rumahmade-black dark:text-white text-xl mb-6">{{ __('Aksi Cepat') }}</h4>
                        <div class="grid grid-cols-2 gap-4">
                            <a href="{{ route('admin.products.create') }}" class="group flex flex-col items-center justify-center gap-3 p-6 rounded-2xl bg-indigo-50 dark:bg-indigo-500/5 border border-indigo-100 dark:border-indigo-500/10 hover:bg-indigo-600 dark:hover:bg-indigo-600 transition-all duration-300">
                                <div class="w-12 h-12 rounded-xl bg-white dark:bg-[#111] flex items-center justify-center shadow-sm group-hover:rotate-12 transition-all">
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                </div>
                                <span class="text-xs font-bold text-indigo-900 dark:text-white group-hover:text-white">{{ __('Tambah Produk') }}</span>
                            </a>
                            <a href="{{ route('admin.products.index') }}" class="group flex flex-col items-center justify-center gap-3 p-6 rounded-2xl bg-teal-50 dark:bg-teal-500/5 border border-teal-100 dark:border-teal-500/10 hover:bg-teal-600 dark:hover:bg-teal-600 transition-all duration-300">
                                <div class="w-12 h-12 rounded-xl bg-white dark:bg-[#111] flex items-center justify-center shadow-sm group-hover:-rotate-12 transition-all">
                                    <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                                </div>
                                <span class="text-xs font-bold text-teal-900 dark:text-white group-hover:text-white">{{ __('Daftar Produk') }}</span>
                            </a>
                            <a href="{{ route('admin.product_orders.index') }}" class="group flex flex-col items-center justify-center gap-3 p-6 rounded-2xl bg-pink-50 dark:bg-pink-500/5 border border-pink-100 dark:border-pink-500/10 hover:bg-pink-600 dark:hover:bg-pink-600 transition-all duration-300">
                                <div class="w-12 h-12 rounded-xl bg-white dark:bg-[#111] flex items-center justify-center shadow-sm group-hover:scale-110 transition-all">
                                    <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                </div>
                                <span class="text-xs font-bold text-pink-900 dark:text-white group-hover:text-white">{{ __('Pesanan') }}</span>
                            </a>
                            <a href="{{ route('admin.product_reviews.index') }}" class="group flex flex-col items-center justify-center gap-3 p-6 rounded-2xl bg-orange-50 dark:bg-orange-500/5 border border-orange-100 dark:border-orange-500/10 hover:bg-orange-600 dark:hover:bg-orange-600 transition-all duration-300">
                                <div class="w-12 h-12 rounded-xl bg-white dark:bg-[#111] flex items-center justify-center shadow-sm group-hover:-translate-y-1 transition-all">
                                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                                </div>
                                <span class="text-xs font-bold text-orange-900 dark:text-white group-hover:text-white">{{ __('Ulasan') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Recent Orders Table --}}
            <div class="bg-white dark:bg-rumahmade-darker-grey rounded-[30px] border border-gray-100 dark:border-[#333] shadow-sm overflow-hidden p-8">
                <div class="flex items-center justify-between mb-8">
                    <h4 class="font-bold text-rumahmade-black dark:text-white text-xl">{{ __('Pesanan Terbaru') }}</h4>
                    <a href="{{ route('admin.product_orders.index') }}" class="text-indigo-600 font-bold text-sm hover:underline">{{ __('Lihat Semua') }}</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-rumahmade-grey text-xs uppercase tracking-wider border-b dark:border-[#333]">
                                <th class="pb-4 font-bold">{{ __('Produk') }}</th>
                                <th class="pb-4 font-bold">{{ __('Pembeli') }}</th>
                                <th class="pb-4 font-bold">{{ __('Harga') }}</th>
                                <th class="pb-4 font-bold">{{ __('Status') }}</th>
                                <th class="pb-4 font-bold text-right">{{ __('Waktu') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y dark:divide-[#333]">
                            @forelse($recent_orders as $order)
                            <tr class="group hover:bg-gray-50 dark:hover:bg-white/5 transition-all">
                                <td class="py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg overflow-hidden shrink-0">
                                            <img src="{{ $order->product->cover_url }}" class="w-full h-full object-cover" alt="">
                                        </div>
                                        <span class="font-bold text-sm text-rumahmade-black dark:text-white truncate max-w-[200px]">{{ $order->product->name }}</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-semibold text-rumahmade-black dark:text-white">{{ $order->buyer->name }}</span>
                                        <span class="text-[10px] text-rumahmade-grey lowercase">{{ $order->buyer->email }}</span>
                                    </div>
                                </td>
                                <td class="py-4 font-bold text-sm text-rumahmade-black dark:text-white italic">
                                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                </td>
                                <td class="py-4">
                                    @if($order->is_paid)
                                        <span class="px-3 py-1 bg-green-100 dark:bg-green-500/20 text-green-600 dark:text-green-400 text-[10px] font-bold rounded-full uppercase">{{ __('Sukses') }}</span>
                                    @else
                                        <span class="px-3 py-1 bg-yellow-100 dark:bg-yellow-500/20 text-yellow-600 dark:text-yellow-400 text-[10px] font-bold rounded-full uppercase">{{ __('Menunggu') }}</span>
                                    @endif
                                </td>
                                <td class="py-4 text-right text-xs text-rumahmade-grey italic whitespace-nowrap">
                                    {{ $order->created_at->diffForHumans() }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="py-10 text-center text-rumahmade-grey italic">{{ __('Belum ada pesanan terbaru.') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    @push('after-script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('revenueChart').getContext('2d');
            
            // Gradient for chart
            const gradientStroke = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke.addColorStop(0, '#B05CB0');
            gradientStroke.addColorStop(1, '#FCB16B');

            const gradientFill = ctx.createLinearGradient(0, 0, 0, 400);
            gradientFill.addColorStop(0, 'rgba(176, 92, 176, 0.2)');
            gradientFill.addColorStop(1, 'rgba(252, 177, 107, 0)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($chartLabels),
                    datasets: [{
                        label: '{{ __("Pendapatan") }}',
                        data: @json($chartData),
                        borderColor: gradientStroke,
                        backgroundColor: gradientFill,
                        borderWidth: 4,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#fff',
                        pointBorderColor: gradientStroke,
                        pointBorderWidth: 3,
                        pointRadius: 5,
                        pointHoverRadius: 8,
                        pointHoverBackgroundColor: gradientStroke,
                        pointHoverBorderColor: '#fff',
                        pointHoverBorderWidth: 3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: '#181818',
                            titleFont: { size: 14, weight: 'bold' },
                            bodyFont: { size: 14 },
                            padding: 12,
                            cornerRadius: 12,
                            displayColors: false,
                            callbacks: {
                                label: function(context) {
                                    return 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0,0,0,0.03)',
                                drawBorder: false
                            },
                            ticks: {
                                font: { size: 11, weight: '500' },
                                color: '#999',
                                callback: function(value) {
                                    if (value >= 1000000) return 'Rp ' + (value / 1000000) + 'M';
                                    if (value >= 1000) return 'Rp ' + (value / 1000) + 'k';
                                    return 'Rp ' + value;
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: { size: 11, weight: '500' },
                                color: '#999'
                            }
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>