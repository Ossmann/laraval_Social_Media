<?php
/* Constant and function definitions for simple guest book application. */

define("FILE","factors.txt");

/* Appends entry to FILE. */
function writeEntry($number, $factors) {
  $fp = fopen(FILE, "a");
  fwrite($fp, "$number = ");
  fwrite($fp, "$factors\n");
  fclose($fp);
}

/*
 * Shows entries in FILE
 * PHP blocks are not interpreted on the server,
 * and HTML and JavaScript elements are not interpreted on the client.
 */
function showEntries() {
  $fp = fopen(FILE, "r");
  if ( $fp ) {                      # added by Anthony Thyssen 21/02/2014
    $n = 0;
    while ($fp && !feof($fp)) {
      $factors = fgets($fp, 4096);
      if (!empty($factors) && !feof($fp)) { # should not be necessary!
        $factors = htmlspecialchars($factors);
        echo "<p>$factors</p>\n <p>------</p> ";

        $n++;
      }
    }
    echo "<p>(Debugging: No. factorss = $n.)</p>\n";
    fclose($fp);
  }
}
?>
