<?php
namespace wap;

    class Comment{
        protected $user;
        protected $image;
        protected $message
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

        function getImage(){
            return $this->image;
        }

        function getDate(){
            return $this->date;
        }

        function getComment(){
            return $this->comments;
        }

        function addComment($user, $comment){
            $this->comments[] = array("user" => $user, "comment" => $comment);
        }


    }
?>