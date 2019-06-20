@extends('layouts.master')

@section('title', 'Surat')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Form Input @yield('title')</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('surat.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal"> 
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Jenis Surat</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="jenis_surat" value="" placeholder="Maksimal 50 karakter" class="form-control" maxlength="50">
                        </div>
                    </div>
                    <div class="menudata">
                        <button type="submit" value="simpan" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Simpan </button>
                        <a href="{{ route('surat.index') }}" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection