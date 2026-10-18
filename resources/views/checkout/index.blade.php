<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout Pesanan — Aura Botanica &amp; Espresso</title>
    
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
    <header class="bg-white border-b border-slate-200 sticky top-0 z-30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-[#261813] flex items-center justify-center text-[#f8ddd4] shadow-md">
                    <span class="material-symbols-outlined text-[20px]">local_cafe</span>
                </div>
                <div>
                    <span class="text-xl font-bold tracking-tight text-slate-900">Aura Botanica</span>
                    <span class="block text-[10px] uppercase font-bold tracking-widest text-[#9a442d] -mt-0.5">Espresso &amp; Botanical Drinks • Checkout</span>
                </div>
            </a>

            <a href="{{ route('home') }}" class="text-xs font-semibold text-slate-600 hover:text-brand-600 transition-colors inline-flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali Belanja
            </a>
        </div>
    </header>

    <!-- MAIN CHECKOUT CONTENT -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-1 w-full">
        
        <!-- ALERT ERRORS -->
        @if (session('error'))
            <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-sm flex items-center gap-3">
                <svg class="w-5 h-5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if (isset($errors) && $errors->any())
            <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-sm">
                <span class="font-bold block mb-1">Mohon lengkapi formulir dengan benar:</span>
                <ul class="list-disc list-inside text-xs space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10">
            
            <!-- LEFT COLUMN: FORM DATA PENGIRIMAN & PEMBAYARAN (7 Cols) -->
            <div class="lg:col-span-7 space-y-6">
                
                <form id="checkoutForm" action="{{ route('checkout.process') }}" method="POST">
                    @csrf

                    <!-- 1. DATA PENERIMA -->
                    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs mb-6">
                        <div class="flex items-center gap-2 mb-6">
                            <span class="w-7 h-7 rounded-full bg-brand-600 text-white text-xs font-bold flex items-center justify-center">1</span>
                            <h2 class="text-lg font-bold text-slate-900">Informasi Pengiriman</h2>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- NAMA LENGKAP -->
                            <div class="sm:col-span-2">
                                <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wide">
                                    Nama Lengkap <span class="text-rose-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="customer_name" 
                                    value="{{ old('customer_name') }}"
                                    required 
                                    placeholder="Contoh: Budi Pratama"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 text-sm outline-none transition-all"
                                >
                            </div>

                            <!-- NOMOR WHATSAPP -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wide">
                                    Nomor WhatsApp / HP <span class="text-rose-500">*</span>
                                </label>
                                <input 
                                    type="tel" 
                                    name="customer_phone" 
                                    value="{{ old('customer_phone') }}"
                                    required 
                                    placeholder="Contoh: 081234567890"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 text-sm outline-none transition-all"
                                >
                            </div>

                            <!-- EMAIL (OPSIONAL) -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wide">
                                    Alamat Email (Opsional)
                                </label>
                                <input 
                                    type="email" 
                                    name="customer_email" 
                                    value="{{ old('customer_email') }}"
                                    placeholder="Contoh: budi@gmail.com"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 text-sm outline-none transition-all"
                                >
                            </div>

                            <!-- ALAMAT LENGKAP -->
                            <div class="sm:col-span-2">
                                <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wide">
                                    Alamat Lengkap Pengiriman <span class="text-rose-500">*</span>
                                </label>
                                <textarea 
                                    name="shipping_address" 
                                    rows="3" 
                                    required 
                                    placeholder="Tuliskan nama jalan, nomor rumah, RT/RW, kelurahan, kecamatan, kota/kabupaten, dan kode pos..."
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 text-sm outline-none transition-all"
                                >{{ old('shipping_address') }}</textarea>
                            </div>

                            <!-- CATATAN PESANAN -->
                            <div class="sm:col-span-2">
                                <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wide">
                                    Catatan Tambahan (Opsional)
                                </label>
                                <input 
                                    type="text" 
                                    name="notes" 
                                    value="{{ old('notes') }}"
                                    placeholder="Contoh: Titipkan di satpam jika tidak ada orang di rumah"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-500/20 text-sm outline-none transition-all"
                                >
                            </div>
                        </div>
                    </div>

                    <!-- 2. METODE PEMBAYARAN -->
                    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs mb-6">
                        <div class="flex items-center gap-2 mb-6">
                            <span class="w-7 h-7 rounded-full bg-brand-600 text-white text-xs font-bold flex items-center justify-center">2</span>
                            <h2 class="text-lg font-bold text-slate-900">Metode Pembayaran</h2>
                        </div>

                        <div class="space-y-3">
                            <!-- BANK TRANSFER -->
                            <label class="flex items-center justify-between p-4 rounded-2xl border-2 cursor-pointer transition-all border-brand-500 bg-brand-50/40 payment-option">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="payment_method" value="bank_transfer" checked class="w-4 h-4 text-brand-600 focus:ring-brand-500">
                                    <div>
                                        <span class="font-bold text-sm text-slate-900 block">Transfer Bank Manual</span>
                                        <span class="text-xs text-slate-500">BCA, Mandiri, BNI, BRI (Cek otomatis via invoice)</span>
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-brand-600 bg-brand-100 px-2 py-0.5 rounded">Populer</span>
                            </label>

                            <!-- QRIS -->
                            <label class="flex items-center justify-between p-4 rounded-2xl border-2 cursor-pointer transition-all border-slate-200 hover:border-slate-300 payment-option">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="payment_method" value="qris" class="w-4 h-4 text-brand-600 focus:ring-brand-500">
                                    <div>
                                        <span class="font-bold text-sm text-slate-900 block">QRIS (Semua E-Wallet & M-Banking)</span>
                                        <span class="text-xs text-slate-500">Scan QR via GoPay, OVO, Dana, ShopeePay, BCA Mobile</span>
                                    </div>
                                </div>
                                <span class="text-xs font-semibold text-slate-500">Instan</span>
                            </label>

                            <!-- COD -->
                            <label class="flex items-center justify-between p-4 rounded-2xl border-2 cursor-pointer transition-all border-slate-200 hover:border-slate-300 payment-option">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="payment_method" value="cod" class="w-4 h-4 text-brand-600 focus:ring-brand-500">
                                    <div>
                                        <span class="font-bold text-sm text-slate-900 block">Bayar di Tempat (COD)</span>
                                        <span class="text-xs text-slate-500">Bayar tunai ke kurir saat paket tiba di alamat Anda</span>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- SUBMIT BUTTON MOBILE / DESKTOP -->
                    <button 
                        type="submit" 
                        class="w-full py-4 px-6 rounded-2xl bg-brand-600 hover:bg-brand-500 text-white font-extrabold text-base shadow-xl shadow-brand-600/30 transition-all hover:shadow-brand-600/50 cursor-pointer flex items-center justify-center gap-2"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Konfirmasi & Buat Pesanan Sekarang
                    </button>
                </form>

            </div>

            <!-- RIGHT COLUMN: RINGKASAN PESANAN (5 Cols) -->
            <div class="lg:col-span-5">
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs sticky top-24">
                    <h3 class="text-base font-bold text-slate-900 pb-4 border-b border-slate-100 flex items-center justify-between">
                        <span>Ringkasan Keranjang</span>
                        <span class="text-xs font-semibold px-2 py-0.5 rounded-full bg-slate-100 text-slate-600">
                            {{ count($cart) }} Item
                        </span>
                    </h3>

                    <!-- CART ITEM LIST -->
                    <div class="divide-y divide-slate-100 max-h-96 overflow-y-auto py-2">
                        @foreach ($cart as $id => $item)
                            <div class="py-4 flex gap-3 items-center">
                                <div class="w-14 h-14 rounded-xl bg-slate-100 overflow-hidden shrink-0 flex items-center justify-center border border-slate-200/60">
                                    @if (!empty($item['image']))
                                        <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                                    @else
                                        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-xs font-bold text-slate-900 truncate">{{ $item['name'] }}</h4>
                                    <div class="text-[11px] text-slate-500 mt-0.5">
                                        {{ $item['quantity'] }} &times; Rp {{ number_format($item['price'], 0, ',', '.') }}
                                    </div>
                                    <span class="text-xs font-bold text-brand-700">
                                        Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                    </span>
                                </div>
                                
                                <!-- HAPUS ITEM -->
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $id }}">
                                    <button type="submit" class="p-1 text-slate-400 hover:text-rose-600 transition-colors" title="Hapus produk">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>

                    <!-- TOTAL CALCULATION -->
                    <div class="pt-4 border-t border-slate-100 space-y-2 text-xs">
                        <div class="flex justify-between text-slate-500">
                            <span>Subtotal Produk</span>
                            <span class="font-semibold text-slate-800">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-slate-500">
                            <span>Biaya Pengiriman (Ongkir)</span>
                            <span class="font-bold text-emerald-600">GRATIS</span>
                        </div>
                        <div class="flex justify-between text-slate-500">
                            <span>Diskon / Potongan</span>
                            <span>Rp 0</span>
                        </div>

                        <div class="pt-3 border-t border-slate-200 flex justify-between items-baseline">
                            <span class="text-sm font-extrabold text-slate-900">Total Pembayaran</span>
                            <span class="text-xl font-black text-brand-700">
                                Rp {{ number_format($totalPrice, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 p-3.5 rounded-xl bg-slate-50 border border-slate-100 text-[11px] text-slate-500 flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Stok otomatis terpotong dari inventaris saat checkout berhasil.</span>
                    </div>

                </div>
            </div>

        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-slate-200 mt-auto py-6">
        <div class="max-w-7xl mx-auto px-4 text-center text-xs text-slate-400">
            &copy; {{ date('Y') }} Blue Tella Store • Checkout System.
        </div>
    </footer>

    <!-- INTERACTION SCRIPT FOR PAYMENT RADIO BUTTONS -->
    <script>
        document.querySelectorAll('input[name="payment_method"]').forEach((radio) => {
            radio.addEventListener('change', function () {
                document.querySelectorAll('.payment-option').forEach(el => {
                    el.classList.remove('border-brand-500', 'bg-brand-50/40');
                    el.classList.add('border-slate-200');
                });
                if (this.checked) {
                    const parent = this.closest('.payment-option');
                    parent.classList.add('border-brand-500', 'bg-brand-50/40');
                    parent.classList.remove('border-slate-200');
                }
            });
        });
    </script>
</body>
</html>
