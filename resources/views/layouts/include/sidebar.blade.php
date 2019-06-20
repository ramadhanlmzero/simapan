<nav class="navbar navbar-expand-sm navbar-default">
    <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="./"><img src="{{asset('images/logo.png')}}" alt="Logo"></a>
        <a class="navbar-brand hidden" href="./"><img src="{{asset('images/logo2.png')}}" alt="Logo"></a>
    </div>

    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
            </li>
            <h3 class="menu-title">Data</h3>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Lihat Data</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-id-card-o"></i><a href="{{ route('penduduk.index') }}">Data Penduduk</a></li>
                    <li><i class="fa fa-id-card-o"></i><a href="#">Data Pendatang</a></li>
                    <li><i class="fa fa-id-card-o"></i><a href="#">Data Pindahan</a></li>
                    <li><i class="fa fa-id-card-o"></i><a href="#">Data Kelahiran</a></li>
                    <li><i class="fa fa-id-card-o"></i><a href="#">Data Kematian</a></li>
                    <li><i class="fa fa-id-card-o"></i><a href="{{ route('rt.index') }}">Data Perangkat RT</a></li>
                    <li><i class="fa fa-id-card-o"></i><a href="{{ route('rw.index') }}">Data Perangkat RW</a></li>
                    <li><i class="fa fa-id-card-o"></i><a href="{{ route('surat.index') }}">Data Surat</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Input Data</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-table"></i><a href="{{ route('penduduk.create') }}">Data Penduduk</a></li>
                    <li><i class="fa fa-table"></i><a href="#">Data Pendatang</a></li>
                    <li><i class="fa fa-table"></i><a href="#">Data Pindahan</a></li>
                    <li><i class="fa fa-table"></i><a href="#">Data Kelahiran</a></li>
                    <li><i class="fa fa-table"></i><a href="#">Data Kematian</a></li>
                    <li><i class="fa fa-table"></i><a href="{{ route('rt.create') }}">Data Perangkat RT</a></li>
                    <li><i class="fa fa-table"></i><a href="{{ route('rw.create') }}">Data Perangkat RW</a></li>
                    <li><i class="fa fa-table"></i><a href="{{ route('surat.create') }}">Data Surat</a></li>
                </ul>
            </li>

            <h3 class="menu-title">Pembuatan Surat</h3>
            <li>
                <a href="widgets.html"> <i class="menu-icon ti-email"></i>Data Pembuatan Surat</a>
            </li>
            <li>
                <a href="widgets.html"> <i class="menu-icon ti-email"></i>Buat Surat Baru</a>
            </li>

            <h3 class="menu-title">Laporan</h3>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-word-o"></i>Cetak Laporan</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="menu-icon fa fa-book"></i><a href="page-login.html">Data Penduduk</a></li>
                    <li><i class="menu-icon fa fa-book"></i><a href="page-register.html">Data Pendatang</a></li>
                    <li><i class="menu-icon fa fa-book"></i><a href="pages-forget.html">Data Pindahan</a></li>
                    <li><i class="menu-icon fa fa-book"></i><a href="page-register.html">Data Kelahiran</a></li>
                    <li><i class="menu-icon fa fa-book"></i><a href="pages-forget.html">Data Kematian</a></li>
                    <li><i class="menu-icon fa fa-book"></i><a href="page-register.html">Data Perangkat RT</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>