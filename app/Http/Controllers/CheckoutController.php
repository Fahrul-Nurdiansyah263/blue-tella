<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    /**
     * Add product to session cart
     */
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $qty = (int) ($request->quantity ?: 1);

        if (!$product->is_active || $product->stock < 1) {
            if ($request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Produk sedang tidak tersedia atau stok habis.'], 422);
            }
            return back()->with('error', 'Produk sedang tidak tersedia atau stok habis.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $newQty = $cart[$product->id]['quantity'] + $qty;
            if ($newQty > $product->stock) {
                if ($request->wantsJson()) {
                    return response()->json(['success' => false, 'message' => "Stok tidak mencukupi (tersisa {$product->stock})."], 422);
                }
                return back()->with('error', "Stok tidak mencukupi (tersisa {$product->stock}).");
            }
            $cart[$product->id]['quantity'] = $newQty;
        } else {
            if ($qty > $product->stock) {
                if ($request->wantsJson()) {
                    return response()->json(['success' => false, 'message' => "Stok tidak mencukupi (tersisa {$product->stock})."], 422);
                }
                return back()->with('error', "Stok tidak mencukupi (tersisa {$product->stock}).");
            }
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'sku' => $product->sku,
                'price' => (float) $product->price,
                'quantity' => $qty,
                'image' => $product->image,
                'stock' => $product->stock,
            ];
        }

        session()->put('cart', $cart);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => "{$product->name} berhasil ditambahkan ke keranjang!",
                'cart' => $cart,
                'total_items' => array_sum(array_column($cart, 'quantity')),
                'total_price' => array_sum(array_map(fn ($item) => $item['price'] * $item['quantity'], $cart)),
            ]);
        }

        return back()->with('success', "{$product->name} berhasil ditambahkan ke keranjang!");
    }

    /**
     * Buy Now - direct add and go to checkout
     */
    public function directCheckout(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $qty = (int) ($request->quantity ?: 1);

        if (!$product->is_active || $product->stock < $qty) {
            return back()->with('error', 'Maaf, stok produk tidak mencukupi.');
        }

        $cart = session()->get('cart', []);
        $cart[$product->id] = [
            'id' => $product->id,
            'name' => $product->name,
            'slug' => $product->slug,
            'sku' => $product->sku,
            'price' => (float) $product->price,
            'quantity' => $qty,
            'image' => $product->image,
            'stock' => $product->stock,
        ];
        session()->put('cart', $cart);

        return redirect()->route('checkout.index');
    }

    /**
     * Update quantity of an item in cart
     */
    public function updateCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);
        $productId = $request->product_id;

        if (isset($cart[$productId])) {
            $product = Product::find($productId);
            if ($product && $request->quantity > $product->stock) {
                return response()->json(['success' => false, 'message' => "Stok maksimal {$product->stock} unit."], 422);
            }

            $cart[$productId]['quantity'] = (int) $request->quantity;
            session()->put('cart', $cart);

            return response()->json([
                'success' => true,
                'cart' => $cart,
                'total_items' => array_sum(array_column($cart, 'quantity')),
                'total_price' => array_sum(array_map(fn ($item) => $item['price'] * $item['quantity'], $cart)),
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Produk tidak ditemukan di keranjang.'], 404);
    }

    /**
     * Remove item from cart
     */
    public function removeFromCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
        ]);

        $cart = session()->get('cart', []);
        if (isset($cart[$request->product_id])) {
            unset($cart[$request->product_id]);
            session()->put('cart', $cart);
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'cart' => $cart,
                'total_items' => array_sum(array_column($cart, 'quantity')),
                'total_price' => array_sum(array_map(fn ($item) => $item['price'] * $item['quantity'], $cart)),
            ]);
        }

        return back()->with('success', 'Produk dihapus dari keranjang.');
    }

    /**
     * Clear all items in cart
     */
    public function clearCart()
    {
        session()->forget('cart');
        return back()->with('success', 'Keranjang berhasil dikosongkan.');
    }

    /**
     * Display checkout form
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('home')->with('error', 'Keranjang belanja Anda masih kosong. Silakan pilih produk terlebih dahulu.');
        }

        $totalPrice = array_sum(array_map(fn ($item) => $item['price'] * $item['quantity'], $cart));

        return view('checkout.index', compact('cart', 'totalPrice'));
    }

    /**
     * Process checkout and save order
     */
    public function process(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('home')->with('error', 'Keranjang belanja Anda kosong.');
        }

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:30',
            'customer_email' => 'nullable|email|max:255',
            'shipping_address' => 'required|string|max:1000',
            'payment_method' => 'required|in:bank_transfer,qris,cod',
            'notes' => 'nullable|string|max:500',
        ], [
            'customer_name.required' => 'Nama lengkap wajib diisi.',
            'customer_phone.required' => 'Nomor WhatsApp / telepon wajib diisi.',
            'shipping_address.required' => 'Alamat pengiriman wajib diisi.',
            'payment_method.required' => 'Metode pembayaran wajib dipilih.',
        ]);

        return DB::transaction(function () use ($request, $cart) {
            // Verify stock availability
            foreach ($cart as $item) {
                $product = Product::lockForUpdate()->find($item['id']);
                if (!$product || $product->stock < $item['quantity']) {
                    return back()->with('error', "Maaf, stok untuk '{$item['name']}' sudah tidak mencukupi (tersisa: " . ($product ? $product->stock : 0) . "). Silakan sesuaikan keranjang.");
                }
            }

            $totalPrice = array_sum(array_map(fn ($item) => $item['price'] * $item['quantity'], $cart));
            $orderNumber = 'BT-' . date('Ymd') . '-' . strtoupper(Str::random(5));
            $resiNumber = 'RESI-BT-' . strtoupper(Str::random(8));

            $order = Order::create([
                'order_number' => $orderNumber,
                'resi_number' => $resiNumber,
                'courier' => 'Blue Tella Express Courier',
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'customer_email' => $request->customer_email,
                'shipping_address' => $request->shipping_address,
                'payment_method' => $request->payment_method,
                'total_price' => $totalPrice,
                'status' => 'pending',
                'notes' => $request->notes,
            ]);

            foreach ($cart as $item) {
                $subtotal = $item['price'] * $item['quantity'];

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'product_name' => $item['name'],
                    'sku' => $item['sku'] ?? null,
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $subtotal,
                ]);

                // Decrement stock
                $product = Product::find($item['id']);
                if ($product) {
                    $product->decrement('stock', $item['quantity']);
                }
            }

            // Clear session cart
            session()->forget('cart');

            return redirect()->route('order.success', $order->order_number);
        });
    }

    /**
     * Display order success / invoice page
     */
    public function success($order_number)
    {
        $order = Order::with('items')->where('order_number', $order_number)->firstOrFail();

        return view('checkout.success', compact('order'));
    }

    /**
     * Display printable Resi / Struk Pembelian
     */
    public function resi($order_number)
    {
        $order = Order::with('items')->where('order_number', $order_number)->firstOrFail();

        return view('checkout.resi', compact('order'));
    }

    /**
     * Track Order / Cek Resi
     */
    public function tracking(Request $request)
    {
        $keyword = trim($request->input('keyword', ''));
        $order = null;

        if ($keyword) {
            $order = Order::with('items')
                ->where('order_number', $keyword)
                ->orWhere('resi_number', $keyword)
                ->orWhere('customer_phone', $keyword)
                ->latest()
                ->first();
        }

        return view('tracking.index', compact('order', 'keyword'));
    }
}
