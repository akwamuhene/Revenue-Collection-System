<?php
session_start();
include('conn.php');
error_reporting(0);
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$user = mysqli_real_escape_string($conn, trim($_POST['username']));
		$pass = mysqli_real_escape_string($conn, trim($_POST['password']));
		$area = mysqli_real_escape_string($conn, trim($_POST['area']));
		$year = mysqli_real_escape_string($conn, trim($_POST['year']));
		
		$equery=mysqli_query($conn,"select * from `users` where user='$user'");
		$numrows = mysqli_num_rows($equery);
		
		while($row = mysqli_fetch_array($equery)){
		$dbpass = $row['pass'];
		$access = $row['access'];
		$userid = $row['userid'];
		$hash = $dbpass;
		}
		
		
		$dehash = password_verify($pass, $hash);
		
			if ($dehash == 1 & $access==1 & (!empty($year))){
			        $query=mysqli_query($conn,"select * from `years` where year=$year");
		
            		if(mysqli_num_rows($query)==0){
            		    mysqli_query($conn, "INSERT INTO years(year) VALUES('$year')");
            		}
				$_SESSION['id']=$userid;
				$_SESSION['year']=$year;
				header('location: ../admin/');

			}if ($dehash == 1 & $access==2 & (!empty($area))){
			    mysqli_query($conn, "UPDATE `users` SET areaid = '$area' WHERE user='$user'");
				$_SESSION['id']=$userid;
				header('location: ../index.php');
			}
			else{
			$_SESSION['msg'] = "Login Failed, Invalid Input!";
			echo "<script>alert('Login Failed, Wrong Credentials'); window.location='https://tcsys.programx.io/login/'</script>";
	        }
	        
	}
?>