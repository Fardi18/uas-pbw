<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use App\Models\Booking;
use App\Models\DetailLayananBooking;
use App\Models\Kendaraan;
use App\Models\PemilikBengkel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $userCount = User::count();
        $bengkelCount = Bengkel::count();
        $ownerCount = PemilikBengkel::count();

        return view('admin.dashboard', ['owners_count' => $ownerCount, 'users_count' => $userCount, 'bengkels_count' => $bengkelCount]);
    }

    public function listuser(Request $request)
    {
        $data['users'] = User::all();
        return view('admin/listuser', $data);
    }

    public function detailuser($id)
    {
        $user['users'] = User::findOrfail($id);
        $datakendaraan['kendaraans'] = Kendaraan::with(['user', 'category_kendaraan'])->get();
        return view('admin/detailuser', $datakendaraan, ['users' => $user]);
    }

    public function destroyuser($id)
    {
        User::destroy($id);
        return redirect(route('showlistuser'))->with('success', 'User Berhasil Dihapus!');
    }

    public function listowner()
    {
        $data['pemilik_bengkel'] = PemilikBengkel::all();
        return view('admin/listowner', $data);
    }

    public function detailowner($id)
    {
        $owner['pemilik_bengkels'] = PemilikBengkel::findOrFail($id);
        $databengkel = Bengkel::with(['pemilik_bengkel'])->get();
        // dd($datatransaksi);
        return view('admin/detailowner', ['bengkels' => $databengkel, 'pemilik_bengkels' => $owner]);
    }

    public function destroyowner($id)
    {
        PemilikBengkel::destroy($id);
        return redirect(route('showlistowner'))->with('success', 'Owner Berhasil Dihapus!');
    }

    public function listbengkel()
    {
        $data['bengkels'] = Bengkel::all();
        return view('admin/listbengkel', $data);
    }

    public function detailbengkel($id)
    {
        $bengkel = Bengkel::findOrFail($id);

        return view('admin/detailbengkel', ['bengkels' => $bengkel]);
    }

    public function destroybengkel($id)
    {
        Bengkel::destroy($id);
        return redirect(route('showlistbengkel'))->with('success', 'Bengkel Berhasil Dihapus!');
    }

    public function listtransaction()
    {
        $transaksi = Booking::with(['kendaraan', 'user', 'bengkel', 'layanans', 'detail_layanan_bookings'])
            ->get();
        return view('admin.listtransaction', ['transactions' => $transaksi]);
    }

    public function detailtransaksi($id)
    {
        $transaksi = Booking::with(['kendaraan', 'user', 'bengkel', 'layanans', 'detail_layanan_bookings'])
            ->findOrFail($id);

        $detail = DetailLayananBooking::with(['booking', 'layanan'])->get();

        // dd($transaksi);

        return view('admin.detailtransaksi', ['booking' => $transaksi, 'detail_booking' => $detail]);
    }
}
