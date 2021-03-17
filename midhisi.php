<div class="col-lg-4 col-sm-12">
            <div class="price-container mb-4">
              <h3>January</h3>
              <hr />
                <div class="price-tag">
                    <?php
                        $tolljan="select sum(amtc)as tjan from tolltable where month(`moment`)=1 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($tolljan);
                        $tolljan=mysqli_fetch_assoc($result)["tjan"];
                        
                        $ratejan="select sum(paid)as rjan from ratetable where month(`moment`)=1 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($ratejan);
                        $ratejan=mysqli_fetch_assoc($result)["rjan"];
                        
                        $totaljan = $tolljan+$ratejan;
                        ?>
                  <h2 class="text-info pb-4">₵<?php echo number_format((float)$totaljan, 2, '.', ''); ?></h2>
                  <p>Total Amount Collected</p>
                </div>
              <div class="messages">
                  <?php
                    $jan="select sum(target)as jan from targets where month(`moment`)=01 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                    $result=$conn->query($jan);
                    $jan=mysqli_fetch_assoc($result)["jan"];
                    $varjan = $totaljan - $jan;
                    ?>
                <p><i class="fas fa-clock"></i> Target: ₵<?php echo number_format((float)$jan, 2, '.', ''); ?></p>
                <?php 
                if($varjan < 0){
                ?>
                <p><i class="fas fa-arrow-down text-danger"></i> Variance: ₵<?php echo number_format((float)$varjan, 2, '.', ''); ?></p>
                <p class="text-danger"><i class="fas fa-times"></i> Target not reached</p>
                <?php }elseif($varjan > 0){ ?>
                <p><i class="fas fa-arrow-up text-success"></i> Variance: ₵<?php echo number_format((float)$varjan, 2, '.', ''); ?></p>
                <p class="text-success"><i class="fas fa-check-circle"></i> Congrats! Target reached</p>
                <?php }else{?>
                <p><i class="fas fa-minus text-info"></i> Variance: ₵<?php echo number_format((float)$varjan, 2, '.', ''); ?></p>
                <p class="text-info"><i class="fas fa-info-circle"></i> Not active</p>
                <?php }?>
              </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="price-container mb-4">
              <h3>February</h3>
              <hr />
                <div class="price-tag">
                    <?php
                        $tollfeb="select sum(amtc)as tfeb from tolltable where month(`moment`)=02 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($tollfeb);
                        $tollfeb=mysqli_fetch_assoc($result)["tfeb"];
                        
                        $ratefeb="select sum(paid)as rfeb from ratetable where month(`moment`)=02 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($ratefeb);
                        $ratefeb=mysqli_fetch_assoc($result)["rfeb"];
                        
                        $totalfeb = $tollfeb + $ratefeb;
                        ?>
                  <h2 class="text-info pb-4">₵<?php echo number_format((float)$totalfeb, 2, '.', ''); ?></h2>
                  <p>Total Amount Collected</p>
                </div>
              <div class="messages">
                <?php
                    $feb="select sum(target)as feb from targets where month(`moment`)=02 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                    $result=$conn->query($feb);
                    $feb=mysqli_fetch_assoc($result)["feb"];
                    $varfeb = $totalfeb - $feb;
                    ?>
                <p><i class="fas fa-clock"></i> Target: ₵<?php echo number_format((float)$feb, 2, '.', ''); ?></p>
                <?php 
                if($varfeb < 0){
                ?>
                <p><i class="fas fa-arrow-down text-danger"></i> Variance: ₵<?php echo number_format((float)$varfeb, 2, '.', ''); ?></p>
                <p class="text-danger"><i class="fas fa-times"></i> Target not reached</p>
                <?php }elseif($varfeb > 0){ ?>
                <p><i class="fas fa-arrow-up text-success"></i> Variance: ₵<?php echo number_format((float)$varfeb, 2, '.', ''); ?></p>
                <p class="text-success"><i class="fas fa-check-circle"></i> Congrats! Target reached</p>
                <?php }else{?>
                <p><i class="fas fa-minus text-info"></i> Variance: ₵<?php echo number_format((float)$varfeb, 2, '.', ''); ?></p>
                <p class="text-info"><i class="fas fa-info-circle"></i> Not active</p>
                <?php }?>
              </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-sm-12">
            <div class="price-container mb-4">
              <h3>March</h3>
              <hr />
                <div class="price-tag">
                    <?php
                        $tollmar="select sum(amtc)as tmar from tolltable where month(`moment`)=03 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($tollmar);
                        $tollmar=mysqli_fetch_assoc($result)["tmar"];
                        
                        $ratemar="select sum(paid)as rmar from ratetable where month(`moment`)=03 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($ratemar);
                        $ratemar=mysqli_fetch_assoc($result)["rmar"];
                        
                        $totalmar = $tollmar + $ratemar;
                        ?>
                  <h2 class="text-info pb-4">₵<?php echo number_format((float)$totalmar, 2, '.', ''); ?></h2>
                  <p>Total Amount Collected</p>
                </div>
              <div class="messages">
                <?php
                    $mar="select sum(target)as mar from targets where month(`moment`)=03 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                    $result=$conn->query($mar);
                    $mar=mysqli_fetch_assoc($result)["mar"];
                    $varmar = $totalmar - $mar;
                    ?>
                <p><i class="fas fa-clock"></i> Target: ₵<?php echo number_format((float)$mar, 2, '.', ''); ?></p>
                 <?php 
                if($varmar < 0){
                ?>
                <p><i class="fas fa-arrow-down text-danger"></i> Variance: ₵<?php echo number_format((float)$varmar, 2, '.', ''); ?></p>
                <p class="text-danger"><i class="fas fa-times"></i> Target not reached</p>
                <?php }elseif($varmar > 0){ ?>
                <p><i class="fas fa-arrow-up text-success"></i> Variance: ₵<?php echo number_format((float)$varmar, 2, '.', ''); ?></p>
                <p class="text-success"><i class="fas fa-check-circle"></i> Congrats! Target reached</p>
                <?php }else{?>
                <p><i class="fas fa-minus text-info"></i> Variance: ₵<?php echo number_format((float)$varmar, 2, '.', ''); ?></p>
                <p class="text-info"><i class="fas fa-info-circle"></i> Not active</p>
                <?php }?>
              </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-sm-12">
            <div class="price-container mb-4">
              <h3>April</h3>
              <hr />
                <div class="price-tag">
                    <?php
                        $tollapr="select sum(amtc)as tapr from tolltable where month(`moment`)=04 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($tollapr);
                        $tollapr=mysqli_fetch_assoc($result)["tapr"];
                        
                        $rateapr="select sum(paid)as rapr from ratetable where month(`moment`)=04 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($rateapr);
                        $rateapr=mysqli_fetch_assoc($result)["rapr"];
                        
                        $totalapr = $tollapr + $rateapr;
                        ?>
                  <h2 class="text-info pb-4">₵<?php echo number_format((float)$totalapr, 2, '.', ''); ?></h2>
                  <p>Total Amount Collected</p>
                </div>
              <div class="messages">
                <?php
                    $apr="select sum(target)as apr from targets where month(`moment`)=04 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                    $result=$conn->query($apr);
                    $apr=mysqli_fetch_assoc($result)["apr"];
                    $varapr = $totalapr - $apr;
                    ?>
                <p><i class="fas fa-clock"></i> Target: ₵<?php echo number_format((float)$apr, 2, '.', ''); ?></p>
                <?php 
                if($varapr < 0){
                ?>
                <p><i class="fas fa-arrow-down text-danger"></i> Variance: ₵<?php echo number_format((float)$varapr, 2, '.', ''); ?></p>
                <p class="text-danger"><i class="fas fa-times"></i> Target not reached</p>
                <?php }elseif($varapr > 0){ ?>
                <p><i class="fas fa-arrow-up text-success"></i> Variance: ₵<?php echo number_format((float)$varapr, 2, '.', ''); ?></p>
                <p class="text-success"><i class="fas fa-check-circle"></i> Congrats! Target reached</p>
                <?php }else{?>
                <p><i class="fas fa-minus text-info"></i> Variance: ₵<?php echo number_format((float)$varapr, 2, '.', ''); ?></p>
                <p class="text-info"><i class="fas fa-info-circle"></i> Not active</p>
                <?php }?>
              </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-sm-12">
            <div class="price-container mb-4">
              <h3>May</h3>
              <hr />
                <div class="price-tag">
                    <?php
                        $tollmay="select sum(amtc)as tmay from tolltable where month(`moment`)=05 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($tollmay);
                        $tollmay=mysqli_fetch_assoc($result)["tmay"];
                        
                        $ratemay="select sum(paid)as rmay from ratetable where month(`moment`)=05 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($ratemay);
                        $ratemay=mysqli_fetch_assoc($result)["rmay"];
                        
                        $totalmay = $tollmay + $ratemay;
                        ?>
                  <h2 class="text-info pb-4">₵<?php echo number_format((float)$totalmay, 2, '.', ''); ?></h2>
                  <p>Total Amount Collected</p>
                </div>
              <div class="messages">
                <?php
                    $may="select sum(target)as may from targets where month(`moment`)=05 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                    $result=$conn->query($may);
                    $may=mysqli_fetch_assoc($result)["may"];
                    $varmay = $totalmay - $may;
                    ?>
                <p><i class="fas fa-clock"></i> Target: ₵<?php echo number_format((float)$may, 2, '.', ''); ?></p>
                <?php 
                if($varmay < 0){
                ?>
                <p><i class="fas fa-arrow-down text-danger"></i> Variance: ₵<?php echo number_format((float)$varmay, 2, '.', ''); ?></p>
                <p class="text-danger"><i class="fas fa-times"></i> Target not reached</p>
                <?php }elseif($varmay > 0){ ?>
                <p><i class="fas fa-arrow-up text-success"></i> Variance: ₵<?php echo number_format((float)$varmay, 2, '.', ''); ?></p>
                <p class="text-success"><i class="fas fa-check-circle"></i> Congrats! Target reached</p>
                <?php }else{?>
                <p><i class="fas fa-minus text-info"></i> Variance: ₵<?php echo number_format((float)$varmay, 2, '.', ''); ?></p>
                <p class="text-info"><i class="fas fa-info-circle"></i> Not active</p>
                <?php }?>
              </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-sm-12">
            <div class="price-container mb-4">
              <h3>June</h3>
              <hr />
                <div class="price-tag">
                    <?php
                        $tolljun="select sum(amtc)as tjun from tolltable where month(`moment`)=06 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($tolljun);
                        $tolljun=mysqli_fetch_assoc($result)["tjun"];
                        
                        $ratejun="select sum(paid)as rjun from ratetable where month(`moment`)=06 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($ratejun);
                        $ratejun=mysqli_fetch_assoc($result)["rjun"];
                        
                        $totaljun = $tolljun + $ratejun;
                        ?>
                  <h2 class="text-info pb-4">₵<?php echo number_format((float)$totaljun, 2, '.', ''); ?></h2>
                  <p>Total Amount Collected</p>
                </div>
              <div class="messages">
                <?php
                    $jun="select sum(target)as jun from targets where month(`moment`)=06 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                    $result=$conn->query($jun);
                    $jun=mysqli_fetch_assoc($result)["jun"];
                    
                    $varjun = $totaljun - $jun;
                    ?>
                <p><i class="fas fa-clock"></i> Target: ₵<?php echo number_format((float)$jun, 2, '.', ''); ?></p>
                <?php 
                if($varjun < 0){
                ?>
                <p><i class="fas fa-arrow-down text-danger"></i> Variance: ₵<?php echo number_format((float)$varjun, 2, '.', ''); ?></p>
                <p class="text-danger"><i class="fas fa-times-circle"></i> Target not reached</p>
                <?php }elseif($varjun > 0){ ?>
                <p><i class="fas fa-arrow-up text-success"></i> Variance: ₵<?php echo number_format((float)$varjun, 2, '.', ''); ?></p>
                <p class="text-success"><i class="fas fa-check-circle"></i> Congrats! Target reached</p>
                <?php }else{?>
                <p><i class="fas fa-minus text-info"></i> Variance: ₵<?php echo number_format((float)$varjun, 2, '.', ''); ?></p>
                <p class="text-info"><i class="fas fa-info-circle"></i> Not active</p>
                <?php }?>
              </div>
            </div>
        </div>