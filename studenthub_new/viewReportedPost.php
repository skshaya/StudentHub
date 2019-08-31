<?php
require_once('header.php');
?>
<!-- Page Container -->
<div class="w3-container w3-content center" style="max-width:1000px;margin-top:80px">
    <!-- The Grid -->
  <div class="w3-row">
	<div class="w3-card w3-round w3-white w3-padding">
            <h1 style="margin-left:2%;">Reported Posts</h1>
            <div class="w3-container">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "studenthub";

// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM user_reports_post";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        ?>
        <form action="deleteReportedPost.php" method="GET">
            <table style="width:100%" class="w3-table w3-border">
                <tr class="w3-theme-d5">
                    <th>user_id</th>
                    <th>post_id</th> 
                    <th>time</th>
                    <th>View Post</th>
                    <th>Action</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <tr>
                        <td><?php echo $row["user_id"]; ?></td>
                        <td><?php echo $row["post_id"]; ?></td> 
                        <td><?php echo $row["time"]; ?></td>
                        <td><a href="viewpost.php?pid=<?php echo $row['post_id'];?>">View</a></td>
                        <td><a href="deleteReportedPost.php?post_id=<?php echo $row['post_id'];?>">Delete</a></td>
                    </tr>

                    <?php
                }
            } else {
                echo "0 results";
            }

            mysqli_close($conn);
            ?>
        </table>
    </form>
</div>
        </div>
  </div>
<br/><br/><br/>
  
<?php
//add footer
require_once('footer.php');
?>

</body></html>