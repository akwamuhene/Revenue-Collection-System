<?php
	include('../server/conn.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$area=mysqli_real_escape_string($conn, trim($_POST['area']));

	$sql = "SELECT area FROM area WHERE area = '$area'";
            $result = mysqli_query($conn, $sql);
            
            // This is to check whether the query results was TRUE(exist) or FALSE(Does not exist)
            $Check = mysqli_num_rows($result);
            if ($Check > 0) {
            	?>
              <script>
              		window.alert('Area already exists!');
              		window.location='https://tcsys.programx.io/admin/';
              </script>
                <?php
            }else{
	
	mysqli_query($conn,"insert into area(area) values ('$area')");
	$areaid=mysqli_insert_id($conn);
	mysqli_query($conn,"insert into areatotal(areaid, amount) values ('$areaid', '0')");
	
	?>
		<script>
			window.alert('Area added successfully!');
			window.location='https://tcsys.programx.io/admin/';
		</script>
	<?php
	}
}
?>