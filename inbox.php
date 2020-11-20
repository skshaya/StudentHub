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
	<div class="w3-card w3-round w3-white w3-padding-16">
            <span class="w3-xxlarge" style="margin-left:2%;diplay:inline-block">Inbox</span>
            <input type="button" id="newconvo" class="w3-button w3-right w3-theme-d2 w3-round w3-margin w3-margin-right w3-padding" value="+ New Conversation"/>
            <div class="w3-container">
                <?php
                $uid = $_SESSION["id"]->getUserId();
                $_SESSION["id"]->loadInbox($uid);
                ?>
            </div>
        </div>
  </div> 
</div>              

<div class="w3-card w3-padding-64" id="rectab" style="left:0%;top:0%;z-index:5;position:fixed;background:rgba(0,0,0,0.7);width:100%;height:100%">                
    <div class="w3-card w3-round w3-white w3-padding-16" style="width:60%;position:fixed;left:20%;top:10%;">
        <span class="w3-xlarge" style="margin-left:3%;display:inline-block">Select Recipient</span>
        <span class="w3-right w3-xlarge" id="rec" style="margin-right:5%;cursor:pointer;"><i class="fa fa-close"></i></span>
        <div class="w3-center" style="max-height:10%;overflow-y: scroll;">
        <div class="w3-padding-16 w3-center">
            <?php
                $uid = $_SESSION["id"]->getUserId();
                $m=new Message();
                $m->loadRecipients($uid);
            ?>
        </div>  
        </div>
    </div>   
</div>
<script>
        $("#rectab").hide();
        
    function loadConversation(sid,rid){
	var url = 'conversation.php';
	var form = $('<form action="' + url + '" method="post">' +
		'<input type="text" name="sid" value="' + sid + '" />' +
                '<input type="text" name="rid" value="' + rid + '" />'+
		'</form>');
		$('body').append(form);
		form.submit();
    }
    
    $("#rec").click(function(e){
        if($("#rectab").is(":visible"))
            $("#rectab").hide();
    })
    
    $("#newconvo").click(function(e){
        $("#rectab").show();
    });    
</script>
                
<?php
require_once('footer.php');
?>


            