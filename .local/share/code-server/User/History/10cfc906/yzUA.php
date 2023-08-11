<?php
    include 'classes/postSeeder.php';
    $posts = wapPostSeeder::seed();
    var_dump($posts);
    exit;
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
  </body>
</html>