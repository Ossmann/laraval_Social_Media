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
        
        function getUser(): string {
            return $this->user;
        }
    
        function getMessage(): string {
            return $this->message;
        }
    
        function getImage(): string {
            return $this->image;
        }
    
        function getDate(): string {
            return $this->date;
        }
    
        function getComments(): array {
            return $this->comments;
        }

        // type input declaration string
        function addComment(string $user, string $comment){
            $this->comments[] = array("user" => $user, "comment" => $comment);
        }


    }
?>