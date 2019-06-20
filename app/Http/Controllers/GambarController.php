<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gambar;
use Illuminate\Support\Facades\Storage;

class GambarController extends Controller
{
    public function index() {
        return view(upload);
    }

    public function upload(Request $request) {
        $tambahGambar = new Gambar();
        $file = $request->file('photo');
        $filename = 'profile-photo-' . time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/photos', $filename);
        $tambahGambar->nama_file = (string)$filename;
        $tambahGambar->save();

        return redirect()->route('gambar.lihat');
    }

    public function show() {
        $gambar = Gambar::all();
        $data = [
            'gambar' => $gambar,
        ];

        return view('upload', $data);
    }

    public function delete($id) {
        $gambar = Gambar::find($id);
        Storage::delete('/public/photos/'.$gambar->nama_file);
        $gambar->delete();

        return redirect()->route('gambar.lihat');
    }
}
