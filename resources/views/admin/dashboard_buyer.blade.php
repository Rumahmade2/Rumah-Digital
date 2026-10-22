<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Welcome Banner --}}
            <div class="bg-gradient-to-r from-[#3B82F6] via-[#60A5FA] to-[#A78BFA] rounded-[30px] p-8 text-white shadow-xl flex flex-col md:flex-row items-center justify-between gap-6 overflow-hidden relative border border-white/20 transition-all duration-500">
                <div class="flex flex-col gap-2 relative z-10 text-center md:text-left">
                    <div class="flex items-center gap-2 w-fit mx-auto md:mx-0">
                        <span class="px-3 py-1 rounded-full bg-white/20 text-white text-xs font-black uppercase tracking-widest">{{ __('Pembeli') }}</span>
                    </div>
                    <h3 class="text-3xl font-black">{{ __('Selamat Datang Kembali!') }}</h3>
                    <p class="text-white/80 font-medium">{{ __('Halo,') }} <span class="text-white font-bold">{{ Auth::user()->name }}</span>. {{ __('Temukan produk digital terbaik untuk kebutuhanmu.') }}</p>
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
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Total Pembelian -->
                <div class="bg-white dark:bg-rumahmade-darker-grey p-6 rounded-[24px] border border-gray-100 dark:border-[#333] shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col gap-4 group">
                    <div class="w-12 h-12 rounded-2xl bg-blue-50 dark:bg-blue-500/10 flex items-center justify-center group-hover:scale-110 transition-all">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    </div>
                    <div>
                        <p class="text-rumahmade-grey text-sm font-semibold uppercase tracking-wider">{{ __('Total Pembelian') }}</p>
                        <p class="text-rumahmade-black dark:text-white font-black text-3xl mt-1">{{ $my_purchases }}</p>
                    </div>
                </div>

                <!-- Pending -->
                <div class="bg-white dark:bg-rumahmade-darker-grey p-6 rounded-[24px] border border-gray-100 dark:border-[#333] shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col gap-4 group">
                    <div class="w-12 h-12 rounded-2xl bg-orange-50 dark:bg-orange-500/10 flex items-center justify-center group-hover:scale-110 transition-all">
                        <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <p class="text-rumahmade-grey text-sm font-semibold uppercase tracking-wider">{{ __('Menunggu Pembayaran') }}</p>
                        <p class="text-orange-500 font-black text-3xl mt-1">{{ $my_pending }}</p>
                    </div>
                </div>

                <!-- Total Pengeluaran -->
                <div class="bg-[#181818] p-6 rounded-[24px] border border-white/5 shadow-2xl flex flex-col gap-4 group overflow-hidden relative">
                    <div class="w-12 h-12 rounded-2xl bg-violet-500/10 flex items-center justify-center group-hover:scale-110 transition-all relative z-10">
                        <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3 1.343 3 3-1.343 3-3 3m0-13c-1.11 0-2.08.402-2.599 1M12 8V7m0 1v8m0 0v1m0-1c1.11 0 2.08-.402 2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="relative z-10">
                        <p class="text-white/60 text-sm font-semibold uppercase tracking-wider">{{ __('Total Pengeluaran') }}</p>
                        <p class="text-white font-black text-2xl mt-1">Rp {{ number_format($my_total_spent, 0, ',', '.') }}</p>
                    </div>
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-violet-500/5 rounded-full blur-2xl"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Chart Section --}}
                <div class="lg:col-span-2 bg-white dark:bg-rumahmade-darker-grey p-8 rounded-[30px] border border-gray-100 dark:border-[#333] shadow-sm transition-all duration-300">
                    <div class="flex items-center justify-between mb-8">
                        <h4 class="font-bold text-rumahmade-black dark:text-white text-xl flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 dark:bg-blue-500/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/></svg>
                            </div>
                            {{ __('Statistik Pengeluaran') }}
                        </h4>
                        <div class="text-xs text-rumahmade-grey font-medium uppercase tracking-widest">{{ __('12 Bulan Terakhir') }}</div>
                    </div>
                    <div class="h-[350px] w-full">
                        <canvas id="spendingChart"></canvas>
                    </div>
                </div>

                {{-- Quick Actions --}}
                <div class="flex flex-col gap-6">
                    <div class="bg-white dark:bg-rumahmade-darker-grey p-8 rounded-[30px] border border-gray-100 dark:border-[#333] shadow-sm flex flex-col h-full">
                        <h4 class="font-bold text-rumahmade-black dark:text-white text-xl mb-6">{{ __('Aksi Cepat') }}</h4>
                        <div class="grid grid-cols-2 gap-4">
                            <a href="{{ route('front.index') }}" class="group flex flex-col items-center justify-center gap-3 p-6 rounded-2xl bg-blue-50 dark:bg-blue-500/5 border border-blue-100 dark:border-blue-500/10 hover:bg-blue-600 dark:hover:bg-blue-600 transition-all duration-300">
                                <div class="w-12 h-12 rounded-xl bg-white dark:bg-[#111] flex items-center justify-center shadow-sm group-hover:rotate-12 transition-all">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                </div>
                                <span class="text-xs font-bold text-blue-900 dark:text-white group-hover:text-white">{{ __('Toko') }}</span>
                            </a>
                            <a href="{{ route('admin.product_orders.transaction') }}" class="group flex flex-col items-center justify-center gap-3 p-6 rounded-2xl bg-teal-50 dark:bg-teal-500/5 border border-teal-100 dark:border-teal-500/10 hover:bg-teal-600 dark:hover:bg-teal-600 transition-all duration-300">
                                <div class="w-12 h-12 rounded-xl bg-white dark:bg-[#111] flex items-center justify-center shadow-sm group-hover:-rotate-12 transition-all">
                                    <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                </div>
                                <span class="text-xs font-bold text-teal-900 dark:text-white group-hover:text-white">{{ __('Pesanan') }}</span>
                            </a>
                            <a href="{{ route('profile.edit') }}" class="col-span-2 group flex flex-col items-center justify-center gap-3 p-6 rounded-2xl bg-violet-50 dark:bg-violet-500/5 border border-violet-100 dark:border-violet-500/10 hover:bg-violet-600 dark:hover:bg-violet-600 transition-all duration-300">
                                <div class="w-12 h-12 rounded-xl bg-white dark:bg-[#111] flex items-center justify-center shadow-sm group-hover:scale-110 transition-all">
                                    <svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <span class="text-xs font-bold text-violet-900 dark:text-white group-hover:text-white">{{ __('Edit Profil') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Recent Purchases Table --}}
            <div class="bg-white dark:bg-rumahmade-darker-grey rounded-[30px] border border-gray-100 dark:border-[#333] shadow-sm overflow-hidden p-8">
                <div class="flex items-center justify-between mb-8">
                    <h4 class="font-bold text-rumahmade-black dark:text-white text-xl">{{ __('Pembelian Terbaru') }}</h4>
                    <a href="{{ route('admin.product_orders.index') }}" class="text-blue-600 font-bold text-sm hover:underline">{{ __('Lihat Semua') }}</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-rumahmade-grey text-xs uppercase tracking-wider border-b dark:border-[#333]">
                                <th class="pb-4 font-bold">{{ __('Produk') }}</th>
                                <th class="pb-4 font-bold">{{ __('Penjual') }}</th>
                                <th class="pb-4 font-bold">{{ __('Harga') }}</th>
                                <th class="pb-4 font-bold">{{ __('Status') }}</th>
                                <th class="pb-4 font-bold text-right">{{ __('Waktu') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y dark:divide-[#333]">
                            @forelse($recent_purchases as $order)
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
                                        <span class="text-sm font-semibold text-rumahmade-black dark:text-white">{{ $order->product->creator->name ?? '-' }}</span>
                                        <span class="text-[10px] text-rumahmade-grey lowercase">{{ $order->product->creator->email ?? '' }}</span>
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
                                <td colspan="5" class="py-10 text-center text-rumahmade-grey italic">{{ __('Belum ada pembelian.') }}</td>
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
            const ctx = document.getElementById('spendingChart').getContext('2d');

            const gradientStroke = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke.addColorStop(0, '#3B82F6');
            gradientStroke.addColorStop(1, '#A78BFA');

            const gradientFill = ctx.createLinearGradient(0, 0, 0, 400);
            gradientFill.addColorStop(0, 'rgba(59, 130, 246, 0.2)');
            gradientFill.addColorStop(1, 'rgba(167, 139, 250, 0)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($chartLabels),
                    datasets: [{
                        label: '{{ __("Pengeluaran") }}',
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
                    interaction: { intersect: false, mode: 'index' },
                    plugins: {
                        legend: { display: false },
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
                            grid: { color: 'rgba(0,0,0,0.03)', drawBorder: false },
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
                            grid: { display: false },
                            ticks: { font: { size: 11, weight: '500' }, color: '#999' }
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>
