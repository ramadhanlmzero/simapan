<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\RW;
use App\Models\RT;
use Alert;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penduduk = Penduduk::all();
        $data = [
            'penduduk' => $penduduk,
        ];

    	return view('penduduk.index', $data);
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
        return view('penduduk.create', $data);
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

    public function cariRW($id)
    {
        $kelurahan = Village::find($id);
        $rw = $kelurahan->rw()->where('id_kelurahan',$id)->get();

        if ($rw) {
            return $rw;
        }

        return 'tidak ditemukan';
    }

    public function cariRT($id)
    {
        $rw = RW::find($id);
        $rt = $rw->rt()->where('id_rw',$id)->get();

        if ($rt) {
            return $rt;
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
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_rt' => $request->rt,
            'agama' => $request->agama,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'status_keluarga' => $request->status_keluarga,
            'status_kawin' => $request->status_kawin,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'kewarganegaraan' => $request->kewarganegaraan
        ];
        Penduduk::create($data);

        Alert::success('Data berhasil disimpan!', 'Sukses');
        return redirect()->route('penduduk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penduduk = Penduduk::find($id);
        $rt = RT::where('id_rt', $penduduk->no_rt)->with('rw')->first();
        $data = [
            'penduduk' => $penduduk,
            'rt' => $rt,
        ];

        return view('penduduk.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penduduk = Penduduk::find($id);
        $data = [
            'penduduk' => $penduduk,
        ];

        return view('penduduk.edit', $data);
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
        $penduduk = Penduduk::find($id);
        $data = $request->except('_token');
        $penduduk->update($data);

        Alert::success('Data berhasil diubah!', 'Sukses');
        return redirect()->route('penduduk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penduduk = Penduduk::find($id);
        $penduduk->delete();

        Alert::success('Data berhasil dihapus!', 'Sukses');
        return redirect()->route('penduduk.index');
    }
}
