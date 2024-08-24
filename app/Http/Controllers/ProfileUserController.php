<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileUserController extends Controller
{
    public function showuser(Request $request)
    {
        $dataUser = User::with('kecamatan', 'kelurahan')->get();
        return view('user/profileuser', ['users' => $dataUser]);
    }

    public function showdetailuser($id)
    {
        $dataUser = User::with('kecamatan', 'kelurahan')->findOrFail($id);
        return view('user/profileuserdetail',  ['users' => $dataUser]);
    }

    public function edit($id)
    {
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();
        $dataUser = User::with('kecamatan', 'kelurahan')->findOrFail($id);

        return view(
            'user/profileuseredit',
            [
                'users' => $dataUser,
                'kecamatans' => $kecamatans,
                'kelurahans' => $kelurahans
            ]
        );
    }

    public function updatedetailuser(Request $request, $id)
    {
        // mendapatkan data user
        $dataUser = User::with('kecamatan', 'kelurahan')->findOrFail($id);

        $validated = $request->validate([
            'name' => 'string',
            'email' => 'string',
            'phone_number' => 'string',
            'alamat' => 'string',
        ]);


        // update data pada database berdasarkan id
        User::where('id', $id)->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'alamat' => $validated['alamat'],
            'kecamatan_id' => $request->kecamatan_id,
            'kelurahan_id' => $request->kelurahan_id,
        ]);

        return redirect('/profileuser')->with('success', 'Profile Berhasil Diubah!');
    }

    public function bookingList()
    {
        $user = Auth::user();
        $idUser = $user->id;

        $bookings = Booking::with(['user', 'bengkel'])
            ->where('user_id', $idUser)->orderBy('id', 'desc')->get();

        return view('user.profilebooking', ['user' => $user, 'bookings' => $bookings]);
    }

    public function showBooking($id)
    {
        $booking = Booking::with('bengkel', 'user')->findOrFail($id);
        return view('user.detailbooking', compact('booking'));
    }

    public function transactionList()
    {
        $user = Auth::user();
        $idUser = $user->id;

        $transactions = Transaction::with(['user', 'bengkel'])
            ->where('user_id', $idUser)->orderBy('id', 'desc')->get();

        return view('user.profiletransaksi', ['user' => $user, 'transactions' => $transactions]);
    }

    public function showTransaction(Transaction $transaction)
    {
        $details = $transaction->detail_transactions()->with('product', 'layanan', 'bengkel')->get();

        return view('user.detailtransaction', compact('transaction', 'details'));
    }
}
