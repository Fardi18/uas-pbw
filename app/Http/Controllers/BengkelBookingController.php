<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use App\Models\Booking;
use App\Models\DetailLayananBooking;
use App\Models\User;
use Egulias\EmailValidator\Result\Reason\DetailedReason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BengkelBookingController extends Controller
{
    public function booking()
    {
        $item['bengkels'] = Bengkel::where('pemilik_id', Auth::id())->get();
        $bengkel_ids = $item['bengkels']->map(function ($bengkel) {
            return $bengkel->id;
        });

        $transaksi = Booking::with(['user', 'bengkel', 'transactions'])
            ->whereIn('bengkel_id', $bengkel_ids)
            ->get();
        return view('mitra.booking.booking', ['bookings' => $transaksi], $item);
    }

    public function editBooking($id)
    {
        $transaksi['booking'] = Booking::with(['user', 'bengkel'])
            ->findOrFail($id);

        //create data (add)
        return view(
            'mitra.booking.editbooking',
            $transaksi
        );
    }

    public function detailBooking($id)
    {
        $transaksi = Booking::with(['user', 'bengkel'])
            ->findOrFail($id);

        $detail = DetailLayananBooking::with(['booking', 'layanan'])->get();

        // dd($transaksi);

        return view('mitra.booking.detailbooking', ['booking' => $transaksi, 'detail_booking' => $detail]);
    }

    public function updateBooking(Request $request, $id)
    {
        $transaksi['bookings'] = Booking::with(['user', 'bengkel'])
            ->findOrFail($id);

        $validated = $request->validate([
            'booking_status' => 'required'
        ]);

        Booking::where('id', $id)->update([
            'booking_status' => $validated['booking_status']
        ]);

        return redirect()->back()->with('success', 'Booking status Berhasil Diubah!');
    }
}
