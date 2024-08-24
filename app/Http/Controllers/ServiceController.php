<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Specialist;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $keyword = $request->keyword;
        $kecamatan_id = $request->kecamatan_id;
        $kelurahan_id = $request->kelurahan_id;
        $specialist_id = $request->specialist_id;

        $query = Bengkel::with('specialists');

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


        if ($specialist_id) {
            $query->whereHas('specialists', function ($q) use ($specialist_id) {
                $q->where(
                    'specialist_id',
                    $specialist_id
                );
            });
        }

        $bengkels = $query->get();
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();
        $specialists = Specialist::all();

        return view('user/servicepage', [
            'bengkels' => $bengkels,
            'kecamatans' => $kecamatans,
            'kelurahans' => $kelurahans,
            'specialists' => $specialists
        ]);
    }

    public function getKelurahans($kecamatan_id)
    {
        $kelurahans = Kelurahan::where('kecamatan_id', $kecamatan_id)->get();
        return response()->json($kelurahans);
    }


    public function detailBengkel($id)
    {
        $bengkel['bengkels'] = Bengkel::with(['layanans', 'jadwals', 'products', 'kecamatan', 'kelurahan', 'specialists'])
            ->findOrFail($id);
        return view('user/detailbengkelpage', ['bengkels' => $bengkel]);
    }

    public function bookingPage($id)
    {
        $bengkel = Bengkel::find($id);
        return view('user.pemesananpage', compact('bengkel'));
    }
}
