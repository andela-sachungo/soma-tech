<!DOCTYPE html>
<html>
<head>
    <title>Soma-Tech &#187; @yield('title')</title>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!--Import bootstrap.min.css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/sweetalert.css">

    <!--To be able to use font-awesome for social sites icons-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    @yield('styles')
</head>
<body>
    @include('partials.navbar')

    @yield('sidebar')
    <div class="sticky-footer">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="text-center" class="color-text" id="footer-text">
                Copyright &copy; 2016 SomaTech
                <br>
                By Stacey Achungo - #TIA
            </div>
        </div>
    </footer>

    <!--Import jquery.min.js and bootstrap.min.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src = "/js/sweetalert.js"></script>
    @yield('scripts')
</body>
</html>