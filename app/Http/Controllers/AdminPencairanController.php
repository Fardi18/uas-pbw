<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// models
use App\Models\WithdrawRequest;
use App\Models\Bengkel;
use App\Models\Transaction;

class AdminPencairanController extends Controller
{
    public function index()
    {
        // Mengambil semua pencairan bersama dengan relasi bengkelnya
        $pencairans = WithdrawRequest::with('bengkel')->get();

        // Misalnya, Anda ingin men-debug nama bengkel dari pencairan pertama
        if ($pencairans->isNotEmpty()) {
            $bengkel_name = $pencairans->first()->bengkel->name;
        }

        return view('admin.listpencairan', compact('pencairans'));
    }

    public function edit($id)
    {
        // Mengambil semua pencairan bersama dengan relasi bengkelnya
        $pencairan = WithdrawRequest::with('bengkel')->where('id', $id)->first();

        return view('admin.editpencairan', compact('pencairan'));
    }

    public function update(Request $request, $id)
    {
        // Mengambil semua pencairan bersama dengan relasi bengkelnya
        $pencairan = WithdrawRequest::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('images'), $imageName);

            $pencairan->image = $imageName;
        }

        $pencairan->status = $request->status;
        $pencairan->save();

        return redirect()->route('admin.pencairan')->with('success', 'Withdrawal request has been updated.');
    }
}
