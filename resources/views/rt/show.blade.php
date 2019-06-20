@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('package/dist/sweetalert2.min.css') }}">
@endsection

@section('title', 'Perangkat RT')

@section('content')
<div class="tambah">
    <a href="{{ url('/rt/create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i>&nbsp; Tambah Data Baru</a>
</div>

<div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <div class="nama">
                            <h3><center>{{$rt->nama_rt}}</center></h3>
                        </div>
                        <tbody>
                            <tr>
                                <th scope="row" width="400px">Nomor RT</th>
                                <td>: {{$rt->no_rt}} </td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Ketua RT</th>
                                <td>: {{$rt->nama_rt}} </td>
                            </tr>
                            <tr>
                                <th scope="row">Nomor RW</th>
                                <td>: {{$rw->no_rw}} </td>
                            </tr>
                            <tr>
                                <th scope="row">Nama RW</th>
                                <td>: {{$rw->nama_rw}} </td>
                            </tr>
                            <tr>
                                <th scope="row">Kelurahan</th>
                                <td>: {{$rw->village->name}} </td>
                            </tr>
                            <tr>
                                <th scope="row">Kecamatan</th>
                                <td>: {{$rw->village->district->name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kabupaten/Kota</th>
                                <td>: {{$rw->village->district->regency->name}} </td>
                            </tr>
                            <tr>
                                <th scope="row">Provinsi</th>
                                <td>: {{$rw->village->district->regency->province->name}} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/lib/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/datatables-init.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    });
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('sweet::alert')
@endsection