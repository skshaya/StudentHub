<?php require_once('header.php');?>

		<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
	<div class="w3-card w3-round w3-white">
        <div class="w3-container w3-padding">


<?php
	
	
	$link = mysqli_connect("localhost", "root", '', "alumnihub");
	 
	// Check connection
	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	
	
	
$query = "SELECT * FROM post";
if($result = mysqli_query($link, $query)){
	   
	    if(mysqli_num_rows($result) > 0){
			 echo '<table class="w3-table">';
			 echo '<thead>
			<tr>
				<th>ID</th>
				<th>Type</th>
				<th>Content</th>
				<th>Time</th>
				<th>user_id</th>
			
				
			</tr>
		</thead>';
	        while($row = mysqli_fetch_array($result)) {
			echo '<tr>
					<td>'.$row['post_id']. '</td>
					<td>'.$row['type'].'</td>
					<td>'.$row['content'].'</td>
					<td>'.$row['time'].'</td>
					<td>'.$row['user_id'].'</td>
					
				</tr>';
			
				
	
    
}
 echo '</table>';
 mysqli_free_result($result);
 		
	    } else{
	        echo "No records matching your query were found.";
	    }
		
	} else{
	    echo "ERROR: Could not able to execute $query. " . mysqli_error($link);
	}



?>
</div></div></div></div>
<?php require_once("footer.php")?>

