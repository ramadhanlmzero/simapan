@extends('layouts.master')

@section('title', 'Perangkat RT')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Form Input @yield('title')</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('rt.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal"> 
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="no_rt" class=" form-control-label">Nomor RT</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="no_rt" name="no_rt" value="" placeholder="Maksimal 2 angka" class="form-control" maxlength="2">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="nama_rt" class=" form-control-label">Nama Ketua RT</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nama_rt" name="nama_rt" value="" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_rw" class="form-control-label">Nomor RW</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="id_rw" id="id_rw" class="form-control">
                                <option value="0" selected disabled>Pilih salah satu</option>
                                @foreach ($rw as $value)
                                    <option value="{{ $value->id_rw }}">{{ $value->no_rw }}</option>
                                @endforeach
                            </select>
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