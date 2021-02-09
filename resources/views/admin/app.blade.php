<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}">
    <link href="{{asset('css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
  
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>





</head>
<body>
    <div id="app">
                <main class="py-4">
                    @yield('scripts')
                    @yield('content')
        </main>
    </div>
</body>
</html>
