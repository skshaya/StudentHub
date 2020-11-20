<?php require_once 'header.php';?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
  <!-- The Grid -->
  <div class="w3-row">
	<div class="w3-card w3-round w3-white">
        <div class="w3-container w3-padding">

<?php
$link = mysqli_connect("localhost", "root", '', "studenthub");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$query = "SELECT * FROM user u,general g WHERE g.user_id=u.user_id AND verified is NULL";
if ($result = mysqli_query($link, $query)) {

    if (mysqli_num_rows($result) > 0) {
        echo '<table class="w3-table-all w3-card w3-small">';
        echo '
			<tr class="w3-theme-d2">
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
				<th style="text-align:center;"  colspan="2">Verification</th>
			</tr>
		';
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
					<td>' . $row['username'] . '</td>
					<td>' . $row['fname'] . '</td>
					<td>' . $row['lname'] . '</td>
					<td>' . $row['dob'] . '</td>
					<td>' . $row['nic'] . '</td>
					<td>' . $row['email'] . '</td>
					<td>' . $row['contact_no'] . '</td>
					<td>' . $row['degree'] . '</td>
					<td>' . $row['batch'] . '</td>
					<td>' . $row['occupation'] . '</td>';

            ?>

					<td><button class="w3-button w3-green w3-hover-dark-grey" <?php if ($row['verified'] == '1'){ ?> disabled <?php   } ?> onclick="onAccept(<?php echo $row['user_id']; ?>)">Accept</button></td>
					<td><button class="w3-button w3-red w3-hover-dark-grey" <?php if ($row['verified'] == '2'){ ?> disabled <?php   } ?> onclick="onReject(<?php echo $row['user_id']; ?>)">Reject</button></td>



				</tr>

		<?php
}

        echo '</table>';

        // mysqli_free_result($result);

    } else {
        echo "No records.";
    }

} else {
    echo "ERROR" . mysqli_error($link);
}

?>
</div>
</div>
</div>
</div>

<script type="text/javascript">
   function onAccept(user_id) {
    	$.ajax({
        url:"verification.php",
        type: "POST",
		data: { id: user_id, status: 1 },
        success:function(result, html){
         alert(result);
		 location.reload();
       	}
     	});
   }

	 function onReject(user_id) {
    	$.ajax({
        url:"verification.php",
        type: "POST",
		data: { id: user_id, status: 2 },
        success:function(result, html){
         alert(result);
		 location.reload();
       	}
     	});
 	}

   
</script>



<?php require_once "footer.php"?>