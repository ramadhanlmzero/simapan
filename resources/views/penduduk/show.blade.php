@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('package/dist/sweetalert2.min.css') }}">
@endsection

@section('title', 'Penduduk')

@section('content')
<div class="tambah">
    <a href="{{ url('/surat/create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i>&nbsp; Tambah Data Baru</a>
</div>

<div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <div class="nama">
                            <h3><center>{{$penduduk->nama}}</center></h3>
                        </div>
                        <tbody>
                            <tr>
                                <th scope="row">NIK/Nomor KTP</th>
                                <td>: {{ $penduduk->nik }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nomor KK</th>
                                <td>: {{ $penduduk->no_kk }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Penduduk</th>
                                <td>: {{ $penduduk->nama }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Jenis Kelamin</th>
                                <td>: {{ $penduduk->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Agama</th>
                                <td>: {{ $penduduk->agama }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal Lahir</th>
                                <td>: {{ $penduduk->tgl_lahir }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tempat Kelahiran</th>
                                <td>: {{ $penduduk->tempat_lahir }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Status Keluarga</th>
                                <td>: {{ $penduduk->status_keluarga }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat</th>
                                <td>: {{ $penduduk->alamat }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nomor RT</th>
                                <td>: {{ $rt->no_rt }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nomor RW</th>
                                <td>: {{ $rt->rw->no_rw }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kelurahan</th>
                                <td>: {{ $rt->rw->village->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kecamatan</th>
                                <td>: {{ $rt->rw->village->district->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kota/Kabupaten</th>
                                <td>: {{ $rt->rw->village->district->regency->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Provinsi</th>
                                <td>: {{ $rt->rw->village->district->regency->province->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kewarganegaraan</th>
                                <td>: Antek Aseng Bangsad</td>
                            </tr>
                            <tr>
                                <th scope="row">Status Kawin</th>
                                <td>: {{ $penduduk->status_kawin }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Pendidikan</th>
                                <td>: {{ $penduduk->pendidikan }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Pekerjaan</th>
                                <td>: {{ $penduduk->pekerjaan }}</td>
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