<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('frontimages/favicon.png')}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Linear Icons -->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,500,600,700,900%7COpen+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{asset('frontcss/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontcss/fontawesome-all.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontcss/animate.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontcss/linear-icons.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontcss/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontcss/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontcss/magnific-popup.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontcss/nouislider.min.css')}}">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{asset('frontcss/theme.css')}}">
		<link rel="stylesheet" href="{{asset('frontcss/theme-elements.css')}}">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="{{asset('frontcss/settings.css')}}">
		<link rel="stylesheet" href="{{asset('frontcss/layers.css')}}">
		<link rel="stylesheet" href="{{asset('frontcss/navigation.css')}}">

		<!-- Skin CSS -->
        <link rel="stylesheet" href="{{asset('frontcss/default.css')}}">		
        <script src="{{asset('frontjs/style.switcher.localstorage.js')}}"></script> 

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{asset('frontcss/custom.css')}}">

		<!-- Head Libs -->
        <script src="{{asset('frontjs/modernizr.min.js')}}"></script>
        


    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    {{-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> --}}


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">



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
