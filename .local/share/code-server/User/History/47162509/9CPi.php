<?php
namespace wap;

    class Post{
        protected $user;
        protected $message;
        protected $comments;
        protected $image;
        protected $date;

        function __construct($user, $message, $image, $date){
            $this->user = $user;
            $this->message = $message;
            $this->image = $image;
            $this->date = $date;
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

        function addComment($user, $comment){
            $this->comments[] = array("user" => $user, "comment" => $comment);
        }


    }
?>