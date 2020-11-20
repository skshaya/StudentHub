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
	
	
	
	
$query = "SELECT * FROM user";
if($result = mysqli_query($link, $query)){
	   
	    if(mysqli_num_rows($result) > 0){
			 echo '<table class="w3-table">';
			 echo '<thead>
			<tr>
				<th>User Name</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Date OF Birth</th>
				<th>NIC</th>
				<th>Email</th>
				<th>Phone No</th>
				<th>Degree</th>
				<th>Batch</th>
				<th>Occupation</th>
				
			</tr>
		</thead>';
	        while($row = mysqli_fetch_array($result)) {
			echo '<tr>
					<td>'.$row['username'].'</td>
					<td>'.$row['f_name'].'</td>
					<td>'.$row['l_name'].'</td>
					<td>'.$row['dob']. '</td>
					<td>'.$row['nic'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['contact_no'].'</td>
					<td>'.$row['degree'].'</td>
					<td>'.$row['batch'].'</td>
					<td>'.$row['occupation'].'</td>
				</tr>';
			
				
	
    
}
 echo '</table>';
 mysqli_free_result($result);
 		
	    } else{
	        echo "No records.";
	    }
		
	} else{
	    echo "ERROR" . mysqli_error($link);
	}



?>
</div></div></div></div>
<?php require_once("footer.php")?>