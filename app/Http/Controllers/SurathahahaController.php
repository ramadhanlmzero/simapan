<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Surat;
use Alert;

class SuratController extends Controller
{
    public function index()
    {
		$surat = Surat::all();
    	return view('datasurat',compact('surat'));
	}

    public function forminsert()
    {
		$type = 'create';

		$data = [
			'type' => $type,
		];

    	return view('datasurat_form', $data);
	}
	
    public function formedit($id)
    {
		$type = 'edit';

		$surat = Surat::find($id);
		$data = [
            'jenis_surat' => $surat,
            'type' => $type
		];

    	return view('datasurat_form',$data);
	}
	
    public function insert(Request $request)
    {
    	$data = [
            'jenis_surat' => $request->jenis_surat
		];

		$store = Surat::Create($data);
		Alert::success('Data berhasil disimpan!', 'Sukses');
		
		return redirect()->route('surat.index');
	}
	
    public function update(Request $request, $id)
    {
		$surat = Surat::find($id);

		$data = $request->except('_token');
		$data['jenis_surat'] = $request->jenis_surat;

    	$surat->update($data);

		Alert::success('Data berhasil diubah!', 'Sukses');
		
		return redirect()->route('surat.index');
	}
	
    public function delete($id)
    {
		$surat = Surat::find($id);

    	$surat->delete($surat);

		Alert::success('Data berhasil dihapus!', 'Sukses');
		
		return redirect()->route('surat.index');
    }
}
