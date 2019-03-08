<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Transalp') }}</title>
      <link rel="shortcut icon" href="http://www.tarbes-expos.com/Fichiers/agenda/122846logo_transalp.jpg" type="img/jpg">

      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>

      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">


      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/template.css') }}" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

      @yield('css')
      @yield('css_unique')
      @yield('css_template')
      @yield('js')
    </head>

    <body>
      @yield('header')
      @yield('content')
      @yield('footer')
    </body>

</html>
