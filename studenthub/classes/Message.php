<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

class Message {

    private $senderId;
    private $recieverId;
    private $msgId;
    private $content;
    private $time;
    
    public $database;
    
    public function __construct() {
        $this->database = new Database();
    }

    
    public function getSenderId() {
        return $this->senderId;
    }

    public function getRecieverId() {
        return $this->recieverId;
    }

    public function getMsgId() {
        return $this->msgId;
    }

    public function getContent() {
        return $this->content;
    }

    public function getTime() {
        return $this->time;
    }

    public function setSenderId($senderId) {
        $this->senderId = $senderId;
    }

    public function setRecieverId($recieverId) {
        $this->recieverId = $recieverId;
    }

    public function setMsgId($msgId) {
        $this->msgId = $msgId;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setTime($time) {
        $this->time = $time;
    }
    
    public function loadConversation($sid,$rid,$uid){
        $query= "SELECT m.*,CONCAT(u.fname,' ',u.lname) AS name,u.pro_pic FROM message m,user u WHERE '$sid' IN (sender_id,reciever_id) AND '$rid' IN (sender_id,reciever_id) AND user_id=sender_id ORDER BY msg_id";
        $this->database->query($query);
        $result=$this->database->result;
        while($row=mysqli_fetch_array($result)){            
            if($row['sender_id']==$uid)
                $lor='right w3-theme-l1';
            else
                $lor='left w3-theme-l5';
            
            $d=new Date();
            $time=$d->time_elapsed_string($row['time']);
            $out=   '<div class="w3-container w3-card w3-'.$lor.' w3-round w3-margin" style="width:60%;"><br>
                    <img src="'.$row['pro_pic'].'" alt="Avatar" class="w3-left w3-circle w3-margin-left w3-margin-bottom w3-margin-right" style="width:30px;height:30px;">
                    <span class="w3-right w3-opacity"><span class="w3-padding">'.$time.'</span>'.
                    '</span><span class="w3-large">'.$row['content'].'</span></div>';           
            echo $out;
        }
   }
   
   public function sendMessage($sid,$rid,$content){
        $query="INSERT INTO message VALUES (NULL,$sid,$rid,NOW(),'$content')";    
        $this->database->Query($query);

        if ($this->database->rows > 0) {
            echo "Message succesfully sent";
        } else {
            echo "Failed to send message";
            echo "<br/>".$this->database->rows;
        }
   }

   public function loadRecipients($id){
        $query= "SELECT * FROM user u,user_connects_user c WHERE user_id<>$id AND user_id IN (sender_id,reciever_id) AND status=1 GROUP BY user_id";
        $this->database->query($query);
        $result=$this->database->result;
        while($row=mysqli_fetch_array($result)){            
            $out=   '<div class="zoom w3-container w3-card w3-white w3-round w3-margin" onclick="loadConversation('.$id.','.$row['user_id'].')" style="cursor: pointer;"><br>
                    <img src="'.$row['pro_pic'].'" alt="Avatar" class="w3-left w3-circle w3-margin-right w3-margin-bottom" style="width:60px;height:60px;">
                    <span class="w3-right w3-opacity w3-margin-top">'.
                    '</span><h5>'.$row['fname'].' '.$row['lname'].'</h5></div>';           
            echo $out;
        }
   }
   

}
?>