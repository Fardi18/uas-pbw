<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Bengkel;
use App\Models\Booking;
use App\Models\Layanan;
use App\Models\Product;
use App\Models\BengkelCart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\DetailTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BengkelTransactionController extends Controller
{
    public function index()
    {
        // get owner id
        $owner_id = Auth::user()->id;
        $bengkel = Bengkel::where('pemilik_id', $owner_id)->first(); // Mengambil record pertama
        if ($bengkel) {
            $bengkel_id = $bengkel->id; // Mengambil nilai id dari record tersebut
            $transactions = Transaction::where('bengkel_id', $bengkel_id)->orderBy('created_at', 'desc')->get();
        } else {
            // Handle jika tidak ada bengkel yang ditemukan untuk owner_id tersebut
            $transactions = collect(); // Mengembalikan collection kosong
        }

        return view("mitra.transaction.index", compact("transactions"));
    }

    public function show(Transaction $transaction)
    {
        $details = $transaction->detail_transactions()->with('product', 'layanan', 'bengkel')->get();

        return view('mitra.transaction.show', compact('transaction', 'details'));
    }

    public function edit($id)
    {

        //create data (add)
        $transaction = Transaction::findOrFail($id);
        return view('mitra.transaction.edit', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $validated = $request->validate([
            'shipping_status' => 'required'
        ]);

        Transaction::where('id', $id)->update([
            'shipping_status' => $validated['shipping_status']
        ]);

        return redirect()->back()->with('success', 'Booking status Berhasil Diubah!');
    }

    public function create($bookingId)
    {
        // get owner id
        $owner_id = Auth::user()->id;
        $bengkel = Bengkel::where('pemilik_id', $owner_id)->first(); // Mengambil record pertama
        $bengkel_id = $bengkel->id;

        $booking = Booking::findOrFail($bookingId);
        $products = Product::where('bengkel_id', $bengkel_id)->get();
        $services = Layanan::where('bengkel_id', $bengkel_id)->get();
        $carts = BengkelCart::where('booking_id', $bookingId)->get();

        // Calculate total price
        $totalPrice = $carts->sum(function ($cart) {
            return $cart->price * $cart->quantity;
        });

        return view('mitra.transaction.add', compact('booking', 'products', 'services', 'carts', 'totalPrice'));
    }

    public function addToCart(Request $request)
    {
        $booking = Booking::findOrFail($request->booking_id);
        $user_id = $booking->user_id;
        $bengkel_id = $booking->bengkel_id;

        if ($request->has('product_id')) {
            $product = Product::findOrFail($request->product_id);
            $existingCart = BengkelCart::where('booking_id', $booking->id)
                ->where('product_id', $product->id)
                ->first();

            if ($existingCart) {
                // Update quantity if product is already in cart
                $existingCart->quantity += $request->quantity;
                $existingCart->save();
            } else {
                // Add new product to cart
                BengkelCart::create([
                    'bengkel_id' => $bengkel_id,
                    'booking_id' => $booking->id,
                    'product_id' => $product->id,
                    'layanan_id' => null,
                    'user_id' => $user_id,
                    'quantity' => $request->quantity,
                    'price' => $product->price,
                ]);
            }
        } elseif ($request->has('layanan_id')) {
            $layanan = Layanan::findOrFail($request->layanan_id);
            $existingCart = BengkelCart::where('booking_id', $booking->id)
                ->where('layanan_id', $layanan->id)
                ->first();

            if ($existingCart) {
                // Notify that the service is already in the cart
                return redirect()->back()->with('error', 'Layanan sudah ada di keranjang');
            } else {
                // Add new service to cart
                BengkelCart::create([
                    'bengkel_id' => $bengkel_id,
                    'booking_id' => $booking->id,
                    'product_id' => null,
                    'layanan_id' => $layanan->id,
                    'user_id' => $user_id,
                    'quantity' => 1,
                    'price' => $layanan->price,
                ]);
            }
        }

        return redirect()->route('mitra.add.transaction', ['booking' => $booking->id])->with('success', 'Item berhasil ditambahkan ke keranjang');
    }

    public function removeFromCart($cartId)
    {
        $cart = BengkelCart::findOrFail($cartId);
        $cart->delete();

        return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang');
    }

    public function checkoutProcessForOwner(Request $request)
    {
        $owner_id = Auth::user()->id;
        $bengkel = Bengkel::where('pemilik_id', $owner_id)->first(); // Mengambil record pertama
        $bengkel_id = $bengkel->id;

        $transaction_code = 'TRANS-' . mt_rand(100, 999);

        $carts = BengkelCart::with(['product', 'layanan', 'user', 'bengkel'])
            ->where('bengkel_id', $bengkel_id)
            ->get();

        if ($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang belanja Anda kosong.');
        }

        $user_id = $carts->first()->user->id;
        $bengkel_id = $bengkel_id;
        $booking_id = $carts->first()->booking_id;
        $totalPrice = $carts->sum(function ($cart) {
            return $cart->price * $cart->quantity;
        });
        $administrasi = 0.05 * $totalPrice;
        $grand_total = $totalPrice + $administrasi;

        $transaction = Transaction::create([
            'transaction_code' => $transaction_code,
            'user_id' => $user_id,
            'bengkel_id' => $bengkel_id,
            'booking_id' => $booking_id,
            'payment_status' => 'pending',
            'shipping_status' => null,
            'ongkir' => 0,
            'administrasi' => $administrasi,
            'grand_total' => $grand_total,
        ]);

        foreach ($carts as $cart) {
            DetailTransaction::create([
                'transaction_id' => $transaction->id,
                'product_id' => $cart->product ? $cart->product->id : null,
                'layanan_id' => $cart->layanan ? $cart->layanan->id : null,
                'qty' => $cart->quantity,
                'product_price' => $cart->product ? $cart->product->price : null,
                'layanan_price' => $cart->layanan ? $cart->layanan->price : null,
            ]);
        }

        BengkelCart::where('bengkel_id', $bengkel_id)->delete();

        // Midtrans Configuration
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $midtrans = [
            'transaction_details' => [
                'order_id' => $transaction->id,
                'gross_amount' => $transaction->grand_total,
            ],
            'customer_details' => [
                'first_name' => $carts->first()->user->name,
                'phone' => $carts->first()->user->phone_number,
                'email' => $carts->first()->user->email,
                'address' => $carts->first()->user->alamat,
            ],
            'enabled_payments' => [
                'gopay',
                'permata_va',
                'bank_transfer',
            ],
            'vtweb' => [],
        ];

        $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

        return redirect($paymentUrl);
    }
}
