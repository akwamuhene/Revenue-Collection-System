<?php
	include('../server/conn.php');
	$uid=$_GET['id'];
	$suspend=0;
	mysqli_query($conn,"update `users` set suspend='$suspend' where userid='$uid'");
	
	header('location:https://tcsys.programx.io/admin/collectors.php');

?>