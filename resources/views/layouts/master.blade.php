<html>

<head>
    <meta charset="utf-8">
    <title>SIMAPAN - Sistem Informasi Manajemen Kependudukan Tingkat RT/RW</title>
    <meta name="description" content="SIMAPAN - Sistem Informasi Manajemen Kependudukan Tingkat RT/RW">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/scss/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/vector-map/jqvmap.min.css') }}" rel="stylesheet') }}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    @yield('style')
</head>

<body>
    <aside id="left-panel" class="left-panel">
        @include('layouts.include.navbar')
    </aside>

    <div id="right-panel" class="right-panel">
        @include('layouts.include.sidebar')
        <div class="content mt-3">
            <div class="animated fadeIn">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @yield('script')
</body>

</html>