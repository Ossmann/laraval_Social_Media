<html>
  <head>
    <title>Greeting</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../wp.css">
  </head>
  
  <body>  
    <p>
    Hello {{$name}}.
    Next year, you will be <?php echo (int)$age + 1; ?> years old.

    <hr>
    <p><a href="show.php?file=greeting.php">Source</a></p>
  </body>
</html>