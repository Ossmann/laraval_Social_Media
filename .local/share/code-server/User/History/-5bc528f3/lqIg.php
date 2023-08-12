<?php
/* Constant and function definitions for simple guest book application. */

define("FILE","factorisations.txt");

/* 
 * factors($n) returns an array of prime factors of valid integer $n. 
 * Precondition: 2 <= n <= MAHP_MAX_INT = 2^31-1.
 * Note that it is executed for its _value_ not for its _effect_.
 */
function factors($n) {
  $factors = array(); # initialise $factors to be an empty array
  $cand = 2;
  while ($n > 1 && $cand*$cand <= $n) {
      while ($n > 1 && $n % $cand == 0) {
          $factors[] = $cand; # append $cand to the array $factors
          $n = $n / $cand;
      }
      $cand++;
  }
  if ($n > 1) {
      $factors[] = $n; # append $n to the array $factors
  }
  //return $factors;
}

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
    $n = 0;
    while (!feof($fp)) {
      $number = fgets($fp, 4096);
      if (!empty($number) && !feof($fp)) { # should not be necessary!
        $number = htmlspecialchars($number);
        $author = htmlspecialchars(trim(fgets($fp, 4096)));
  
        echo "<p>$number</p>\n";
        echo "<p>-- $author</p>\n";
  
        $n++;
      }
    }
    echo "<p>(Debugging: No. numbers = $n.)</p>\n";
    fclose($fp);
  }
?>