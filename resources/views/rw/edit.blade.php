@extends('layouts.master')

@section('title', 'Perangkat RW')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Form Edit @yield('title')</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('rw.update', $rw->id_rw) }}" method="post" enctype="multipart/form-data" class="form-horizontal"> 
                    @method('put')
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="no_rw" class=" form-control-label">Nomor RW</label>
                        </div>
                        <div class="col-12 col-md-9">
                        <input type="number" id="no_rw" name="no_rw" value="{{ $rw->no_rw }}" placeholder="Maksimal 2 angka" class="form-control" maxlength="2">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="nama_rw" class=" form-control-label">Nama Ketua RW</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nama_rw" name="nama_rw" value="{{ $rw->nama_rw }}" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="provinsi" class="form-control-label">Provinsi</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="provinsi" id="provinsi" class="form-control">
                                <option value="{{$kelurahan->district->regency->province->id}}" selected>{{$kelurahan->district->regency->province->name}}</option>
                                @foreach ($provinsi as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="kota" class="form-control-label">Kabupaten/Kota</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="kota" id="kota" class="form-control">
                                <option value="{{$kelurahan->district->regency->id}}" selected>{{$kelurahan->district->regency->name}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="kecamatan" class="form-control-label">Kecamatan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="kecamatan" id="kecamatan" class="form-control">
                                <option value="{{$kelurahan->district->id}}" selected>{{$kelurahan->district->name}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="kelurahan" class="form-control-label">Kelurahan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="kelurahan" id="kelurahan" class="form-control">
                                <option value="" selected>{{$kelurahan->name}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="menudata">
                        <button type="submit" value="simpan" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Simpan </button>
                        <a href="{{ route('rw.index') }}" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var urlcarikota = "{{ url('carikota') }}";
    jQuery('#provinsi').on('change', function (e) {
        var kota = e.target.value;
        var request = jQuery.ajax({
            url: urlcarikota + "/" + kota,
            beforeSend: function (xhr) {
                var token = jQuery('meta[name="csrf_token"]').attr('content');
                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            type: "GET",
            dataType: "html"
        });
        
        html = "<option value='" + 0 + "'selected disabled>Pilih Salah Satu</option>";
        request.done(function (output) {
            data = JSON.parse(output);
            for(var i=0; i<data.length; i++) {
                var item = data[i];
                html += "<option value=" + item.id + ">" + item.name + "</option>"
            }
            document.getElementById("kota").innerHTML = html;
        });
    });
</script>
<script>
    var urlcarikecamatan = "{{ url('carikecamatan') }}";
    jQuery('#kota').on('change', function (e) {
        var kecamatan = e.target.value;
        var request = jQuery.ajax({
            url: urlcarikecamatan + "/" + kecamatan,
            beforeSend: function (xhr) {
                var token = jQuery('meta[name="csrf_token"]').attr('content');
                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            type: "GET",
            dataType: "html"
        });
        
        html = "<option value='" + 0 + "'selected disabled>Pilih Salah Satu</option>";
        request.done(function (output) {
            data = JSON.parse(output);
            for(var i=0; i<data.length; i++) {
                var item = data[i];
                html += "<option value=" + item.id + ">" + item.name + "</option>"
            }
            document.getElementById("kecamatan").innerHTML = html;
        });
    });
</script>
<script>
    var urlcarikelurahan = "{{ url('carikelurahan') }}";
    jQuery('#kecamatan').on('change', function (e) {
        var kelurahan = e.target.value;
        var request = jQuery.ajax({
            url: urlcarikelurahan + "/" + kelurahan,
            beforeSend: function (xhr) {
                var token = jQuery('meta[name="csrf_token"]').attr('content');
                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            type: "GET",
            dataType: "html"
        });
        
        html = "<option value='" + 0 + "'selected disabled>Pilih Salah Satu</option>";
        request.done(function (output) {
            data = JSON.parse(output);
            for(var i=0; i<data.length; i++) {
                var item = data[i];
                html += "<option value=" + item.id + ">" + item.name + "</option>"
            }
            document.getElementById("kelurahan").innerHTML = html;
        });
    });
</script>
@endsection