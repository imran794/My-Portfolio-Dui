<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">

    @stack('css')
   
</head>
<body>
    



    @include('layouts.frontend.partial.header')

     @yield('content')



<!-- home section starts  -->

    <script src="{{ asset('js/iziToast.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @include('vendor.lara-izitoast.toast')
@stack('js')

</body>
</html>
