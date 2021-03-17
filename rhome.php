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
	<div class="col-lg-12 col-sm-12 bg-info">
	<div class="container">
		<div class="row">
			<h4 class="text-center text-white logo">BCMA 3.0</h4> 
			    <div class="dropdown settings">
				  <a class="btn btn-default text-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    o o o
				  </a>

				  <div class="dropdown-menu droposition" aria-labelledby="dropdownMenuLink">
				    <a class="dropdown-item" href="#"><i class="fas fa-user"></i> <?php echo $loggeduser['fname']; ?></a>
				    <a class="dropdown-item" href="#"><i class="fas fa-question-circle"></i> Help</a>
				    <a class="dropdown-item" href="./server/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
				  </div>
				</div>
			</div>
		</div>
    </div><br>
		<div class="col-sm-12 responsive">
		    <div class="card-body">
			        <a href="https://tcsys.programx.io/" class="mb-3 btn btn-info"> Home</a>
			        <a href="https://tcsys.programx.io/ratesnp.php" class="mb-3 btn btn-info"> New Payment <?php echo date('Y'); ?></a>
				    <div class="container">
                      <form method="POST">
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hsenum">Search House Number</label>
                                  <select id="hsenum" name="hsenum" class="form-control">
                                       <?php
                                          $dc=mysqli_query($conn,"select distinct hsenum from ratetable");
                                          while($dcrow=mysqli_fetch_array($dc)){
                                            ?>
                                              <option value="<?php echo $dcrow['hsenum']; ?>"><?php echo $dcrow['hsenum']; ?></option>
                                            <?php
                                          }
                                        ?>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="year">Payment Year</label>
                              <select id="year" name="year" class="form-control">
                                <?php
    						    $year=date('Y');
    						    $query=mysqli_query($conn,"select * from `years` where year=$year");
		
		                        if(mysqli_num_rows($query)==0){?>
    						    <option><?php echo date('Y'); ?></option>
    						    <?php
                            		}elseif(mysqli_num_rows($query)==1){?>
    						    <?php 
                                        $query = mysqli_query($conn, "select * from years order by year desc");
                                        while($row = mysqli_fetch_array($query)){
                                    ?>
    						    <option value="<?php echo $row['year'];?>"><?php echo $row['year'];?></option>
    						    <?php
                                      }
                            		}
                                      ?>
                              </select>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <input type="submit" name="submit" class="button btn-info form-control" value="Find">
                            </div>
                          </div>
                      </form>
                      <?php
                      if(isset($_POST['submit'])){
                        $hsenum = $_POST['hsenum'];
                    	$year = $_POST['year'];
                      $query=mysqli_query($conn,"select ratetableid, rate, userid, amt, sum(paid) AS sumamt, bal, gcr, collector, moment, hsenum, phone, areaid from `ratetable` where hsenum like '%$hsenum%' && year(`moment`) like '%$year%' order by moment DESC LIMIT 1");
                       
                        if (mysqli_num_rows($query)==0){
                            ?>
                            <div class="col-md-12"><h1 class="text-center">No results found</h1></div>
                            <?php
                        }else{
                      
                      while($row=mysqli_fetch_array($query)){
                        $ratetableid=$row['ratetableid'];
                   include('ratespaid.php');
                  }
                  }
                  }
                  ?>
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