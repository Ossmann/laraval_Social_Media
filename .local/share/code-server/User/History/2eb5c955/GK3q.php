<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>@yield('title')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbar-static/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/wp.css')}}">
  </head>

  <body>

    <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="#">Social Media</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
          <a class="nav-link" href="{{url("/")}}">Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url("users")}}">Users</a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">

          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Create Post</button>
        </form>
      </div>
    </nav>

    <div class="container">
      <div class = "row" id="content">

    @yield('content')

      </div>
    </div><!-- /.container -->
  </body>
</html>