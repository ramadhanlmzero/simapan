@extends('layouts.master')

@section('title', 'Gambar')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Form Edit @yield('title')</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('gambar.update', $gambar->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal"> 
                    @method('put')
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Gambar</label>
                        </div>
                        <div class="col">
                            <img id="preview" height="150px" src="{{ url('/storage/photos/'.$gambar->nama_file) }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Upload Gambar</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" name="photo" id="photo" onchange="readURL(this);" class="form-control-file">
                        </div>
                    </div>
                    <div class="menudata">
                        <button type="submit" value="upload" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Upload </button>
                        <a href="{{ route('gambar.index') }}" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                jQuery('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection