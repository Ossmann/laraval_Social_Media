<?php
    $posts[] = array();
    array(
        'name' => 'Bob',
        'message' => 'hello',
        'imgage' => '<div class="">images/default.jpg',
        'date' => '1/1/11'
    );
    $posts[] = array();
    array(
        'name' => 'John',
        'message' => "It's a good day",
        'imgage' => 'images/default.jpg',
        'date' => '2/3/14'
    );
    $posts[] = array();
    array(
        'name' => 'Fred',
        'message' => 'Servas',
        'imgage' => 'images/default.jpg',
        'date' => '4/5/16'
    );
    var_dump($posts);
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