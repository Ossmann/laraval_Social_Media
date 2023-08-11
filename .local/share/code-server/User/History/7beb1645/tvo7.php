<?php
    $posts = array();
    $posts[] = array(
        'name' => 'Arnautovic',
        'message' => 'hello',
        'image' => 'images/arnautovic.jpg',
        'date' => '1/2/91'
    );
    $posts[] = array(
        'name' => 'Alaba',
        'message' => 'Good Day Sir',
        'image' => 'images/alaba.jpg',
        'date' => '4/1/2022'
    );
    $posts[] = array(
        'name' => 'Neymar',
        'message' => 'Servus',
        'image' => 'images/Neymar.jpeg',
        'date' => '12/8/2023'
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
    <div id="content"></div>
        <h1>Social Media</h1>
        <?php foreach($posts as $post) { ?>
            <div id="post">
                <img src=" <?= $post['image'] ?>" width="50" height="50">
                <?= $post['name'] ?> br
                <?= $post['message']?>
                <?= $post['date'] ?>
            </div>
            
        <?php } ?>
    </div>
  </body>
</html>