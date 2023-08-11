<?php
/* Constant and function definitions to read and read into factorisation file. */

define("FILE","factorisations.txt");

/* Appends entry to FILE. */
function writeEntry($number, $author) {
    $fp = fopen(FILE, "a");
    fwrite($fp, "$number\n");
    fwrite($fp, "$author\n");
    fclose($fp);
}


/* Show existing entires */
  function showEntries() {
    $fp = fopen(FILE, "r");
    $num = 0;
    while (!feof($fp)) {
      $number = fgets($fp, 4096);
      if (!empty($number) && !feof($fp)) { # should not be necessary!
        $number = htmlspecialchars($number);
        $author = htmlspecialchars(trim(fgets($fp, 4096)));
  
        echo "<p>$number</p>\n";
        echo "<p>-- $author</p>\n";
  
        $num++;
      }
    }
    echo "<p>(Debugging: No. numbers = $num.)</p>\n";
    fclose($fp);
  }

?>