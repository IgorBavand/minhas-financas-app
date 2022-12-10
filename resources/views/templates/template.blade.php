<!DOCTYPE html>
<html lang="pt-br">
    <meta charser="utf-8">
    <head>

        <!-- Stylesheets -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}"/>
        <link rel="stylesheet" href="{{url('assets/css/font-awesome.min.css')}}"/>
        <link rel="stylesheet" href="{{url('assets/css/index.css')}}"/>
    <title>Minhas Finanças V1.0.0</title>

    <link rel="icon" type="imagem/webo" href="{{ url('assets/img/icone.webp') }}" />

    </head>
    <body>
   
    <main class="py-4" style="height: 100vh">
        @yield('content')
    </main>
        
    </body>

    <!--====== Javascripts & Jquery ======-->
    <script src="{{url('assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/js/mixitup.min.js')}}"></script>
    <script src="{{url('assets/js/circle-progress.min.js')}}"></script>
    <script src="{{url('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('assets/js/main.js')}}"></script>
    <script src="{{url('assets/js/mostrar-form.js')}}"></script>

    
</html>