<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });

                @if(session('success'))
                    Toast.fire({
                        icon: 'success',
                        title: "{{ session('success') }}"
                    });
                @endif

                @if(session('error'))
                    Toast.fire({
                        icon: 'error',
                        title: "{{ session('error') }}"
                    });
                @endif
                
                @if(session('status'))
                    Toast.fire({
                        icon: 'info',
                        title: "{{ session('status') }}"
                    });
                @endif
            });

            // ===== LOGOUT CONFIRMATION MODAL OVERLAY =====
            window.showConfirmLogout = function(formElement) {
                let overlay = document.getElementById('logout-confirm-overlay');
                if (!overlay) {
                    overlay = document.createElement('div');
                    overlay.id = 'logout-confirm-overlay';
                    overlay.style.cssText = `
                        position: fixed;
                        top: 0; left: 0; right: 0; bottom: 0;
                        z-index: 999999;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        background: rgba(0, 0, 0, 0.85);
                        backdrop-filter: blur(12px);
                        -webkit-backdrop-filter: blur(12px);
                        opacity: 0;
                        pointer-events: none;
                        transition: opacity 0.3s ease;
                        font-family: 'Poppins', 'Figtree', sans-serif;
                    `;
                    overlay.innerHTML = `
                        <div id="logout-confirm-card" style="
                            position: relative;
                            width: 100%;
                            max-width: 360px;
                            margin: 16px;
                            background: #111111;
                            border: 1px solid rgba(255, 255, 255, 0.1);
                            border-radius: 28px;
                            padding: 32px;
                            text-align: center;
                            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
                            transform: scale(0.9) translateY(20px);
                            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
                            overflow: hidden;
                        ">
                            <style>
                                #logout-confirm-overlay .animate-spin-fast {
                                    animation: logout-spin 0.8s linear infinite;
                                }
                                @keyframes logout-spin {
                                    from { transform: rotate(0deg); }
                                    to { transform: rotate(360deg); }
                                }
                            </style>
                            <div style="position: absolute; top: -48px; right: -48px; width: 128px; height: 128px; background: rgba(176,92,176,0.1); border-radius: 50%; filter: blur(24px);"></div>
                            <div style="position: absolute; bottom: -48px; left: -48px; width: 128px; height: 128px; background: rgba(252,177,107,0.05); border-radius: 50%; filter: blur(24px);"></div>
                            
                            <div style="
                                width: 64px;
                                height: 64px;
                                border-radius: 16px;
                                background: rgba(239, 68, 68, 0.1);
                                color: #ef4444;
                                margin: 0 auto 20px auto;
                                display: flex;
                                items-center;
                                justify-content: center;
                                border: 1px solid rgba(239, 68, 68, 0.2);
                                display: flex;
                                align-items: center;
                            ">
                                <svg style="width: 32px; height: 32px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                            </div>
                            
                            <h3 style="font-size: 20px; font-weight: 800; color: #ffffff; margin: 0 0 8px 0; font-family: inherit;">Ingin Keluar?</h3>
                            <p style="font-size: 14px; color: #a3a3a3; margin: 0 0 24px 0; line-height: 1.5; font-family: inherit;">Apakah kamu yakin ingin keluar dari akun Rumahmade?</p>
                            
                            <div style="display: flex; gap: 12px; font-family: inherit;">
                                <button type="button" id="btn-logout-cancel" style="
                                    flex: 1;
                                    padding: 12px 16px;
                                    background: rgba(255, 255, 255, 0.05);
                                    border: 1px solid rgba(255, 255, 255, 0.1);
                                    color: #ffffff;
                                    font-weight: 700;
                                    font-size: 14px;
                                    border-radius: 12px;
                                    cursor: pointer;
                                    transition: all 0.2s;
                                    font-family: inherit;
                                ">
                                    Batal
                                </button>
                                <button type="button" id="btn-logout-confirm" style="
                                    flex: 1;
                                    padding: 12px 16px;
                                    background: linear-gradient(135deg, #ef4444 0%, #f43f5e 100%);
                                    border: none;
                                    color: #ffffff;
                                    font-weight: 700;
                                    font-size: 14px;
                                    border-radius: 12px;
                                    cursor: pointer;
                                    box-shadow: 0 8px 20px rgba(239, 68, 68, 0.2);
                                    transition: all 0.2s;
                                    font-family: inherit;
                                ">
                                    Ya, Keluar
                                </button>
                            </div>
                        </div>
                    `;
                    document.body.appendChild(overlay);
                }
                
                const card = document.getElementById('logout-confirm-card');
                const btnCancel = document.getElementById('btn-logout-cancel');
                const btnConfirm = document.getElementById('btn-logout-confirm');
                
                // Show transitions
                overlay.style.opacity = '1';
                overlay.style.pointerEvents = 'auto';
                setTimeout(() => {
                    card.style.transform = 'scale(1) translateY(0)';
                }, 10);
                
                // Wire up events
                btnCancel.onclick = function() {
                    card.style.transform = 'scale(0.9) translateY(20px)';
                    overlay.style.opacity = '0';
                    overlay.style.pointerEvents = 'none';
                };

                // Close on click overlay background
                overlay.onclick = function(e) {
                    if (e.target === overlay) {
                        btnCancel.click();
                    }
                };
                
                btnConfirm.onclick = function() {
                    btnConfirm.innerHTML = `
                        <svg class="animate-spin-fast" style="width: 16px; height: 16px; display: inline-block; margin-right: 6px; vertical-align: text-bottom;" fill="none" viewBox="0 0 24 24">
                            <circle style="opacity: 0.25;" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                            <path style="opacity: 0.75;" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                        </svg>
                        Keluar...
                    `;
                    btnConfirm.disabled = true;
                    btnCancel.disabled = true;
                    formElement.submit();
                };
            };
        </script>
        @stack('after-script')
    </body>
</html>
