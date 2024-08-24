<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// models
use App\Models\WithdrawRequest;
use App\Models\Bengkel;
use App\Models\Transaction;

class WithdrawRequestController extends Controller
{
    public function index()
    {
        $pemilik = Auth::user();
        $pemilik_id = $pemilik->id;
        $bengkel = Bengkel::where('pemilik_id', $pemilik_id)->first();
        $bengkel_id = $bengkel->id;

        // Hitung total pendapatan
        $pencairans = WithdrawRequest::where('bengkel_id', $bengkel_id)
            ->get();


        return view('mitra.withdrawal_requests.index', compact('pencairans'));
    }

    public function create()
    {
        $pemilik = Auth::user();
        $pemilik_id = $pemilik->id;
        $bengkel = Bengkel::where('pemilik_id', $pemilik_id)->first();
        $bengkel_id = $bengkel->id;
        // Hitung total transaksi sukses yang belum dicairkan
        $totalTransaksi = Transaction::where('bengkel_id', $bengkel_id)
            ->where('payment_status', 'success')
            ->whereNull('withdrawn_at') // Transaksi yang belum dicairkan
            ->sum(DB::raw('(grand_total + ongkir) - administrasi'));

        return view('mitra.withdrawal_requests.add', compact('totalTransaksi'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $pemilik = Auth::user();
        $pemilik_id = $pemilik->id;
        $bengkel = Bengkel::where('pemilik_id', $pemilik_id)->first();
        $bengkel_id = $bengkel->id;

        // Hitung total transaksi sukses yang belum dicairkan
        $totalTransaksi = Transaction::where('bengkel_id', $bengkel_id)
            ->where('payment_status', 'success')
            ->whereNull('withdrawn_at') // Transaksi yang belum dicairkan
            ->sum(DB::raw('(grand_total + ongkir) - administrasi'));

        // Cek apakah total transaksi sudah melebihi 50 ribu
        if ($totalTransaksi < 50000) {
            return redirect()->back()->with('error', 'Total transaksi kurang dari 50 ribu, penarikan tidak dapat dilakukan.');
        }

        $request->validate([
            'amount' => 'required|numeric|min:1000|max:' . $totalTransaksi,
        ]);

        DB::transaction(function () use ($request, $bengkel_id) {
            // Buat pencairan
            $totalTransaksi = Transaction::where('bengkel_id', $bengkel_id)
                ->where('payment_status', 'success')
                ->whereNull('withdrawn_at') // Transaksi yang belum dicairkan
                ->sum(DB::raw('(grand_total + ongkir) - administrasi'));

            WithdrawRequest::create([
                'bengkel_id' => $bengkel_id,
                'amount' => $totalTransaksi,
                'bank' => $request->bank,
                'number' => $request->number,
                'name' => $request->name,
                'status' => 'pending',
            ]);

            // Tandai transaksi yang sudah dicairkan
            Transaction::where('bengkel_id', $bengkel_id)
                ->where('payment_status', 'success')
                ->whereNull('withdrawn_at')
                ->update(['withdrawn_at' => now()]);
        });

        return redirect()->route('owner.withdrawal_request')->with('success', 'Withdrawal request has been submitted.');
    }

    public function detail($id)
    {
        $pemilik = Auth::user();
        $pemilik_id = $pemilik->id;
        $bengkel = Bengkel::where('pemilik_id', $pemilik_id)->first();
        $bengkel_id = $bengkel->id;
        // Mengambil data pencairan berdasarkan ID dan bengkel_id
        $pencairan = WithdrawRequest::where('bengkel_id', $bengkel_id)
            ->where('id', $id)
            ->first(); // Ubah dari get() menjadi first()

        if (!$pencairan) {
            return redirect()->route('owner.withdrawal_request')->with('error', 'Pencairan tidak ditemukan.');
        }

        return view('mitra.withdrawal_requests.edit', compact('pencairan'));
    }
}
