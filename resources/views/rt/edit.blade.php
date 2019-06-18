@extends('layouts.master')

@section('title', 'Perangkat RT')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Form Input Perangkat RT</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('rt.update', $rt->no_rt) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @method('put') 
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input1" class=" form-control-label">Nomor RT</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" disabled id="text-input1" name="no_rt" value="{{ $rt->no_rt }}" placeholder="Maksimal 2 angka" class="form-control" maxlength="2">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input2" class=" form-control-label">Nama Ketua RT</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input2" name="nama_rt" value="{{ $rt->nama_rt }}" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input3" class=" form-control-label">Nomor RW</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input3" name="no_rw" value="{{ $rt->no_rw }}" placeholder="Maksimal 2 angka" class="form-control" maxlength="2">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input4" class=" form-control-label">Kelurahan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input4" name="kelurahan" value="{{ $rt->kelurahan }}" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input5" class=" form-control-label">Kecamatan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input5" name="kecamatan" value="{{ $rt->kecamatan }}" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input6" class=" form-control-label">Kabupaten/Kota</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input6" name="kota" value="{{ $rt->kota }}" class="form-control">
                        </div>
                    </div>
                    <div class="menudata">
                        <button type="submit" value="simpan" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Simpan </button>
                        <a href="{{ route('rt.index') }}" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection