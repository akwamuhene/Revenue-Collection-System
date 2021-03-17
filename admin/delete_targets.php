<?php
	include('../server/conn.php');
	$uid=$_GET['id'];
	
	$a=mysqli_query($conn,"select * from targets where targid='$uid'");
	$b=mysqli_fetch_array($a);
	
	mysqli_query($conn,"delete from targets where targid='$uid'");
	
	header('location: https://tcsys.program-x.io/admin/targets.php');

?>