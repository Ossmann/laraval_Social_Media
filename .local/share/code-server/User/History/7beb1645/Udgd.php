<?php
    $posts[] = array(
        'name' => 'Arnautovic',
        'message' => 'Zdravo my friend',
        'image' => '../images/arnautovic.jpg',
        'date' => '4/5/16'
    );    
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
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>title</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <h1>Social Media</h1>
    <?php foreach($posts as $post) { ?>
      <div id="post">
          <img src=" <?= $post['image']?>" height="80px" width="80px">
          <div id="post-content">
            <div id="name">
              <?= $post['name'] ?>
            </div>
            <?= $post['message'] ?>
            <div id="date">
              <?= $post['date'] ?>
          </div>
          </div>
          
      </div>
    <?php } ?>

    <a href="../task2/">To task2</a>
    <a href="../task3/">To task3</a>
    <a href="../task4/">To task4</a>
  </body>
</html>