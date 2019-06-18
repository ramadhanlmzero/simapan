<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Surat;
use Alert;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat = Surat::all();
        $data = [
            'surat' => $surat,
        ];

    	return view('surat.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        Surat::create($data);

        Alert::success('Data berhasil disimpan!', 'Sukses');
        return redirect()->route('surat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $surat = surat::find($id);
        $data = [
            'surat' => $surat,
        ];

        return view('surat.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $surat = Surat::find($id);
        $data = [
            'surat' => $surat,
        ];

        return view('surat.edit', $data);
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
        $surat = Surat::find($id);
        $data = $request->except('_token');
        $surat->update($data);

        Alert::success('Data berhasil diubah!', 'Sukses');
        return redirect()->route('surat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surat = Surat::find($id);
        $surat->delete();

        Alert::success('Data berhasil dihapus!', 'Sukses');
        return redirect()->route('surat.index');
    }
}
