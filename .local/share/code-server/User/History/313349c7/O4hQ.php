<?php
    include 'post.php';

    class PostSeeder{
        public static function seed(){
            $posts = [];
            $posts[] = new Post("Bob", "Hi");
            $posts[] = new Post("John", "It s a good day");
            $posts[] = new Post("Fred", "No message");
            return $posts;
        }
    }
?>