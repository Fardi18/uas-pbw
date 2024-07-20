<?php

namespace App\Http\Controllers;

use App\Enums\BookingStatus;
use App\Models\Bengkel;
use App\Models\Booking;
use App\Models\DetailLayananBooking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BookingController extends Controller
{

    public function booking(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'bengkel_id' => 'required',
            'waktu_booking' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'plat' => 'required',
            'tahun_pembuatan' => 'required',
            'kilometer' => 'required',
            'transmisi' => 'required',
            'catatan_tambahan' => 'max:250',

        ]);

        $user_id = Auth::id();

        $booking = Booking::create([
            'user_id' => $user_id,
            'bengkel_id' => $request->bengkel_id,
            'waktu_booking' => $request->waktu_booking,
            'brand' => $request->brand,
            'model' => $request->model,
            'plat' => $request->plat,
            'tahun_pembuatan' => $request->tahun_pembuatan,
            'kilometer' => $request->kilometer,
            'waktu_booking' => $request->waktu_booking,
            'catatan_tambahan' => $request->catatan_tambahan,
            'status' => 'Pending'
        ]);

        return redirect('/profileuser')->with('success', 'Booking Berhasil Dibuat!');
    }
}
