<?php
    $posts = array();
    $posts[] = array(
        'name' => 'Bob',
        'message' => 'hello',
        'image' => 'images/default.jpg',
        'date' => '1/1/11'
    );
    $posts[] = array(
        'name' => 'Peter',
        'message' => 'hello',
        'image' => 'images/default.jpg',
        'date' => '1/1/11'
    );
    $posts[] = array(
        'name' => 'Javk',
        'message' => 'hello',
        'image' => 'images/default.jpg',
        'date' => '1/1/11'
    );
?>

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
        <?= $post['name'] ?>
        <?= $post['message'] ?>
        <?= $post['image'] ?>
        <?= $post['date'] ?>
    <?php } ?>
  </body>
</html>