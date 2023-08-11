<?php
namespace wap;
use wap\Post;
    include 'post.php';

    class PostSeeder{
        public static function seed(){
            $posts = [];
            $posts[] = new Post("David Alaba", "Hi", "../images/alaba.jpg", "1/12/2023");
            $posts[] = new Post("Neymar", "It s a good day", "../images/Neymar.jpeg", "1/12/2023");
            $posts[] = new Post("Marko Arnautovic", "No message", "../images/arnautovic.jpg", "1/12/2023");
            return $posts;
        }
    }
?>