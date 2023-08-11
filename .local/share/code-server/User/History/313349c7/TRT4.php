<?php
    include 'post.php';

    class PostSeeder{
        public static function seed(){
            $post = new Post("Bob", "Hi");
            $post = new Post("John", "It s a good day");
            $post = new Post("Fred", "No message");

        }
    }
?>