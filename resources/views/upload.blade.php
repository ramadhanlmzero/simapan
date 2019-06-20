<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload File</title>
    <style>
    * {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
            "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji",
            "Segoe UI Emoji", "Segoe UI Symbol";
    }
    </style>
</head>
<body>
    <form action="{{ route('gambar.uploading') }}" enctype="multipart/form-data" method="POST">
        <p>
            <label for="photo">
                <input type="file" name="photo" id="photo">
            </label>
        </p>
        <button>Upload</button>
        {{ csrf_field() }}
    </form>

    <h4 class="my-5">Data</h4>
 
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="100%">File</th>
                <th width="100%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($gambar as $g)
            <tr>
                <td>
                    <img width="150px" src="{{ url('/storage/photos/'.$g->nama_file) }}">
                </td>
                <td>
                    <form action="{{ route('gambar.hapus', $g->id) }}" method="POST" id="{{$g->id}}" style="display:inline-block">
                        {{ csrf_field() }}
                        <button type="submit" onClick="return confirm('Ingin menghapus gambar ini?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>