<?php
namespace wap;
use wap\Post;
    include 'post.php';

    class PostSeeder{
        public static function seed(){
            $posts = [];
            $posts[] = new Post("Bob", "Hi", "../images/alaba.jpg", "1/12/2023");
            $posts[] = new Post("John", "It s a good day");
            $posts[] = new Post("Fred", "No message");
            return $posts;
        }
    }
?>