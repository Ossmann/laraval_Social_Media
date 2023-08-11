<?php
    include 'classes/postSeeder.php';
    include 'classes/comment.php';
    $posts = wap\PostSeeder::seed();
    $comments = wap\Comment::getComment();

    #var_dump($posts);
    #exit;
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
          <img src="<?= $post->getImage() ?>" height="80px" width="80px"><br>
          <div id="post-content">
            <div id="name">
              <?= $post->getUser() ?>
            </div>
            <?= $post->getMessage() ?> <br>
            <?= $post->getDate() ?> <br><br>
            Comments: <br>
            <?php 
            foreach($comments as $comment){ ?>
            <div class="comment">
              <div class="commentAuthor">
                <?= $comment["user"] ?> 
              </div>
                said 
                <?= $comment["commentMessage"] ?>
                
            </div>

            <?php } ?>
            
          </div>
          
      </div>
    <?php } ?>
  </body>
</html>