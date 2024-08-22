<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function booking(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'bengkel_id' => 'required',
            'tanggal_booking' => 'required|date|after_or_equal:today',
            'waktu_booking' => 'required|date_format:H:i',
            'brand' => 'required',
            'model' => 'required',
            'plat' => 'required',
            'tahun_pembuatan' => 'required',
            'kilometer' => 'required',
            'transmisi' => 'required',
            'catatan_tambahan' => 'nullable',
        ]);

        $bengkel = Bengkel::with('jadwals')->findOrFail($request->bengkel_id);
        $tanggal_booking = Carbon::createFromFormat('Y-m-d', $request->tanggal_booking);
        $waktu_booking = Carbon::createFromFormat('H:i', $request->waktu_booking);

        // Validasi agar waktu tidak lebih kecil dari sekarang jika tanggal booking adalah hari ini
        if ($tanggal_booking->isToday() && $waktu_booking->lt(Carbon::now())) {
            return redirect()->back()->withErrors(['waktu_booking' => 'Waktu booking tidak boleh lebih kecil dari waktu sekarang.']);
        }

        // Mapping hari dari bahasa Inggris ke bahasa Indonesia
        $hariInggrisKeIndonesia = [
            'monday' => 'senin',
            'tuesday' => 'selasa',
            'wednesday' => 'rabu',
            'thursday' => 'kamis',
            'friday' => 'jumat',
            'saturday' => 'sabtu',
            'sunday' => 'minggu',
        ];

        $hari = strtolower($tanggal_booking->format('l'));
        $hariIndonesia = $hariInggrisKeIndonesia[$hari];

        $jadwal = $bengkel->jadwals->first();

        if (!$jadwal) {
            return redirect()->back()->withErrors(['waktu_booking' => 'Jam operasional bengkel tidak valid.']);
        }

        $jam_buka = $jadwal->{$hariIndonesia . '_buka'};
        $jam_tutup = $jadwal->{$hariIndonesia . '_tutup'};

        if (empty($jam_buka) || empty($jam_tutup)) {
            return redirect()->back()->withErrors(['waktu_booking' => 'Jam operasional bengkel tidak valid.']);
        }

        $jam_buka = Carbon::createFromFormat('H:i:s', $jam_buka);
        $jam_tutup = Carbon::createFromFormat('H:i:s', $jam_tutup);

        if ($waktu_booking->lt($jam_buka) || $waktu_booking->gt($jam_tutup)) {
            return redirect()->back()->withErrors(['waktu_booking' => 'Waktu booking harus berada dalam jam operasional bengkel.']);
        }

        $existingBooking = Booking::where('bengkel_id', $request->bengkel_id)
            ->where('tanggal_booking', $request->tanggal_booking)
            ->where('waktu_booking', $request->waktu_booking)
            ->first();

        if ($existingBooking) {
            return redirect()->back()->withErrors(['waktu_booking' => 'Waktu booking sudah diambil oleh user lain. Silakan pilih waktu lain.']);
        }

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'bengkel_id' => $request->bengkel_id,
            'tanggal_booking' => $request->tanggal_booking,
            'waktu_booking' => $request->waktu_booking,
            'brand' => $request->brand,
            'model' => $request->model,
            'plat' => $request->plat,
            'tahun_pembuatan' => $request->tahun_pembuatan,
            'kilometer' => $request->kilometer,
            'transmisi' => $request->transmisi,
            'catatan_tambahan' => $request->catatan_tambahan,
            'status' => 'Pending'
        ]);

        return redirect('/profileuser')->with('success', 'Booking Berhasil Dibuat!');
    }

    public function getBookedTimes(Request $request, $bengkel_id)
    {
        $date = $request->query('date');
        $bookings = Booking::where('bengkel_id', $bengkel_id)
            ->whereDate('tanggal_booking', $date)
            ->get(['waktu_booking']);

        return response()->json($bookings);
    }
}
