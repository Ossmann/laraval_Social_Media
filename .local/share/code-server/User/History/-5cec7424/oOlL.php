<?php
/*
 * Simple example to illustrate associative arrays and queries.
 * DANGEROUS: Does not sanitise user input.
 * BAD STYLE: Does not use templates.  Interleaves PHP and HTML.
 */
include "includes/defs.php";

/* Get form data. */
$name = $_GET['name'];
$year = $_GET['year'];
$state = $_GET['state'];

/* Get array of pms that match query in form data. */
$pms = search($name, $year, $state);

// New variable error as empty string
$error = "";

if (empty($name) && empty($year) && empty($state)) {
  $error = "At least one field must contain a value.";
} elseif (empty($name) && empty($state) && $year != intval($year)) {
  $error = "Year must be a number.";
} 

?>

<!-- display results -->
<!DOCTYPE html>
<!-- Results page of associative array search example. -->
<html>
<head>
    <title>Associative array search results page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles/wp.css">
</head>

<body>
<h2>Australian Prime Ministers</h2>


<!-- php new elseif to dispaly error -->

<?php

// should we keep this first clause? - new if clause to depending on errors
if (!empty($error)) {
    echo $error;
    ?>
    <h3>New Query</h3>

    <form method="get" action="results.php">
    <table>
      <tr><td>Name: </td><td><input type="text" name="name"></td></tr>
      <tr><td>Year: </td><td><input type="text" name="year"></td></tr>
      <tr><td>State: </td><td><input type="text" name="state"></td></tr>
      <tr><td colspan=2><input type="submit" value="Search">
                        <input type="reset" value="Reset"></td></tr>
    <table>
    </form>
    <?php
} else {
  echo "you looked for <b>$name</b> in the year: <b>$year</b>, from the state: <b>$state</b>.";
  ?>
    <h3>Results</h3>
      <table class="bordered">
      <thead>
      <tr><th>No.</th><th>Name</th><th>From</th><th>To</th><th>Duration</th><th>Party</th><th>State</th></tr>
      </thead>
      <tbody>
  <?php
    foreach($pms as $pm) {
      print 
          "<tr><td>{$pm['index']}</td><td>{$pm['name']}</td><td>{$pm['from']}</td><td>{$pm['to']}</td><td>{$pm['duration']}</td><td>{$pm['party']}</td><td>{$pm['state']}</td></tr>\n";
    }
?>
</tbody>
</table>
<?php
}
?>

<hr>
<p>
  Sources:
  <a href="show.php?file=results.php">results.php</a>
  <a href="show.php?file=includes/defs.php">includes/defs.php</a>
  <a href="show.php?file=includes/pms.php">includes/pms.php</a>

<br><br>
  <a href="../assoc%20task5/">Go back to first view</a>

</p>

</body>
</html>
