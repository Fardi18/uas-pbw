<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Layanan;
use App\Models\Bengkel;
use App\Models\PemilikBengkel;

class LayananController extends Controller
{
    public function index()
    {
        $item['bengkels'] = Bengkel::where('pemilik_id', Auth::id())->get();
        $bengkel_ids = $item['bengkels']->map(function ($bengkel) {
            return $bengkel->id;
        });
        $data['layanans'] = Layanan::with('bengkel')->whereIn('bengkel_id', $bengkel_ids)->orderBy('created_at', 'DESC')->get();
        return view('mitra.layanan.index', $data, $item);
    }

    public function create()
    {
        $data['bengkels'] = Bengkel::orderBy('name', 'ASC')->get();
        return view('mitra.layanan.add', $data);
    }

    public function store(Request $request)
    {
        $pemilik_id = Auth::id();
        $bengkel_id = Bengkel::where("pemilik_id", $pemilik_id)->first()->id;
        $layanans = new Layanan();
        $layanans->name = $request->layanan_name;
        $layanans->price = $request->layanan_price;
        $layanans->bengkel_id = $bengkel_id;
        $layanans->save();

        return redirect('/owner/layanan')->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['layanan'] = Layanan::findOrFail($id);
        $item['bengkels'] = Bengkel::orderBy('name', 'ASC')->get();
        return view('mitra.layanan.edit', $data, $item);
    }

    public function update(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);
        $pemilik_id = Auth::id();
        $bengkel_id = Bengkel::where("pemilik_id", $pemilik_id)->first()->id;
        $layanan->name = $request->layanan_name;
        $layanan->price = $request->layanan_price;
        $layanan->bengkel_id = $bengkel_id;
        $layanan->save();

        return redirect('/owner/layanan')->with('success', 'Layanan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = Layanan::findOrFail($id);

        $data->delete();

        return redirect('/owner/layanan')->with('success', 'Layanan berhasil dihapus');
    }
}
