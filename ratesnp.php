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
				  <a class="btn text-white btn-default dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
<a href="https://tcsys.programx.io/rhome.php" class="mb-2 btn btn-info"> Back</a>
<a href="https://tcsys.programx.io/" class="mb-2 btn btn-info"> Home</a>
<hr>
    <form method="POST" action="./server/rates.php">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
              <label for="hsenum">House No./Address</label>
        	  <input type="text" name="hsenum" class="form-control" placeholder="Enter House Number" style="width:100%;">
        	</div>
        	<div class="col-lg-6 col-md-6 col-sm-12 mt-3">
              <label for="gcr">GCR Number</label>
        	  <input type="text" name="gcr" class="form-control" placeholder="Enter GCR Number" style="width:100%;" required>
        	</div>
            <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
        	    <label for="amtn">Amount Owed</label>
        	  <input type="number" name="amt" id="amtn" class="form-control" placeholder="Enter Amount Owed" step="0.01" min="0" aria-label="Amount (to the nearest cedi)" required>
        	</div>
            <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
        	    <label for="paidn">Payment</label>
        	  <input type="number" name="paid" id="paidn" class="form-control" placeholder="Enter Amount to be paid" step="0.01" min="0" aria-label="Amount (to the nearest cedi)" required>
        	</div>
            <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
        	    <label for="baln">Remaining Balance</label>
        	  <input type="number" name="bal" id="baln" class="form-control" step="0.01" min="0" aria-label="Amount (to the nearest cedi)" readonly>
        	</div>
            <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
    	      <label for="raten">Choose Rate</label>
    		  <select class="custom-select" name="rate" id="raten">
    		    <option disabled selected>Choose rate...</option>
    		    <?php 
    				$query = mysqli_query($conn,"select * from `rates`");
    				while($row = mysqli_fetch_array($query)){
    			?>
    		    <option value="<?php echo $row['rate']; ?>"><?php echo $row['rate']; ?></option>
    		    <?php
    		      }
    		      ?>
    		  </select>
    		</div>
            <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
              <label for="phnnn">Phone Number</label>
        	  <input type="tel" name="taxpayer" id="phnnn" class="form-control" placeholder="Taxpayer Phone #" pattern="[0-9]+" maxlength="10" style="width:100%;" required>
        	</div>
          </div>
          <input type="text" name="issuer" value="<?php echo $loggeduser['fname']; ?> <?php echo $loggeduser['lname']; ?>" hidden>
          <input type="text" name="issid" value="<?php echo $userid ?>" hidden>
          <input type="text" name="area" value="<?php echo $loggeduser['areaid']; ?>" hidden>
          <input type="text" name="phone" value="<?php echo $loggeduser['phone']; ?>" hidden>
          <br>
          <div class="text-center">
          	<button type="submit" name="submit" class="btn btn-lg btn-success">Submit</button>
          </div>
        </form>
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