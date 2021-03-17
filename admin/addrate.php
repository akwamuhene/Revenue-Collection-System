<?php
	include('../server/conn.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$rate=mysqli_real_escape_string($conn, trim($_POST['rate']));

	$sql = "SELECT rate FROM rates WHERE rate = '$rate'";
            $result = mysqli_query($conn, $sql);
            
            // This is to check whether the query results was TRUE(exist) or FALSE(Does not exist)
            $Check = mysqli_num_rows($result);
            if ($Check > 0) {
            	?>
              <script>
              		window.alert('Rate already exists!');
              		window.location='https://tcsys.programx.io/admin/';
              </script>
                <?php
            }else{
	
	mysqli_query($conn,"insert into rates(rate) values ('$rate')");
	$rateid=mysqli_insert_id($conn);
	?>
		<script>
			window.alert('Rate added successfully!');
			window.location='https://tcsys.programx.io/admin/';
		</script>
	<?php
	}
}
?>