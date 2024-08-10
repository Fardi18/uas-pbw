<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;
use App\Models\Bengkel;
use App\Models\PemilikBengkel;

class JadwalController extends Controller
{
    public function index()
    {
        $item['bengkels'] = Bengkel::where('pemilik_id', Auth::id())->get();
        $bengkel_ids = $item['bengkels']->map(function ($bengkel) {
            return $bengkel->id;
        });
        $data['jadwals'] = Jadwal::with('bengkel')->whereIn('bengkel_id', $bengkel_ids)->orderBy('created_at', 'DESC')->get();
        return view('mitra.jadwal.index', $data, $item);
    }

    public function create()
    {
        $data['bengkels'] = Bengkel::orderBy('name', 'ASC')->get();
        return view('mitra.jadwal.add', $data);
    }

    public function store(Request $request)
    {
        $pemilik_id = Auth::id();
        $bengkel_id = Bengkel::where("pemilik_id", $pemilik_id)->first()->id;
        $jadwals = new Jadwal();
        $jadwals->senin_buka = $request->senin_buka;
        $jadwals->senin_tutup = $request->senin_tutup;
        $jadwals->selasa_buka = $request->selasa_buka;
        $jadwals->selasa_tutup = $request->selasa_tutup;
        $jadwals->rabu_buka = $request->rabu_buka;
        $jadwals->rabu_tutup = $request->rabu_tutup;
        $jadwals->kamis_buka = $request->kamis_buka;
        $jadwals->kamis_tutup = $request->kamis_tutup;
        $jadwals->jumat_buka = $request->jumat_buka;
        $jadwals->jumat_tutup = $request->jumat_tutup;
        $jadwals->sabtu_buka = $request->sabtu_buka;
        $jadwals->sabtu_tutup = $request->sabtu_tutup;
        $jadwals->minggu_buka = $request->minggu_buka;
        $jadwals->minggu_tutup = $request->minggu_tutup;
        $jadwals->bengkel_id = $bengkel_id;
        $jadwals->save();

        return redirect('/owner/jadwal')->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['jadwal'] = Jadwal::findOrFail($id);
        $item['bengkels'] = Bengkel::orderBy('name', 'ASC')->get();
        return view('mitra.jadwal.edit', $data, $item);
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $pemilik_id = Auth::id();
        $bengkel_id = Bengkel::where("pemilik_id", $pemilik_id)->first()->id;
        $jadwal->senin_buka = $request->senin_buka;
        $jadwal->senin_tutup = $request->senin_tutup;
        $jadwal->selasa_buka = $request->selasa_buka;
        $jadwal->selasa_tutup = $request->selasa_tutup;
        $jadwal->rabu_buka = $request->rabu_buka;
        $jadwal->rabu_tutup = $request->rabu_tutup;
        $jadwal->kamis_buka = $request->kamis_buka;
        $jadwal->kamis_tutup = $request->kamis_tutup;
        $jadwal->jumat_buka = $request->jumat_buka;
        $jadwal->jumat_tutup = $request->jumat_tutup;
        $jadwal->sabtu_buka = $request->sabtu_buka;
        $jadwal->sabtu_tutup = $request->sabtu_tutup;
        $jadwal->minggu_buka = $request->minggu_buka;
        $jadwal->minggu_tutup = $request->minggu_tutup;
        $jadwal->bengkel_id = $bengkel_id;
        $jadwal->save();

        return redirect('/owner/jadwal')->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = Jadwal::findOrFail($id);

        $data->delete();

        return redirect('/owner/jadwal')->with('success', 'Jadwal berhasil dihapus');
    }
}
