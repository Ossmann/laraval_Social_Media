<?php
    include 'classes/postSeeder.php';
    $posts = wap\PostSeeder::seed();
    $posts[0]->addComment("Ronaldo", "Great goal");
    $posts[1]->addComment("Messi", "Nice game");
    $posts[2]->addComment("Laimer", "Next game you should run more");
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
            <?php $comments = $post->getComment();
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