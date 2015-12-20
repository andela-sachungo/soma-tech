<!DOCTYPE html>
<html>
<head>
    <title>Soma-Tech &#187; @yield('title')</title>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!--Import bootstrap.min.css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <!--To be able to use font-awesome for social sites icons-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    @yield('styles')
</head>
<body>
    @include('partials.navbar')
￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼￼
    <div class="container">
        @yield('content')
    </div>

    <footer class="page-footer deep-orange darken-4">
        <div class="container">
            <div class="footer-copyright">
                Copyright &copy; 2015 soma-tech.app | All rights reserved.
            </div>
        </div>
    </footer>

    <!--Import jquery.min.js and bootstrap.min.js-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    @yield('scripts')
</body>
</html>