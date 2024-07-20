<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use App\Models\Booking;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kendaraan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $kecamatan_id = $request->kecamatan_id;
        $kelurahan_id = $request->kelurahan_id;

        $query = Bengkel::query();

        if ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('alamat', 'LIKE', '%' . $keyword . '%');
        }

        if ($kecamatan_id) {
            $query->where('kecamatan_id', $kecamatan_id);
        }

        if ($kelurahan_id) {
            $query->where('kelurahan_id', $kelurahan_id);
        }

        $bengkels = $query->get();
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();

        return view('user/servicepage', ['bengkels' => $bengkels, 'kecamatans' => $kecamatans, 'kelurahans' => $kelurahans]);
    }


    public function getKelurahans($kecamatan_id)
    {
        $kelurahans = Kelurahan::where('kecamatan_id', $kecamatan_id)->get();
        return response()->json($kelurahans);
    }


    public function detailBengkel($id)
    {
        $bengkel['bengkels'] = Bengkel::with(['layanans', 'jadwals', 'products', 'kecamatan', 'kelurahan'])
            ->findOrFail($id);
        return view('user/detailbengkelpage', ['bengkels' => $bengkel]);
    }

    public function bookingPage($id)
    {
        $bengkel = Bengkel::find($id);
        return view('user.pemesananpage', compact('bengkel'));
    }
}
