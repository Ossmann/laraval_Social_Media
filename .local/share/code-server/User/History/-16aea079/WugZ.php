<?php
/*
 * Script to print the prime factors of a single positive integer
 * sent from a form.
 * BAD STYLE: Does not use templates.
 */
include "includes/defs.php";

# Set $number to the value entered in the form.
$number = $_GET['number'];
$error = "";

# Check $number is nonempty, numeric and between 2 and PHP_MAX_INT = 2^31-1.
# (PHP makes it difficult to do this naturally; see the manual.)
if (empty($number)) {
    $error = "Error: Missing value";
} else if (!is_numeric($number)) {
    $error = "Error: Nonnumeric value: $number";
} else if ($number < 2 || $number != strval(intval($number))) {
    $error = "Error: Invalid number: $number";
} else {
    # Set $factors to the array of factors of $number.
    $factors = factors($number);
    # Set $factors to a single dot-separated string of numbers in the array.
    $factors = join(" . ", $factors);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Factors</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles/wp.css">
  </head>
  
  <body>  
    <h1>Factorisation</h1>

      <!-- new if statement to display error instead of number -->
      <?php
      if (empty($error)) {
        echo "$number = $factors";
        showEntries();
      }
      else {
        echo $error;
      }

    // $_SERVER['REQUEST_METHOD'] == 'POST'
    // Add new message from form data and redirect to home page
    include "includes/defs.php";

    // Get form data
    $number = $_POST['number'];
    $author = $_POST['author'];

    if (!empty($message)) {
	// Add new message from form data 
	if (empty($author)) {
	    $author = "Anon.";
	}
	writeEntry($message, $author);

	// Redirect to home page
	header("Location: index.php");
	exit;
    } else {
	// Report an error.
	// BAD STYLE: This is the wrong way to report errors.
	 print "<p>Error: Empty message in form data.</p>\n";
    }
    ?>

    <h3>Another?</h3>
    <!-- here added form to get input -->
    <form method="get" action="factorise.php">
      <!-- Added here value input variable with php tag -->
      <p>Number to factorise: <input type="text" name="number" value="<?= $number ?>">
      <p>User that inputs: <input type="text" name="author" value="<?= $author ?>">
      <p><input type="submit" value="Factorise it!">
    </form>
    <hr>
    <p>
    Sources:
    <a href="show.php?file=factorise.php">factorise.php</a>
    <a href="show.php?file=includes/defs.php">includes/defs.php</a>
    </p>
  </body>
</html>

