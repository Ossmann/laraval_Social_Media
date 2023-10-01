<!DOCTYPE html>
<html>
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="{{asset('css/wp.css')}}">
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