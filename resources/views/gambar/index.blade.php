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
            <div class="card-header">
                <strong class="card-title">Data @yield('title')</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="200px">ID Gambar</th>
                            <th>Gambar</th>
                            <th width="200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gambar as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td><img height="150px" src="{{ url('/storage/photos/'.$value->nama_file) }}"></td>
                            <td>
                                <a href="{{ route('gambar.show', $value->id) }}" class="btn btn-primary btn-sm">Rincian</a>
                                <a href="{{ route('gambar.edit', $value->id) }}" class="btn btn-success btn-sm">Ubah</a>
                                <form action="{{ route('gambar.destroy', $value->id) }}" method="POST" id="{{$value->id}}" style="display:inline-block">
                                    @method('DELETE')
                                    {{ csrf_field() }}
                                    <button type="submit" onClick="return confirm('Ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
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
