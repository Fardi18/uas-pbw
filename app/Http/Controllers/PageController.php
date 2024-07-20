<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $product = Product::where('name', 'LIKE', '%' . $keyword . '%')
            ->paginate(10);
        return view('user.productpage', ['products' => $product]);
    }

    public function detailProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('user.detailproductpage', ['product' => $product]);
    }
}
