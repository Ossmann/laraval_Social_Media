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
            return $this -> commentMessage;
        }

        // function getComment($commentUser, $commentMessage){
        //     $comments = [];
        //     return $this->comments;
        // }

    }
?>


