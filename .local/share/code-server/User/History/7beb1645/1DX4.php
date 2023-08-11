<?php
    $posts[] = array(
        'name' => 'Bob',
        'message' => 'hello',
        'imgage' => '../',
        'date' => '1/1/11'
    );
    $posts[] = array(
        'name' => 'John',
        'message' => "It's a good day",
        'imgage' => 'images/default.jpg',
        'date' => '2/3/14'
    );
    $posts[] = array(
        'name' => 'Fred',
        'message' => 'Servas',
        'imgage' => 'images/default.jpg',
        'date' => '4/5/16'
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
        <?php $post['name'] ?>
        <?php $post['message'] ?>
        <?php $post['image'] ?>
        <?php $post['date'] ?>
    <?php } ?>
  </body>
</html>