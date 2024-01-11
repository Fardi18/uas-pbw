<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use App\Models\Booking;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $pemilik_id = Auth::user()->id;
        $bengkel = Bengkel::where("pemilik_id", $pemilik_id)->get();
        foreach ($bengkel as $item) {
            $bengkel_id = $item->id;
        }
        $layananCount = Layanan::where('bengkel_id', $bengkel_id)->count();
        $bookingCount = Booking::where('bengkel_id', $bengkel_id)->count();
        return view("mitra.dashboard", ["layananCount" => $layananCount, "bookingCount" => $bookingCount]);
    }
}
