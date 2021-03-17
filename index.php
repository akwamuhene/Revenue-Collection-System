<?php
session_start();
include('./server/conn.php');
if(!isset($_SESSION['id'])){
 header('Location: ./login');
		die();
}

include_once (__DIR__.'/server/ZenophSMSGH/lib/ZenophSMSGH.php');
$queryuser = $conn->query("SELECT * FROM `users`  WHERE `userid` = '$_SESSION[id]'") or die(mysqli_error());
$loggeduser = $queryuser->fetch_array();
$userid=$loggeduser['userid'];
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../img/logo.svg"/>
	<title>Birim Central Municipal Assembly</title>
	<!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="plugins/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/search.css">
	<link rel="stylesheet" type="text/css" href="fonts/fontawesome/css/1994.css">
	<link rel="stylesheet" type="text/css" href="plugins/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
</head>
<body>
	<div class="col-lg-12 text-white col-sm-12 bg-info">
		<div class="container">
		<div class="row">
			<h4 class="text-center text-white logo">BCMA 3.0</h4> 
			    <div class="dropdown settings">
				  <a class="btn btn-default text-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    o o o
				  </a>

				  <div class="dropdown-menu droposition" aria-labelledby="dropdownMenuLink">
				    <a class="dropdown-item" href="#"><i class="fas fa-user"></i> <?php echo $loggeduser['fname']; ?></a>
				    <a class="dropdown-item" href="./docs/RCM.pdf"><i class="fas fa-question-circle"></i> Help</a>
				    <a class="dropdown-item" href="./server/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
				  </div>
				</div>
			</div>
		</div><br>
		<div class="col-sm-12 responsive">
		<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">HOME</a>
		  </li>
		  <li class="nav-item">
	      <?php
            $tcount="Select (select count(*)as count from tolltable where date(`moment`)=(CURDATE()) and `userid`=$userid) + (select count(*)as count from ratetable where date(`moment`)=(CURDATE()) and `userid`=$userid) as totalcount from dual";
            $result=$conn->query($tcount);
            $tcount=mysqli_fetch_assoc($result)["totalcount"];
            ?>
		    <a class="nav-link" id="daily-tab" data-toggle="tab" href="#daily" role="tab" aria-controls="daily" aria-selected="false">TODAY <span class="badge badge-success rounded-circle" style="font-size:12px;"><?php echo number_format($tcount); ?></span></a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">ANNUAL</a>
		  </li>
		</ul>
		</div>
        <div class="tab-content bg-white" id="myTabContent">
        	<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        		<br>
        	    <?php include('home.php'); ?>
        	</div>
        
        	<div class="tab-pane fade" id="daily" role="tabpanel" aria-labelledby="daily-tab">
        		<br>
        		<?php include('daily.php'); ?>
        	</div>
        	<div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
        		<br>
        		<?php include('history.php'); ?>
        	</div>
        </div>
    </div><br><br><br>
<footer class="footer text-white bg-info text-center">
	<span>&copy; <?php echo date('Y'); ?> | Programx</span>
</footer>
<script src="fonts/fontawesome/js/1994.js"></script>

<script type="text/javascript" src="plugins/js/jquery-3.4.1.slim.min.js"></script>
<script src="plugins/js/jquery-latest.min.js"></script>
<script type="text/javascript" src="plugins/js/jquery.dataTables.min.js"></script>
<script src="js/jQuery.print.js"></script>
<script type="text/javascript" src="plugins/js/popper.min.js"></script>
<script type="text/javascript" src="plugins/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script>
$("select").on("change", function() {    
    $("#" + $(this).val()).show().siblings().hide();
});
</script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#historyt').DataTable();
} );
</script>
<script>
        $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });
    </script>
</body>
</html>