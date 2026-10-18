<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resi Pengiriman & Struk — {{ $order->resi_number ?: $order->order_number }}</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        mono: ['"Space Mono"', 'monospace'],
                    }
                }
            }
        }
    </script>
    <style>
        @media print {
            body {
                background: white !important;
                padding: 0 !important;
            }
            .no-print {
                display: none !important;
            }
            .print-border {
                border: 1px dashed #cbd5e1 !important;
                box-shadow: none !important;
            }
        }
    </style>
</head>
<body class="bg-slate-100 text-slate-800 antialiased min-h-screen py-8 px-4 flex flex-col items-center justify-center font-sans">

    <!-- ACTION BUTTONS (NO PRINT) -->
    <div class="no-print max-w-xl w-full mb-6 flex items-center justify-between gap-3">
        <a href="{{ route('order.success', $order->order_number) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-600 hover:text-slate-900 bg-white px-4 py-2.5 rounded-xl border border-slate-200 shadow-2xs transition-colors">
            &larr; Kembali ke Invoice
        </a>

        <div class="flex items-center gap-2">
            <a href="{{ route('home') }}" class="text-xs font-semibold text-slate-600 hover:text-slate-900 px-3 py-2">
                Beranda
            </a>
            <button 
                type="button" 
                onclick="window.print()" 
                class="inline-flex items-center gap-2 text-xs font-bold text-white bg-blue-600 hover:bg-blue-500 px-5 py-2.5 rounded-xl shadow-md shadow-blue-600/20 transition-all cursor-pointer"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                Cetak Resi / Struk
            </button>
        </div>
    </div>

    <!-- STRUK / RESI CARD CONTAINER -->
    <div class="print-border bg-white rounded-3xl border border-slate-200 shadow-xl max-w-xl w-full p-8 relative overflow-hidden">
        
        <!-- HEADER RESI -->
        <div class="text-center pb-6 border-b-2 border-dashed border-slate-200">
            <div class="inline-flex items-center justify-center gap-2 mb-1">
                <span class="w-7 h-7 rounded-lg bg-blue-600 text-white font-black text-sm flex items-center justify-center">BT</span>
                <span class="text-xl font-extrabold tracking-tight text-slate-900">AURA BOTANICA &amp; ESPRESSO</span>
            </div>
            <p class="text-xs text-slate-500">Third-Wave Botanical Cafe &amp; Espresso Bar</p>
            <p class="text-[11px] text-slate-400 mt-0.5">Senopati Sanctuary • Jl. Senopati No. 42 • WhatsApp: 0812-3456-7890</p>
        </div>

        <!-- NOMOR RESI & BARCODE SECTION -->
        <div class="py-5 border-b border-slate-200 bg-slate-50/70 -mx-8 px-8 flex flex-col items-center justify-center text-center">
            <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400">NOMOR RESI PENGIRIMAN</span>
            <div class="text-xl font-mono font-extrabold text-blue-700 tracking-widest my-1">
                {{ $order->resi_number ?: 'RESI-BT-' . strtoupper(substr(md5($order->id), 0, 8)) }}
            </div>
            
            <!-- STYLIZED SVG BARCODE -->
            <div class="flex items-center justify-center gap-1 h-10 my-1">
                @for ($i = 0; $i < 32; $i++)
                    <span class="bg-slate-800 h-full inline-block {{ $i % 3 == 0 ? 'w-1.5' : ($i % 2 == 0 ? 'w-0.5' : 'w-1') }}"></span>
                @endfor
            </div>
            <span class="text-[10px] font-mono text-slate-500">No. Order: {{ $order->order_number }} • {{ $order->created_at?->format('d/m/Y H:i') ?? date('d/m/Y H:i') }}</span>
        </div>

        <!-- INFO KURIR & STATUS -->
        <div class="py-4 border-b border-slate-200 grid grid-cols-2 gap-4 text-xs">
            <div>
                <span class="text-[10px] uppercase font-bold text-slate-400 block">Layanan Ekspedisi</span>
                <span class="font-bold text-slate-900">{{ $order->courier ?: 'Blue Tella Express (Instant)' }}</span>
            </div>
            <div class="text-right">
                <span class="text-[10px] uppercase font-bold text-slate-400 block">Status Pesanan</span>
                <span class="inline-block px-2 py-0.5 rounded text-[11px] font-bold bg-blue-100 text-blue-700">
                    {{ $order->status_badge['label'] }}
                </span>
            </div>
        </div>

        <!-- DATA PENERIMA & ALAMAT -->
        <div class="py-4 border-b border-slate-200 text-xs space-y-1.5">
            <span class="text-[10px] uppercase font-bold text-slate-400 block">Tujuan Pengiriman</span>
            <div class="flex justify-between font-bold text-slate-900 text-sm">
                <span>{{ $order->customer_name }}</span>
                <span class="font-mono text-xs text-slate-700">{{ $order->customer_phone }}</span>
            </div>
            <p class="text-slate-600 text-xs leading-relaxed">
                {{ $order->shipping_address }}
            </p>
            @if ($order->notes)
                <p class="text-[11px] text-slate-500 italic mt-1 bg-slate-50 p-2 rounded-lg border border-slate-100">
                    Catatan: "{{ $order->notes }}"
                </p>
            @endif
        </div>

        <!-- DAFTAR ITEM PESANAN -->
        <div class="py-4 border-b-2 border-dashed border-slate-200">
            <span class="text-[10px] uppercase font-bold text-slate-400 block mb-2">Item Minuman</span>
            <div class="space-y-2.5 text-xs">
                @foreach ($order->items as $item)
                    <div class="flex justify-between items-start">
                        <div class="flex-1 pr-3">
                            <span class="font-bold text-slate-900">{{ $item->product_name }}</span>
                            <div class="text-[11px] text-slate-500">
                                {{ $item->quantity }}x @ Rp {{ number_format((float) $item->price, 0, ',', '.') }}
                            </div>
                        </div>
                        <span class="font-bold text-slate-900">
                            Rp {{ number_format((float) $item->subtotal, 0, ',', '.') }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- TOTAL & METODE BAYAR -->
        <div class="py-4 border-b border-slate-200 text-xs space-y-2">
            <div class="flex justify-between text-slate-600">
                <span>Metode Pembayaran</span>
                <span class="font-bold text-slate-900 uppercase">{{ str_replace('_', ' ', $order->payment_method) }}</span>
            </div>
            <div class="flex justify-between text-slate-600">
                <span>Ongkos Kirim</span>
                <span class="font-bold text-emerald-600">GRATIS (PROMO)</span>
            </div>
            <div class="flex justify-between items-baseline pt-2 border-t border-slate-100 text-sm">
                <span class="font-extrabold text-slate-900">TOTAL PEMBAYARAN</span>
                <span class="text-xl font-black text-blue-700">
                    Rp {{ number_format((float) $order->total_price, 0, ',', '.') }}
                </span>
            </div>
        </div>

        <!-- FOOTER RESI -->
        <div class="text-center pt-5 text-[11px] text-slate-400 space-y-1">
            <p>Terima kasih telah memesan minuman segar di <span class="font-bold text-slate-600">Blue Tella</span>!</p>
            <p>Simpan resi ini sebagai bukti transaksi sah pengiriman Anda.</p>
        </div>

    </div>

</body>
</html>
