<?php
namespace wap;

    class Comment{
        protected $user;
        protected $message;

        function __construct($user, $message){
            $this->user = $user;
            $this->message = $message;
            $this->comments = [];
        }

        function getUser(){
            return $this -> user;
        }

        function getMessage(){
            return $this->message;
        }

        function addComment($user, $comment){
            $this->comments[] = 
            new Comment("Ronaldo", "Great goal");
            new Comment("Messi", "Nice game");
            new Comment("Laimer", "Next game you should run more");
        }


    }
?>


