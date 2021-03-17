<?php
	$suspend=1;
      $query = mysqli_query($conn,"select * from `targets` where month(`moment`)=MONTH(CURDATE()) and year(`moment`)=YEAR(CURDATE()) and `userid`=$userid");
       
        if (mysqli_num_rows($query)==0){
            ?>
            <div class="col-md-12"><h1 class="text-center text-danger text-capitalize">Sorry, Target has not been set for <?php echo date('F, Y'); ?>!</h1></div>
            <?php
        }else{

			$query = mysqli_query($conn,"select * from `users` LEFT JOIN area ON area.areaid=users.areaid where userid=$userid");
			while($row = mysqli_fetch_array($query)){
			    
			    ?>
			 <div class="col-md-12 text-center"> <i class="text-danger fas fa-location"> <b><?php echo $row['area']; ?></b></i>
			 <br>
        <span class="text-center text-success"><?php 
				    
				     // initialise object and set required parameters.
                     $zs = new ZenophSMSGH();
                     $zs->setUser('support@programx.io');
                        $zs->setPassword('@programx.io');
                      
                     // now we can request for the credits balance.
                     $balance = $zs->getBalance();
                     
                     echo 'SMS Balance: <b>'.$balance.'</b>'
				    
				    ?></span>
			    <hr>
			 </div>
		<?php	    
			}
       
      ?>
		  <div class="container">
		  	<div class="col-12">
		  		<div class="card bg-info layout">
		  		    <img src="./img/logo.svg" class="mt-2 logocoa" alt="Logo">
		  		    <div class="card-body">
				    <h4 class="text-center">SELECT REVENUE OPTION</h4>
				    <form id="showtaxopt">
					  <select id="taxselect" style="width:100%;">
					    <option disabled selected>Choose...</option>
					    <option value="fees">FEES</option>
					    <option value="fines">FINES</option>
					    <option value="licences">LICENCES</option>
					  </select>
					</form>
					<a href="rhome.php" class="mt-3 btn btn-primary"> Rates, Rent, Royalties</a>
					</div>
				    <?php include('fees.php');?>
				    <?php include('fines.php');?>
				    <?php include('licences.php');?>
			</div>
			<!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
              Confirmation Sent to <strong>0552530981</strong>. Didn't receive? <a href="#">Resend!</a>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>-->
		  </div>
		</div>
		<?php
      }
      ?>