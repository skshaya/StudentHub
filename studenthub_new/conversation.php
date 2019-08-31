<?php
require_once('header.php');
?>

<style>
.zoom {
    transition: transform .2s; /* Animation */
    margin: 0 auto;
}

.zoom:hover {
    transform: scale(1.03); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>
		<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
	<div class="w3-card w3-round w3-white w3-padding">
            <h1 style="margin-left:2%;">Conversation</h1>
            <div class="w3-container">
                <?php
                $uid = $_SESSION["id"]->getUserId();
                $sid=$_POST['sid'];
                $rid=$_POST['rid'];
                $m=new Message();
                $m->loadConversation($sid, $rid, $uid);
                ?>
            </div>
            <div class="w3-padding-16 w3-center">
                <input type="text" class="w3-input" id="msg" autofocus="autofocus" style="display:inline-block;width:90%" placeholder="Enter message.."/>
                <input type="button" value="Send" id="btn" onclick="sendMessage(<?=$rid?>)" class="w3-button w3-round w3-theme-d4"/>
            </div>
        </div>
  </div> 
</div>              


                
<?php
require_once('footer.php');
?>

<script>
    function sendMessage(rid){
        var form_data=new FormData();
        form_data.append("rid",rid);
        form_data.append("content",$("#msg").val());
	$.ajax({
                url: 'sendmessage.php',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         // Setting the data attribute of ajax with file_data
                type: 'post',
				success: function(data)
		    {
				alert(data);
				location.reload();
                    }
       });
    }
    
    $("#msg").change(function(e){
       $("#btn").focus(); 
    });
</script>


            