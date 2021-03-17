
	    <!--quick info section -->
	    <div class="container">
    	    <div class="row">
                <div class="col-lg-6  col-md-6">
                    <div class="alert alert-primary text-center" role="alert">
                        <?php
                            $anntollsum="select sum(amtc)as anntsum from tolltable where userid=$userid and Year(`moment`)=".date('Y')."";
                            $result=$conn->query($anntollsum);
                            $anntollsum=mysqli_fetch_assoc($result)["anntsum"];
                            
                            $annratesum="select sum(paid)as annrsum from ratetable where userid=$userid and Year(`moment`)=".date('Y')."";
                            $result=$conn->query($annratesum);
                            $annratesum=mysqli_fetch_assoc($result)["annrsum"];
                            
                            $anntotalsum = $anntollsum + $annratesum;
                            ?>
                            GH<b class="fa-2x">₵<?php echo number_format((float)$anntotalsum, 2, '.', ''); ?></b> <i class="fas fa-chart-bar fa-3x"></i><br> <?php echo date('Y'); ?> Annual Total
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="alert alert-info text-center" role="alert">
                        <?php
                        $target="select sum(target)as sum from targets where year(`moment`)=YEAR(CURDATE()) and userid=$userid";
                        $result=$conn->query($target);
                        $target=mysqli_fetch_assoc($result)["sum"];
                        ?>
                        GH<b class="fa-2x">₵<?php echo number_format((float)$target, 2, '.', ''); ?></b> <i class="fas fa-chart-pie-alt fa-3x"></i><br><?php echo date('Y'); ?> Annual Tax Target
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <?php
                        $anntarget=$target;
                        $anndiff=$anntotalsum-$anntarget;
                        if ($anndiff > 0) {
                    ?>
                        <div class="alert alert-success text-center">GH<b class="fa-2x">₵<?php echo $anndiff; ?> </b>
                            <i class="fas  fa-chart-line-down fa-3x"></i><br>Variance This Year, <?php echo date('Y'); ?>
                        </div>
                    <?php }else{ ?>
                        <div class="alert alert-danger text-center">GH<b class="fa-2x">₵<?php echo number_format((float)$anndiff, 2, '.', ''); ?> </b>
                            <i class="fas  fa-chart-line-down fa-3x"></i><br>Variance This Year, <?php echo date('Y'); ?>  
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-6 col-md-6">
                    <?php
                        $anntarget=$target;
                        $anndiff=$anntotalsum-$anntarget;
                        $annpercentage=$anndiff/$anntarget*100;
                        if ($annpercentage > 0) {
                    ?>
                        <div class="alert alert-success text-center"><b class="fa-2x"><?php echo round($annpercentage); ?></b>
                            <i class="fas fa-percent fa-3x"></i><br>Variance This Year, <?php echo date('Y'); ?> 
                        </div>
                    <?php }else{ ?>
                        <div class="alert alert-danger text-center"><b class="fa-2x"><?php echo round($annpercentage); ?></b>
                            <i class="fas fa-percent fa-3x"></i><br>Variance This Year, <?php echo date('Y'); ?>  
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
      <div class="container">
          <h1 class="pb-4 text-center">Monthly Breakdown</h1>
        <div class="row">
	    <?php include('midhisi.php'); ?>
        <?php include('midhisii.php'); ?>
        </div>
    </div>
        <!--<div class="container">
				<div class="col-lg-12">
				    <div class="panel bg-success panel-warning">
				        <div class="panel-heading bg-light text-center">
                             <b>YOUR ANNUAL HISTORY TABLE</b>
                        </div>
                        <div class="flexbox">
                      <div class="search">
                        <div>
                          <input type="text" id="hist" placeholder="Search 10 digit ID" required>
                        </div>
                      </div>
                    </div>
                        <div class="panel-body">
                         <div class="table-responsive table-responsive-data2">
                            <table class="table text-center table-data2">
                                <thead>
                                    <tr><th>#</th>
                                        <th>ID</th>
                        				<th>GH₵</th>
                        				<th>Toll</th>
                        				<th>Area</th>
                        				<th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
                                   /*$i = 1;
                    					$query = mysqli_query($conn,"select * from `tolltable` LEFT JOIN tolltype ON tolltype.tolltypeid=tolltable.tolltypeid LEFT JOIN area ON area.areaid=tolltable.areaid where userid=$userid");
                    				if (mysqli_num_rows($query)==0){
                			            ?>
                			            <td colspan="6">No data Available</td>
                			            <?php
                			        }else{
                    					while($row = mysqli_fetch_array($query)){
                    				?>
                                    <tr class="tr-shadow">
                                        <td><div class="table-data-feature"> <span class="item" style="font-weight:bold;"><?php echo $i;$i++;  ?></span></div></td>
                                        <td><?php echo $row['tollnum']; ?></td>
                    					<td>₵<?php echo $row['amtc']; ?></td>
                    					<td><?php echo $row['tolltype']; ?></td>
                    					<td><?php echo $row['area']; ?></td>
                    					<td><i class="fas fa-clock"></i> <?php echo $row['moment']; ?></td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                    <?php
                                    }
                			        }*/
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            	</div>
		    </div>
		</div>-->