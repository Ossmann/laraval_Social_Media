<?php
namespace wap;
use wap\Comment;
    include 'comment.php';

    class CommentSeeder{
        public static function seedComment(){

            $comments = [];
            $comments[] = new Comment("Ronaldo", "Great goal");
            $comments[] = new Comment("Messi", "Nice game");
            $comments[] = new Comment("Laimer", "Next game you should run more");

            return $comments;
        }
    }
?>