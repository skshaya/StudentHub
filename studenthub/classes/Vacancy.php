<?php

class Vacancy extends Post{
    
    private $position;
    public $database;
    
    public function __construct(){
        $this->database=new Database();
    }
    
    public function getPosition() {
        return $this->position;
    }

    public function setPosition($position) {
        $this->position = $position;
    }

    public function loadVacancies($id){
        $query= "SELECT DISTINCT p.*,fname,lname,pro_pic,"
                . "(SELECT liked FROM user_likes_post ulp WHERE ulp.user_id=$id AND p.post_id=ulp.post_id) AS liked "
                    . "FROM (SELECT x.*,position,image FROM post x,vacancy y,post_has_image z  WHERE x.post_id=y.post_id AND x.post_id=z.post_id) p,user u "
                    . "WHERE p.user_id='$id' AND p.user_id=u.user_id OR p.user_id IN(SELECT DISTINCT reciever_id FROM user_connects_user WHERE sender_id='$id' AND status='1' GROUP BY reciever_id) AND p.user_id=u.user_id OR p.user_id IN(SELECT DISTINCT sender_id FROM user_connects_user WHERE reciever_id='$id' AND status='1' GROUP BY sender_id) AND p.user_id=u.user_id GROUP BY p.post_id ORDER BY p.added_time DESC ";
            $result = $this->database->query($query);
            $result = $this->database->result;
            
            while ($row=mysqli_fetch_array($result)){
		$out= '<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
                       <img src="'.$row['pro_pic'].'" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px;height:60px;">
                       <span class="w3-right w3-opacity"><span class="w3-padding">'.$row['added_time'].'</span>
                       <span class="w3-button" onclick="reportPost('.$row['post_id'].','.$id.')"><i class="fa fa-exclamation-triangle"></i></span>';
                
                if($id==$row['user_id']){
                        $out.='<span class="w3-button" onclick="deletePost('.$row['post_id'].')"><i class="fa fa-trash"></i></span>';
                }
                
		$out.='</span><h5>'.$row['fname'].' '.$row['lname'].'</h5>
                       <hr class="w3-clear">
                       <div style="padding-left:6px;padding-right:6px;"><p>'.$row['caption'].'</p></div>';
                
                if($row['image']!="NULL"){
                                $out.='<div class="w3-row-padding" style="margin:0 -16px">
                                <img src="'.$row['image'].'" style="width:95%;" class="w3-margin-bottom center">
                                </div>';
                }
                
                 $out.='<button type="button" class="w3-button w3-theme-d1 w3-margin-bottom" onclick="likePost('.$row['post_id'].','.$id.',this)"><i class="fa fa-thumbs-up"></i> &nbsp;';
                if($row['liked']==0)
                $out.='Like';
                else
                $out.='Unlike';
                $out.='</button> 
                       <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom" onclick="viewPost('.$row['post_id'].',\'achieve\');"><i class="fa fa-comment"></i> &nbsp;Comment</button> 
                       </div>';
		
		echo $out;
        }
    
    }
    
    public function addVacancy($caption,$postType,$userId,$pos,$image){
     
        $query="CALL new_vacancy('$caption','$postType',$userId,'$pos','$image');";
        
        $this->database->Query($query);
        echo "Successfully Added Post!";
  
    }
    
    public function viewVacancy($id,$post_id){
        $sql = "SELECT p.*,u.user_id,pro_pic,CONCAT(fname,' ',lname) as name,x.image as image,"
                . "(SELECT liked FROM user_likes_post ulp WHERE ulp.user_id=$id AND p.post_id=ulp.post_id) AS liked "
                . "FROM post p,user u,post_has_image x WHERE p.post_id=$post_id AND u.user_id=p.user_id AND p.post_id=x.post_id";
        $this->database->query($sql);
        $result = $this->database->result;
        while ($row = mysqli_fetch_array($result)) {
            $out = '<div class="w3-container w3-card w3-white w3-round w3-margin" style="width:100%"><br>
        <img src="' . $row['pro_pic'] . '" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px;height:60px;">
        <span class="w3-right w3-opacity"><span class="w3-padding">' . $row['added_time'] . '</span>
		<span class="w3-button" onclick="reportPost(' . $row['post_id'] . ',' . $id . ')"><i class="fa fa-exclamation-triangle"></i></span>';
            if ($id == $row['user_id']) {
                $out .= '<span class="w3-button" onclick="deletePost(' . $row['post_id'] . ')"><i class="fa fa-trash"></i></span>';
            }
            $out .= '
		</span>
        <h5>' . $row['name'] . '</h5>
        <hr class="w3-clear">
        <div style="padding-left:6px;padding-right:6px;"><p>' . $row['caption'] . '</p></div>';
            if ($row['image'] != "NULL") {
                $out .= '<div class="w3-row-padding" style="margin:0 -16px">
            <img src="' . $row['image'] . '" style="width:95%;" class="w3-margin-bottom center">
			</div>';
            }
             $out.='<button type="button" class="w3-button w3-theme-d1 w3-margin-bottom" onclick="likePost('.$row['post_id'].','.$id.',this)"><i class="fa fa-thumbs-up"></i> &nbsp;';
                if($row['liked']==0)
                $out.='Like';
                else
                $out.='Unlike';
                $out.='</button> 
                       </div>';

            echo $out;
        }
    }
    
}
