<div class="col-lg-4 col-sm-12">
            <div class="price-container mb-4">
              <h3>July</h3>
              <hr />
                <div class="price-tag">
                    <?php
                        $tolljul="select sum(amtc)as tjul from tolltable where month(`moment`)=07 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($tolljul);
                        $tolljul=mysqli_fetch_assoc($result)["tjul"];
                        
                        $ratejul="select sum(paid)as rjul from ratetable where month(`moment`)=07 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($ratejul);
                        $ratejul=mysqli_fetch_assoc($result)["rjul"];
                        
                        $totaljul = $tolljul + $ratejul;
                        ?>
                  <h2 class="text-info pb-4">₵<?php echo number_format((float)$totaljul, 2, '.', ''); ?></h2>
                  <p>Total Amount Collected</p>
                </div>
              <div class="messages">
                  <?php
                    $jul="select sum(target)as jul from targets where month(`moment`)=07 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                    $result=$conn->query($jul);
                    $jul=mysqli_fetch_assoc($result)["jul"];
                    $varjul = $totaljul - $jul;
                    ?>
                <p><i class="fas fa-clock"></i> Target: ₵<?php echo number_format((float)$jul, 2, '.', ''); ?></p>
                <?php 
                if($varjul < 0){
                ?>
                <p><i class="fas fa-arrow-down text-danger"></i> Variance: ₵<?php echo number_format((float)$varjul, 2, '.', ''); ?></p>
                <p class="text-danger"><i class="fas fa-times"></i> Target not reached</p>
                <?php }elseif($varjul > 0){ ?>
                <p><i class="fas fa-arrow-up text-success"></i> Variance: ₵<?php echo number_format((float)$varjul, 2, '.', ''); ?></p>
                <p class="text-success"><i class="fas fa-check-circle"></i> Congrats! Target reached</p>
                <?php }else{?>
                <p><i class="fas fa-minus text-info"></i> Variance: ₵<?php echo number_format((float)$varjul, 2, '.', ''); ?></p>
                <p class="text-info"><i class="fas fa-info-circle"></i> Not active</p>
                <?php }?>
              </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="price-container mb-4">
              <h3>August</h3>
              <hr />
                <div class="price-tag">
                    <?php
                        $tollaug="select sum(amtc)as taug from tolltable where month(`moment`)=08 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($tollaug);
                        $tollaug=mysqli_fetch_assoc($result)["taug"];
                        
                        $rateaug="select sum(paid)as raug from ratetable where month(`moment`)=08 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($rateaug);
                        $rateaug=mysqli_fetch_assoc($result)["raug"];
                        
                        $totalaug = $tollaug + $rateaug;
                        ?>
                  <h2 class="text-info pb-4">₵<?php echo number_format((float)$totalaug, 2, '.', ''); ?></h2>
                  <p>Total Amount Collected</p>
                </div>
              <div class="messages">
                <?php
                    $aug="select sum(target)as aug from targets where month(`moment`)=08 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                    $result=$conn->query($aug);
                    $aug=mysqli_fetch_assoc($result)["aug"];
                    $varaug = $totalaug - $aug;
                    ?>
                <p><i class="fas fa-clock"></i> Target: ₵<?php echo number_format((float)$aug, 2, '.', ''); ?></p>
                <?php 
                if($varaug < 0){
                ?>
                <p><i class="fas fa-arrow-down text-danger"></i> Variance: ₵<?php echo number_format((float)$varaug, 2, '.', ''); ?></p>
                <p class="text-danger"><i class="fas fa-times"></i> Target not reached</p>
                <?php }elseif($varaug > 0){ ?>
                <p><i class="fas fa-arrow-up text-success"></i> Variance: ₵<?php echo number_format((float)$varaug, 2, '.', ''); ?></p>
                <p class="text-success"><i class="fas fa-check-circle"></i> Congrats! Target reached</p>
                <?php }else{?>
                <p><i class="fas fa-minus text-info"></i> Variance: ₵<?php echo number_format((float)$varaug, 2, '.', ''); ?></p>
                <p class="text-info"><i class="fas fa-info-circle"></i> Not active</p>
                <?php }?>
              </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-sm-12">
            <div class="price-container mb-4">
              <h3>September</h3>
              <hr />
                <div class="price-tag">
                    <?php
                        $tollsep="select sum(amtc)as tsep from tolltable where month(`moment`)=09 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($tollsep);
                        $tollsep=mysqli_fetch_assoc($result)["tsep"];
                        
                        $ratesep="select sum(paid)as rsep from ratetable where month(`moment`)=09 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($ratesep);
                        $ratesep=mysqli_fetch_assoc($result)["rsep"];
                        
                        $totalsep = $tollsep + $ratsep;
                        ?>
                  <h2 class="text-info pb-4">₵<?php echo number_format((float)$totalsep, 2, '.', ''); ?></h2>
                  <p>Total Amount Collected</p>
                </div>
              <div class="messages">
                <?php
                    $sep="select sum(target)as sep from targets where month(`moment`)=09 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                    $result=$conn->query($sep);
                    $sep=mysqli_fetch_assoc($result)["sep"];
                    $varsep = $totalsep - $sep;
                    ?>
                <p><i class="fas fa-clock"></i> Target: ₵<?php echo number_format((float)$sep, 2, '.', ''); ?></p>
                <?php 
                if($varsep < 0){
                ?>
                <p><i class="fas fa-arrow-down text-danger"></i> Variance: ₵<?php echo number_format((float)$varsep, 2, '.', ''); ?></p>
                <p class="text-danger"><i class="fas fa-times"></i> Target not reached</p>
                <?php }elseif($varsep > 0){ ?>
                <p><i class="fas fa-arrow-up text-success"></i> Variance: ₵<?php echo number_format((float)$varsep, 2, '.', ''); ?></p>
                <p class="text-success"><i class="fas fa-check-circle"></i> Congrats! Target reached</p>
                <?php }else{?>
                <p><i class="fas fa-minus text-info"></i> Variance: ₵<?php echo number_format((float)$varsep, 2, '.', ''); ?></p>
                <p class="text-info"><i class="fas fa-info-circle"></i> Not active</p>
                <?php }?>
              </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-sm-12">
            <div class="price-container mb-4">
              <h3>October</h3>
              <hr />
                <div class="price-tag">
                    <?php
                        $tolloct="select sum(amtc)as toct from tolltable where month(`moment`)=10 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($tolloct);
                        $tolloct=mysqli_fetch_assoc($result)["toct"];
                        
                        $rateoct="select sum(paid)as roct from ratetable where month(`moment`)=10 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($rateoct);
                        $rateoct=mysqli_fetch_assoc($result)["roct"];
                        
                        $totaloct = $tolloct + $rateoct;
                        ?>
                  <h2 class="text-info pb-4">₵<?php echo number_format((float)$totaloct, 2, '.', ''); ?></h2>
                  <p>Total Amount Collected</p>
                </div>
              <div class="messages">
                <?php
                    $oct="select sum(target)as oct from targets where month(`moment`)=10 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                    $result=$conn->query($oct);
                    $oct=mysqli_fetch_assoc($result)["oct"];
                    $varoct = $totaloct - $oct;
                    ?>
                <p><i class="fas fa-clock"></i> Target: ₵<?php echo number_format((float)$oct, 2, '.', ''); ?></p>
                <?php 
                if($varoct < 0){
                ?>
                <p><i class="fas fa-arrow-down text-danger"></i> Variance: ₵<?php echo number_format((float)$varoct, 2, '.', ''); ?></p>
                <p class="text-danger"><i class="fas fa-times"></i> Target not reached</p>
                <?php }elseif($varoct > 0){ ?>
                <p><i class="fas fa-arrow-up text-success"></i> Variance: ₵<?php echo number_format((float)$varoct, 2, '.', ''); ?></p>
                <p class="text-success"><i class="fas fa-check-circle"></i> Congrats! Target reached</p>
                <?php }else{?>
                <p><i class="fas fa-minus text-info"></i> Variance: ₵<?php echo number_format((float)$varoct, 2, '.', ''); ?></p>
                <p class="text-info"><i class="fas fa-info-circle"></i> Not active</p>
                <?php }?>
              </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-sm-12">
            <div class="price-container mb-4">
              <h3>November</h3>
              <hr />
                <div class="price-tag">
                    <?php
                        $tollnov="select sum(amtc)as tnov from tolltable where month(`moment`)=11 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($tollnov);
                        $tollnov=mysqli_fetch_assoc($result)["tnov"];
                        
                        $ratenov="select sum(paid)as rnov from ratetable where month(`moment`)=11 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($ratenov);
                        $ratenov=mysqli_fetch_assoc($result)["rnov"];
                        
                        $totalnov = $tollnov + $ratenov;
                        ?>
                  <h2 class="text-info pb-4">₵<?php echo number_format((float)$totalnov, 2, '.', ''); ?></h2>
                  <p>Total Amount Collected</p>
                </div>
              <div class="messages">
                <?php
                    $nov="select sum(target)as nov from targets where month(`moment`)=11 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                    $result=$conn->query($nov);
                    $nov=mysqli_fetch_assoc($result)["nov"];
                    $varnov = $totalnov - $nov;
                    ?>
                <p><i class="fas fa-clock"></i> Target: ₵<?php echo number_format((float)$nov, 2, '.', ''); ?></p>
                <?php 
                if($varnov < 0){
                ?>
                <p><i class="fas fa-arrow-down text-danger"></i> Variance: ₵<?php echo number_format((float)$varnov, 2, '.', ''); ?></p>
                <p class="text-danger"><i class="fas fa-times"></i> Target not reached</p>
                <?php }elseif($varnov > 0){ ?>
                <p><i class="fas fa-arrow-up text-success"></i> Variance: ₵<?php echo number_format((float)$varnov, 2, '.', ''); ?></p>
                <p class="text-success"><i class="fas fa-check-circle"></i> Congrats! Target reached</p>
                <?php }else{?>
                <p><i class="fas fa-minus text-info"></i> Variance: ₵<?php echo number_format((float)$varnov, 2, '.', ''); ?></p>
                <p class="text-info"><i class="fas fa-info-circle"></i> Not active</p>
                <?php }?>
              </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-sm-12">
            <div class="price-container mb-4">
              <h3>December</h3>
              <hr />
                <div class="price-tag">
                    <?php
                        $tolldec="select sum(amtc)as tdec from tolltable where month(`moment`)=12 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($tolldec);
                        $tolldec=mysqli_fetch_assoc($result)["tdec"];
                        
                        $ratedec="select sum(paid)as rdec from ratetable where month(`moment`)=12 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                        $result=$conn->query($ratedec);
                        $ratedec=mysqli_fetch_assoc($result)["rdec"];
                        
                        $totaldec = $tolldec + $ratedec;
                        ?>
                  <h2 class="text-info pb-4">₵<?php echo number_format((float)$totaldec, 2, '.', ''); ?></h2>
                  <p>Total Amount Collected</p>
                </div>
              <div class="messages">
                <?php
                    $dece="select sum(target)as dece from targets where month(`moment`)=12 and year(`moment`)=YEAR(CURDATE()) and `userid`=".$loggeduser['userid'];"";
                    $result=$conn->query($dece);
                    $dece=mysqli_fetch_assoc($result)["dece"];
                  $vardece = $totaldec - $dece;
                    ?>
                <p><i class="fas fa-clock"></i> Target: ₵<?php echo number_format((float)$dece, 2, '.', ''); ?></p>
                <?php 
                if($vardece < 0){
                ?>
                <p><i class="fas fa-arrow-down text-danger"></i> Variance: ₵<?php echo number_format((float)$vardece, 2, '.', ''); ?></p>
                <p class="text-danger"><i class="fas fa-times"></i> Target not reached</p>
                <?php }elseif($vardece > 0){ ?>
                <p><i class="fas fa-arrow-up text-success"></i> Variance: ₵<?php echo number_format((float)$vardece, 2, '.', ''); ?></p>
                <p class="text-success"><i class="fas fa-check-circle"></i> Congrats! Target reached</p>
                <?php }else{?>
                <p><i class="fas fa-minus text-info"></i> Variance: ₵<?php echo number_format((float)$vardece, 2, '.', ''); ?></p>
                <p class="text-info"><i class="fas fa-info-circle"></i> Not active</p>
                <?php }?>
              </div>
            </div>
        </div>