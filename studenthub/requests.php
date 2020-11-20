<?php
require_once('header.php');
?>

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
	<div class="w3-card w3-round w3-white w3-padding-16">
            <span class="w3-xlarge" style="margin-left:2%;diplay:inline-block">Connection Requests</span>
            <div class="w3-container">
                <?php
                $uid = $_SESSION["id"]->getUserId();
                $_SESSION["id"]->viewRequests($uid);
                ?>
            </div>
        </div>
  </div> 
</div>              

<script>
    function approveRequest(oid,approve,obj){
	var form_data = new FormData();                  // Creating object of FormData class
	form_data.append("oid",oid);             // Appending parameter named file with properties of file_field to form_data
	form_data.append("approve",approve);
	$.ajax({
                url: 'sendapprove.php',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         // Setting the data attribute of ajax with file_data
                type: 'post',
				success: function(data)
		        {
                                alert(data);
                                obj.parentNode.parentNode.style="display:none";
			}
	});
    }
</script>
                
<?php
require_once('footer.php');
?>


            

