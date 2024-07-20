<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use App\Models\Booking;
use App\Models\Layanan;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $pemilik_id = Auth::user()->id;
        $bengkel = Bengkel::where("pemilik_id", $pemilik_id)->first();

        if (!$bengkel) {
            $layananCount = 0;
            $bookingCount = 0;
            $productCount = 0;
            $transactionCount = 0;
        } else {
            $bengkel_id = $bengkel->id;
            $layananCount = Layanan::where('bengkel_id', $bengkel_id)->count();
            $bookingCount = Booking::where('bengkel_id', $bengkel_id)->count();
            $productCount = Product::where('bengkel_id', $bengkel_id)->count();
            $transactionCount = Transaction::where('bengkel_id', $bengkel_id)->count();
        }

        return view("mitra.dashboard", compact("layananCount", "productCount", "bookingCount", "transactionCount", "bengkel"));
    }
}
