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
            <div class="card-header">
                <strong class="card-title">Data @yield('title')</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="200px">Nomor RT</th>
                            <th>Nama Ketua RT</th>
                            <th width="200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rt as $value)
                        <tr>
                            <td>{{ $value->no_rt }}</td>
                            <td>{{ $value->nama_rt }}</td>
                            <td>
                                <a href="{{ route('rt.show', $value->id_rt) }}" class="btn btn-primary btn-sm">Rincian</a>
                                <a href="{{ route('rt.edit', $value->id_rt) }}" class="btn btn-success btn-sm">Ubah</a>
                                <form action="{{ route('rt.destroy', $value->id_rt) }}" method="POST" id="{{$value->id_rt}}" style="display:inline-block">
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
