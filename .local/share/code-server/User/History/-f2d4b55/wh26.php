<?php
namespace wap;

    class Comment{
        protected $user;
        protected $commentMessage;

        function __construct($user, $commentMessage){
            $this->user = $user;
            $this->commentMessage = $commentMessage;
        }

        function getUser(){
            return $this -> user;
        }

        function getCommentMessage(){
            return $this -> getCommentMessage;
        }

        function getComment($commentUser, $commentMessage){
            $comments = [];
            $this->comments[] = new Comment("Ronaldo", "Great goal");
            $this->comments[] = new Comment("Messi", "Nice game");
            $this->comments[] = new Comment("Laimer", "Next game you should run more");
            return $this->comments;
        }

    }
?>


