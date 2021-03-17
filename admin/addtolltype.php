<?php
	include('../server/conn.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$tolltype=mysqli_real_escape_string($conn, trim($_POST['tolltype']));
	$revhead=mysqli_real_escape_string($conn, trim($_POST['revhead']));

	$sql = "SELECT tolltype FROM tolltype WHERE tolltype = '$tolltype'";
            $result = mysqli_query($conn, $sql);
            
            // This is to check whether the query results was TRUE(exist) or FALSE(Does not exist)
            $Check = mysqli_num_rows($result);
            if ($Check > 0) {
            	?>
              <script>
              		window.alert('Revenue already exists!');
              		window.location='https://tcsys.programx.io/admin/';
              </script>
                <?php
            }else{
	
	mysqli_query($conn,"insert into tolltype(tolltype, subhead) values ('$tolltype','$revhead')");
	$tolltypeid=mysqli_insert_id($conn);
	?>
		<script>
			window.alert('Revenue added successfully!');
			window.location='https://tcsys.programx.io/admin/';
		</script>
	<?php
	}
}
?>