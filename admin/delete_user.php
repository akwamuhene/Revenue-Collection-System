<?php
	include('../server/conn.php');
	$uid=$_GET['id'];
	
	$a=mysqli_query($conn,"select * from users where userid='$uid'");
	$b=mysqli_fetch_array($a);
	
	mysqli_query($conn,"delete from users where userid='$uid'");
	mysqli_query($conn,"delete from targets where userid='$uid'");
	
	header('location:https://tcsys.programx.io/admin/collectors.php');

?>