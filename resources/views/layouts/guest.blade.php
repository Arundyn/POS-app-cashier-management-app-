<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            * { box-sizing: border-box; margin: 0; padding: 0; }
            body {
                font-family: 'Figtree', sans-serif;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #0f172a 100%);
            }
            .auth-wrapper { width: 100%; max-width: 420px; padding: 1rem; }
            .auth-logo {
                text-align: center;
                margin-bottom: 2rem;
            }
            .auth-logo-icon {
                width: 64px; height: 64px;
                background: #2563eb;
                border-radius: 16px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 1rem;
                box-shadow: 0 10px 30px rgba(37,99,235,0.4);
            }
            .auth-logo h1 { color: white; font-size: 1.5rem; font-weight: 700; }
            .auth-logo p { color: #94a3b8; font-size: 0.875rem; margin-top: 4px; }
            .auth-card {
                background: rgba(255,255,255,0.05);
                border: 1px solid rgba(255,255,255,0.1);
                border-radius: 20px;
                padding: 2rem;
                backdrop-filter: blur(10px);
            }
            .form-group { margin-bottom: 1.25rem; }
            .form-label {
                display: block;
                color: white;
                font-size: 0.875rem;
                font-weight: 500;
                margin-bottom: 0.5rem;
            }
            .form-input {
                width: 100%;
                padding: 0.75rem 1rem;
                background: rgba(255,255,255,0.08);
                border: 1px solid rgba(255,255,255,0.15);
                border-radius: 12px;
                color: white;
                font-size: 0.95rem;
                font-family: 'Figtree', sans-serif;
                transition: all 0.2s;
                outline: none;
            }
            .form-input::placeholder { color: #475569; }
            .form-input:focus {
                border-color: #3b82f6;
                background: rgba(255,255,255,0.12);
                box-shadow: 0 0 0 3px rgba(59,130,246,0.15);
            }
            .form-error { color: #f87171; font-size: 0.75rem; margin-top: 0.4rem; }
            .form-row {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 1.5rem;
            }
            .form-check { display: flex; align-items: center; gap: 8px; cursor: pointer; }
            .form-check input { width: 16px; height: 16px; accent-color: #3b82f6; }
            .form-check span { color: #94a3b8; font-size: 0.875rem; }
            .form-link { color: #60a5fa; font-size: 0.875rem; text-decoration: none; }
            .form-link:hover { color: #93c5fd; }
            .btn-primary {
                width: 100%;
                padding: 0.85rem;
                background: #2563eb;
                color: white;
                font-weight: 600;
                font-size: 1rem;
                font-family: 'Figtree', sans-serif;
                border: none;
                border-radius: 12px;
                cursor: pointer;
                transition: all 0.2s;
                box-shadow: 0 4px 20px rgba(37,99,235,0.35);
            }
            .btn-primary:hover {
                background: #1d4ed8;
                box-shadow: 0 4px 25px rgba(37,99,235,0.5);
                transform: translateY(-1px);
            }
            .auth-footer {
                text-align: center;
                margin-top: 1.5rem;
                color: #64748b;
                font-size: 0.875rem;
            }
            .auth-footer a { color: #60a5fa; font-weight: 500; text-decoration: none; }
            .auth-footer a:hover { color: #93c5fd; }
            .alert-success {
                background: rgba(34,197,94,0.1);
                border: 1px solid rgba(34,197,94,0.3);
                color: #86efac;
                padding: 0.75rem 1rem;
                border-radius: 10px;
                font-size: 0.875rem;
                margin-bottom: 1rem;
            }
        </style>
    </head>
    <body>
        <div class="auth-wrapper">
            <div class="auth-logo">
                <div class="auth-logo-icon">
                    <svg width="32" height="32" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h1>TOKO SERBAGUNA ARASHIYA</h1>
                <p>mau makanan, minuman bahkan barang kebutuhan sehari-hari, kami sedia semua</p>
            </div>
            <div class="auth-card">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>