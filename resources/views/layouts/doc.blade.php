<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/quill/quill.bubble.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/simple-datatables/style.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/paginate.css') }} " rel="stylesheet"/>
    @yield('css')
    <title class="print-none">Painel Control</title>
</head>
<body>
    @yield('body')
    <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
    @yield('script')
</body>

</html>
