<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;

class WithdrawRequestController extends Controller
{
    public function index()
    {
        $requests = WithdrawRequest::with('pemilikBengkel')->get();
        return view('admin.withdraw_request', compact('requests'));
    }

    public function store(Request $request)
    {
        $bengkel = auth()->user()->pemilikBengkel;

        // Hitung total transaksi sukses
        $totalTransaksi = Transaction::where('bengkel_id', $bengkel->id)
            ->where('payment_status', 'success')
            ->sum('grand_total');

        // Cek apakah total transaksi sudah melebihi 50 ribu
        if ($totalTransaksi < 50000) {
            return redirect()->back()->with('error', 'Total transaksi kurang dari 50 ribu, penarikan tidak dapat dilakukan.');
        }

        $request->validate([
            'amount' => 'required|numeric|min:1000|max:' . $totalTransaksi,
        ]);

        // Simpan request penarikan
        $bengkel->withdrawalRequests()->create([
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

        return redirect()->route('pemilik_bengkel.withdrawal_requests.index')->with('success', 'Withdrawal request has been submitted.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected,transferred',
        ]);

        $withdrawalRequest = WithdrawRequest::findOrFail($id);
        $withdrawalRequest->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.withdrawal_requests.index')->with('success', 'Withdrawal request status updated.');
    }
}
