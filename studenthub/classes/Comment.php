<?php

class Comment {

    private $commentId;
    private $postId;
    private $userId;
    private $time;
    private $content;
    public $database;
    
    public function __construct(){
        $this->database=new Database();
    }
    
    public function getCommentId() {
        return $this->commentId;
    }

    public function getPostId() {
        return $this->postId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getTime() {
        return $this->time;
    }

    public function getContent() {
        return $this->content;
    }

    public function setCommentId($commentId) {
        $this->commentId = $commentId;
    }

    public function setPostId($postId) {
        $this->postId = $postId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function setTime($time) {
        $this->time = $time;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function loadComments($postid,$id){
        $query="SELECT c.*,pro_pic,CONCAT(fname,' ',lname) AS name,c.user_id FROM comment c,user u WHERE c.post_id='$postid' AND c.user_id=u.user_id";
        $this->database->query($query);
        $result=$this->database->result;
        while($row=mysqli_fetch_array($result)){
            $out= '<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
                       <img src="'.$row['pro_pic'].'" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px;height:60px;">
                       <span class="w3-right w3-opacity"><span class="w3-padding">'.$row['time'].'</span>';
                      // <span class="w3-button" onclick="reportPost('.$row['post_id'].','.$id.')"><i class="fa fa-exclamation-triangle"></i></span>';
                
                if($id==$row['user_id']){
                        $out.='<span class="w3-button" onclick="deleteComment('.$row['comment_id'].')"><i class="fa fa-trash"></i></span>';
                }
                
		$out.='</span><h5>'.$row['name'].'</h5>
                       <hr class="w3-clear">
                       <div style="padding-left:6px;padding-right:6px;"><p>'.$row['content'].'</p></div></div>';
                
            echo $out;
        }
    }
    
    public function addComment($postId,$userId,$content){
        $query="INSERT INTO comment VALUES(NULL,$userId,$postId,NOW(),'$content')";
        $this->database->query($query);
        if($this->database->result){
                echo "Succesfully added comment";
        }
        else{
            echo "An error occured";
        }
    }
    
    public function deleteComment($cid){
        $query="DELETE FROM comment WHERE comment_id=$cid";
        $this->database->query($query);
        if($this->database->result){
                echo "Succesfully deleted comment";
        }
        else{
            echo "An error occured";
        }
    }
    
}
?>