<?php include('../server/conn.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Birim Central Municipal Assembly</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel='manifest' href='./manifest.json'>
	<script type="module">
    import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';
    const el = document.createElement('pwa-update');
    document.body.appendChild(el);
	</script>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../img/logo.svg"/>
<!--===============================================================================================-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter overlay">
		<div class="container-login100">
			<div class="wrap-login100 p-t-30 p-b-50">
			    <img src="../img/logo.svg"class="screenlogo">
			    <span class="login100-form-title p-b-26">
						BCMA LOGIN
					</span>
				    <form class="login100-form validate-form flex-sb flex-w" id="showtaxopt">
					  <select class="input100 custom-select" id="taxselect" style="width:100%;">
					    <option disabled selected>Choose...</option>
					    <option value="year">ADMINISTRATOR</option>
					    <option value="area">COLLECTOR</option>
					  </select>
					</form>	
				<div name="area" id="area" style="display:none;">
				    <img src="../img/logo.svg"class="screenlogo">
    				<form class="login100-form validate-form flex-sb flex-w" method="POST" action="../server/login_query.php">
    					<span class="login100-form-title p-b-26">
    						REVENUE COLLECTOR
    					</span>
                        <div class="input-group mb-3 wrap-input100">
                          <div class="input-group-prepend">
                            <span class="bg-dark text-warning input-group-text" id="basic-addon1"><i class="fa fa-lg fa-user"></i></span>
                          </div>
                          <input type="text" class="form-control input100" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
    					
    					<div class="input-group mb-3 wrap-input100">
                          <div class="input-group-prepend">
                            <span class="bg-dark text-warning input-group-text" id="basic-addon1"><i class="fa fa-lg fa-lock"></i></span>
                          </div>
                          <input class="form-control input100" type="password" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                        </div>
    					<div class="input-group mb-3 wrap-input100">
                          <div class="input-group-prepend">
                            <label class="bg-dark text-warning input-group-text" for="inputGroupSelect01"><i class="fa fa-lg fa-street-view"></i></label>
                          </div>
    						<select class="custom-select input100" id="inputGroupSelect01" name="area" required>
    						    <option disabled>Please Choose...</option>
    						    <?php 
                                        $query = mysqli_query($conn, "select * from `area`");
                                        while($row = mysqli_fetch_array($query)){
                                    ?>
    						    <option value="<?php echo $row['areaid']; ?>"><?php echo $row['area']; ?></option>
    						    <?php
                                      }
                                      ?>
    						</select>
    					</div>
    
    					<div class="container text-center">
    						<button type="submit" class="btn btn-lg btn-success">
    							Login
    						</button>
    					</div>
    				</form>
				</div>
				
				<div name="year" id="year" style="display:none;">
				    <img src="../img/logo.svg"class="screenlogo">
    				<form class="login100-form validate-form flex-sb flex-w" method="POST" action="../server/login_query.php">
    					<span class="login100-form-title p-b-26">
    						ADMINISTRATOR
    					</span>
                        <div class="input-group mb-3 wrap-input100">
                          <div class="input-group-prepend">
                            <span class="bg-dark text-warning input-group-text" id="basic-addon1"><i class="fa fa-lg fa-user"></i></span>
                          </div>
                          <input type="text" class="form-control input100" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
    					
    					<div class="input-group mb-3 wrap-input100">
                          <div class="input-group-prepend">
                            <span class="bg-dark text-warning input-group-text" id="basic-addon1"><i class="fa fa-lg fa-lock"></i></span>
                          </div>
                          <input class="form-control input100" type="password" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                        </div>
    					<div class="input-group mb-3 wrap-input100">
                          <div class="input-group-prepend">
                            <label class="bg-dark text-warning input-group-text" for="inputGroupSelect01"><i class="fa fa-lg fa-calendar"></i></label>
                          </div>
    						<select class="custom-select input100" id="inputGroupSelect01" name="year" required>
    						    <option disabled>Please Choose...</option>
    						    <?php
    						    $year=date('Y');
    						    $query=mysqli_query($conn,"select * from `years` where year=$year");
		
		                        if(mysqli_num_rows($query)==0){?>
    						    <option><?php echo date('Y'); ?></option>
    						    <?php
                            		}elseif(mysqli_num_rows($query)==1){?>
    						    <?php 
                                        $query = mysqli_query($conn, "select * from years");
                                        while($row = mysqli_fetch_array($query)){
                                    ?>
    						    <option value="<?php echo $row['year'];?>"><?php echo $row['year'];?></option>
    						    <?php
                                      }
                            		}
                                      ?>
    						</select>
    					</div>
    
    					<div class="container text-center">
    						<button type="submit" class="btn btn-lg btn-success">
    							Login
    						</button>
    					</div>
    				</form>
				</div>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script>
$("select").on("change", function() {    
    $("#" + $(this).val()).show().siblings().hide();
});
</script>

</body>
</html>