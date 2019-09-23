<!doctype html>
<html lang="fa">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>خانه</title>
    @yield('style')

    <!-- MDB -->
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/mdb.css")}}">
    <!-- resource -->
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <link rel="stylesheet" href="{{asset("css/app2.css")}}">
    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
</head>
<body >

<!-- start -->
<div  class="white-skin custom-scrollbar" id="app-vue">
    <nav>@include('layouts.components.nav')</nav>
    <header>@include('layouts.components.header')</header>
    <aside>@include('layouts.components.aside')</aside>
    <main>@include('layouts.components.main')</main>
    <footer>@include('layouts.components.footer')</footer>
</div>
<!-- end -->


<!-- resource -->
<script src="{{asset("js/app.js")}}"></script>
<!-- MDB -->
<script src="{{asset("js/mdb/bootstrap.js")}}"></script>
<script src="{{asset("js/mdb/mdb.js")}}"></script>
<!-- script -->
@yield('script')

</body>
</html>
