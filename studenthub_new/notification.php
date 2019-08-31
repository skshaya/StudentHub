<?php 
	require_once('header.php');
?>
		<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
	<div class="w3-card w3-round w3-white">
        <div class="w3-container">
		
<?php
	
	$link = mysqli_connect("localhost", "root", '', "studenthub");
	 
	// Check connection
	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	//$id=$_SESSION['id']; 
  
	$sql ="SELECT caption, image, start_time, end_time, venue FROM post INNER JOIN post_has_image ON post.post_id = post_has_image.post_id INNER JOIN event ON post.post_id = event.post_id WHERE post_type='event' and start_time >= Now()"; 
	if($result = mysqli_query($link, $sql)){
	    if(mysqli_num_rows($result) > 0){
			
	        while($row = mysqli_fetch_array($result)){
				echo '<p><div class="w3-col m2 fixme">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container"><br>';
	            //echo "<tr>";
					 echo "";	 
	                 echo "<p>Upcoming Events:</p>";
					 echo '<p class="w3-center"><img src="'.$row['image'].'" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p><hr>';
					
					  
					echo "<p><strong>" . $row['caption']. "</strong></p>";
					echo '<p><b>Place: </b>' . $row['venue']. '</p>';
					echo '<p class="w3-center"><b>Start at </b>' . $row['start_time']. '</p>';
					echo '<p class="w3-center"><b>End at </b>' . $row['end_time']. '</p><br>';
					
          
   echo "</div>
      </div>
      <br>
   
    </div></p>";
	        }
	        mysqli_free_result($result);
	    } else{
	        echo "<br/>No Upcoming Events<br/><br/>";
	    }
	} else{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	 
	// Close connection
	mysqli_close($link);
	?>
			</div>
		</div>
	</div>
</div>	
	<?php 
	//add footer
	require_once('footer.php');
?>














