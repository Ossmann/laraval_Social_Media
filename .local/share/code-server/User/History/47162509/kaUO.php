<?php
namespace wap;

    class Post{
        protected $user;
        protected $message;
        protected $comments;

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

        function getComment(){
            return $this->comments;
        }

        function addComment($comment){
            $this->comment[] =
        }


    }
?>