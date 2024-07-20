<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('user.cart', ['carts' => $carts]);
    }

    public function addToCart(Product $product, Request $request)
    {
        $user_id = Auth::user()->id;

        // Check if there are items in the cart
        $carts = Cart::where('user_id', $user_id)->get();

        if ($carts->isNotEmpty()) {
            // Get the bengkel_id of the first item in the cart
            $existing_bengkel_id = $carts->first()->bengkel_id;

            // Check if the bengkel_id of the new product matches
            if ($existing_bengkel_id != $request->bengkel_id) {
                return redirect()->back()->withErrors(['error' => 'Anda hanya dapat menambahkan produk dari bengkel yang sama.']);
            }
        }

        $product_id = $product->id;

        $existing_cart = Cart::where('product_id', $product_id)->where('user_id', $user_id)->first();

        if ($existing_cart == null) {
            $request->validate([
                'quantity' => 'required|gte:1|lte:' . $product->stock
            ]);

            Cart::create([
                'product_id' => $product_id,
                'user_id' => $user_id,
                'bengkel_id' => $request->bengkel_id,
                'quantity' => $request->quantity,
                'price' => $product->price,
            ]);
        } else {
            $request->validate([
                'quantity' => 'required|gte:1|lte:' . ($product->stock - $existing_cart->quantity)
            ]);

            $existing_cart->update([
                'quantity' => $existing_cart->quantity + $request->quantity
            ]);
        }

        return redirect('/cart');
    }


    public function updateCart(Cart $cart, Request $request)
    {
        $request->validate([
            'quantity' => 'required|gte:1|lte:' . $cart->product->stock
        ]);

        $cart->update([
            'quantity' => $request->quantity
        ]);

        return response()->json(['success' => true, 'newPrice' => $cart->product->price * $request->quantity]);
    }

    public function deleteCart(Cart $cart)
    {
        $cart->delete();
        return redirect('/cart');
    }
}
