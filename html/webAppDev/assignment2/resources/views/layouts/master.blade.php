<!DOCTYPE html>
<html>
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('css/wp.css')}}">
  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbar-static/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
  @auth
    {{Auth::user()->name}}
    <form method="POST" action= "{{url('/logout')}}">
      {{csrf_field()}}
      <input type="submit" value="Logout">
    </form>
    @else
      <a href="{{route('login')}}">Log in</a>
      <a href="{{route('register')}}">register</a>
    @endauth


    @yield('content')
  </body>
</html>