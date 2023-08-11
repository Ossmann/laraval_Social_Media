<?php
    $posts = array();
    $posts[] = array(
        'name' => 'Bob',
        'message' => 'hello',
        'image' => 'images/user-80.png',
        'date' => '1/1/11'
    );
    $posts[] = array(
        'name' => 'Peter',
        'message' => 'hello',
        'image' => 'images/user-80.png',
        'date' => '1/1/11'
    );
    $posts[] = array(
        'name' => 'Javk',
        'message' => 'hello',
        'image' => 'images/user-80.png',
        'date' => '1/1/11'
    );
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>title</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <h1>Social Media</h1>
    <?php foreach($posts as $post) { ?>
        <img src=" <?= $post['image'] ?>" width="50" height="50"> <br>
        <?= $post['name'] ?> <br>
        <?= $post['message']?> <br>
        <?= $post['date'] ?>
    <?php } ?>
  </body>
</html>