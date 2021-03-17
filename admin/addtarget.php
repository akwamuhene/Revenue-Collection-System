<?php
	include('../server/conn.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$userid=mysqli_real_escape_string($conn, trim($_POST['userid']));
	$target=mysqli_real_escape_string($conn, trim($_POST['target']));

	$sql = "SELECT userid FROM targets WHERE userid = '$userid' and month(`moment`) = MONTH(CURDATE()) and year(`moment`)=YEAR(CURDATE())";
            $result = mysqli_query($conn, $sql);
            
            // This is to check whether the query results was TRUE(exist) or FALSE(Does not exist)
            $Check = mysqli_num_rows($result);
            if ($Check > 0) {
            	?>
              <script>
              		window.alert('Selected user already has a target for this month!');
              		window.location='https://tcsys.programx.io/admin/targets.php';
              </script>
                <?php
            }else{
	
	mysqli_query($conn,"insert into targets(userid, colltotal, target, moment) values ('$userid','0','$target',NOW())");
	
	?>
		<script>
			window.alert('Target added successfully!');
			window.location='https://tcsys.programx.io/admin/targets.php';
		</script>
	<?php
	}
}
?>