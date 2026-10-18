<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesanan Berhasil (#{{ $order->order_number }}) — Aura Botanica &amp; Espresso</title>
    
    <!-- Material Symbols & Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                            950: '#172554',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col font-sans">

    <!-- HEADER -->
    <header class="bg-white border-b border-slate-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 h-20 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-[#261813] flex items-center justify-center text-[#f8ddd4] shadow-md">
                    <span class="material-symbols-outlined text-[20px]">local_cafe</span>
                </div>
                <div>
                    <span class="text-xl font-bold tracking-tight text-slate-900">Aura Botanica</span>
                    <span class="block text-[10px] uppercase font-bold tracking-widest text-[#9a442d] -mt-0.5">Espresso &amp; Botanical Drinks • Invoice</span>
                </div>
            </a>

            <a href="{{ route('home') }}" class="text-xs font-semibold text-brand-600 hover:text-brand-700">
                &larr; Kembali Belanja
            </a>
        </div>
    </header>

    <!-- MAIN RECEIPT / INVOICE -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 py-10 flex-1 w-full">
        
        <!-- SUCCESS BANNER -->
        <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200 shadow-sm text-center mb-8 relative overflow-hidden">
            <div class="w-18 h-18 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto mb-4 ring-8 ring-emerald-50">
                <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mb-2">Terima Kasih, Pesanan Anda Berhasil!</h1>
            <p class="text-sm text-slate-500 max-w-md mx-auto mb-4">
                Nomor pesanan Anda adalah <span class="font-mono font-bold text-slate-900 bg-slate-100 px-2 py-0.5 rounded">{{ $order->order_number }}</span>.
            </p>

            <!-- RESI BADGE DISPLAY -->
            <div class="inline-flex flex-col sm:flex-row items-center justify-center gap-2 p-3 bg-blue-50 border border-blue-200 rounded-2xl mb-6 max-w-md mx-auto w-full">
                <span class="text-xs text-blue-700 font-semibold">Nomor Resi:</span>
                <span class="font-mono font-black text-sm text-blue-900 bg-white px-3 py-1 rounded-lg border border-blue-200 shadow-2xs">
                    {{ $order->resi_number ?: 'RESI-BT-' . strtoupper(substr(md5($order->id), 0, 8)) }}
                </span>
            </div>

            <div class="flex items-center justify-center gap-3">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold {{ $order->status === 'paid' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                    <span class="w-2 h-2 rounded-full {{ $order->status === 'paid' ? 'bg-emerald-500' : 'bg-amber-500 animate-pulse' }}"></span>
                    Status: {{ $order->status_badge['label'] }}
                </div>

                <a 
                    href="{{ route('order.resi', $order->order_number) }}" 
                    target="_blank"
                    class="inline-flex items-center gap-1.5 px-3 py-1 bg-slate-900 hover:bg-slate-800 text-white rounded-full text-xs font-bold shadow-xs transition-colors"
                >
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    Lihat & Cetak Resi
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            
            <!-- INSTRUKSI PEMBAYARAN -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs flex flex-col justify-between">
                <div>
                    <h2 class="text-base font-bold text-slate-900 mb-4 pb-3 border-b border-slate-100 flex items-center gap-2">
                        <svg class="w-5 h-5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Instruksi Pembayaran
                    </h2>

                    @if ($order->payment_method === 'bank_transfer')
                        <div class="space-y-4 text-xs">
                            <p class="text-slate-600">
                                Silakan lakukan transfer sejumlah nominal yang tertera ke salah satu rekening resmi kami:
                            </p>
                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-2">
                                <div class="flex justify-between items-center">
                                    <span class="font-bold text-slate-700">Bank Central Asia (BCA)</span>
                                    <span class="text-[10px] bg-brand-100 text-brand-700 font-bold px-1.5 py-0.5 rounded">UTAMA</span>
                                </div>
                                <div class="text-lg font-mono font-extrabold text-slate-900 tracking-wider">
                                    8735-0982-11
                                </div>
                                <div class="text-slate-500 text-[11px]">a/n Blue Tella Store</div>
                            </div>
                            <div class="flex justify-between p-3 rounded-xl bg-amber-50 border border-amber-200 text-amber-800 text-xs">
                                <span>Nominal Transfer Tepat:</span>
                                <span class="font-black text-sm">Rp {{ number_format((float) $order->total_price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    @elseif ($order->payment_method === 'qris')
                        <div class="space-y-3 text-xs text-center">
                            <p class="text-slate-600 text-left">
                                Buka aplikasi m-Banking atau E-Wallet pilihan Anda (GoPay, OVO, Dana, ShopeePay, BCA) lalu scan QR code berikut:
                            </p>
                            <div class="w-44 h-44 bg-slate-100 border-2 border-dashed border-slate-300 rounded-2xl mx-auto flex flex-col items-center justify-center p-3">
                                <svg class="w-24 h-24 text-slate-700" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M3 3h8v8H3V3zm2 2v4h4V5H5zm8-2h8v8h-8V3zm2 2v4h4V5h-4zM3 13h8v8H3v-8zm2 2v4h4v-4H5zm13-2h3v2h-3v-2zm-5 0h3v3h-3v-3zm2 3h3v2h-3v-2zm-2 2h2v3h-2v-3zm5 0h3v3h-3v-3z"/>
                                </svg>
                                <span class="text-[10px] font-bold text-slate-600 uppercase mt-1">QRIS STANDAR NASIONAL</span>
                            </div>
                            <div class="font-black text-sm text-brand-700">
                                Total: Rp {{ number_format((float) $order->total_price, 0, ',', '.') }}
                            </div>
                        </div>
                    @else
                        <div class="space-y-3 text-xs text-slate-600">
                            <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 space-y-1">
                                <span class="font-bold block">Bayar Tunai di Tempat (COD)</span>
                                <p class="text-[11px] leading-relaxed">
                                    Pesanan Anda akan segera dipersiapkan dan dikirimkan oleh kurir kami. Mohon sediakan uang tunai pas saat paket tiba:
                                </p>
                                <div class="text-base font-black text-emerald-900 pt-1">
                                    Rp {{ number_format((float) $order->total_price, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- WHATSAPP CONFIRMATION BUTTON -->
                <div class="pt-6 border-t border-slate-100 mt-6">
                    @php
                        $msg = urlencode("Halo Admin Blue Tella, saya ingin mengonfirmasi pesanan saya:\n\n*No. Order:* {$order->order_number}\n*Nama:* {$order->customer_name}\n*Total:* Rp " . number_format($order->total_price, 0, ',', '.') . "\n*Metode:* " . strtoupper($order->payment_method) . "\n\nMohon dicek dan diproses pengirimannya. Terima kasih!");
                    @endphp
                    <a 
                        href="https://wa.me/?text={{ $msg }}" 
                        target="_blank"
                        class="w-full py-3.5 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs flex items-center justify-center gap-2 shadow-lg shadow-emerald-600/20 transition-all cursor-pointer"
                    >
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2zm5.79 14.15c-.24.68-1.2 1.25-1.68 1.32-.46.07-.98.11-2.95-.7-2.39-.98-3.92-3.41-4.04-3.57-.12-.16-.97-1.29-.97-2.46 0-1.17.61-1.74.83-1.98.22-.24.48-.3.64-.3.16 0 .32.01.46.01.15 0 .35-.06.55.42.21.49.71 1.74.78 1.87.06.13.1.28.02.44-.08.16-.12.26-.24.4-.12.14-.26.31-.37.42-.12.12-.24.25-.1.5.14.24.63 1.04 1.35 1.68.93.83 1.71 1.09 1.95 1.21.24.12.38.1.52-.06.14-.16.6-.7.76-.94.16-.24.32-.2.54-.12.22.08 1.41.66 1.65.78.24.12.4.18.46.28.06.1.06.58-.18 1.26z"/>
                        </svg>
                        Konfirmasi Pembayaran via WhatsApp
                    </a>
                </div>
            </div>

            <!-- DETAIL PENERIMA -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs flex flex-col justify-between">
                <div>
                    <h2 class="text-base font-bold text-slate-900 mb-4 pb-3 border-b border-slate-100 flex items-center gap-2">
                        <svg class="w-5 h-5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Tujuan Pengiriman
                    </h2>

                    <div class="space-y-3 text-xs">
                        <div>
                            <span class="text-slate-400 block font-semibold">Nama Penerima:</span>
                            <span class="font-bold text-slate-900 text-sm">{{ $order->customer_name }}</span>
                        </div>
                        <div>
                            <span class="text-slate-400 block font-semibold">Nomor WhatsApp / HP:</span>
                            <span class="font-mono text-slate-800">{{ $order->customer_phone }}</span>
                        </div>
                        @if ($order->customer_email)
                            <div>
                                <span class="text-slate-400 block font-semibold">Email:</span>
                                <span class="text-slate-800">{{ $order->customer_email }}</span>
                            </div>
                        @endif
                        <div>
                            <span class="text-slate-400 block font-semibold">Alamat Lengkap:</span>
                            <p class="text-slate-700 leading-relaxed bg-slate-50 p-3 rounded-xl border border-slate-100 mt-1">
                                {{ $order->shipping_address }}
                            </p>
                        </div>
                        @if ($order->notes)
                            <div>
                                <span class="text-slate-400 block font-semibold">Catatan:</span>
                                <span class="text-slate-600 italic">"{{ $order->notes }}"</span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="pt-6 border-t border-slate-100 mt-6 flex gap-2">
                    <a 
                        href="{{ url('/admin') }}" 
                        target="_blank" 
                        class="flex-1 py-2.5 px-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs rounded-xl text-center transition-colors"
                    >
                        Buka Panel Admin Filament
                    </a>
                </div>
            </div>

        </div>

        <!-- RINCIAN PRODUK PESANAN -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs mb-8">
            <h3 class="text-base font-bold text-slate-900 pb-4 border-b border-slate-100 mb-4">
                Daftar Barang Pesanan
            </h3>

            <div class="divide-y divide-slate-100">
                @foreach ($order->items as $item)
                    <div class="py-3.5 flex items-center justify-between gap-4 text-xs">
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">{{ $item->product_name }}</h4>
                            <span class="text-slate-400 text-[11px]">SKU: {{ $item->sku ?: '-' }} • Qty: {{ $item->quantity }} pcs</span>
                        </div>
                        <div class="text-right">
                            <span class="text-slate-400 block text-[11px]">@ Rp {{ number_format((float) $item->price, 0, ',', '.') }}</span>
                            <span class="font-bold text-slate-900 text-sm">Rp {{ number_format((float) $item->subtotal, 0, ',', '.') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="pt-4 border-t border-slate-200 mt-2 flex justify-between items-baseline">
                <span class="text-sm font-extrabold text-slate-900">Total Pembayaran Akhir</span>
                <span class="text-2xl font-black text-brand-700">
                    Rp {{ number_format((float) $order->total_price, 0, ',', '.') }}
                </span>
            </div>
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-slate-200 mt-auto py-6">
        <div class="max-w-4xl mx-auto px-4 text-center text-xs text-slate-400">
            &copy; {{ date('Y') }} Blue Tella Store • Invoice Resmi.
        </div>
    </footer>

</body>
</html>
