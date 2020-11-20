<?php

    spl_autoload_register(function ($class_name) {
        include $class_name . '.php';
    });

class Post {
	protected $postId;
        protected $caption;
        protected $postType;
        protected $addedTime;
        protected $userId;
        
        public $database;
        
        public function __construct() {
            $this->database = new Database();
        }

        
        public function getPostId() {
            return $this->postId;
        }

        public function getCaption() {
            return $this->caption;
        }

        public function getPostType() {
            return $this->postType;
        }

        public function getAddedTime() {
            return $this->addedTime;
        }

        public function getUserId() {
            return $this->userId;
        }

        public function setPostId($postId) {
            $this->postId = $postId;
        }

        public function setCaption($caption) {
            $this->caption = $caption;
        }

        public function setPostType($postType) {
            $this->postType = $postType;
        }

        public function setAddedTime($addedTime) {
            $this->addedTime = $addedTime;
        }

        public function setUserId($userId) {
            $this->userId = $userId;
        }
        
        public function addLike($post_id,$user_id){
            $query="INSERT INTO user_likes_post values ($user_id,$post_id,NOW(),1) ON DUPLICATE KEY UPDATE liked = NOT liked,time=NOW()";
            $this->database->Query($query);
            return "done";
        }
        
        public function reportPost($uid,$pid){
            $query = "INSERT INTO user_reports_post VALUES($uid,$pid,NOW())";
            $this->database->Query($query);
            echo "Successfully Reported Post!";
        }
        
        public function deletePost($pid){
            
            $sql = "DELETE FROM post WHERE post_id = $pid";
    
            $result = $this->database->Query($sql);
	
            if ($this->database->rows) {
		echo "Succesfully Removed";
            }
            else {
                echo "An Error Occured";
            }

        }
}

?>