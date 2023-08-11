<?php
namespace wap;
use wap\Comment;
    include 'comment.php';

    class ComSeeder{
        public static function seed(){
            $comments = [];
            $comments[] = new Post("Marko Arnautovic", "Hallo Bruder", "../images/arnautovic.jpg", "1/12/2023");
            $comments[] = new Post("David Alaba", "Servus", "../images/alaba.jpg", "1/12/2023");
            $comments[] = new Post("Neymar", "Bon Dia", "../images/Neymar.jpeg", "1/12/2023");
            

            return $posts;
        }
    }
?>