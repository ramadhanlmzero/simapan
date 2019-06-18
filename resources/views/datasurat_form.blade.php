@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('package/dist/sweetalert2.min.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Form Input Surat</strong>
            </div>
            <div class="card-body card-block">
                @if ($type == 'edit')
                <form action="{{ url('datasurat/update/'.$jenis_surat->id_surat) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @endif 
                @if ($type == 'create')
                <form action="{{ url('datasurat/insert') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @endif 
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Jenis Surat</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="jenis_surat" value="@if ($type == 'edit') {{ $jenis_surat->jenis_surat }}@endif" placeholder="Maksimal 50 karakter" class="form-control" maxlength="50">
                        </div>
                    </div>
                    <div class="menudata">
                        <button type="submit" value="simpan" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Simpan </button>
                        <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Batal </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 

@section('script')
<script src="{{ asset('assets/js/jquery.datetimepicker.full.min.js') }}"></script>
<script>
    jQuery.datetimepicker.setLocale('id');
    jQuery('#datetimepicker').datetimepicker({
        i18n: {
            id: {
                months: [
                    'Januari', 'Februari', 'Maret', 'April',
                    'Mei', 'Juni', 'Juli', 'Agustus',
                    'September', 'Oktober', 'November', 'Desember',
                ],
                dayOfWeek: [
                    "Minggu.", "Senin", "Selasa", "Rabu",
                    "Kamis", "Jumat", "Sabtu",
                ]
            }
        },
        timepicker: false,
        format: 'd.m.Y'
    });
</script>
@endsection