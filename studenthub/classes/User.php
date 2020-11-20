<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

class User{
    
    protected $userId;
    protected $username;
    protected $password;
    protected $fName;
    protected $lName;
    protected $regNumber;
    protected $address;
    protected $contactNo;
    protected $nic;
    protected $dob;
    protected $role;
    protected $proPic;
    protected $email;
    protected $occupation;
    protected $batch;
    protected $degree;
    
    public $database;
       
 public function __construct() {
            $this->database = new Database();
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getFName() {
        return $this->fName;
    }

    public function getLName() {
        return $this->lName;
    }

    public function getRegNumber() {
        return $this->regNumber;
    }

    public function getContactNo() {
        return $this->contactNo;
    }

    public function getNic() {
        return $this->nic;
    }

    public function getDob() {
        return $this->dob;
    }

    public function getRole() {
        return $this->role;
    }

    public function getProPic() {
        return $this->proPic;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setFName($fName) {
        $this->fName = $fName;
    }

    public function setLName($lName) {
        $this->lName = $lName;
    }

    public function setRegNumber($regNumber) {
        $this->regNumber = $regNumber;
    }

    public function setContactNo($contactNo) {
        $this->contactNo = $contactNo;
    }

    public function setNic($nic) {
        $this->nic = $nic;
    }

    public function setDob($dob) {
        $this->dob = $dob;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setProPic($proPic) {
        $this->proPic = $proPic;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getOccupation() {
        return $this->occupation;
    }

    public function getBatch() {
        return $this->batch;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setOccupation($occupation) {
        $this->occupation = $occupation;
    }

    public function setBatch($batch) {
        $this->batch = $batch;
    }
    
    public function getDegree() {
        return $this->degree;
    }

    public function setDegree($degree) {
        $this->degree = $degree;
    }

            
    public function login($uname,$password){
        $query="SELECT * FROM user u,general g WHERE username='$uname' AND password=sha1('$password') AND verified=1 AND g.user_id=u.user_id";
        $oResult = $this->database->query($query);
        $oResult = $this->database->result;
        if($row = mysqli_fetch_object($oResult)){
                $this->userId=$row->user_id;
                $this->username=$row->username;
                $this->password=$row->password;
                $this->fName=$row->fname;
                $this->lName=$row->lname;
                $this->regNumber=$row->reg_number;
                $this->address=$row->address;
                $this->contactNo=$row->contact_no;
                $this->nic=$row->nic;
                $this->degree=$row->degree;
                $this->dob=$row->dob;
                $this->role=$row->role;
                $this->proPic=$row->pro_pic;
                $this->email=$row->email;
                $this->batch=$row->batch;
                $this->occupation=$row->occupation;
            
                $_SESSION['id']=$this;
            header('Location: home.php');
        }
    }
    
    public function register($username, $password, $fName, $lName, $regNumber, $address, $contactNo, $nic, $dob, $proPic, $email, $occupation, $batch,$degree) {

    $query="CALL new_user('$username','$password', '$fName', '$lName', '$regNumber', '$address', '$contactNo', '$nic', '$dob', '$proPic', '$email', '$occupation', '$batch','$degree')";    

            $this->database->Query($query); 
            echo "Succesfully registered";
            header('Location: login.php');    
    }
    
    public function viewprofile($user_id){
        $query="SELECT * FROM user where user_id='$user_id'";
        $this->database->query($query);
        $oResult = $this->database->result;
        if($row = mysqli_fetch_array($oResult)){
            echo "<h4 class='w3-center'> ". $row['fname'].' '.$row['lname'] . "</h4>";
            echo '<p class="w3-center"><img src="'.$row['pro_pic'].'" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p><hr>';
            echo '<p class="w3-center"><b>E-Mail</b><br/>'.$row['email'].'</p>';
            echo '<p class="w3-center"><b>Contact</b><br/>'.$row['contact_no'].'</p>';
            echo '<p class="w3-center"><b>Degree</b><br/>'.$row['degree'].'</p>';
            echo '<p class="w3-center"><b>Batch</b><br/>'.$row['batch'].'</p>';
            echo '<p class="w3-center"><b>Birthday</b><br/>'.$row['dob'].'</p>';
            echo '<hr>';
	}
    }
	
    
    
     public function editprofile($id,$fname, $lname, $regno, $address, $contact, $nic, $dob, $filepath, $email, $occupation, $batch, $degree, $password){
        $query="SELECT * FROM user where user_id='$id'";
        $oResult = $this->database->query($query);
        $oResult = $this->database->result;
        if($row = mysqli_fetch_object($oResult)){
                $this->userId=$row->user_id;
                //$this->username=$row->username;
                $this->password=$row->password;
                $this->fName=$row->fname;
                $this->lName=$row->lname;
                $this->regNumber=$row->reg_number;
                $this->address=$row->address;
                $this->contactNo=$row->contact_no;
                $this->nic=$row->nic;
                $this->dob=$row->dob;
                //$this->role=$row->role;
                $this->proPic=$row->pro_pic;
                $this->email=$row->email;
                $this->batch=$row->batch;
                $this->occupation=$row->occupation;
                $this->degree=$row->degree;
                $_SESSION['id']=$this;
            //header('Location: home.php');
            
                
        }


 $query1 = "update user set dob='$dob',fname='$fname',lname='$lname',reg_number='$regno',email='$email',contact_no='$contact',nic='$nic',password=SHA1('$password'),address='$address',degree='$degree',batch='$batch',occupation='$occupation'";
    if(isset($filepath)){
	$query1.=",pro_pic='$filepath' ";
	}
	$query1.="where user_id='$id'";
         $this->database->Query($query1);

        if ($this->database->rows > 0) {
            echo "Succesfully updated";
		$_SESSION['pp']=$filepath;
        } else {
            echo "Failed to update";
            echo "<br/>".$this->database->rows;
        }
        
        }
     
     
    public function searchUser($userid,$search){
        $query = "SELECT DISTINCT * FROM (select fname,lname,pro_pic,degree,batch,occupation,user_id,status,sender_id,reciever_id from user left join user_connects_user on (user_id=sender_id or user_id=reciever_id) and (reciever_id=".$userid." or sender_id=".$userid.")) c WHERE  c.user_id<>".$userid." AND (fname LIKE '%$search%' OR lname LIKE '%$search%' OR (fname + lname) LIKE '%$search%') GROUP BY user_id";
        $this->database->Query($query);
        $result = $this->database->result;

        while($row = mysqli_fetch_array($result)){

                $out= '<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
                <img src="'.$row[2].'" alt="Avatar" class="w3-round w3-left w3-border w3-margin-right w3-margin-bottom" style="width:150px;height:150px">';
                if(is_null($row[7]) || $row[7]=="0")
                           $out.= '<span class="w3-right"><a class="w3-theme-d1 w3-round w3-bar-item w3-button w3-hide-small" onclick="sendConnect('.$userid.','.$row[6].',2,this,\''.$row[0].'\')">Connect with <b>'.$row[0].'</b></a></span>';
                else if($row[7]=="1")
                           $out.= '<span class="w3-right"><a class="w3-theme-l4 w3-round w3-bar-item w3-button w3-hide-small" onclick="sendConnect('.$userid.','.$row[6].',0,this,\''.$row[0].'\')">Disconnect from <b>'.$row[0].'</b></a></span>';
                else
                           $out.= '<span class="w3-right"><a class="w3-theme-l4 w3-round w3-bar-item w3-button w3-hide-small" onclick="sendConnect('.$userid.','.$row[6].',0,this,\''.$row[0].'\')">Awaiting Connection from <b>'.$row[0].'</b></a></span>';

                 $out.=   '<b>'.$row[0].' '.$row[1].'</b>
                        <p>'.$row[5].'<br/>'.$row[3].'<br/>'.$row[4].'</p>
                </div>';

                echo $out;
        }
    
    }
    
    public function approveRequest($uid,$oid,$approve){
        $query="UPDATE user_connects_user SET status=$approve WHERE (sender_id=$uid AND reciever_id=$oid) OR (sender_id=$oid AND reciever_id=$uid)";
        if($this->database->Query($query));
            echo "Success!";
    }
    
    public function viewRequests($id){
        $query="SELECT * FROM user_connects_user c,user u WHERE user_id=sender_id AND reciever_id=$id AND status=2";
        $this->database->query($query);
        $result=$this->database->result;
        while($row=mysqli_fetch_array($result)){
         
            $d=new Date();
            $time=$d->time_elapsed_string($row['time']);
            $out=   '<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
                    <img src="'.$row['pro_pic'].'" alt="Avatar" class="w3-left w3-circle w3-margin-right w3-margin-bottom" style="width:60px;height:60px;">
                    <span class="w3-right w3-opacity w3-margin-top"><span class="w3-padding">'.$time.'</span>'.
                    '<input type="button" onclick="approveRequest('.$row['sender_id'].',1,this)" class="w3-button w3-theme-d5" value="Accept"/>&nbsp;'.
                    '&nbsp;<input type="button" onclick="approveRequest('.$row['sender_id'].',0,this)" class="w3-button w3-theme-d5" value="Reject"/>'.
                    '</span><h5>'.$row['fname'].' '.$row['lname'].'</h5></div>';           
            echo $out;
        }
    }
    
    public function connectWith($uid,$oid,$status){
        $query = "INSERT INTO user_connects_user VALUES($uid,$oid,$status,NOW()) ON DUPLICATE KEY UPDATE status=$status ;";
        $query .= "INSERT INTO user_connects_user VALUES($oid,$uid,$status,NOW()) ON DUPLICATE KEY UPDATE status=$status ;";
        
        $this->database->mQuery($query);
            echo "Success!";
    } 
    
    public function loadInbox($id){
        $query= "SELECT * FROM (SELECT m.*,CONCAT(u.fname,' ',u.lname) AS name,u.pro_pic FROM message m,user u WHERE $id in (sender_id,reciever_id) AND user_id<>$id AND user_id in(sender_id,reciever_id) AND sender_id<reciever_id) x  GROUP BY sender_id,reciever_id ORDER BY msg_id DESC";
        $this->database->query($query);
        $result=$this->database->result;
        while($row=mysqli_fetch_array($result)){
         
            $d=new Date();
            $time=$d->time_elapsed_string($row['time']);
            $out=   '<div class="zoom w3-container w3-card w3-white w3-round w3-margin" onclick="loadConversation('.$row['sender_id'].','.$row['reciever_id'].')" style="cursor: pointer;"><br>
                    <img src="'.$row['pro_pic'].'" alt="Avatar" class="w3-left w3-circle w3-margin-right w3-margin-bottom" style="width:60px;height:60px;">
                    <span class="w3-right w3-opacity w3-margin-top"><span class="w3-padding">'.$time.'</span>'.
                    '</span><h5>'.$row['name'].'</h5></div>';           
            echo $out;
        }
    }
    
    
}
