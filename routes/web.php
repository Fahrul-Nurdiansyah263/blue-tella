<?php

use App\Http\Controllers\CheckoutController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Katalog Utama
Route::get('/', function (Request $request) {
    $query = Product::query()->where('is_active', true);

    if ($search = $request->input('search')) {
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('sku', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
        });
    }

    if ($request->input('stock') === 'ready') {
        $query->where('stock', '>', 0);
    }

    $products = $query->latest()->get();

    return view('welcome', compact('products'));
})->name('home');

// Detail Produk
Route::get('/product/{slug}', function ($slug) {
    $product = Product::where('slug', $slug)->where('is_active', true)->firstOrFail();
    $relatedProducts = Product::where('is_active', true)
        ->where('id', '!=', $product->id)
        ->latest()
        ->take(4)
        ->get();

    return view('products.show', compact('product', 'relatedProducts'));
})->name('products.show');

// Keranjang Belanja & Checkout Flow
Route::post('/cart/add', [CheckoutController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/direct', [CheckoutController::class, 'directCheckout'])->name('cart.direct');
Route::post('/cart/update', [CheckoutController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [CheckoutController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/clear', [CheckoutController::class, 'clearCart'])->name('cart.clear');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/order/{order_number}', [CheckoutController::class, 'success'])->name('order.success');
Route::get('/order/{order_number}/resi', [CheckoutController::class, 'resi'])->name('order.resi');
Route::get('/cek-resi', [CheckoutController::class, 'tracking'])->name('order.tracking');
