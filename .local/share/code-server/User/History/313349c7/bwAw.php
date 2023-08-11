<?php
    include 'post.php';

    class PostSeeder{
        public static function seed(){
            $post = new Post("Bob", "Hi");

        }
    }
?>