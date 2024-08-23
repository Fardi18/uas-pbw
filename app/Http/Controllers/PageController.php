<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Bengkel;
use App\Models\PemilikBengkel;

class PageController extends Controller
{
    public function home()
    {
        // Mengambil 3 produk terbaru berdasarkan created_at
        $products = Product::with('bengkel')->orderBy('created_at', 'desc')->take(3)->get();

        return view("user.landingpage", compact('products'));
    }

    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $product = Product::with('bengkel')->where('name', 'LIKE', '%' . $keyword . '%')
            ->paginate(10);
        return view('user.productpage', ['products' => $product]);
    }

    public function detailProduct($id)
    {
        $product = Product::with('bengkel')->findOrFail($id);
        return view('user.detailproductpage', ['product' => $product]);
    }
}
