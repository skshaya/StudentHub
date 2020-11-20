<?php
require_once('header.php');
?>
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3 fixme">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">Welcome! <?= $fname ?></h4>
         <p class="w3-center"><img src="<?= $pp ?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i><?= $occ ?></p>
         <p><i class="fa fa-graduation-cap fa-fw w3-margin-right w3-text-theme"></i><?= $batch ?></p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i><?= $dob ?></p>
        </div>
      </div>
      <br>
      
      <!-- Interests --> 
      <div class="w3-card w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <p>Interests</p>
          <p>
            <span class="w3-tag w3-small w3-theme-d5">News</span>
            <span class="w3-tag w3-small w3-theme-d4">W3Schools</span>
            <span class="w3-tag w3-small w3-theme-d3">Labels</span>
            <span class="w3-tag w3-small w3-theme-d2">Games</span>
            <span class="w3-tag w3-small w3-theme-d1">Friends</span>
            <span class="w3-tag w3-small w3-theme">Games</span>
            <span class="w3-tag w3-small w3-theme-l1">Friends</span>
            <span class="w3-tag w3-small w3-theme-l2">Food</span>
            <span class="w3-tag w3-small w3-theme-l3">Design</span>
            <span class="w3-tag w3-small w3-theme-l4">Art</span>
            <span class="w3-tag w3-small w3-theme-l5">Photos</span>
          </p>
        </div>
      </div>
      <br>
      
      <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>People are looking at your profile. Find out who.</p>
      </div>
    
    <!-- End Left Column -->
    </div>
	<div class="w3-col m9">     
    <div class="w3-row-padding">
        <div class="w3-col m12">
             <div class="w3-bar w3-black">
                <button class="w3-bar-item w3-button" onclick="openType('event')">Event</button>
                <button class="w3-bar-item w3-button" onclick="openType('achieve')">Achieve</button>
                <button class="w3-bar-item w3-button" onclick="openType('vacancy')">Vacancy</button>
            </div> 
          <div class="w3-card w3-round w3-white" id="status">
              
          </div>
        </div>
      </div>
		<div id="posts" onload="loadPosts();"> 
			
		</div>
	</div>
  </div>
  
<!-- End Page Container -->
</div>
<br>

<?php 
	//add footer
	require_once('footer.php');
?>

<script>
    
    myid=<?= $userid ?>;
    selection="event";
 
$(document).ready(function(){
    openType("event");
});
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

document.getElementById("imgup").style='padding-bottom:5px;';
document.getElementById("imgup").style.display="none";


function statusChange(){
	switch(selection) {   
    case "event":{
        document.getElementById("status").innerHTML='<div class="w3-container w3-padding">'+
              '<h6 class="w3-opacity">Let your event be known!</h6>'+
              '<p class="w3-border w3-padding" id="content" style="color:grey;" contenteditable="true" onclick="this.innerHTML=\'\';this.style=\'color:black\';">Post a status..</p>'+
              '<div id="imgup"><input id="img" type="file" name="avatar" class="w3-input w3-theme-l3"></div>'+
              '<br/><button type="button" onclick="postStatus();" class="w3-button w3-theme"><i class="fa fa-pencil"></i> &nbsp;Post</button></div>';    
        document.getElementById("imgup").style.display="block";
        document.getElementById("imgup").innerHTML+="<div style='display:block;padding:5px;' class='w3-theme-d1'><span>From  <input type='date' id='sDate'/><input type='time' id='sTime'/></span><span style='float:right;'>To <input type='date' id='eDate'/><input type='time' id='eTime'/></span></div>";
        document.getElementById("imgup").innerHTML+="<div style='display:block;padding:5px;' class='w3-theme-d1'>Venue <input id='venue' type='text'/></div>";
    }
        break;
    case "vacancy":{
        document.getElementById("status").innerHTML='<div class="w3-container w3-padding">'+
              '<h6 class="w3-opacity">Got a vacancy avialable at your workplace?</h6>'+
              '<p class="w3-border w3-padding" id="content" style="color:grey;" contenteditable="true" onclick="this.innerHTML=\'&nbsp;\';this.style=\'color:black\';">Post a status..</p>'+
              '<div id="imgup"><input id="img" type="file" name="avatar" class="w3-input w3-theme-l3"></div>'+
              '<br/><button type="button" onclick="postStatus();" class="w3-button w3-theme"><i class="fa fa-pencil"></i> &nbsp;Post</button></div>';        
        document.getElementById("imgup").style.display="block";
        document.getElementById("imgup").innerHTML+="<div style='display:block;padding:5px;' class='w3-theme-d1'>Position <input id='pos' type='text'/></div>";
    }
        break;
    case "achieve":{
        document.getElementById("status").innerHTML='<div class="w3-container w3-padding">'+
              '<h6 class="w3-opacity">Tell you friends about your achievement!</h6>'+
              '<p class="w3-border w3-padding" id="content" style="color:grey;" contenteditable="true" onclick="this.innerHTML=\'&nbsp;\';this.style=\'color:black\';">Post a status..</p>'+
              '<div id="imgup"><input id="img" type="file" name="avatar" class="w3-input w3-theme-l3"></div>'+
              '<br/><button type="button" onclick="postStatus();" class="w3-button w3-theme"><i class="fa fa-pencil"></i> &nbsp;Post</button></div>';    
        document.getElementById("imgup").style.display="block";
        document.getElementById("imgup").innerHTML+="<div style='display:block;padding:5px;' class='w3-theme-d1'><span>Date <input type='date' id='aDate'/></span></div>";
    }
        break;
	default:{
        document.getElementById("imgup").innerHTML+="<div style='display:block;padding:5px;' class='w3-theme-d1'>Position <input id='pos' type='text'/></div>";
    }
} 
	
}

function postStatus(){
	myst=document.getElementById("content").innerHTML;
	//myst=myst.substring(0,myst.length-4);
        	
	if(myst=="" || myst=="Post a status.." || myst=="&n"){
		alert("Please enter your status");
		return;
	}
	
	var form_data = new FormData();
        
        if($("#img").val()) { //if there is an image
		var file_data = $("#img").prop("files")[0];
		form_data.append("image", file_data); 
	}
	
	form_data.append("id", myid);
	form_data.append("content", myst);
        form_data.append("type",selection);
        
        if(selection=="event"){
            if(!$("#sDate").val()){
                alert("Please Enter a Start Date");
                $("#sDate").focus();
                return;
            }
            if(!$("#sTime").val()){
                alert("Please Enter a Start Time");
                $("#sTime").focus();
                return;
            }
            if(!$("#venue").val()){
                alert("Please Enter a Venue");
                $("#venue").focus();
                return;
            }
            sTime=$("#sDate").val()+" "+$("#sTime").val()+":00";
            eTime=$("#eDate").val()+" "+$("#eTime").val()+":00";
            venue=$("#venue").val();
            form_data.append("startTime",sTime);
            form_data.append("endTime",eTime);
            form_data.append("venue",venue);
        }else if(selection=="achieve"){
            if(!$("#aDate").val()){
                alert("Please Enter a Date");
                $("#aDate").focus();
                return;
            }
            aTime=$("#aDate").val();
            form_data.append("aDate",aTime);
        }else if(selection=="vacancy"){
            if(!$("#pos").val()){
                alert("Please Enter Job Position");
                $("#pos").focus();
                return;
            }
            pos=$("#pos").val();
            form_data.append("pos",pos);
        }
        
	$.ajax({
                url: 'addstatus.php',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
				success: function(data)
		    {
				alert(data);
				document.getElementById("content").innerHTML="Post a status..";
				document.getElementById("content").style="color:grey";
				loadPosts();
			}
       });
}

function openType(typeName) {
    selection=typeName;
    statusChange();
    loadPosts();
}

function viewPost(pid,type){
	var url = 'viewpost.php';
	var form = $('<form action="' + url + '" method="post">' +
		'<input type="text" name="pid" value="' + pid + '" />' +
                '<input type="text" name="type" value="' + type + '" />'+
		'</form>');
		$('body').append(form);
		form.submit();
}

function loadPosts(){
	$.post("loadposts.php",{id: myid,type:selection},function(data,status){
		document.getElementById("posts").innerHTML=data;
	});
}

function deletePost(pid){
	var form_data = new FormData();                  // Creating object of FormData class
	form_data.append("post_id",pid);                 // Adding extra parameters to form_data
	$.ajax({
                url: 'deletepost.php',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         // Setting the data attribute of ajax with file_data
                type: 'post',
				success: function(data)
		    {
				alert(data);
				loadPosts();
			}
       });
}

function reportPost(pid,uid){
	var form_data = new FormData();                  // Creating object of FormData class
	form_data.append("post_id",pid);
	form_data.append("user_id",uid);
	// Adding extra parameters to form_data
	$.ajax({
                url: 'reportpost.php',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         // Setting the data attribute of ajax with file_data
                type: 'post',
				success: function(data)
		    {
				alert(data);
				loadPosts();
			}
       });
}

function likePost(pid,uid,tag){
	var form_data = new FormData();                  // Creating object of FormData class
	form_data.append("uid",uid);             // Appending parameter named file with properties of file_field to form_data
	form_data.append("pid",pid);
	$.ajax({
                url: 'userlikepost.php',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         // Setting the data attribute of ajax with file_data
                type: 'post',
				success: function(data)
		    {
				if(tag.innerHTML.includes("Like")){
                                    tag.innerHTML="Unlike";
                                }else{
                                    tag.innerHTML="Like";
                                }
			}
	});
}
</script>


 
</body></html>