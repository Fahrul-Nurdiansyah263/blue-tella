<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Aura Botanica &amp; Espresso — Racikan Segar &amp; Seduhan Penuh Seni</title>
    
    <!-- Material Symbols Outlined -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <!-- Google Fonts: Epilogue & Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@400;500;600;700;800&amp;family=Plus+Jakarta+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>

    <!-- Tailwind CSS v3 -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                "primary-container": "#261813",
                "on-error": "#ffffff",
                "tertiary-container": "#002106",
                "surface-container": "#f0eee8",
                "on-background": "#1c1c18",
                "secondary-fixed-dim": "#ffb4a1",
                "surface-bright": "#fcf9f3",
                "on-primary": "#ffffff",
                "on-secondary-fixed-variant": "#7c2e19",
                "surface-variant": "#e5e2dc",
                "on-primary-fixed-variant": "#55433c",
                "surface-container-lowest": "#ffffff",
                "on-surface-variant": "#4f4541",
                "tertiary-fixed": "#c1eebc",
                "error-container": "#ffdad6",
                "surface-tint": "#6e5a53",
                "outline": "#817471",
                "primary-fixed": "#f8ddd4",
                "error": "#ba1a1a",
                "secondary-container": "#fc9174",
                "inverse-surface": "#31312d",
                "on-surface": "#1c1c18",
                "on-error-container": "#93000a",
                "surface-dim": "#dcdad4",
                "on-tertiary-fixed-variant": "#284f2a",
                "inverse-primary": "#dbc1b9",
                "surface": "#fcf9f3",
                "surface-container-highest": "#e5e2dc",
                "inverse-on-surface": "#f3f0ea",
                "on-secondary-fixed": "#3c0800",
                "tertiary-fixed-dim": "#a5d2a2",
                "tertiary": "#000000",
                "outline-variant": "#d2c3bf",
                "surface-container-low": "#f6f3ed",
                "surface-container-high": "#ebe8e2",
                "on-tertiary": "#ffffff",
                "on-tertiary-container": "#648e63",
                "secondary": "#9a442d",
                "on-tertiary-fixed": "#002106",
                "on-primary-container": "#957f78",
                "on-primary-fixed": "#261813",
                "primary": "#000000",
                "primary-fixed-dim": "#dbc1b9",
                "on-secondary-container": "#742814",
                "secondary-fixed": "#ffdbd2",
                "on-secondary": "#ffffff",
                "background": "#fcf9f3"
              },
              "borderRadius": {
                "DEFAULT": "0.25rem",
                "lg": "0.5rem",
                "xl": "0.75rem",
                "full": "9999px"
              },
              "fontFamily": {
                "body-lg": ["Plus Jakarta Sans", "sans-serif"],
                "price-lg": ["Plus Jakarta Sans", "sans-serif"],
                "label-sm": ["Plus Jakarta Sans", "sans-serif"],
                "display-lg-mobile": ["Epilogue", "serif"],
                "headline-lg": ["Epilogue", "serif"],
                "label-md": ["Plus Jakarta Sans", "sans-serif"],
                "body-md": ["Plus Jakarta Sans", "sans-serif"],
                "display-lg": ["Epilogue", "serif"],
                "headline-sm": ["Epilogue", "serif"],
                "headline-md": ["Epilogue", "serif"],
                "label-lg": ["Plus Jakarta Sans", "sans-serif"],
                "body-sm": ["Plus Jakarta Sans", "sans-serif"]
              },
              "fontSize": {
                "body-lg": ["1.125rem", { "lineHeight": "1.75rem", "letterSpacing": "0", "fontWeight": "400" }],
                "price-lg": ["1.375rem", { "lineHeight": "1.5rem", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                "label-sm": ["0.6875rem", { "lineHeight": "0.875rem", "letterSpacing": "0.05em", "fontWeight": "700" }],
                "display-lg-mobile": ["2.25rem", { "lineHeight": "2.75rem", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                "headline-lg": ["2rem", { "lineHeight": "2.5rem", "letterSpacing": "-0.02em", "fontWeight": "600" }],
                "label-md": ["0.8125rem", { "lineHeight": "1rem", "letterSpacing": "0.02em", "fontWeight": "600" }],
                "body-md": ["1rem", { "lineHeight": "1.5rem", "letterSpacing": "0", "fontWeight": "400" }],
                "display-lg": ["3.5rem", { "lineHeight": "4rem", "letterSpacing": "-0.03em", "fontWeight": "700" }],
                "headline-sm": ["1.25rem", { "lineHeight": "1.75rem", "letterSpacing": "-0.01em", "fontWeight": "600" }],
                "headline-md": ["1.5rem", { "lineHeight": "2rem", "letterSpacing": "-0.015em", "fontWeight": "600" }],
                "label-lg": ["0.9375rem", { "lineHeight": "1.25rem", "letterSpacing": "0.01em", "fontWeight": "600" }],
                "body-sm": ["0.875rem", { "lineHeight": "1.25rem", "letterSpacing": "0.01em", "fontWeight": "400" }]
              }
            }
          }
        }
    </script>
    <style>
        .material-symbols-outlined {
          font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
          display: inline-block;
          vertical-align: middle;
          line-height: 1;
        }
        .custom-scroll::-webkit-scrollbar {
          height: 6px;
          width: 6px;
        }
        .custom-scroll::-webkit-scrollbar-track {
          background: #f0eee8;
          border-radius: 9999px;
        }
        .custom-scroll::-webkit-scrollbar-thumb {
          background: #d2c3bf;
          border-radius: 9999px;
        }
    </style>
</head>
<body class="bg-background text-on-surface font-body-md antialiased selection:bg-secondary-fixed selection:text-on-secondary-fixed min-h-screen flex flex-col">

@php
    $cart = session('cart', []);
    $cartCount = array_sum(array_column($cart, 'quantity'));
    $cartTotal = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

    $defaultImages = [
        'smoked-vanilla-oat-latte' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuD8c3OenDJBTmDE5nn1kHYWI0tPDpWj2O6Y3lRya6pPydqtvrkqV8npptMMKpJE3H8XrSDbQPek0ENOYhFCHQkzWXoOjrIsl9PbWqrQ5t3IoRCx___HZDSfvwP1NOK1ukfrZAOTc6cNtnCJJFcJVn52Y8uvEGyIxCu_0ohCczF76a-hCSl3MkyMhkG-llXWwneooeR3LSjmtKZGCSOTOMrfzNdXFlOHTnOWfwfKTgF_hpOFGRdFdnuWBA',
        'hibiscus-berry-cold-brew' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBsLnYuC0NGESsAv0OlL4r0zu8Z2oZfhVb9HOqD6lgwoQVp_BB7TAp3woEP3bPl9WAum59p57kCZ-L-4LlF7QA_PkA_keNNELoNZPmrIM7a4F_HPM2-zKQXKDkunAJiytOg4ncY5V4din_CYW08l0HjRyXMhFddFcF7HTowQ1gdDkq0yjXYcar7ohSu58JnfmxnCCzLpuDKyaM4ffb4JY4Bup0i-XYvi4Jqzy9XJ9rC06TzBQfyrRoSkA',
        'kyoto-ceremonial-matcha' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA0wo1WHL7G2OUV4dpXPDzbYvZx1LNQSMU1JlUNMO-2xoLai-6xx0fOUuIu0bnVXvvaIdOuLoG2XMjjLEZ9Gs8RLvqEvAZNvGbampQhkLhSj7rBn7g49Pdzd5TWGtNEuccm2ZLtRXX4Gp9C5yvyt9PUhKxPzhX7H9ofinQKI9H_ODQ07Z9AW-PXvAmtj8V0rxa_KQluouG7SKO1q1UDWajJZPo_NBo_g-_cxuq27KTrnxcR5UUABkesYg',
        'spiced-caramel-macchiato' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAJzt8_83u_aVoJTX-BtZ1IFjbSpNZejiPWg2Cvr_xI0vInrWOCCMteUrtVQxScFE7SRgJocDYdo8Wyc0WJ4pNkEtUQyqbsA73XgSHY958Nwjt5wbZPQjfC-wnseNtQsptFEUaDrkt2_BpFc-BxMwHobGshDk3AN-J2Wcf_SwCJUKPc939LclIn53TxwjPD6uTOXFHEQU4MEE_CoHWX6FfV7Jt65i54sx3t5pjLVqniXb5J3PkrUgRx5w',
        'blue-tella-signature-ocean-boba' => 'https://images.unsplash.com/photo-1558857563-b37fe43cc096?auto=format&fit=crop&w=800&q=80',
        'velvet-taro-cheese-foam' => 'https://images.unsplash.com/photo-1572490122747-3968b75cc699?auto=format&fit=crop&w=800&q=80',
        'sparkling-berry-lemonade' => 'https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?auto=format&fit=crop&w=800&q=80',
        'brown-sugar-fresh-milk-boba' => 'https://images.unsplash.com/photo-1541658016709-82535e94bc69?auto=format&fit=crop&w=800&q=80',
    ];

    $productTags = [
        'smoked-vanilla-oat-latte' => ['tag' => 'Oat Milk • Single Origin', 'badge' => 'Best Seller', 'category' => 'espresso', 'rating' => '4.9 (420+)'],
        'hibiscus-berry-cold-brew' => ['tag' => 'Botanical Cold Brew', 'badge' => 'Best Seller', 'category' => 'non-coffee', 'rating' => '4.8 (310+)'],
        'kyoto-ceremonial-matcha' => ['tag' => 'Matcha Uji • Oat Milk', 'badge' => 'Ceremonial', 'category' => 'non-coffee', 'rating' => '5.0 (580+)'],
        'spiced-caramel-macchiato' => ['tag' => 'Specialty Macchiato', 'badge' => 'Best Seller', 'category' => 'espresso', 'rating' => '4.9 (290+)'],
        'blue-tella-signature-ocean-boba' => ['tag' => 'Botanical Butterfly Pea', 'badge' => 'House Signature', 'category' => 'non-coffee', 'rating' => '4.9 (350+)'],
        'velvet-taro-cheese-foam' => ['tag' => 'Sea Salt Cheese Foam', 'badge' => 'Creamy Blend', 'category' => 'non-coffee', 'rating' => '4.8 (190+)'],
        'sparkling-berry-lemonade' => ['tag' => 'Infusi Buah & Mint', 'badge' => 'Fresh Sparkler', 'category' => 'non-coffee', 'rating' => '4.9 (220+)'],
        'brown-sugar-fresh-milk-boba' => ['tag' => 'Gula Kelapa Aren Murni', 'badge' => 'Sweet Indulgence', 'category' => 'non-coffee', 'rating' => '4.9 (510+)'],
    ];
@endphp

<!-- ==================== SHARED COMPONENT 1: TopNavBar ==================== -->
<header class="bg-surface dark:bg-primary-container docked full-width top-0 sticky z-40 shadow-sm border-b border-outline-variant/30">
    <div class="flex justify-between items-center w-full px-4 sm:px-8 max-w-7xl mx-auto h-20">
        <!-- Brand & Search cluster -->
        <div class="flex items-center gap-6 lg:gap-8">
            <a class="flex items-center gap-2 group" href="{{ route('home') }}">
                <div class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center text-primary-fixed shadow-sm group-hover:scale-105 transition-transform">
                    <span class="material-symbols-outlined text-[20px]" data-icon="local_cafe">local_cafe</span>
                </div>
                <div>
                    <span class="text-headline-sm sm:text-headline-md font-headline-md font-bold tracking-tight text-on-surface dark:text-inverse-on-surface">
                        Aura Botanica
                    </span>
                    <span class="hidden sm:inline-block text-xs font-serif italic text-secondary ml-1 font-normal">&amp; Espresso</span>
                </div>
            </a>
            
            <!-- Left Search Bar -->
            <form action="{{ route('home') }}" method="GET" class="hidden lg:flex items-center relative w-64">
                <span class="material-symbols-outlined absolute left-3 text-outline text-lg pointer-events-none" data-icon="search">search</span>
                <input 
                    name="search"
                    value="{{ request('search') }}"
                    class="w-full pl-9 pr-4 py-2 bg-surface-container-low rounded-full text-body-sm font-body-sm text-on-surface border border-outline-variant/50 focus:border-secondary focus:outline-none focus:ring-1 focus:ring-secondary/20 transition-all placeholder:text-outline" 
                    placeholder="Cari seduhan favorit..." 
                    type="text"
                />
            </form>
        </div>

        <!-- Navigation Links -->
        <nav class="hidden md:flex items-center space-x-6 lg:space-x-8">
            <a class="text-primary dark:text-inverse-primary font-bold border-b-2 border-primary dark:border-inverse-primary pb-1 font-label-lg text-label-lg active:scale-[0.98] transition-transform duration-150" href="#menu">
                Menu
            </a>
            <a class="text-on-surface-variant dark:text-surface-variant font-label-lg text-label-lg hover:text-on-surface dark:hover:text-inverse-on-surface transition-colors active:scale-[0.98]" href="#seasonal">
                Seasonal
            </a>
            <a class="text-on-surface-variant dark:text-surface-variant font-label-lg text-label-lg hover:text-on-surface dark:hover:text-inverse-on-surface transition-colors active:scale-[0.98]" href="#story">
                Our Story
            </a>
            <a class="text-on-surface-variant dark:text-surface-variant font-label-lg text-label-lg hover:text-on-surface dark:hover:text-inverse-on-surface transition-colors active:scale-[0.98]" href="#locations">
                Locations
            </a>
            <a class="text-secondary font-semibold font-label-lg text-label-lg hover:text-secondary/80 transition-colors flex items-center gap-1" href="{{ route('order.tracking') }}">
                <span class="material-symbols-outlined text-[18px]">receipt_long</span>
                Cek Resi
            </a>
        </nav>

        <!-- Trailing Action Buttons -->
        <div class="flex items-center gap-3 sm:gap-4">
            <a href="{{ url('/admin') }}" class="hidden sm:inline-flex items-center gap-1 text-label-lg font-label-lg text-on-surface hover:text-secondary transition-colors duration-150 active:scale-[0.98] px-3 py-2">
                <span class="material-symbols-outlined text-[18px]">admin_panel_settings</span>
                Admin
            </a>

            <!-- Cart Action Icon with Badge -->
            <button 
                type="button" 
                onclick="openCartDrawer()" 
                aria-label="Cart" 
                class="relative p-2.5 rounded-full bg-surface-container hover:bg-surface-container-high transition-colors active:scale-[0.98] text-on-surface cursor-pointer"
            >
                <span class="material-symbols-outlined" data-icon="shopping_bag">shopping_bag</span>
                <span 
                    id="navCartCount"
                    class="{{ $cartCount > 0 ? '' : 'hidden' }} absolute -top-1 -right-1 w-5 h-5 rounded-full bg-secondary text-on-secondary text-label-sm font-label-sm flex items-center justify-center font-bold shadow-sm"
                >
                    {{ $cartCount }}
                </span>
            </button>

            <!-- Primary Action -->
            <a class="inline-flex items-center justify-center rounded-full bg-primary-container text-on-primary px-5 sm:px-6 py-2.5 text-label-lg font-label-lg shadow-sm hover:bg-on-primary-fixed-variant transition-all duration-200 active:scale-[0.98]" href="#menu">
                Order Now
            </a>
        </div>
    </div>
</header>

<!-- ==================== HERO SECTION ==================== -->
<section class="relative overflow-hidden pt-8 pb-20 md:py-24 bg-gradient-to-b from-surface to-surface-container-low">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Left Content Column -->
            <div class="lg:col-span-7 space-y-6">
                <!-- Editorial Pill Tag -->
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-surface-container border border-outline-variant/60 shadow-xs">
                    <span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
                    <span class="text-label-sm font-label-sm tracking-widest uppercase text-on-surface-variant">
                        Third-Wave Botanical Cafe • Est. 2024
                    </span>
                </div>
                <!-- Main Catchy Headline -->
                <h1 class="text-3xl sm:text-4xl md:text-display-lg font-display-lg tracking-tight text-on-surface leading-tight">
                    Racikan Segar Setiap Hari, <br class="hidden sm:inline"/>
                    <span class="text-secondary italic font-serif">Diseduh Penuh Seni.</span>
                </h1>
                <p class="text-body-lg font-body-lg text-on-surface-variant max-w-xl">
                    Eksplorasi harmonis antara kehangatan biji kopi single origin pilihan dan segarnya ekstraksi flora alami. Dibuat lambat dan cermat demi secangkir ketenangan di tiap tegukan.
                </p>
                <!-- CTAs & Stats -->
                <div class="pt-2 flex flex-wrap items-center gap-4">
                    <a class="px-8 py-4 rounded-full bg-primary-container text-on-primary text-label-lg font-label-lg hover:bg-on-primary-fixed-variant shadow-md hover:shadow-lg transition-all duration-200 flex items-center gap-3 group active:scale-[0.98]" href="#menu">
                        <span>Pesan Sekarang</span>
                        <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform" data-icon="arrow_forward">arrow_forward</span>
                    </a>
                    <a class="px-7 py-4 rounded-full border-2 border-primary-container text-primary-container text-label-lg font-label-lg hover:bg-primary-container/5 transition-all duration-200 active:scale-[0.98]" href="#menu-kategori">
                        Lihat Menu Lengkap
                    </a>
                </div>
                <!-- Trust Signals & Delivery Info -->
                <div class="pt-6 border-t border-outline-variant/40 grid grid-cols-3 gap-6 max-w-lg">
                    <div>
                        <div class="text-headline-sm font-headline-sm font-bold text-on-surface">15+</div>
                        <div class="text-body-sm font-body-sm text-on-surface-variant">Kurasi Botani Alami</div>
                    </div>
                    <div>
                        <div class="text-headline-sm font-headline-sm font-bold text-on-surface">100%</div>
                        <div class="text-body-sm font-body-sm text-on-surface-variant">Arabika Grade 1</div>
                    </div>
                    <div>
                        <div class="text-headline-sm font-headline-sm font-bold text-on-surface">20 Menit</div>
                        <div class="text-body-sm font-body-sm text-on-surface-variant">Garansi Pengantaran</div>
                    </div>
                </div>
            </div>
            <!-- Right Hero Showcase with Floating Badges -->
            <div class="lg:col-span-5 relative flex justify-center">
                <!-- Background Organic Aura Blur -->
                <div class="absolute -inset-4 bg-secondary-fixed/40 rounded-full blur-3xl -z-10 w-96 h-96 mx-auto"></div>
                <div class="relative w-full max-w-md">
                    <!-- Hero Image Container with Warm Tactile Border -->
                    <div class="relative rounded-[2.5rem] overflow-hidden bg-surface-container-lowest p-3 shadow-2xl border border-outline-variant/40">
                        <img 
                            class="w-full h-[440px] sm:h-[460px] object-cover rounded-[2rem]" 
                            alt="Artisanal iced smoked vanilla oat latte and botanical beverage" 
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuB_-qy3DTcsLMx_4V9ChLC2eH9AtvvoI6bebL_ePSLiayGcH0X-axf-2Db9v4zvRh1Mkf_U7H7k2ix1Hm5gzHJWxxO0QuSnftFhKrwTCpJsb160m4P5qLJPr6nOu7HvsFKWeIFV6xa45raKdVKyC12VIhn9eDZC5Ovb5mQgvq8UKPwoHaiYiD9-ugWl0PS8c3V3khChX2DI_FJDGXInyeXb6yv18eSJa-4EsQH9p7OftuuEdMe7JxBHWg"
                        />
                    </div>
                    <!-- Floating Badge 1: 100% Organik & Single Origin -->
                    <div class="absolute -top-4 -left-4 sm:-left-6 bg-surface-container-lowest/95 backdrop-blur-md border border-outline-variant/50 px-4 py-3 rounded-2xl shadow-lg flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-tertiary-fixed flex items-center justify-center text-on-tertiary-fixed">
                            <span class="material-symbols-outlined text-[22px]" data-icon="eco">eco</span>
                        </div>
                        <div>
                            <p class="text-label-sm font-label-sm uppercase text-secondary font-bold">Terjamin Asli</p>
                            <p class="text-label-md font-label-md font-bold text-on-surface">100% Organik &amp; Single Origin</p>
                        </div>
                    </div>
                    <!-- Floating Badge 2: Promo Pengguna Baru -->
                    <div class="absolute -bottom-6 -right-4 bg-primary-container text-on-primary px-5 py-3.5 rounded-2xl shadow-xl flex items-center gap-3 border border-outline-variant/20">
                        <div class="w-10 h-10 rounded-xl bg-secondary flex items-center justify-center text-on-secondary shadow-xs">
                            <span class="material-symbols-outlined text-[20px]" data-icon="loyalty">loyalty</span>
                        </div>
                        <div>
                            <p class="text-label-sm font-label-sm text-secondary-fixed uppercase tracking-wider font-semibold">Spesial Hari Ini</p>
                            <p class="text-headline-sm font-headline-sm text-surface-bright font-bold">Promo Baru -25%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== SECTION 3: Kategori Minuman Favorit ==================== -->
<section class="py-16 md:py-20 max-w-7xl mx-auto px-4 sm:px-8" id="menu-kategori">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
        <div>
            <span class="text-label-sm font-label-sm uppercase tracking-widest text-secondary font-bold">Koleksi Rasa</span>
            <h2 class="text-headline-lg font-headline-lg text-on-surface mt-1">Kategori Minuman Pilihan</h2>
        </div>
        <p class="text-body-md font-body-md text-on-surface-variant max-w-md">
            Dari racikan pekat espresso hingga mocktail buah yang merevitalisasi hari Anda.
        </p>
    </div>
    <!-- Category Pills Bento Grid -->
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
        <!-- Category 1 -->
        <button type="button" onclick="filterCategory('espresso')" class="group p-5 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 hover:border-secondary transition-all duration-200 hover:-translate-y-1 shadow-sm flex flex-col items-center text-center cursor-pointer">
            <div class="w-14 h-14 rounded-full bg-primary-fixed flex items-center justify-center text-on-primary-fixed mb-3 group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined text-2xl" data-icon="coffee">coffee</span>
            </div>
            <h3 class="text-label-lg font-label-lg font-bold text-on-surface">Artisan Espresso</h3>
            <p class="text-label-sm font-label-sm text-on-surface-variant mt-1">Single Origin Gayo</p>
        </button>
        <!-- Category 2 -->
        <button type="button" onclick="filterCategory('non-coffee')" class="group p-5 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 hover:border-secondary transition-all duration-200 hover:-translate-y-1 shadow-sm flex flex-col items-center text-center cursor-pointer">
            <div class="w-14 h-14 rounded-full bg-secondary-fixed flex items-center justify-center text-on-secondary-fixed mb-3 group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined text-2xl" data-icon="icecream">icecream</span>
            </div>
            <h3 class="text-label-lg font-label-lg font-bold text-on-surface">Cold Brew Series</h3>
            <p class="text-label-sm font-label-sm text-on-surface-variant mt-1">Ekstraksi 18 Jam</p>
        </button>
        <!-- Category 3 -->
        <button type="button" onclick="filterCategory('non-coffee')" class="group p-5 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 hover:border-secondary transition-all duration-200 hover:-translate-y-1 shadow-sm flex flex-col items-center text-center cursor-pointer">
            <div class="w-14 h-14 rounded-full bg-tertiary-fixed flex items-center justify-center text-on-tertiary-fixed mb-3 group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined text-2xl" data-icon="spa">spa</span>
            </div>
            <h3 class="text-label-lg font-label-lg font-bold text-on-surface">Matcha &amp; Botanica</h3>
            <p class="text-label-sm font-label-sm text-on-surface-variant mt-1">Uji Matcha Asli</p>
        </button>
        <!-- Category 4 -->
        <button type="button" onclick="filterCategory('non-coffee')" class="group p-5 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 hover:border-secondary transition-all duration-200 hover:-translate-y-1 shadow-sm flex flex-col items-center text-center cursor-pointer">
            <div class="w-14 h-14 rounded-full bg-primary-fixed-dim flex items-center justify-center text-on-primary-fixed mb-3 group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined text-2xl" data-icon="local_bar">local_bar</span>
            </div>
            <h3 class="text-label-lg font-label-lg font-bold text-on-surface">Fruit Sparklers</h3>
            <p class="text-label-sm font-label-sm text-on-surface-variant mt-1">Infusi Bunga &amp; Buah</p>
        </button>
        <!-- Category 5 -->
        <button type="button" onclick="filterCategory('all')" class="group col-span-2 md:col-span-1 p-5 rounded-2xl bg-surface-container-lowest border border-outline-variant/30 hover:border-secondary transition-all duration-200 hover:-translate-y-1 shadow-sm flex flex-col items-center text-center cursor-pointer">
            <div class="w-14 h-14 rounded-full bg-surface-variant flex items-center justify-center text-on-surface mb-3 group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined text-2xl" data-icon="bubble_chart">bubble_chart</span>
            </div>
            <h3 class="text-label-lg font-label-lg font-bold text-on-surface">Signature Boba</h3>
            <p class="text-label-sm font-label-sm text-on-surface-variant mt-1">Gula Kelapa Aren</p>
        </button>
    </div>
</section>

<!-- ==================== SECTION 4: Menu Terlaris (Bestseller Grid) ==================== -->
<section class="py-16 bg-surface-container-low border-y border-outline-variant/30" id="menu">
    <div class="max-w-7xl mx-auto px-4 sm:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <div class="inline-flex items-center gap-2 text-label-sm font-label-sm uppercase text-secondary font-bold mb-1">
                    <span class="material-symbols-outlined text-base" data-icon="star">star</span>
                    Paling Sering Dipesan
                </div>
                <h2 class="text-headline-lg font-headline-lg text-on-surface">Menu Terlaris &amp; Pilihan Pekan Ini</h2>
            </div>
            <!-- Filter Tabs -->
            <div class="flex items-center gap-2 overflow-x-auto pb-2 md:pb-0">
                <button 
                    id="tab-all"
                    type="button" 
                    onclick="filterCategory('all')" 
                    class="filter-btn px-5 py-2 rounded-full bg-primary-container text-on-primary text-label-md font-label-md font-semibold transition-all shadow-sm"
                >
                    Semua
                </button>
                <button 
                    id="tab-espresso"
                    type="button" 
                    onclick="filterCategory('espresso')" 
                    class="filter-btn px-5 py-2 rounded-full bg-surface-container-lowest text-on-surface-variant hover:text-on-surface border border-outline-variant/40 text-label-md font-label-md transition-all"
                >
                    Espresso Based
                </button>
                <button 
                    id="tab-non-coffee"
                    type="button" 
                    onclick="filterCategory('non-coffee')" 
                    class="filter-btn px-5 py-2 rounded-full bg-surface-container-lowest text-on-surface-variant hover:text-on-surface border border-outline-variant/40 text-label-md font-label-md transition-all"
                >
                    Non-Coffee &amp; Botanica
                </button>
            </div>
        </div>

        @if(request('search'))
            <div class="mb-8 p-4 rounded-2xl bg-surface-container-lowest border border-secondary/30 flex items-center justify-between">
                <div class="flex items-center gap-2 text-body-sm font-body-sm">
                    <span class="material-symbols-outlined text-secondary">search</span>
                    <span>Menampilkan hasil pencarian untuk: <strong>"{{ request('search') }}"</strong> ({{ $products->count() }} menu)</span>
                </div>
                <a href="{{ route('home') }}#menu" class="text-xs font-bold text-secondary hover:underline">Hapus Filter</a>
            </div>
        @endif

        <!-- Dynamic Product Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="productsGrid">
            @forelse ($products as $product)
                @php
                    $meta = $productTags[$product->slug] ?? [
                        'tag' => 'Botanical Craft Drink',
                        'badge' => 'Specialty',
                        'category' => 'non-coffee',
                        'rating' => '4.9 (180+)',
                    ];
                    $imageSrc = $product->image ? asset('storage/' . $product->image) : ($defaultImages[$product->slug] ?? 'https://images.unsplash.com/photo-1541658016709-82535e94bc69?auto=format&fit=crop&w=800&q=80');
                @endphp
                
                <div 
                    class="product-card bg-surface-container-lowest rounded-3xl p-4 border border-outline-variant/40 hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group"
                    data-category="{{ $meta['category'] }}"
                >
                    <div>
                        <div class="relative rounded-2xl overflow-hidden aspect-[4/3] bg-surface-container mb-4">
                            <span class="absolute top-3 left-3 z-10 px-3 py-1 bg-secondary text-on-secondary rounded-full text-label-sm font-label-sm font-bold shadow-sm">
                                {{ $meta['badge'] }}
                            </span>
                            
                            @if($product->stock <= 5 && $product->stock > 0)
                                <span class="absolute top-3 right-3 z-10 px-2.5 py-0.5 bg-amber-500 text-white rounded-full text-[10px] font-bold">
                                    Sisa {{ $product->stock }}
                                </span>
                            @endif

                            <img 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                                alt="{{ $product->name }}" 
                                src="{{ $imageSrc }}"
                                loading="lazy"
                            />
                        </div>

                        <div class="flex items-center justify-between gap-2 mb-1.5">
                            <span class="text-label-sm font-label-sm text-secondary font-semibold truncate">{{ $meta['tag'] }}</span>
                            <div class="flex items-center gap-1 text-label-sm font-label-sm font-bold text-on-surface shrink-0">
                                <span class="material-symbols-outlined text-[16px] text-secondary" data-icon="star" style="font-variation-settings: 'FILL' 1;">star</span>
                                {{ $meta['rating'] }}
                            </div>
                        </div>

                        <h3 class="text-headline-sm font-headline-sm text-on-surface group-hover:text-secondary transition-colors line-clamp-1">
                            {{ $product->name }}
                        </h3>
                        <p class="text-body-sm font-body-sm text-on-surface-variant mt-1 line-clamp-2">
                            {{ $product->description }}
                        </p>
                    </div>

                    <div class="pt-5 mt-4 border-t border-outline-variant/30 flex items-center justify-between gap-2">
                        <div>
                            <span class="text-label-sm font-label-sm text-outline">Harga</span>
                            <div class="text-price-lg font-price-lg text-on-surface">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <!-- Direct Checkout Button -->
                            <form action="{{ route('cart.direct') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                                <input type="hidden" name="quantity" value="1"/>
                                <button 
                                    type="submit" 
                                    title="Beli Langsung & Checkout" 
                                    class="p-2.5 rounded-full border border-outline-variant/60 hover:bg-surface-container text-on-surface transition-colors active:scale-95"
                                >
                                    <span class="material-symbols-outlined text-[20px]">flash_on</span>
                                </button>
                            </form>

                            <!-- Add To Cart -->
                            <button 
                                type="button" 
                                onclick="addToCart({{ $product->id }})" 
                                class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-full bg-primary-container text-on-primary hover:bg-on-primary-fixed-variant transition-colors text-label-md font-label-md active:scale-95 shadow-sm cursor-pointer"
                            >
                                <span class="material-symbols-outlined text-base" data-icon="add">add</span>
                                Tambah
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-16 text-center text-on-surface-variant bg-surface-container-lowest rounded-3xl border border-outline-variant/30">
                    <span class="material-symbols-outlined text-5xl text-outline mb-2">sentiment_dissatisfied</span>
                    <p class="text-headline-sm font-headline-sm font-bold text-on-surface">Tidak ada menu yang ditemukan</p>
                    <p class="text-body-sm font-body-sm text-on-surface-variant mt-1">Coba gunakan kata kunci pencarian yang lain.</p>
                    <a href="{{ route('home') }}" class="mt-4 inline-block px-6 py-2 rounded-full bg-primary-container text-on-primary text-label-md font-label-md">
                        Reset Pencarian
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ==================== SECTION 5: Craft Story / Keunggulan ==================== -->
<section class="py-20 max-w-7xl mx-auto px-4 sm:px-8" id="story">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <!-- Visual Column: Asymmetrical Gallery -->
        <div class="lg:col-span-5 relative">
            <div class="relative rounded-3xl overflow-hidden shadow-xl border border-outline-variant/40">
                <img 
                    class="w-full h-[440px] sm:h-[480px] object-cover" 
                    alt="Barista pour-over crafting coffee" 
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuA7DFZ6_5pb4vZkE14l_yO-F6sffPXxRMAcKx1wGGPZhDhxHYqkwllXrfkOtaXc5rFjsLA4eiPdKRZngrwKIAFLGuehlzl9xsgQlc7enwccuGXFZ2S7Xj6OL1AEgmcMw7gm7d_u24saGrXL5Gd0Jws3ezRIdR0IUePcSbN_Isk8Wxf5cbBpwAK4FmPX8Op0Uik8s6kMKL2nme6T0AyWJuDCIUtodc3EEqYAcvFKYaIXuzzppf8QAI--Bw"
                />
            </div>
            <!-- Overlapping Card -->
            <div class="absolute -bottom-8 -right-6 bg-surface-container-lowest p-6 rounded-2xl shadow-xl border border-outline-variant/40 max-w-xs hidden sm:block">
                <div class="flex items-center gap-3 mb-2">
                    <span class="material-symbols-outlined text-secondary text-2xl" data-icon="verified">verified</span>
                    <span class="text-label-md font-label-md font-bold text-on-surface">Standar Ekstraksi SCA</span>
                </div>
                <p class="text-body-sm font-body-sm text-on-surface-variant">
                    Setiap cangkir ditakar gramatur, suhu, dan rasio TDS-nya untuk kejernihan rasa maksimal.
                </p>
            </div>
        </div>

        <!-- Content Column -->
        <div class="lg:col-span-7 space-y-8">
            <div>
                <span class="text-label-sm font-label-sm uppercase tracking-widest text-secondary font-bold">Kenapa Aura Botanica?</span>
                <h2 class="text-headline-lg font-headline-lg text-on-surface mt-2 leading-tight">
                    Kebaikan Alam yang Diseduh dengan Kejujuran Rasa
                </h2>
                <p class="text-body-md font-body-md text-on-surface-variant mt-3">
                    Kami percaya minuman yang baik dimulai dari tanah yang sehat, dipetik oleh petani yang dihargai, dan disajikan tanpa kompromi bahan artifisial.
                </p>
            </div>
            <!-- 4 Key Pillars -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-2">
                <div class="p-5 rounded-2xl bg-surface-container-low border border-outline-variant/30">
                    <div class="w-12 h-12 rounded-xl bg-primary-fixed flex items-center justify-center text-on-primary-fixed mb-4">
                        <span class="material-symbols-outlined" data-icon="grain">grain</span>
                    </div>
                    <h3 class="text-headline-sm font-headline-sm text-on-surface mb-1">Single Origin Terkurasi</h3>
                    <p class="text-body-sm font-body-sm text-on-surface-variant">
                        Biji kopi arabika dari dataran tinggi Aceh, Flores, dan Toraja dengan scoring di atas 84+.
                    </p>
                </div>
                <div class="p-5 rounded-2xl bg-surface-container-low border border-outline-variant/30">
                    <div class="w-12 h-12 rounded-xl bg-tertiary-fixed flex items-center justify-center text-on-tertiary-fixed mb-4">
                        <span class="material-symbols-outlined" data-icon="nutrition">nutrition</span>
                    </div>
                    <h3 class="text-headline-sm font-headline-sm text-on-surface mb-1">Pemanis Alami Rendah Gula</h3>
                    <p class="text-body-sm font-body-sm text-on-surface-variant">
                        Menggunakan nektar lontar, gula kelapa murni, dan madu hutan tanpa pemanis buatan.
                    </p>
                </div>
                <div class="p-5 rounded-2xl bg-surface-container-low border border-outline-variant/30">
                    <div class="w-12 h-12 rounded-xl bg-secondary-fixed flex items-center justify-center text-on-secondary-fixed mb-4">
                        <span class="material-symbols-outlined" data-icon="timer">timer</span>
                    </div>
                    <h3 class="text-headline-sm font-headline-sm text-on-surface mb-1">Freshly Brewed on Order</h3>
                    <p class="text-body-sm font-body-sm text-on-surface-variant">
                        Baru digiling dan diekstraksi saat pesanan Anda masuk untuk menjaga aromatik esensial.
                    </p>
                </div>
                <div class="p-5 rounded-2xl bg-surface-container-low border border-outline-variant/30">
                    <div class="w-12 h-12 rounded-xl bg-surface-variant flex items-center justify-center text-on-surface mb-4">
                        <span class="material-symbols-outlined" data-icon="nest_eco_leaf">nest_eco_leaf</span>
                    </div>
                    <h3 class="text-headline-sm font-headline-sm text-on-surface mb-1">100% Ramah Lingkungan</h3>
                    <p class="text-body-sm font-body-sm text-on-surface-variant">
                        Kemasan takeaway berbahan dasar singkong dan sedotan serat bambu yang mudah terurai.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== SECTION 6: Promo & Loyalty Banner ==================== -->
<section class="py-12 max-w-7xl mx-auto px-4 sm:px-8" id="seasonal">
    <div class="relative rounded-[2.5rem] bg-primary-container text-on-primary overflow-hidden p-8 md:p-14 shadow-2xl">
        <!-- Decorative Backdrop circles -->
        <div class="absolute -right-20 -top-20 w-96 h-96 rounded-full bg-secondary/30 blur-3xl pointer-events-none"></div>
        <div class="absolute -left-20 -bottom-20 w-80 h-80 rounded-full bg-secondary-container/20 blur-2xl pointer-events-none"></div>
        
        <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-8 space-y-4">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-surface/10 border border-surface/20 text-secondary-fixed text-label-sm font-label-sm">
                    <span class="material-symbols-outlined text-sm" data-icon="card_membership">card_membership</span>
                    Aura Club Rewards
                </div>
                <h2 class="text-headline-lg font-headline-lg md:text-display-lg text-surface-bright tracking-tight">
                    Gabung Member, Nikmati <span class="text-secondary-fixed">Diskon 30%</span> + Gratis Ongkir Selamanya.
                </h2>
                <p class="text-body-lg font-body-lg text-on-primary-container max-w-2xl">
                    Kumpulkan poin kelopak (Petal Points) di tiap tegukan. Tukarkan dengan voucher seduh gratis, akses menu rahasia bulanan, dan tumbler eksklusif ramah lingkungan.
                </p>
                <div class="pt-4 flex flex-wrap items-center gap-4">
                    <div class="flex items-center gap-2 bg-surface/5 border border-surface/20 px-4 py-2.5 rounded-2xl">
                        <span class="material-symbols-outlined text-secondary-fixed" data-icon="local_shipping">local_shipping</span>
                        <span class="text-label-md font-label-md text-surface-bright">Voucher Free Delivery x3</span>
                    </div>
                    <div class="flex items-center gap-2 bg-surface/5 border border-surface/20 px-4 py-2.5 rounded-2xl">
                        <span class="material-symbols-outlined text-secondary-fixed" data-icon="cake">cake</span>
                        <span class="text-label-md font-label-md text-surface-bright">Complimentary Birthday Brew</span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 flex flex-col items-start lg:items-end justify-center">
                <div class="bg-surface-container-lowest text-on-surface p-6 rounded-3xl w-full max-w-sm shadow-xl">
                    <h3 class="text-headline-sm font-headline-sm font-bold">Daftar Sekarang</h3>
                    <p class="text-body-sm font-body-sm text-on-surface-variant mt-1 mb-4">Gratis tanpa biaya langganan.</p>
                    <form class="space-y-3" onsubmit="event.preventDefault(); showToast('Voucher diskon 30% telah dikirim ke nomor WhatsApp Anda!'); this.reset();">
                        <input 
                            required
                            class="w-full px-4 py-3 rounded-xl bg-surface-container-low text-body-sm font-body-sm border border-outline-variant/60 focus:outline-none focus:border-secondary" 
                            placeholder="Nomor WhatsApp aktif (08...)" 
                            type="text"
                        />
                        <button type="submit" class="w-full py-3.5 rounded-xl bg-secondary text-on-secondary text-label-md font-label-md font-bold shadow-md hover:bg-secondary/90 transition-colors cursor-pointer active:scale-95">
                            Klaim Voucher Member
                        </button>
                    </form>
                    <p class="text-label-sm font-label-sm text-outline text-center mt-3">Kode unik akan dikirim instan lewat WA.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== SECTION 7: Ulasan Pelanggan ==================== -->
<section class="py-20 max-w-7xl mx-auto px-4 sm:px-8">
    <div class="text-center max-w-2xl mx-auto mb-14">
        <span class="text-label-sm font-label-sm uppercase tracking-widest text-secondary font-bold">Suara Penikmat</span>
        <h2 class="text-headline-lg font-headline-lg text-on-surface mt-1">Kata Mereka Tentang Cita Rasa Kami</h2>
        <p class="text-body-md font-body-md text-on-surface-variant mt-2">
            Testimoni jujur dari para barista profesional, desainer, dan penikmat kopi botani harian.
        </p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Review Card 1 -->
        <div class="bg-surface-container-lowest p-8 rounded-3xl border border-outline-variant/40 shadow-sm flex flex-col justify-between">
            <div>
                <div class="flex items-center gap-1 text-secondary mb-4">
                    <span class="material-symbols-outlined text-[18px]" data-icon="star" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined text-[18px]" data-icon="star" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined text-[18px]" data-icon="star" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined text-[18px]" data-icon="star" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined text-[18px]" data-icon="star" style="font-variation-settings: 'FILL' 1;">star</span>
                </div>
                <p class="text-body-md font-body-md text-on-surface italic">
                    "Smoked Vanilla Oat Latte mereka adalah standar emas latte baru di Jakarta. Aroma smoke-nya subtil, tidak menutupi keasaman buah dari espresso single origin-nya."
                </p>
            </div>
            <div class="flex items-center gap-4 mt-6 pt-6 border-t border-outline-variant/30">
                <div class="w-12 h-12 rounded-full bg-secondary-fixed flex items-center justify-center font-bold text-on-secondary-fixed text-label-lg">
                    RS
                </div>
                <div>
                    <h4 class="text-label-lg font-label-lg font-bold text-on-surface">Rian Setyawan</h4>
                    <p class="text-label-sm font-label-sm text-on-surface-variant">Q-Grader &amp; Penulis Kopi</p>
                </div>
            </div>
        </div>
        <!-- Review Card 2 -->
        <div class="bg-surface-container-lowest p-8 rounded-3xl border border-outline-variant/40 shadow-sm flex flex-col justify-between">
            <div>
                <div class="flex items-center gap-1 text-secondary mb-4">
                    <span class="material-symbols-outlined text-[18px]" data-icon="star" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined text-[18px]" data-icon="star" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined text-[18px]" data-icon="star" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined text-[18px]" data-icon="star" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined text-[18px]" data-icon="star" style="font-variation-settings: 'FILL' 1;">star</span>
                </div>
                <p class="text-body-md font-body-md text-on-surface italic">
                    "Hibiscus Berry Cold Brew benar-benar menyelamatkan sore saya. Segar tanpa gula berlebih, dan rasa bunganya sangat alami seperti diseduh di taman teh pribadi."
                </p>
            </div>
            <div class="flex items-center gap-4 mt-6 pt-6 border-t border-outline-variant/30">
                <div class="w-12 h-12 rounded-full bg-tertiary-fixed flex items-center justify-center font-bold text-on-tertiary-fixed text-label-lg">
                    NA
                </div>
                <div>
                    <h4 class="text-label-lg font-label-lg font-bold text-on-surface">Nadia Amanda</h4>
                    <p class="text-label-sm font-label-sm text-on-surface-variant">Creative Director</p>
                </div>
            </div>
        </div>
        <!-- Review Card 3 -->
        <div class="bg-surface-container-lowest p-8 rounded-3xl border border-outline-variant/40 shadow-sm flex flex-col justify-between">
            <div>
                <div class="flex items-center gap-1 text-secondary mb-4">
                    <span class="material-symbols-outlined text-[18px]" data-icon="star" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined text-[18px]" data-icon="star" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined text-[18px]" data-icon="star" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined text-[18px]" data-icon="star" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined text-[18px]" data-icon="star" style="font-variation-settings: 'FILL' 1;">star</span>
                </div>
                <p class="text-body-md font-body-md text-on-surface italic">
                    "Pemesanan web-nya super mulus. 20 menit sampai dan es batunya masih utuh berkat kemasan termal ramah lingkungannya. Resi otomatis langsung muncul!"
                </p>
            </div>
            <div class="flex items-center gap-4 mt-6 pt-6 border-t border-outline-variant/30">
                <div class="w-12 h-12 rounded-full bg-primary-fixed flex items-center justify-center font-bold text-on-primary-fixed text-label-lg">
                    DK
                </div>
                <div>
                    <h4 class="text-label-lg font-label-lg font-bold text-on-surface">Dimas Kurnia</h4>
                    <p class="text-label-sm font-label-sm text-on-surface-variant">Penggemar Teh &amp; Espresso</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== LOCATIONS PREVIEW ==================== -->
<section class="py-16 bg-surface-container-low border-t border-outline-variant/30" id="locations">
    <div class="max-w-7xl mx-auto px-4 sm:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
            <div>
                <span class="text-label-sm font-label-sm uppercase tracking-widest text-secondary font-bold">Outlet Kami</span>
                <h2 class="text-headline-lg font-headline-lg text-on-surface mt-1">Kunjungi Bar Botani Kami</h2>
            </div>
            <a class="text-label-lg font-label-lg text-secondary font-bold hover:underline flex items-center gap-1" href="#locations">
                Lihat Semua 6 Outlet <span class="material-symbols-outlined text-sm" data-icon="arrow_forward">arrow_forward</span>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/30 shadow-xs">
                <div class="flex items-center gap-2 text-secondary text-label-sm font-label-sm font-bold mb-2">
                    <span class="material-symbols-outlined text-base" data-icon="pin_drop">pin_drop</span>
                    FLAGSHIP SANCTUARY
                </div>
                <h3 class="text-headline-sm font-headline-sm text-on-surface">Senopati Botanica House</h3>
                <p class="text-body-sm font-body-sm text-on-surface-variant mt-2">
                    Jl. Senopati No. 42, Kebayoran Baru, Jakarta Selatan.
                </p>
                <p class="text-label-sm font-label-sm text-outline mt-3">Buka: 07:00 - 22:00 WIB</p>
            </div>
            <div class="bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/30 shadow-xs">
                <div class="flex items-center gap-2 text-secondary text-label-sm font-label-sm font-bold mb-2">
                    <span class="material-symbols-outlined text-base" data-icon="pin_drop">pin_drop</span>
                    ESPRESSO LAB
                </div>
                <h3 class="text-headline-sm font-headline-sm text-on-surface">Dharmawangsa Veranda</h3>
                <p class="text-body-sm font-body-sm text-on-surface-variant mt-2">
                    Jl. Dharmawangsa Raya No. 12, Prapanca, Jakarta Selatan.
                </p>
                <p class="text-label-sm font-label-sm text-outline mt-3">Buka: 07:30 - 21:00 WIB</p>
            </div>
            <div class="bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/30 shadow-xs">
                <div class="flex items-center gap-2 text-secondary text-label-sm font-label-sm font-bold mb-2">
                    <span class="material-symbols-outlined text-base" data-icon="pin_drop">pin_drop</span>
                    SLOW BAR
                </div>
                <h3 class="text-headline-sm font-headline-sm text-on-surface">Menteng Green Corner</h3>
                <p class="text-body-sm font-body-sm text-on-surface-variant mt-2">
                    Jl. Teuku Umar No. 8, Gondangdia, Menteng, Jakarta Pusat.
                </p>
                <p class="text-label-sm font-label-sm text-outline mt-3">Buka: 08:00 - 21:00 WIB</p>
            </div>
        </div>
    </div>
</section>

<!-- ==================== SHARED COMPONENT 2: Footer ==================== -->
<footer class="bg-surface-container-high dark:bg-primary-container w-full border-t border-outline-variant/40 dark:border-outline/20 mt-auto">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-8 py-16 flex flex-col gap-10">
        <!-- Top Section -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
            <div class="md:col-span-5 space-y-4">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-primary-container flex items-center justify-center text-primary-fixed">
                        <span class="material-symbols-outlined text-[18px]">local_cafe</span>
                    </div>
                    <span class="text-headline-md font-headline-md font-bold text-on-surface dark:text-inverse-on-surface">
                        Aura Botanica &amp; Espresso
                    </span>
                </div>
                <p class="text-body-sm font-body-sm text-on-surface-variant dark:text-surface-variant max-w-sm">
                    Eksplorasi ritual rasa antara seduhan kopi spesialis dan ramuan flora alami. Dibuat dengan penuh kesadaran di Jakarta, Indonesia.
                </p>
                <div class="flex items-center gap-4 text-on-surface-variant pt-2">
                    <a aria-label="Instagram" class="p-2 rounded-full bg-surface-container hover:text-primary transition-colors" href="#">
                        <span class="material-symbols-outlined text-lg" data-icon="photo_camera">photo_camera</span>
                    </a>
                    <a aria-label="Map" class="p-2 rounded-full bg-surface-container hover:text-primary transition-colors" href="#">
                        <span class="material-symbols-outlined text-lg" data-icon="location_on">location_on</span>
                    </a>
                    <a aria-label="Mail" class="p-2 rounded-full bg-surface-container hover:text-primary transition-colors" href="#">
                        <span class="material-symbols-outlined text-lg" data-icon="mail">mail</span>
                    </a>
                </div>
            </div>
            
            <div class="md:col-span-7 grid grid-cols-2 sm:grid-cols-3 gap-6">
                <div>
                    <h4 class="text-label-lg font-label-lg font-bold text-on-surface mb-3">Eksplorasi</h4>
                    <ul class="space-y-2 text-body-sm font-body-sm">
                        <li><a class="text-on-surface-variant dark:text-surface-variant hover:text-on-surface transition-colors" href="#menu">Menu Minuman</a></li>
                        <li><a class="text-on-surface-variant dark:text-surface-variant hover:text-on-surface transition-colors" href="{{ route('order.tracking') }}">Cek Status Resi</a></li>
                        <li><a class="text-on-surface-variant dark:text-surface-variant hover:text-on-surface transition-colors" href="{{ route('checkout.index') }}">Keranjang &amp; Checkout</a></li>
                        <li><a class="text-on-surface-variant dark:text-surface-variant hover:text-on-surface transition-colors" href="#locations">Store Locator</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-label-lg font-label-lg font-bold text-on-surface mb-3">Manajemen</h4>
                    <ul class="space-y-2 text-body-sm font-body-sm">
                        <li><a class="text-on-surface-variant dark:text-surface-variant hover:text-on-surface transition-colors font-medium" href="{{ url('/admin') }}">Filament Admin Panel</a></li>
                        <li><a class="text-on-surface-variant dark:text-surface-variant hover:text-on-surface transition-colors" href="{{ url('/admin/products') }}">Katalog Minuman</a></li>
                        <li><a class="text-on-surface-variant dark:text-surface-variant hover:text-on-surface transition-colors" href="{{ url('/admin/orders') }}">Kelola Pesanan &amp; Resi</a></li>
                        <li><a class="text-on-surface-variant dark:text-surface-variant hover:text-on-surface transition-colors" href="#">Ketentuan Layanan</a></li>
                    </ul>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <h4 class="text-label-lg font-label-lg font-bold text-on-surface mb-3">Jam Seduh</h4>
                    <p class="text-body-sm font-body-sm text-on-surface-variant">Senin - Minggu</p>
                    <p class="text-body-sm font-body-sm font-bold text-on-surface">07:00 - 22:00 WIB</p>
                    <div class="mt-3 inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-tertiary-fixed text-on-tertiary-fixed text-label-sm font-label-sm">
                        <span class="w-1.5 h-1.5 rounded-full bg-tertiary-container animate-pulse"></span>
                        Penerimaan Order Buka
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright Bar exact as configured in Shared Components -->
        <div class="pt-8 border-t border-outline-variant/40 flex flex-col md:flex-row items-center justify-between gap-4 text-center md:text-left">
            <p class="text-body-sm font-body-sm text-on-surface-variant dark:text-surface-variant">
                © {{ date('Y') }} Aura Botanica &amp; Coffee Co. Crafted with botanical ritual and mindful extraction. All rights reserved.
            </p>
            <div class="flex items-center gap-6 text-label-sm font-label-sm text-outline">
                <span>Jakarta Selatan</span>
                <span>•</span>
                <span>Specialty Coffee Association</span>
            </div>
        </div>
    </div>
</footer>

<!-- ==================== INTERACTIVE SLIDE-OVER CART DRAWER ==================== -->
<div id="cartDrawerBackdrop" onclick="closeCartDrawer()" class="fixed inset-0 bg-black/50 backdrop-blur-xs z-50 hidden transition-opacity"></div>

<aside id="cartDrawer" class="fixed top-0 right-0 h-full w-full max-w-md bg-surface-bright shadow-2xl z-50 transform translate-x-full transition-transform duration-300 flex flex-col border-l border-outline-variant/40">
    <!-- Drawer Header -->
    <div class="p-6 border-b border-outline-variant/30 flex items-center justify-between bg-surface-container-low">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-full bg-primary-container text-primary-fixed flex items-center justify-center">
                <span class="material-symbols-outlined text-[18px]">shopping_bag</span>
            </div>
            <div>
                <h3 class="text-headline-sm font-headline-sm font-bold text-on-surface">Keranjang Belanja</h3>
                <p class="text-label-sm font-label-sm text-on-surface-variant">Seduhan pilihan Anda</p>
            </div>
        </div>
        <button type="button" onclick="closeCartDrawer()" class="p-2 rounded-full hover:bg-surface-container text-on-surface-variant hover:text-on-surface cursor-pointer">
            <span class="material-symbols-outlined">close</span>
        </button>
    </div>

    <!-- Drawer Item List -->
    <div id="drawerCartList" class="flex-1 overflow-y-auto p-6 space-y-4 divide-y divide-outline-variant/20 custom-scroll">
        @forelse($cart as $item)
            @php
                $itemImg = !empty($item['image']) ? asset('storage/' . $item['image']) : ($defaultImages[$item['slug'] ?? ''] ?? 'https://images.unsplash.com/photo-1541658016709-82535e94bc69?auto=format&fit=crop&w=400&q=80');
            @endphp
            <div class="pt-4 first:pt-0 flex gap-4 items-center">
                <img src="{{ $itemImg }}" alt="{{ $item['name'] }}" class="w-16 h-16 rounded-2xl object-cover bg-surface-container shrink-0 border border-outline-variant/30"/>
                <div class="flex-1 min-w-0">
                    <h4 class="text-label-lg font-label-lg font-bold text-on-surface truncate">{{ $item['name'] }}</h4>
                    <p class="text-body-sm font-body-sm text-on-surface-variant mt-0.5">
                        {{ $item['quantity'] }} cup &times; Rp {{ number_format($item['price'], 0, ',', '.') }}
                    </p>
                    <div class="text-label-md font-label-md font-bold text-secondary mt-1">
                        Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                    </div>
                </div>
                <button type="button" onclick="removeFromCart({{ $item['id'] }})" class="p-2 text-outline hover:text-error cursor-pointer transition-colors" title="Hapus">
                    <span class="material-symbols-outlined text-[20px]">delete</span>
                </button>
            </div>
        @empty
            <div class="py-20 text-center text-on-surface-variant">
                <span class="material-symbols-outlined text-5xl text-outline mb-2">shopping_basket</span>
                <p class="text-label-lg font-label-lg font-bold text-on-surface">Keranjang Masih Kosong</p>
                <p class="text-body-sm font-body-sm text-on-surface-variant mt-1">Silakan pilih racikan seduhan botani favorit Anda.</p>
            </div>
        @endforelse
    </div>

    <!-- Drawer Footer -->
    <div class="p-6 border-t border-outline-variant/30 bg-surface-container-low space-y-4">
        <div class="flex justify-between items-center text-on-surface">
            <span class="text-label-lg font-label-lg font-medium">Total Pembayaran</span>
            <span id="drawerTotalPrice" class="text-price-lg font-price-lg font-bold text-secondary">
                Rp {{ number_format($cartTotal, 0, ',', '.') }}
            </span>
        </div>
        <div class="grid grid-cols-2 gap-3">
            <button type="button" onclick="closeCartDrawer()" class="py-3 px-4 rounded-full border border-outline-variant/60 text-label-md font-label-md font-semibold text-on-surface hover:bg-surface-container transition-colors cursor-pointer text-center">
                Pilih Lagi
            </button>
            <a href="{{ route('checkout.index') }}" class="py-3 px-4 rounded-full bg-primary-container text-on-primary text-label-md font-label-md font-bold shadow-md hover:bg-on-primary-fixed-variant transition-colors flex items-center justify-center gap-1.5 active:scale-95">
                <span>Checkout</span>
                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
            </a>
        </div>
        <p class="text-[11px] text-center text-outline">Pengiriman instan 20 menit • Kemasan termal ramah lingkungan</p>
    </div>
</aside>

<!-- ==================== TOAST NOTIFICATION ==================== -->
<div id="toastNotification" class="fixed bottom-6 right-6 z-50 transform translate-y-20 opacity-0 transition-all duration-300 pointer-events-none">
    <div class="bg-primary-container text-on-primary px-5 py-3.5 rounded-2xl shadow-2xl flex items-center gap-3 border border-outline-variant/20">
        <div class="w-8 h-8 rounded-full bg-secondary flex items-center justify-center text-on-secondary shrink-0">
            <span class="material-symbols-outlined text-[18px]">check</span>
        </div>
        <div>
            <p class="text-label-sm font-label-sm uppercase tracking-wider text-secondary-fixed font-bold">Pemberitahuan</p>
            <p id="toastMessage" class="text-body-sm font-body-sm text-surface-bright font-medium">Berhasil ditambahkan!</p>
        </div>
    </div>
</div>

<!-- ==================== CART SCRIPTS ==================== -->
<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    function openCartDrawer() {
        document.getElementById('cartDrawerBackdrop').classList.remove('hidden');
        document.getElementById('cartDrawer').classList.remove('translate-x-full');
    }

    function closeCartDrawer() {
        document.getElementById('cartDrawerBackdrop').classList.add('hidden');
        document.getElementById('cartDrawer').classList.add('translate-x-full');
    }

    let toastTimer;
    function showToast(message) {
        const toast = document.getElementById('toastNotification');
        const msgEl = document.getElementById('toastMessage');
        msgEl.textContent = message;
        toast.classList.remove('translate-y-20', 'opacity-0', 'pointer-events-none');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(() => {
            toast.classList.add('translate-y-20', 'opacity-0', 'pointer-events-none');
        }, 3500);
    }

    // Category filter logic for the product cards
    function filterCategory(category) {
        const cards = document.querySelectorAll('.product-card');
        const buttons = document.querySelectorAll('.filter-btn');

        buttons.forEach(btn => {
            btn.className = "filter-btn px-5 py-2 rounded-full bg-surface-container-lowest text-on-surface-variant hover:text-on-surface border border-outline-variant/40 text-label-md font-label-md transition-all";
        });

        const activeBtn = document.getElementById('tab-' + category);
        if (activeBtn) {
            activeBtn.className = "filter-btn px-5 py-2 rounded-full bg-primary-container text-on-primary text-label-md font-label-md font-semibold transition-all shadow-sm";
        }

        cards.forEach(card => {
            if (category === 'all' || card.getAttribute('data-category') === category) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });

        const menuEl = document.getElementById('menu');
        if (menuEl && window.scrollY < menuEl.offsetTop - 150) {
            menuEl.scrollIntoView({ behavior: 'smooth' });
        }
    }

    async function addToCart(productId, quantity = 1) {
        try {
            const response = await fetch('{{ route("cart.add") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ product_id: productId, quantity: quantity })
            });

            const data = await response.json();

            if (response.ok && data.success) {
                showToast(data.message);
                updateCartUI(data);
                openCartDrawer();
            } else {
                showToast(data.message || 'Gagal menambahkan ke keranjang');
            }
        } catch (err) {
            console.error(err);
            showToast('Terjadi gangguan jaringan');
        }
    }

    async function removeFromCart(productId) {
        try {
            const response = await fetch('{{ route("cart.remove") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ product_id: productId })
            });

            const data = await response.json();
            if (data.success) {
                showToast('Minuman dihapus dari keranjang');
                updateCartUI(data);
            }
        } catch (err) {
            console.error(err);
        }
    }

    function updateCartUI(data) {
        const navBadge = document.getElementById('navCartCount');
        if (data.total_items > 0) {
            navBadge.textContent = data.total_items;
            navBadge.classList.remove('hidden');
        } else {
            navBadge.classList.add('hidden');
        }

        document.getElementById('drawerTotalPrice').textContent = 'Rp ' + Number(data.total_price).toLocaleString('id-ID');

        const listEl = document.getElementById('drawerCartList');
        const items = Object.values(data.cart || {});

        if (items.length === 0) {
            listEl.innerHTML = `
                <div class="py-20 text-center text-on-surface-variant">
                    <span class="material-symbols-outlined text-5xl text-outline mb-2">shopping_basket</span>
                    <p class="text-label-lg font-label-lg font-bold text-on-surface">Keranjang Masih Kosong</p>
                    <p class="text-body-sm font-body-sm text-on-surface-variant mt-1">Silakan pilih racikan seduhan botani favorit Anda.</p>
                </div>
            `;
        } else {
            listEl.innerHTML = items.map(item => `
                <div class="pt-4 first:pt-0 flex gap-4 items-center">
                    <div class="w-16 h-16 rounded-2xl bg-surface-container overflow-hidden shrink-0 flex items-center justify-center border border-outline-variant/30">
                        ${item.image ? `<img src="/storage/${item.image}" alt="${item.name}" class="w-full h-full object-cover">` : `
                            <span class="material-symbols-outlined text-secondary text-2xl">local_cafe</span>
                        `}
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="text-label-lg font-label-lg font-bold text-on-surface truncate">${item.name}</h4>
                        <div class="text-body-sm font-body-sm text-on-surface-variant mt-0.5">
                            ${item.quantity} cup &times; Rp ${Number(item.price).toLocaleString('id-ID')}
                        </div>
                        <span class="text-label-md font-label-md font-bold text-secondary mt-1 inline-block">
                            Rp ${(item.price * item.quantity).toLocaleString('id-ID')}
                        </span>
                    </div>
                    <button type="button" onclick="removeFromCart(${item.id})" class="p-2 text-outline hover:text-error cursor-pointer transition-colors" title="Hapus">
                        <span class="material-symbols-outlined text-[20px]">delete</span>
                    </button>
                </div>
            `).join('');
        }
    }
</script>
</body>
</html>
