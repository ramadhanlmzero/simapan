<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gambar;
use Alert;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gambar = Gambar::all();
        $data = [
            'gambar' => $gambar,
        ];

    	return view('gambar.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gambar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $tambahGambar = new Gambar();
            $file = $request->file('photo');
            $filename = 'profile-photo-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/photos', $filename);
            $tambahGambar->nama_file = (string)$filename;
            $tambahGambar->save();
        }

        Alert::success('Data berhasil disimpan!', 'Sukses');
        return redirect()->route('gambar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gambar = Gambar::find($id);
        $data = [
            'gambar' => $gambar,
        ];

        return view('gambar.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gambar = Gambar::find($id);
        $data = [
            'gambar' => $gambar,
        ];

        return view('gambar.edit', $data);
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
        if ($request->hasFile('photo')) {
            $tambahGambar = Gambar::find($id);
            $file = $request->file('photo');
            $filename = 'profile-photo-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/photos', $filename);
            $tambahGambar->nama_file = (string)$filename;
            $tambahGambar->save();
        }

        Alert::success('Data berhasil diubah!', 'Sukses');
        return redirect()->route('gambar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
