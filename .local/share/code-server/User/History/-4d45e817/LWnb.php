<?php
namespace wap;
use wap\Post;
    include 'post.php';

    class PostSeeder{
        public static function seed(){
            $comments = [];
            $this->comments[] = new Comment("Ronaldo", "Great goal");
            $this->comments[] = new Comment("Messi", "Nice game");
            $this->comments[] = new Comment("Laimer", "Next game you should run more");

            return $posts;
        }
    }
?>