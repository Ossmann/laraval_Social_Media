<?php
namespace wap;

    class Comment{
        protected $user;
        protected $commentMessage;

        function __construct($user, $commentMessage){
            $this->user = $user;
            $this->message = $commentMessage;
            $this->comments = [];
        }

        function getUser(){
            return $this -> user;
        }

        function getComment($user, $commentMessage){
            $comments = [];
            $this->comments[] = new Comment("Ronaldo", "Great goal");
            $this->comments[] = new Comment("Messi", "Nice game");
            $this->comments[] = new Comment("Laimer", "Next game you should run more");
            return $this->comments;
        }

    }
?>


