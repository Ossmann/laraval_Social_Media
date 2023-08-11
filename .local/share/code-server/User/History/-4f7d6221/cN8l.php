<?php
/* 
 * Add new factorisation to file and redirect to factorise.php. 
 */
include "includes/readWrite.php";

// Get form data
$message = $_POST['factors'];
$author = $_POST['author'];

if (!empty($message)) {
    if($_POST['url'] == ''){ // This if is the anti-spam measure. Bots will try to put some text in the url field.
         
        // Add new message from form data 
        if (empty($author)) {
            $author = "Anon.";
        }
        writeEntry($message, $author);
    }
    // Redirect to home page
    header("Location: index.php");
    exit;
} else {
    // Report an error.
    // BAD STYLE: This is the wrong way to report errors.
    echo "<p>Error: Empty message in form data.</p>\n";
}
?>
