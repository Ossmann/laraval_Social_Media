<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>title</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>Social Media</h1>
    <?php foreach($posts as $post) { ?>
        <p>Name: <?php echo $post['name']; ?></p>
        <p>Message: <?php echo $post['message']; ?></p>
        <img src="<?php echo $post['image']; ?>" alt="Post Image">
        <p>Date: <?php echo $post['date']; ?></p>
    <?php } ?>
  </body>
</html>