<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cek Resi &amp; Lacak Pesanan — Aura Botanica &amp; Espresso</title>
    
    <!-- Material Symbols & Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col font-sans">

    <!-- HEADER -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-30">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 h-20 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-[#261813] flex items-center justify-center text-[#f8ddd4] shadow-md">
                    <span class="material-symbols-outlined text-[20px]">local_cafe</span>
                </div>
                <div>
                    <span class="text-xl font-bold tracking-tight text-slate-900">Aura Botanica</span>
                    <span class="block text-[10px] uppercase font-bold tracking-widest text-[#9a442d] -mt-0.5">Lacak Pengiriman Pesanan</span>
                </div>
            </a>

            <a href="{{ route('home') }}" class="text-xs font-semibold text-slate-600 hover:text-blue-600">
                &larr; Menu Minuman
            </a>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 sm:px-6 py-12 flex-1 w-full">
        
        <!-- SEARCH RESI BOX -->
        <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm text-center mb-8">
            <h1 class="text-2xl font-extrabold text-slate-900 mb-2">Lacak Pesanan & Cek Resi</h1>
            <p class="text-xs text-slate-500 max-w-md mx-auto mb-6">
                Masukkan Nomor Resi Pengiriman (contoh: <span class="font-mono text-slate-700">RESI-BT-...</span>) atau Nomor Order Anda untuk mengetahui status pesanan minuman secara langsung.
            </p>

            <form action="{{ route('order.tracking') }}" method="GET" class="max-w-md mx-auto flex gap-2">
                <input 
                    type="text" 
                    name="keyword" 
                    value="{{ $keyword }}" 
                    required 
                    placeholder="Masukkan Nomor Resi / No. Order..."
                    class="flex-1 px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 text-sm outline-none"
                >
                <button 
                    type="submit" 
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-500 text-white rounded-xl text-xs font-bold transition-all shadow-md shadow-blue-600/25 cursor-pointer"
                >
                    Lacak
                </button>
            </form>
        </div>

        <!-- TRACKING RESULT -->
        @if ($keyword)
            @if ($order)
                <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-xs mb-8">
                    
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-6 border-b border-slate-100 gap-4 mb-6">
                        <div>
                            <span class="text-xs font-bold text-blue-600 uppercase tracking-wider block mb-1">Status Pengiriman</span>
                            <h2 class="text-xl font-extrabold text-slate-900">
                                {{ $order->resi_number ?: $order->order_number }}
                            </h2>
                            <span class="text-xs text-slate-400">Order: {{ $order->order_number }} • Penerima: {{ $order->customer_name }}</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700">
                                {{ $order->status_badge['label'] }}
                            </span>
                            <a 
                                href="{{ route('order.resi', $order->order_number) }}" 
                                target="_blank"
                                class="px-3 py-1 bg-slate-900 hover:bg-slate-800 text-white rounded-full text-xs font-bold transition-colors inline-flex items-center gap-1"
                            >
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                </svg>
                                Buka Resi
                            </a>
                        </div>
                    </div>

                    <!-- TIMELINE STATUS -->
                    <div class="py-4">
                        @php
                            $steps = [
                                'pending' => 'Pesanan Dibuat',
                                'paid' => 'Pembayaran Terkonfirmasi',
                                'processing' => 'Minuman Diracik di Dapur',
                                'completed' => 'Pesanan Tiba & Selesai',
                            ];
                            $statusKeys = array_keys($steps);
                            $currentIndex = array_search($order->status, $statusKeys);
                            if ($currentIndex === false) $currentIndex = 0;
                        @endphp

                        <div class="relative flex flex-col md:flex-row justify-between gap-6 before:hidden md:before:block before:absolute before:top-4 before:left-6 before:right-6 before:h-0.5 before:bg-slate-200">
                            @foreach ($steps as $key => $title)
                                @php
                                    $stepIndex = array_search($key, $statusKeys);
                                    $isPassed = $stepIndex <= $currentIndex;
                                @endphp
                                <div class="flex md:flex-col items-center gap-3 relative z-10 text-left md:text-center flex-1">
                                    <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-xs shrink-0 {{ $isPassed ? 'bg-blue-600 text-white ring-4 ring-blue-100' : 'bg-slate-200 text-slate-500' }}">
                                        @if ($isPassed)
                                            ✓
                                        @else
                                            {{ $loop->iteration }}
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-bold {{ $isPassed ? 'text-slate-900' : 'text-slate-400' }}">{{ $title }}</h4>
                                        <span class="text-[10px] text-slate-400 block">{{ $isPassed ? 'Selesai / Terverifikasi' : 'Menunggu' }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- ORDER ITEMS SUMMARY -->
                    <div class="mt-8 pt-6 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-700 uppercase mb-3">Item Minuman:</h4>
                        <div class="space-y-2 text-xs">
                            @foreach ($order->items as $item)
                                <div class="flex justify-between items-center bg-slate-50 p-3 rounded-xl border border-slate-100">
                                    <div>
                                        <span class="font-bold text-slate-900">{{ $item->product_name }}</span>
                                        <span class="text-slate-500 block text-[11px]">{{ $item->quantity }}x cup</span>
                                    </div>
                                    <span class="font-bold text-slate-900">
                                        Rp {{ number_format((float) $item->subtotal, 0, ',', '.') }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            @else
                <div class="bg-white rounded-3xl p-10 border border-slate-200 text-center max-w-md mx-auto">
                    <div class="w-14 h-14 rounded-full bg-rose-50 text-rose-500 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 mb-1">Resi Tidak Ditemukan</h3>
                    <p class="text-xs text-slate-500">
                        Tidak ada pesanan dengan kata kunci "<span class="font-semibold text-slate-800">{{ $keyword }}</span>". Pastikan nomor resi atau nomor order sudah sesuai.
                    </p>
                </div>
            @endif
        @endif

    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-slate-200 mt-auto py-6">
        <div class="max-w-4xl mx-auto px-4 text-center text-xs text-slate-400">
            &copy; {{ date('Y') }} Blue Tella Drinks • Sistem Tracking & Cek Resi.
        </div>
    </footer>

</body>
</html>
