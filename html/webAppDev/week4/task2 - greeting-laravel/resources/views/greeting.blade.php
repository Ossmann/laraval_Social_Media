<html>
  <head>
    <title>Greeting</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{asset('css/wp.css')}}">
  </head>
  
  <body>  
    <p>
    Hello {{$user}}.
    Next year, you will be {{$age}} years old.

    <hr>
    <p><a href="show.php?file=greeting.php">Source</a></p>
  </body>
</html>