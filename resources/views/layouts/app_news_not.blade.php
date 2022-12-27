<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('paper') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('paper') }}/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#04663F">
    <!-- <base href="https://www.novoprogressonews.com.br"> -->

    <title> novoprogressonews.com - As principais notícias da região</title>
    <meta name="author" content="pitter775@gmail.com">
    <meta name="description" content="Na novoprogressonews.com.br você encontra as noticias da região.">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <meta property="og:site_name" content="Novo Progresso News - As principais notícias da região">
    <meta property="og:title" content="{{$dados_geral->titulo ?? ''}}">
    <meta property="og:description" content=" {{$dados_geral->resumo ?? ''}}">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.novoprogressonews.com.br/noticias/show/{{$dados_geral->id ?? ''}}">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image" content="{{$dados_geral->img_url ?? ''}}" />


    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('paper') }}/css/bootstrap.min.css?1422981258" rel="stylesheet" />
    <link href="{{ asset('paper') }}/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    <link href="{{ asset('paper') }}/css/animate.min.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('paper') }}/demo/demo.css?1422981258" rel="stylesheet" />

    

    

</head>
<style>
    .modal { overflow: auto !important; }
    body{ background-color: #fff;}
    a.navbar-brand h5 { font-size: 16px !important;}
</style>

<body class="{{ $class }}" style="background-image:url('{{ asset('paper') }}/img/bgfull5.jpg');background-size: 80%;  background-repeat: repeat-x ; "> 
    <div class="container card" style="margin-top: 40px !important; background: rgb(247,255,243);
background: linear-gradient(332deg, rgba(247,255,243,1) 0%, rgba(247,255,248,1) 45%, rgba(255,255,255,1) 100%);">
        @include('layouts.topo')
        @yield('content')
    </div> 

    <!--   Core JS Files   -->
    <script src="{{ asset('paper') }}/js/core/jquery.min.js"></script>
    <script src="{{ asset('paper') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('paper') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('paper') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <!-- Chart JS -->
    <script src="{{ asset('paper') }}/js/plugins/chartjs.min.js"></script>
    <script src="{{ asset('paper') }}/js/plugins/nouislider.min.js"></script>
    <script src="{{ asset('paper') }}/js/plugins/bootstrap-notify.js"></script>
    <script src="{{ asset('paper') }}/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
    <script src="{{ asset('paper') }}/demo/demo.js"></script>
    <script src="{{ asset('paper') }}/demo/jquery.sharrre.js"></script>
    <script src="{{ asset('paper') }}/js/jquery.mask.js"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
    <script src="{{ asset('paper') }}/js/plugins/jquery.dataTables.min.js"></script>
    <!-- https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js -->
    <script src="{{ asset('paper') }}/demo/moment.min.js"></script>
    <script src="{{ asset('paper') }}/demo/bootstrap-datetimepicker.js"></script>
    <script src="{{ asset('paper') }}/demo/locale.js"></script>
    <!-- <script src="https://cdn.ckeditor.com/4.15.1/standard-all/ckeditor.js"></script> -->
    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>


    
    @stack('scripts')



    @include('layouts.navbars.fixed-plugin-js')
</body>

</html>
