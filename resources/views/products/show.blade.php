<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }} — Blue Tella Official</title>
    
    <!-- Google Fonts -->
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

    <!-- TOP BAR -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-18 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-700 to-sky-500 flex items-center justify-center text-white shadow-md shadow-brand-500/25">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <div>
                    <span class="text-xl font-extrabold tracking-tight text-slate-900">BLUE TELLA</span>
                    <span class="block text-[10px] uppercase font-bold tracking-widest text-brand-600 -mt-1">Original Apparel</span>
                </div>
            </a>

            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" class="text-xs font-semibold text-slate-600 hover:text-brand-600 transition-colors inline-flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Katalog
                </a>
                <a href="{{ url('/admin') }}" target="_blank" class="px-3 py-1.5 text-xs font-semibold bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg transition-colors">
                    Admin
                </a>
            </div>
        </div>
    </header>

    <!-- BREADCRUMB -->
    <div class="bg-white border-b border-slate-100 py-3">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-xs text-slate-500 flex items-center gap-2">
            <a href="{{ route('home') }}" class="hover:text-brand-600">Beranda</a>
            <span>/</span>
            <span class="text-slate-400">Produk</span>
            <span>/</span>
            <span class="text-slate-800 font-semibold truncate">{{ $product->name }}</span>
        </div>
    </div>

    <!-- MAIN PRODUCT DETAIL -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-1 w-full">
        <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 p-6 sm:p-10 mb-14">
            
            <!-- IMAGE PREVIEW -->
            <div class="bg-slate-100 rounded-2xl aspect-square overflow-hidden flex items-center justify-center relative border border-slate-200/60">
                @if ($product->image)
                    <img 
                        src="{{ asset('storage/' . $product->image) }}" 
                        alt="{{ $product->name }}" 
                        class="w-full h-full object-cover"
                    >
                @else
                    <div class="flex flex-col items-center justify-center p-8 text-blue-400 text-center">
                        <div class="w-20 h-20 rounded-3xl bg-blue-50 shadow-xs flex items-center justify-center mb-3">
                            <svg class="w-10 h-10 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <span class="text-sm font-bold uppercase tracking-wider text-slate-700">Blue Tella Artisan Drink</span>
                        <span class="text-xs text-slate-400 mt-1">Diseduh segar dengan bahan alami pilihan</span>
                    </div>
                @endif

                <!-- STATUS BADGE -->
                <div class="absolute top-4 left-4">
                    @if ($product->stock <= 0)
                        <span class="px-3 py-1 rounded-lg text-xs font-bold bg-rose-600 text-white shadow-sm">
                            Stok Habis
                        </span>
                    @elseif ($product->stock <= 5)
                        <span class="px-3 py-1 rounded-lg text-xs font-bold bg-amber-500 text-white shadow-sm">
                            Stok Menipis ({{ $product->stock }} sisa)
                        </span>
                    @else
                        <span class="px-3 py-1 rounded-lg text-xs font-bold bg-emerald-600 text-white shadow-sm">
                            Ready Stock
                        </span>
                    @endif
                </div>
            </div>

            <!-- DETAILS & ACTION -->
            <div class="flex flex-col justify-between">
                <div>
                    <!-- SKU & META -->
                    <div class="flex items-center gap-3 mb-3">
                        <span class="text-xs font-mono font-semibold px-2.5 py-1 rounded-md bg-slate-100 text-slate-700">
                            SKU: {{ $product->sku ?: 'BT-DEFAULT' }}
                        </span>
                        <span class="text-xs font-semibold text-emerald-600 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Produk Terverifikasi Asli
                        </span>
                    </div>

                    <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight mb-4">
                        {{ $product->name }}
                    </h1>

                    <!-- PRICE -->
                    <div class="p-4 rounded-2xl bg-brand-50/60 border border-brand-100 mb-6 flex items-baseline gap-3">
                        <span class="text-3xl font-black text-brand-700">
                            Rp {{ number_format((float) $product->price, 0, ',', '.') }}
                        </span>
                        <span class="text-xs font-medium text-slate-500">Harga Nett Termasuk Pajak</span>
                    </div>

                    <!-- STOCK INFO -->
                    <div class="mb-6 grid grid-cols-2 gap-4 text-xs">
                        <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                            <span class="text-slate-400 block font-semibold mb-0.5">Ketersediaan Stok</span>
                            <span class="text-slate-800 font-bold text-sm">{{ $product->stock }} unit tersedia</span>
                        </div>
                        <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                            <span class="text-slate-400 block font-semibold mb-0.5">Garansi</span>
                            <span class="text-slate-800 font-bold text-sm">100% Retur Jika Rusak</span>
                        </div>
                    </div>

                    <!-- DESCRIPTION -->
                    <div class="mb-8">
                        <h3 class="text-xs uppercase font-extrabold tracking-wider text-slate-400 mb-2">Deskripsi Produk</h3>
                        <div class="text-sm text-slate-600 leading-relaxed space-y-2 whitespace-pre-line">
                            {{ $product->description ?: 'Produk apparel original berkualitas tinggi dari Blue Tella. Dibuat dengan material katun premium yang lembut, nyaman di kulit, dan cocok digunakan untuk aktivitas kasual harian.' }}
                        </div>
                    </div>
                </div>

                <!-- ORDER & CHECKOUT ACTIONS -->
                <div class="pt-6 border-t border-slate-100 flex flex-col gap-3">
                    @if ($product->stock > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <!-- BELI SEKARANG (DIRECT CHECKOUT) -->
                            <form action="{{ route('cart.direct') }}" method="POST" class="w-full">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button 
                                    type="submit" 
                                    class="w-full py-3.5 px-6 rounded-xl bg-brand-600 hover:bg-brand-500 text-white font-extrabold text-sm flex items-center justify-center gap-2 shadow-lg shadow-brand-600/25 transition-all cursor-pointer"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                    Beli Sekarang (Checkout)
                                </button>
                            </form>

                            <!-- TAMBAH KE KERANJANG -->
                            <form action="{{ route('cart.add') }}" method="POST" class="w-full">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button 
                                    type="submit" 
                                    class="w-full py-3.5 px-6 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-sm flex items-center justify-center gap-2 transition-colors cursor-pointer"
                                >
                                    <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    + Keranjang Belanja
                                </button>
                            </form>
                        </div>
                    @else
                        <button disabled class="w-full py-3.5 px-6 rounded-xl bg-slate-100 text-slate-400 font-bold text-sm text-center cursor-not-allowed">
                            Produk Ini Sedang Habis
                        </button>
                    @endif

                    @php
                        $waText = urlencode("Halo Admin Blue Tella, saya ingin tanya mengenai produk: {$product->name} (SKU: " . ($product->sku ?: '-') . ").");
                    @endphp
                    <a 
                        href="https://wa.me/?text={{ $waText }}" 
                        target="_blank"
                        class="text-center text-xs font-semibold text-emerald-600 hover:text-emerald-700 py-1 transition-colors flex items-center justify-center gap-1.5"
                    >
                        <span>Tanya Admin via WhatsApp</span>
                    </a>
                </div>

            </div>
        </div>

        <!-- RELATED PRODUCTS -->
        @if ($relatedProducts->count() > 0)
            <div class="mt-12">
                <h3 class="text-xl font-bold text-slate-900 mb-6">Produk Terkait Lainnya</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($relatedProducts as $related)
                        <a href="{{ route('products.show', $related->slug) }}" class="group bg-white rounded-2xl border border-slate-200 hover:border-brand-300 p-4 transition-all hover:shadow-lg flex flex-col">
                            <div class="aspect-square bg-slate-100 rounded-xl overflow-hidden mb-3 flex items-center justify-center">
                                @if ($related->image)
                                    <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                                @else
                                    <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                @endif
                            </div>
                            <h4 class="font-bold text-sm text-slate-900 group-hover:text-brand-600 transition-colors line-clamp-1 mb-1">
                                {{ $related->name }}
                            </h4>
                            <span class="text-sm font-extrabold text-brand-700 mt-auto">
                                Rp {{ number_format((float) $related->price, 0, ',', '.') }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-slate-200 mt-auto py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-xs text-slate-500">
            &copy; {{ date('Y') }} Blue Tella Store. Terintegrasi dengan Filament Admin Panel.
        </div>
    </footer>
</body>
</html>
