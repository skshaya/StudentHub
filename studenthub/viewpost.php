<?php
	require_once('header.php');
?>
<!-- Page Container -->
<div class="w3-container w3-content center" style="max-width:1000px;margin-top:80px">    
  <!-- The Grid -->
         
<?php
    $id = $_SESSION['id']->getUserId();
    if(isset($_POST['pid']))
        $post_id=$_POST['pid'];
    else
        $post_id=$_GET['pid'];
    
    if(isset($_POST['type']))
        $type=$_POST['type'];
    else
        $type="achieve";
        
    if($type=="event"){
        $event=new Event();
        $event->viewEvent($id,$post_id);
    }
    else if($type=="achieve"){
        $achieve=new Achievement();
        $achieve->viewAchievement($id,$post_id);
    }
    else if($type=="vacancy"){
        $vacancy=new Vacancy();
        $vacancy->viewVacancy($id,$post_id);
    }
?>
		<div id="comments" onload="loadComments(<?php echo $post_id.",".$id; ?>);"> 
                    <div class="w3-container w3-card w3-white w3-round w3-margin  w3-padding-large">
			<input type="text" id="user_comment" class="w3-input w3-left" style="width:80%" placeholder="Add Your Comment.."/>
                        <input type="button" value="Comment" class="w3-button w3-theme-d1 w3-right" onclick="addComment(<?php echo $post_id.",".$id;?>,);"/>
                    </div>
		</div>
  </div>

<br/><br/><br/>

<script>
        loadComments(<?php echo $post_id.",".$id; ?>);
        
	function loadComments(pid,uid){
            $.post("loadcomments.php",{post_id: pid,user_id: uid},function(data,status){
                   document.getElementById("comments").innerHTML='<div class="w3-container w3-card w3-white w3-round w3-margin  w3-padding-large">'+
                             '<input type="text" id="user_comment" class="w3-input w3-left" style="width:80%" placeholder="Add Your Comment.."/>'+
                             '<input type="button" value="Comment" class="w3-button w3-theme-d1 w3-right" onclick="addComment(<?php echo $post_id.",".$id;?>,);"/></div>';
                    document.getElementById("comments").innerHTML+=data;
            });
        }
        
        function addComment(pid,uid){
            cmt = $("#user_comment").val();
            $.post("addcomment.php",{post_id: pid,user_id:uid,comment: cmt},function(data,status){
                    alert(data);
                    loadComments(<?php echo $post_id.",".$id; ?>);
            });
        }
        
        function deleteComment(cid){
            $.post("deletecomment.php",{cid: cid},function(data,status){
                    alert(data);
                    loadComments(<?php echo $post_id.",".$id; ?>);
            });
        }
	
</script>

<?php 
	//add footer
	require_once('footer.php');
?>
 
</body></html>