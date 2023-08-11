<?php
    class Post{
        protected $user;
        protected $message;

        function __construct($user, $message){
            $this->user = $user;
            $this->message = $message;
        }
    }
?>