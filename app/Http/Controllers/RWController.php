<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\RW;
use Alert;

class RWController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rw = RW::all();

        $data = [
            'rw' => $rw
        ];
        
    	return view('rw.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Province::all();
        $data = [
            'provinsi' => $provinsi,
        ];
        return view('rw.create', $data);
    }

    public function cariKota($id)
    {
        $provinsi = Province::find($id);
        $kota = $provinsi->regencies()->where('province_id',$id)->get();

        if ($kota) {
            return $kota;
        }

        return 'tidak ditemukan';
    }

    public function cariKecamatan($id)
    {
        $kota = Regency::find($id);
        $kecamatan = $kota->districts()->where('regency_id',$id)->get();

        if ($kecamatan) {
            return $kecamatan;
        }

        return 'tidak ditemukan';
    }

    public function cariKelurahan($id)
    {
        $kecamatan = District::find($id);
        $kelurahan = $kecamatan->villages()->where('district_id',$id)->get();

        if ($kelurahan) {
            return $kelurahan;
        }

        return 'tidak ditemukan';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'no_rw' => $request->no_rw,
            'nama_rw' => $request->nama_rw,
            'id_kelurahan' => $request->kelurahan
        ];
        
        RW::create($data);

        Alert::success('Data berhasil disimpan!', 'Sukses');
        return redirect()->route('rw.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rw = RW::find($id);
        $kelurahan = Village::where('id', $rw->id_kelurahan)->with('district')->first();
        $data = [
            'rw' => $rw,
            'kelurahan' => $kelurahan,
        ];

        return view('rw.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rw = RW::find($id);
        $kelurahan = Village::where('id', $rw->id_kelurahan)->with('district')->first();
        $provinsi = Province::whereNotIn('id', $kelurahan->district->regency->province)->get();
        $data = [
            'rw' => $rw,
            'kelurahan' => $kelurahan,
            'provinsi' => $provinsi,
        ];

        return view('rw.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rw = RW::find($id);
        $data = [
            'no_rw' => $request->no_rw,
            'nama_rw' => $request->nama_rw,
            'id_kelurahan' => $request->kelurahan
        ];
        $rw->update($data);

        Alert::success('Data berhasil diubah!', 'Sukses');
        return redirect()->route('rw.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rw = RW::find($id);
        $rw->delete();

        Alert::success('Data berhasil dihapus!', 'Sukses');
        return redirect()->route('rw.index');
    }
}
