<?php
/*
 * Script to print the prime factors of a single positive integer
 * sent from a form.
 * BAD STYLE: Does not use templates.
 */
include "includes/defs.php";
?>

<!DOCTYPE html>
<!-- Home page for basic factorisation example. -->
<html>
  <head>
    <title>Factorisation form</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles/wp.css">
  </head>
  
  <body>  
    <h1>Factorisation</h1>

    <form method="get" action="factorise.php">
      <p>Number to factorise: <input type="text" name="number" value="<?= $number ?>">
      <p>User that inputs: <input type="text" name="author" value="<?= $author ?>">
      <p><input type="submit" value="Factorise it!">
    </form>
  </body>
</html>

