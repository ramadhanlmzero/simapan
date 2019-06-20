@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.datetimepicker.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'Penduduk')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Form Input @yield('title')</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('penduduk.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal"> 
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="nik" class="form-control-label">
                                NIK/Nomor KTP
                            </label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="nik" name="nik" placeholder="Maksimal 16 karakter" maxlength="16" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="no_kk" class="form-control-label">
                                Nomor KK
                            </label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="no_kk" name="no_kk" placeholder="Maksimal 16 karakter" maxlength="16" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="nama" class="form-control-label">
                                Nama
                            </label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nama" name="nama" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="jenis_kelamin" class="form-control-label">
                                Jenis Kelamin
                            </label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="0" selected disabled>Pilih salah satu</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="agama" class="form-control-label">
                                Agama
                            </label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="agama" id="agama" class="form-control">
                                <option value="0" selected disabled>Pilih salah satu</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen Protestan">Kristen Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Kong Hu Chu">Kong Hu Chu</option>
                            </select>
                        </div>
                    </div>
                    {{-- <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="datetimepicker" class="form-control-label">
                                Tanggal Lahir
                            </label>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="form-group">
                                <div class="input-group date">
                                    <input type='text' class="form-control" id="datetimepicker" name="tgl_lahir" />
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                                <small class="form-text text-muted">
                                    Tidak dapat diinput secara manual. Klik kotak untuk memunculkan menu tanggal
                                </small>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="datetimepicker" class="form-control-label">
                                Tanggal Lahir
                            </label>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="form-group">
                                <div class="input-group date">
                                    <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control">
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                                <small class="form-text text-muted">
                                    Tidak dapat diinput secara manual. Klik kotak untuk memunculkan menu tanggal
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="tempat_lahir" class="form-control-label">
                                Tempat Kelahiran
                            </label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="provinsi" class="form-control-label">Provinsi</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="provinsi" id="provinsi" class="form-control">
                                <option value="0" selected disabled>Pilih salah satu</option>
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
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="kecamatan" class="form-control-label">Kecamatan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="kecamatan" id="kecamatan" class="form-control">
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="kelurahan" class="form-control-label">Kelurahan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="kelurahan" id="kelurahan" class="form-control">
                            </select>
                        </div>
                    </div>                
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="rw" class="form-control-label">RW</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="rw" id="rw" class="form-control">
                            </select>
                        </div>
                    </div>                
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="rt" class="form-control-label">RT</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="rt" id="rt" class="form-control">
                            </select>
                        </div>
                    </div>      
                    <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="alamat" class="form-control-label">Alamat</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
                            </div>
                        </div>          
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="kewarganegaraan" class="form-control-label">Kewarganegaraan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="kewarganegaraan" id="kewarganegaraan" class="form-control">
                                <option value="0" selected disabled>Pilih salah satu</option>
                                <option value="WNI">WNI</option>
                                <option value="WNA">WNA</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="status_keluarga" class="form-control-label">Status Keluarga</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="status_keluarga" id="status_keluarga" class="form-control">
                                    <option value="0" selected disabled>Pilih salah satu</option>
                                    <option value="Kepala Keluarga">Kepala Keluarga</option>
                                    <option value="Istri">Istri</option>
                                    <option value="Anak">Anak</option>
                                    <option value="Cucu">Cucu</option>
                                </select>
                            </div>
                        </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="status_kawin" class="form-control-label">Status Kawin</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="status_kawin" id="status_kawin" class="form-control">
                                <option value="0" selected disabled>Pilih salah satu</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Sudah Kawin">Sudah Kawin</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="pendidikan" class="form-control-label">Pendidikan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="pendidikan" id="pendidikan" class="form-control">
                                <option value="0" selected disabled>Pilih salah satu</option>
                                <option value="Tidak Mengenyam">Tidak Mengenyam</option>
                                <option value="TK">TK</option>
                                <option value="SD">SD</option>
                                <option value="SLTP">SLTP</option>
                                <option value="SLTA">SLTA</option>
                                <option value="Diploma">Diploma</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                                <option value="Akademi">Akademi</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="pekerjaan" class="form-control-label">Pekerjaan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="pekerjaan" id="pekerjaan" class="form-control">
                                <option value="0" selected disabled>Pilih salah satu</option>
                                <option value="Belum/Tidak Bekerja">Belum/Tidak Bekerja</option>
                                <option value="Mengurus Rumah Tangga">Mengurus Rumah Tangga</option>
                                <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                <option value="Pensiunan">Pensiunan</option>
                                <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
                                <option value="Tentara Nasional Indonesia">Tentara Nasional Indonesia</option>
                                <option value="Kepolisian RI">Kepolisian RI</option>
                                <option value="Perdagangan">Perdagangan</option>
                                <option value="Petani/Pekebun">Petani/Pekebun</option>
                                <option value="Peternak">Peternak</option>
                                <option value="Nelayan/Perikanan">Nelayan/Perikanan</option>
                                <option value="Industri">Industri</option>
                                <option value="Konstruksi">Konstruksi</option>
                                <option value="Transportasi">Transportasi</option>
                                <option value="Karyawan Swasta">Karyawan Swasta</option>
                                <option value="Karyawan BUMN">Karyawan BUMN</option>
                                <option value="Karyawan BUMD">Karyawan BUMD</option>
                                <option value="Karyawan Honorer">Karyawan Honorer</option>
                                <option value="Buruh Harian Lepas">Buruh Harian Lepas</option>
                                <option value="Buruh Tani/Perkebunan">Buruh Tani/Perkebunan</option>
                                <option value="Buruh Nelayan/Perikanan">Buruh Nelayan/Perikanan</option>
                                <option value="Buruh Peternakan">Buruh Peternakan</option>
                                <option value="Pembantu Rumah Tangga">Pembantu Rumah Tangga</option>
                                <option value="Tukang Cukur">Tukang Cukur</option>
                                <option value="Tukang Listrik">Tukang Listrik</option>
                                <option value="Tukang Batu">Tukang Batu</option>
                                <option value="Tukang Kayu">Tukang Kayu</option>
                                <option value="Tukang Sol Sepatu">Tukang Sol Sepatu</option>
                                <option value="Tukang Las/Pandai">Tukang Las/Pandai Besi</option>
                                <option value="Tukang Jahit">Tukang Jahit</option>
                                <option value="Penata Rambut">Penata Rambut</option>
                                <option value="Penata Rias">Penata Rias</option>
                                <option value="Penata Busana">Penata Busana</option>
                                <option value="Mekanik">Mekanik</option>
                                <option value="Tukang Gigi">Tukang Gigi</option>
                                <option value="Seniman">Seniman</option>
                                <option value="Tabib">Tabib</option>
                                <option value="Paraji">Paraji</option>
                                <option value="Perancang Busana">Perancang Busana</option>
                                <option value="Penterjemah">Penterjemah</option>
                                <option value="Imam Masjid">Imam Masjid</option>
                                <option value="Pendeta">Pendeta</option>
                                <option value="Pastur">Pastur</option>
                                <option value="Wartawan">Wartawan</option>
                                <option value="Ustadz/Mubaligh">Ustadz/Mubaligh</option>
                                <option value="Juru Masak">Juru Masak</option>
                                <option value="Promotor Acara">Promotor Acara</option>
                                <option value="Anggota DPR-RI">Anggota DPR-RI</option>
                                <option value="Anggota DPD">Anggota DPD</option>
                                <option value="Anggota BPK">Anggota BPK</option>
                                <option value="Presiden">Presiden</option>
                                <option value="Wakil Presiden">Wakil Presiden</option>
                                <option value="Anggota Mahkamah Konstitusi">Anggota Mahkamah Konstitusi</option>
                                <option value="Anggota Kabinet/Kementerian">Anggota Kabinet/Kementerian</option>
                                <option value="Duta Besar">Duta Besar</option>
                                <option value="Gubernur">Gubernur</option>
                                <option value="Wakil Gubernur">Wakil Gubernur</option>
                                <option value="Bupati">Bupati</option>
                                <option value="Wakil Bupati">Wakil Bupati</option>
                                <option value="Walikota">Walikota</option>
                                <option value="Wakil Walikota">Wakil Walikota</option>
                                <option value="Anggota DPRD Propinsi">Anggota DPRD Propinsi</option>
                                <option value="Anggota DPRD Kabupaten">Anggota DPRD Kabupaten/Kota</option>
                                <option value="Dosen">Dosen</option>
                                <option value="Guru">Guru</option>
                                <option value="Pilot">Pilot</option>
                                <option value="Pengacara">Pengacara</option>
                                <option value="Notaris">Notaris</option>
                                <option value="Arsitek">Arsitek</option>
                                <option value="Akuntan">Akuntan</option>
                                <option value="Konsultan">Konsultan</option>
                                <option value="Dokter">Dokter</option>
                                <option value="Bidan">Bidan</option>
                                <option value="Perawat">Perawat</option>
                                <option value="Apoteker">Apoteker</option>
                                <option value="Psikiater/Psikolog">Psikiater/Psikolog</option>
                                <option value="Penyiar Televisi">Penyiar Televisi</option>
                                <option value="Penyiar Radio">Penyiar Radio</option>
                                <option value="Pelaut">Pelaut</option>
                                <option value="Peneliti">Peneliti</option>
                                <option value="Sopir">Sopir</option>
                                <option value="Pialang">Pialang</option>
                                <option value="Paranormal">Paranormal</option>
                                <option value="Pedagang">Pedagang</option>
                                <option value="Perangkat Desa">Perangkat Desa</option>
                                <option value="Kepala Desa">Kepala Desa</option>
                                <option value="Biarawati">Biarawati</option>
                                <option value="Wiraswasta">Wiraswasta</option>
                            </select>
                        </div>
                    </div>
                    <div class="menudata">
                        <button type="submit" value="simpan" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Simpan </button>
                        <a href="{{ route('penduduk.index') }}" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Batal</a>
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
        i18n:{
            id:{
                months:[
                    'Januari','Februari','Maret','April',
                    'Mei','Juni','Juli','Agustus',
                    'September','Oktober','November','Desember',
                ],
                dayOfWeek:[
                    "Minggu.", "Senin", "Selasa", "Rabu", 
                    "Kamis", "Jumat", "Sabtu",
                ]
            }
        },
        timepicker:false,
        format:'d-m-Y'
    });
</script>
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
<script>
    var urlcarirw = "{{ url('carirw') }}";
    jQuery('#kelurahan').on('change', function (e) {
        var rw = e.target.value;
        var request = jQuery.ajax({
            url: urlcarirw + "/" + rw,
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
                html += "<option value=" + item.id_rw + ">" + item.no_rw + "</option>"
            }
            document.getElementById("rw").innerHTML = html;
        });
    });
</script>
<script>
    var urlcarirt = "{{ url('carirt') }}";
    jQuery('#rw').on('change', function (e) {
        var rt = e.target.value;
        var request = jQuery.ajax({
            url: urlcarirt + "/" + rt,
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
                html += "<option value=" + item.id_rt + ">" + item.no_rt + "</option>"
            }
            document.getElementById("rt").innerHTML = html;
        });
    });
</script>
@endsection