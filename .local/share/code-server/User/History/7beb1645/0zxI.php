<?php
    $posts[] = array(
        'name' => 'Alaba',
        'message' => 'Hallo',
        'image' => '../images/alaba.jpg',
        'date' => '1/1/11'
    );
    $posts[] = array(
        'name' => 'Neymar',
        'message' => "Bon dia",
        'image' => '../images/Neymar.jpeg',
        'date' => '2/3/14'
    );
    $posts[] = array(
        'name' => 'Arnautovic',
        'message' => 'Zdravo my friend',
        'image' => '../images/arnautovic.jpg',
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
        <?= $post['name'] ?> <br>
        <?= $post['message'] ?> <br>
        <img src=" <?= $post['image']?>" height="50px" width="50px">
        <?= $post['date'] ?>
    <?php } ?>
  </body>
</html>