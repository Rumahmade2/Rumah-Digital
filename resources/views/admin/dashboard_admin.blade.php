<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Super Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            {{-- Welcome Banner --}}
            <div class="bg-gradient-to-r from-[#1e40af] via-[#3b82f6] to-[#60a5fa] rounded-[30px] p-8 text-white shadow-xl flex flex-col md:flex-row items-center justify-between gap-6 overflow-hidden relative border border-white/20 transition-all duration-500">
                <div class="flex flex-col gap-2 relative z-10 text-center md:text-left">
                    <h3 class="text-3xl font-black">{{ __('Platform Overview') }}</h3>
                    <p class="text-white/80 font-medium">{{ __('Halo,') }} <span class="text-white font-bold">{{ Auth::user()->name }}</span>. {{ __('Anda sedang memantau seluruh aktivitas di marketplace Rumahmade.') }}</p>
                    <div class="flex items-center gap-2 mt-2 opacity-90 text-sm bg-white/10 w-fit px-4 py-2 rounded-full mx-auto md:mx-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        <span>{{ __('Administrator Level Access') }}</span>
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
                <!-- Total Users -->
                <div class="bg-white dark:bg-rumahmade-darker-grey p-6 rounded-[24px] border border-gray-100 dark:border-[#333] shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col gap-4 group">
                    <div class="w-12 h-12 rounded-2xl bg-blue-50 dark:bg-blue-500/10 flex items-center justify-center group-hover:scale-110 transition-all">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <div>
                        <p class="text-rumahmade-grey text-sm font-semibold uppercase tracking-wider">{{ __('Total Users') }}</p>
                        <p class="text-rumahmade-black dark:text-white font-black text-3xl mt-1">{{ $total_users }}</p>
                    </div>
                </div>

                <!-- Total Product -->
                <div class="bg-white dark:bg-rumahmade-darker-grey p-6 rounded-[24px] border border-gray-100 dark:border-[#333] shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col gap-4 group">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-50 dark:bg-indigo-500/10 flex items-center justify-center group-hover:scale-110 transition-all">
                        <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    </div>
                    <div>
                        <p class="text-rumahmade-grey text-sm font-semibold uppercase tracking-wider">{{ __('Global Products') }}</p>
                        <p class="text-rumahmade-black dark:text-white font-black text-3xl mt-1">{{ $total_products }}</p>
                    </div>
                </div>

                <!-- Total Transaction -->
                <div class="bg-white dark:bg-rumahmade-darker-grey p-6 rounded-[24px] border border-gray-100 dark:border-[#333] shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col gap-4 group text-green-600">
                    <div class="w-12 h-12 rounded-2xl bg-green-50 dark:bg-green-500/10 flex items-center justify-center group-hover:scale-110 transition-all">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    </div>
                    <div>
                        <p class="text-rumahmade-grey text-sm font-semibold uppercase tracking-wider">{{ __('Global Orders') }}</p>
                        <p class="text-rumahmade-black dark:text-white font-black text-3xl mt-1 text-green-500">{{ $total_orders }}</p>
                    </div>
                </div>

                <!-- Total Revenue -->
                <div class="bg-[#181818] p-6 rounded-[24px] border border-white/5 shadow-2xl flex flex-col gap-4 group overflow-hidden relative">
                    <div class="w-12 h-12 rounded-2xl bg-teal-500/10 flex items-center justify-center group-hover:scale-110 transition-all relative z-10">
                        <svg class="w-6 h-6 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3 1.343 3 3-1.343 3-3 3m0-13c-1.11 0-2.08.402-2.599 1M12 8V7m0 1v8m0 0v1m0-1c1.11 0 2.08-.402 2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="relative z-10">
                        <p class="text-white/60 text-sm font-semibold uppercase tracking-wider">{{ __('Global GMV') }}</p>
                        <p class="text-white font-black text-2xl mt-1">Rp {{ number_format($total_revenue, 0, ',', '.') }}</p>
                    </div>
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-teal-500/5 rounded-full blur-2xl"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Chart Section --}}
                <div class="lg:col-span-2 bg-white dark:bg-rumahmade-darker-grey p-8 rounded-[30px] border border-gray-100 dark:border-[#333] shadow-sm transition-all duration-300">
                    <div class="flex items-center justify-between mb-8">
                        <h4 class="font-bold text-rumahmade-black dark:text-white text-xl flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-orange-50 dark:bg-orange-500/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/></svg>
                            </div>
                            {{ __('Pertumbuhan Marketplace') }}
                        </h4>
                        <div class="text-xs text-rumahmade-grey font-medium uppercase tracking-widest">{{ __('Omzet 12 Bulan Terakhir') }}</div>
                    </div>
                    <div class="h-[350px] w-full">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>

                {{-- Quick Actions --}}
                <div class="flex flex-col gap-6">
                    <div class="bg-white dark:bg-rumahmade-darker-grey p-8 rounded-[30px] border border-gray-100 dark:border-[#333] shadow-sm flex flex-col h-full">
                        <h4 class="font-bold text-rumahmade-black dark:text-white text-xl mb-6">{{ __('Panel Admin') }}</h4>
                        <div class="grid grid-cols-1 gap-4">
                            <a href="{{ route('admin.products.index') }}" class="group flex items-center gap-4 p-4 rounded-2xl bg-slate-50 dark:bg-white/5 border border-slate-100 dark:border-white/10 hover:bg-slate-600 hover:text-white transition-all duration-300">
                                <div class="w-10 h-10 rounded-xl bg-white dark:bg-[#111] flex items-center justify-center shadow-sm">
                                    <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                                </div>
                                <span class="font-bold text-sm">{{ __('Manajemen Produk Global') }}</span>
                            </a>
                            <a href="{{ route('admin.product_orders.index') }}" class="group flex items-center gap-4 p-4 rounded-2xl bg-slate-50 dark:bg-white/5 border border-slate-100 dark:border-white/10 hover:bg-slate-600 hover:text-white transition-all duration-300">
                                <div class="w-10 h-10 rounded-xl bg-white dark:bg-[#111] flex items-center justify-center shadow-sm">
                                    <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                                </div>
                                <span class="font-bold text-sm">{{ __('Kelola Seluruh Transaksi') }}</span>
                            </a>
                            <a href="{{ route('front.index') }}" class="group flex items-center gap-4 p-4 rounded-2xl bg-slate-50 dark:bg-white/5 border border-slate-100 dark:border-white/10 hover:bg-slate-600 hover:text-white transition-all duration-300">
                                <div class="w-10 h-10 rounded-xl bg-white dark:bg-[#111] flex items-center justify-center shadow-sm">
                                    <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                </div>
                                <span class="font-bold text-sm">{{ __('Lihat Halaman Utama') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Recent Transactions Table --}}
            <div class="bg-white dark:bg-rumahmade-darker-grey rounded-[30px] border border-gray-100 dark:border-[#333] shadow-sm overflow-hidden p-8">
                <div class="flex items-center justify-between mb-8">
                    <h4 class="font-bold text-rumahmade-black dark:text-white text-xl">{{ __('Transaksi Global Terbaru') }}</h4>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-rumahmade-grey text-xs uppercase tracking-wider border-b dark:border-[#333]">
                                <th class="pb-4 font-bold">{{ __('Produk') }}</th>
                                <th class="pb-4 font-bold">{{ __('Penjual') }}</th>
                                <th class="pb-4 font-bold">{{ __('Pembeli') }}</th>
                                <th class="pb-4 font-bold text-right">{{ __('Total') }}</th>
                                <th class="pb-4 font-bold text-right">{{ __('Status') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y dark:divide-[#333]">
                            @forelse($recent_transactions as $order)
                            <tr class="group hover:bg-gray-50 dark:hover:bg-white/5 transition-all">
                                <td class="py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg overflow-hidden shrink-0">
                                            <img src="{{ $order->product->cover_url }}" class="w-full h-full object-cover" alt="">
                                        </div>
                                        <span class="font-bold text-sm text-rumahmade-black dark:text-white truncate max-w-[150px]">{{ $order->product->name }}</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-2 py-1 rounded-md">{{ $order->product->creator->name }}</span>
                                </td>
                                <td class="py-4 font-medium text-sm">
                                    {{ $order->buyer->name }}
                                </td>
                                <td class="py-4 font-black text-sm text-right">
                                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                </td>
                                <td class="py-4 text-right">
                                    @if($order->is_paid)
                                        <span class="px-3 py-1 bg-green-100 dark:bg-green-500/20 text-green-600 dark:text-green-400 text-[10px] font-bold rounded-full uppercase">{{ __('Sukses') }}</span>
                                    @else
                                        <span class="px-3 py-1 bg-yellow-100 dark:bg-yellow-500/20 text-yellow-600 dark:text-yellow-400 text-[10px] font-bold rounded-full uppercase">{{ __('Pending') }}</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="py-10 text-center text-rumahmade-grey italic">{{ __('Belum ada aktivitas transaksi.') }}</td>
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
            
            const gradientStroke = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke.addColorStop(0, '#3b82f6');
            gradientStroke.addColorStop(1, '#60a5fa');

            const gradientFill = ctx.createLinearGradient(0, 0, 0, 400);
            gradientFill.addColorStop(0, 'rgba(59, 130, 246, 0.2)');
            gradientFill.addColorStop(1, 'rgba(96, 165, 250, 0)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($chartLabels),
                    datasets: [{
                        label: '{{ __("Pendapatan Global") }}',
                        data: @json($chartData),
                        borderColor: gradientStroke,
                        backgroundColor: gradientFill,
                        borderWidth: 4,
                        fill: true,
                        tension: 0.4,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>
