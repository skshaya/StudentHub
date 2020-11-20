<?php

                spl_autoload_register(function ($class_name) {
                     include 'classes/'.$class_name . '.php';
                });
                
require_once('header.php');
$search=$_GET['q'];
?>

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">   
 <div class="w3-row">

 <div class="w3-margin-left"><h4>Search results for <i>'<?=$search?>'</i></h4></div>
<?php
    $id->searchUser($userid,$search);
?>
<hr>
<div class="w3-small" style="text-align:center;color:grey;">- End Of Results -</div>
<hr>
</div>
</div>

<script>
function sendConnect(uid,oid,status,tag,name){
	var form_data = new FormData();                  // Creating object of FormData class
	form_data.append("uid",uid);             // Appending parameter named file with properties of file_field to form_data
	form_data.append("oid",oid);
	form_data.append("status",status);
	$.ajax({
                url: 'sendconnect.php',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         // Setting the data attribute of ajax with file_data
                type: 'post',
				success: function(data)
		    {
				if(data.includes("Success")){
					alert("Success");
					if(status=="0"){
						tag.parentElement.innerHTML='<a class="w3-theme-d1 w3-round w3-bar-item w3-button w3-hide-small" onclick="sendConnect('+uid+','+oid+',2,this,\''+name+'\')">Connect with <b>'+name+'</b></a></span>';
					}else if(status=="1"){
						tag.parentElement.innerHTML='<a class="w3-theme-l4 w3-round w3-bar-item w3-button w3-hide-small" onclick="sendConnect('+uid+','+oid+',0,this,\''+name+'\')">Disconnect from <b>'+name+'</b></a></span>';
					}
                                        else{
                                                tag.parentElement.innerHTML='<a class="w3-theme-l4 w3-round w3-bar-item w3-button w3-hide-small" onclick="sendConnect('+uid+','+oid+',0,this,\''+name+'\')">Awaiting Connection from <b>'+name+'</b></a></span>';
                                        }
				}
			}
	});
}
</script>

<?php
	require_once('footer.php');
?>


