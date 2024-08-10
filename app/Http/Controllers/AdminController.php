<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bengkel;
use App\Models\Booking;
use App\Models\Kendaraan;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\PemilikBengkel;
use App\Models\DetailLayananBooking;
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
        $data['users'] = User::orderBy('created_at', 'desc')->get();
        return view('admin/listuser', $data);
    }

    public function detailuser($id)
    {
        $user['users'] = User::findOrfail($id);

        return view('admin/detailuser', ['users' => $user]);
    }

    public function destroyuser($id)
    {
        User::destroy($id);
        return redirect(route('showlistuser'))->with('success', 'User Berhasil Dihapus!');
    }

    public function listowner()
    {
        $data['pemilik_bengkel'] = PemilikBengkel::orderBy('created_at', 'desc')->get();
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
        $data['bengkels'] = Bengkel::orderBy('created_at', 'desc')->get();
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

    public function listbooking()
    {
        $bookings = Booking::with(['user', 'bengkel', 'layanans'])
            ->orderBy('created_at', 'desc')->get();
        return view('admin.listbooking', ['bookings' => $bookings]);
    }

    public function detailbooking($id)
    {
        $bookings = Booking::with(['user', 'bengkel', 'layanans'])
            ->findOrFail($id);

        $detail = DetailLayananBooking::with(['booking', 'layanan'])->get();

        return view('admin.detailbooking', ['booking' => $bookings, 'detail_booking' => $detail]);
    }

    public function listtransaction()
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->get();

        return view("admin.listtransaction", compact("transactions"));
    }

    public function detailtransaction(Transaction $transaction)
    {
        $details = $transaction->detail_transactions()->with('product', 'layanan', 'bengkel')->get();

        return view('admin.detailtransaction', compact('transaction', 'details'));
    }
}
