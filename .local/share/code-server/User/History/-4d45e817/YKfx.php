<?php
namespace wap;
use wap\Post;
    include 'post.php';

    class PostSeeder{
        public static function seed(){
            $posts = [];
            $posts[] = new Post("Marko Arnautovic", "Hallo Bruder", "../images/arnautovic.jpg", "1/12/2023");
            $posts[] = new Post("David Alaba", "Servus", "../images/alaba.jpg", "1/12/2023");
            $posts[] = new Post("Neymar", "Bon Dia", "../images/Neymar.jpeg", "1/12/2023");

            $comments = [];
            $this->comments[] = new Comment("Ronaldo", "Great goal");
            $this->comments[] = new Comment("Messi", "Nice game");
            $this->comments[] = new Comment("Laimer", "Next game you should run more");

            return $posts;
        }
    }
?>