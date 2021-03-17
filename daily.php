<div class="container">
		<div class="row">
                <!--quick info section -->
                <div class="col-lg-4 col-md-4">
                    <div class="alert alert-primary text-center" role="alert">
                        <?php
                         $tollsum="select sum(amtc)as tsum from tolltable where date(`moment`)=CURDATE() and `userid`=".$loggeduser['userid'];"";
                            $result=$conn->query($tollsum);
                            $tollsum=mysqli_fetch_assoc($result)["tsum"];
                            
                            $ratesum="select sum(paid)as rsum from ratetable where date(`moment`)=CURDATE() and `userid`=".$loggeduser['userid'];"";
                            $result=$conn->query($ratesum);
                            $ratesum=mysqli_fetch_assoc($result)["rsum"];
                             $totalsum = $tollsum + $ratesum;
                            ?>
                        GH<b class="fa-2x">₵<?php echo number_format((float)$totalsum, 2, '.', ''); ?></b> <i class="fas fa-hand-holding-usd fa-3x"></i><br>Collected Today, <?php echo date('D, d-m-y'); ?>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="alert alert-info text-center" role="alert">
                        <?php
                        $tollmsum="select sum(amtc)as tmsum from tolltable where month(`moment`)=MONTH(CURDATE()) and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($tollmsum);
                        $tollmsum=mysqli_fetch_assoc($result)["tmsum"];
                        
                        $ratemsum="select sum(paid)as rmsum from ratetable where month(`moment`)=MONTH(CURDATE()) and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($ratemsum);
                        $ratemsum=mysqli_fetch_assoc($result)["rmsum"];
                        
                        $totalmsum = $tollmsum + $ratemsum;
                        ?>
                        GH<b class="fa-2x">₵<?php echo number_format((float)$totalmsum, 2, '.', ''); ?></b> <i class="fas fa-calendar-alt fa-3x"></i><br>Total This Month, <?php echo date('M'); ?>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="alert alert-warning text-center" role="alert">
                        <?php
                        $sum="select sum(target)as sum from targets where month(`moment`)=MONTH(CURDATE()) and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($sum);
                        $sum=mysqli_fetch_assoc($result)["sum"];
                        ?>
                        GH<b class="fa-2x">₵<?php echo number_format((float)$sum, 2, '.', ''); ?></b> <i class="fas fa-bullseye fa-3x"></i><br> Monthly Target: <?php echo date('M'); ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <?php
                        $target="select sum(target)as variance from targets where month(`moment`)=MONTH(CURDATE()) and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($target);
                        $target=mysqli_fetch_assoc($result)["variance"];

                        $montarget=$target;
                        $mondiff=$totalmsum-$montarget;
                        if ($mondiff > 0) {
                    ?>
                        <div class="alert alert-success text-center">
                            GH<b class="fa-2x">₵<?php echo number_format((float)$mondiff, 2, '.', ''); ?> </b><i class="fas  fa-chart-line fa-3x"></i><br>Variance This Month, <?php echo date('M'); ?> 
                        </div>
                    <?php }else{ ?>
                        <div class="alert alert-danger text-center">
                            GH<b class="fa-2x">₵<?php echo number_format((float)$mondiff, 2, '.', ''); ?> </b><i class="fas  fa-chart-line fa-3x"></i><br>Variance This Month, <?php echo date('M'); ?>  
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-6 col-md-6">
                    <?php
                        $target="select sum(target)as profloss from targets where month(`moment`)=MONTH(CURDATE()) and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($target);
                        $target=mysqli_fetch_assoc($result)["profloss"];

                        $montarget=$target;
                        $mondiff=$totalmsum-$montarget;
                        $monpercentage=$mondiff/$montarget*100;
                        if ($monpercentage > 0) {
                    ?>
                        <div class="alert alert-success text-center">
                            <b class="fa-2x"><?php echo $monpercentage; ?></b> <i class="fas fa-percent fa-3x"></i><br> Variance This Month, <?php echo date('M'); ?> 
                        </div>
                    <?php }else{ ?>
                        <div class="alert alert-danger text-center">
                            <b class="fa-2x"><?php echo round($monpercentage); ?></b> <i class="fas fa-percent fa-3x"></i><br> Variance This Month, <?php echo date('M'); ?>  
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <br>
<!--	      	<div class="container">
				<div class="col-lg-12">
				    <div class="panel bg-success panel-warning">
				        <div class="panel-heading bg-light text-center">
                             <b>YOUR COLLECTION TABLE</b>
                        </div>
                        <div class="flexbox">
                      <div class="search">
                        <div>
                          <input type="text" id="search" placeholder="Search 10 digit ID" required>
                        </div>
                      </div>
                    </div>
                        <div class="panel-body">
                         <div class="table-responsive table-responsive-data2">
                            <table class="table text-center table-data2">
                                <thead>
                                    <tr><th>#</th>
                                        <th>ID</th>
                        				<th>₵</th>
                        				<th>type</th>
                        				<th>Area</th>
                        				<th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
                                  /* $i = 1;
                    					$query = mysqli_query($conn,"select * from `tolltable` LEFT JOIN tolltype ON tolltype.tolltypeid=tolltable.tolltypeid LEFT JOIN area ON area.areaid=tolltable.areaid where date(`moment`)=CURDATE() and `userid`=$userid Order by moment desc");
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
                    					<td><i class="fas fa-clock"></i> <?php echo date('H:i', strtotime($row['moment'])); ?></td>
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