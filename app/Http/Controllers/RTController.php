<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RT;
use Alert;

class RTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rt = RT::all();
        $data = [
            'rt' => $rt,
        ];

    	return view('rt.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rt.create');
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
            'no_rt' => $request->no_rt,
            'nama_rt' => $request->nama_rt,
            'no_rw' => $request->no_rw,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota
        ];
        RT::create($data);

        Alert::success('Data berhasil disimpan!', 'Sukses');
        return redirect()->route('rt.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rt = RT::find($id);
        $data = [
            'rt' => $rt,
        ];

        return view('rt.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rt = RT::find($id);
        $data = [
            'rt' => $rt,
        ];

        return view('rt.edit', $data);
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
        $rt = RT::find($id);
        $data = $request->except('_token');
        $rt->update($data);

        Alert::success('Data berhasil diubah!', 'Sukses');
        return redirect()->route('rt.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rt = RT::find($id);
        $rt->delete();

        Alert::success('Data berhasil dihapus!', 'Sukses');
        return redirect()->route('rt.index');
    }

    public function cariRt($rt)
    {
        $rt = RT::find($rt);

        if ($rt) {
            return $rt->nama_rt;
        }

        return 'tidak ditemukan';
    }
}
