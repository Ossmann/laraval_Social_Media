<?php
namespace wap;
use wap\Post;
    include 'post.php';

    class PostSeeder{
        public static function seed(){
            $posts = [];
            $posts[] = new Post("Bob", "Hi", "../images/alaba.jpg", "1/12/2023");
            $posts[] = new Post("John", "It s a good day", "../images/Neymar.jpeg", "1/12/2023");
            $posts[] = new Post("Fred", "No message", "../images/arnautovic.jpg", "1/12/2023");
            return $posts;
        }
    }
?>