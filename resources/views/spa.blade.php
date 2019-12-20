<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    
    <script src="{{ mix('/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background: #00c4ff;
        }
        
    </style>
</head>
<body>
    <div id="app">
        <app></app>
    </div>
    <div class="footer">
        <div class="container text-center">
            Made with <i class="fa fa-heart heart text-red"></i> by <a href="http://dostcaraga.ph/">DOST Caraga</a> MIS Unit</a>
        </div>
    </div>
</body>
</html>