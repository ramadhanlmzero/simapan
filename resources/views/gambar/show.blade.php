@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('package/dist/sweetalert2.min.css') }}">
@endsection

@section('title', 'Gambar')

@section('content')
<div class="tambah">
    <a href="{{ url('/gambar/create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i>&nbsp; Tambah Data Baru</a>
</div>

<div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <div class="nama">
                            <h3><center>{{$gambar->nama_file}}</center></h3>
                        </div>
                        <tbody>
                            <tr>
                                <th scope="row" width="400px">ID Gambar</th>
                                <td>: {{$gambar->id}} </td>
                            </tr>
                            <tr>
                                <th scope="row" width="400px">Nama File Gambar</th>
                                <td>: {{$gambar->nama_file}} </td>
                            </tr>
                            <tr>
                                <th scope="row">Gambar</th>
                                <td>: <img height="150px" src="{{ url('/storage/photos/'.$gambar->nama_file) }}"> </td>
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