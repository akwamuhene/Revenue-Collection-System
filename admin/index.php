<?php
session_start();
include('../server/conn.php');
if(!isset($_SESSION['id'])){
 header('Location: ../login');
        die();
}
include_once (__DIR__.'/ZenophSMSGH/lib/ZenophSMSGH.php');
$queryuser = $conn->query("SELECT * FROM `users` WHERE `userid` = '$_SESSION[id]'") or die(mysqli_error());
$loggeduser = $queryuser->fetch_array();
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../img/logo.svg"/>
    <title>Birim Municipal Assembly - Home</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="assets/fontawesome/css/solid.css" rel="stylesheet">
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="assets/plugins/dataTables/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="assets/plugins/dataTables/buttons.dataTables.min.css" rel="stylesheet" />
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><h1 class="text-black"><img src="../img/logo.svg" style="width:48px;height:48px;"> <b>BIRIM CENTRAL MUNICIPAL ASSEMBLY</b></h1></a>
            </div>
        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side navbar-fixed-top" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li style="margin-top:10%;">
                        <a href="#" class="fa-lg"><i class="fas fa-user-circle"></i> Hello <?php echo $loggeduser['fname']; ?>,</a>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!--end search section-->
                    </li>
                    <li class="selected">
                        <a href="index.php"><i class="fas fa-chalkboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-users fa-fw"></i> Users<span class="fas fa-caret-down" style="margin-left: 62%;"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="admins.php"> Administrators</a>
                            </li>
                            <li>
                                <a href="collectors.php"> Revenue Collectors</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                     <li>
                        <a href="targets.php"><i class="fas fa-flask fa-fw"></i> Collectors' Targets</a>
                    </li>
                    <li>
                            <li>
                                <a href="#"><i class="fas fa-calendar-alt fa-fw"></i> Quarterly Report <span class="fas fa-caret-down" style="margin-left: 29%;"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="quarterly.php"> Collectors</a>
                                    </li>
                                    <li>
                                        <a href="quarterly-1.php"> Revenue</a>
                                    </li>
                                    <li>
                                        <a href="quarterly-2.php"> Area</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fas fa-calendar fa-fw"></i> Mid-Year Report <span class="fas fa-caret-down" style="margin-left: 29%;"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="midyear.php"> Collectors</a>
                                    </li>
                                    <li>
                                        <a href="midyear-1.php"> Revenue</a>
                                    </li>
                                    <li>
                                        <a href="midyear-2.php"> Area</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href=""><i class="fas fa-calendar-check fa-fw"></i> <?php echo $_SESSION['year']; ?> Annual Report <span class="fas fa-caret-down" style="margin-left: 17%;position:absolute;"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="collectorsreport.php"> Collectors</a>
                                    </li>
                                    <li>
                                        <a href="taxtypebar.php"> Revenue</a>
                                    </li>
                                    <li>
                                        <a href="areaannual.php"> Area</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fas fa-question-circle fa-fw"></i> Help</a>
                            </li>
                            <li><a href="../server/logout.php"><i class="fas fa-power-off fa-fw"></i> Logout</a>
                            </li>
                    </li>
                    <hr>
                    <div class="text-center" style="padding-bottom:9%;"><a href="https://www.programx.io" class="text-primary" target="_blank">Programx Info. Tech. Services</a><br> &copy; <?php echo date('Y') ?> | All rights reserved
                    </div>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <br><br><br>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                      </ol>
                    </nav>
                </div>
                <!--End Page Header -->
            </div>
            
            <div class="col-12">
                <button class="btn btn-success" data-toggle="modal" data-target="#adduser"><i class="fas fa-plus-circle"></i> New Collector</button>
                    <button class="btn btn-success" data-toggle="modal" data-target="#addrate"><i class="fas fa-plus-circle"></i> New Rate</button>
                    <button class="btn btn-success" data-toggle="modal" data-target="#addtoll"><i class="fas fa-plus-circle"></i> New Revenue</button>
                    <button class="btn btn-success" data-toggle="modal" data-target="#addarea"><i class="fas fa-plus-circle"></i> New Area</button>
            </div><br>
            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-success"> 
                        <?php
                        $toll="select count(*)as toll from tolltable where date(`moment`)=(CURDATE()) AND year(`moment`)=".$_SESSION['year']."";
                        $result=$conn->query($toll);
                        $toll=mysqli_fetch_assoc($result)["toll"];
                        
                        $rate="select count(*)as rate from ratetable where date(`moment`)=(CURDATE()) AND year(`moment`)=".$_SESSION['year']."";
                        $result=$conn->query($rate);
                        $rate=mysqli_fetch_assoc($result)["rate"];
                        ?>
                        <i class="fas fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b><?php echo $loggeduser['fname']; ?> <?php echo $loggeduser['lname']; ?>, </b><i class="fas fa-pencil"></i><b>&nbsp;<?php echo number_format($toll)+number_format($rate); ?> </b> Activities By Revenue Collectors So Far Today.
                    </div>
                </div>
                <!--end  Welcome -->
            </div>
            <h4 class="text-center text-success"><?php 
				    
				     // initialise object and set required parameters.
                     $zs = new ZenophSMSGH();
                     $zs->setUser('support@programx.io');
                        $zs->setPassword('@programx.io');
                      
                     // now we can request for the credits balance.
                     $balance = $zs->getBalance();
                     
                     echo 'SMS Balance: <b>'.$balance.'</b>'
				    
				    ?></h4>
			    <hr>

            <div class="row">
                <!--quick info section -->
                <div class="col-lg-3">
                    <div class="alert blue text-center" style="color:#fff;">
                        <?php
                        $sumtoll="select sum(amtc)as sumtoll from tolltable where month(`moment`)=MONTH(CURDATE()) AND year(`moment`)=".$_SESSION['year']."";
                        $result=$conn->query($sumtoll);
                        $sumtoll=mysqli_fetch_assoc($result)["sumtoll"];
                        
                        $sumrate="select sum(paid)as sumrate from ratetable where month(`moment`)=MONTH(CURDATE()) AND year(`moment`)=".$_SESSION['year']."";
                        $result=$conn->query($sumrate);
                        $sumrate=mysqli_fetch_assoc($result)["sumrate"];
                        
                        $sumtotal = $sumtoll + $sumrate;
                        ?>
                        <i class="fas fa-hand-holding-usd fa-3x"></i>&nbsp;<b>₵<?php echo number_format((float)$sumtotal, 2, '.', ''); ?> </b> Collected This Month

                    </div>
                </div>
                <div class="col-lg-3">
                    <?php
                        $target="select sum(target)as target from targets where month(`moment`)=MONTH(CURDATE()) and year(`moment`)=".$_SESSION['year']."";
                        $result=$conn->query($target);
                        $target=mysqli_fetch_assoc($result)["target"];

                        $montarget=$target;
                        $mondiff=$sumtotal-$montarget;
                        $monpercentage=$mondiff/$montarget*100;
                        if ($monpercentage > 0) {
                    ?>
                        <div class="alert alert-success text-center">
                            <i class="fas  fa-percent fa-3x"></i>&nbsp;<b><?php echo number_format((float)$monpercentage, 2, '.', '');?>% </b>Variance Recorded in This Month 
                        </div>
                    <?php }else{ ?>
                        <div class="alert alert-danger text-center">
                            <i class="fas  fa-percent fa-3x"></i>&nbsp;<b><?php echo number_format((float)$monpercentage, 2, '.', '');?>% </b> Variance Recorded in This Month  
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-3">
                    <?php
                        $montarget=$target;
                        $mondiff=$sumtotal-$montarget;
                        if ($mondiff > 0) {
                    ?>
                        <div class="alert alert-success text-center">
                            <i class="fas  fa-chart-line fa-3x"></i>&nbsp;<b>₵<?php echo number_format((float)$mondiff, 2, '.', '');?></b>Variance Recorded in This Month 
                        </div>
                    <?php }else{ ?>
                        <div class="alert alert-danger text-center">
                            <i class="fas  fa-chart-line fa-3x"></i>&nbsp;<b>₵<?php echo number_format((float)$mondiff, 2, '.', '');?></b> Variance Recorded in This Month  
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-warning text-center">
                        <?php
                        $TTM="select count(*)as TTM from tolltable where month(`moment`)=MONTH(CURDATE()) and year(`moment`)=".$_SESSION['year']."";
                        $result=$conn->query($TTM);
                        $TTM=mysqli_fetch_assoc($result)["TTM"];
                        
                        $RTM="select count(*)as RTM from tolltable where month(`moment`)=MONTH(CURDATE()) and year(`moment`)=".$_SESSION['year']."";
                        $result=$conn->query($RTM);
                        $RTM=mysqli_fetch_assoc($result)["RTM"];
                        
                        $TTRM = $TTM + $RTM;
                        ?>
                        <i class="fas fa-chart-pie fa-3x"></i>&nbsp;<b><?php echo number_format($TTRM); ?> </b>Activities by Revenue Collectors this Month.
                    </div>
                </div>
                <!--end quick info section -->
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <!--Simple table example -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fas fa-bar-chart-o fa-fw"></i> Daily Revenue Collection Table
                        </div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped" id="total">
                                            <thead>
                                                <tr><th>Revenue Collector</th>
                                                    <th>Total Amount (GH₵)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $query = mysqli_query($conn,"select collector, sum(amtc) as dtt, (select sum(paid) from ratetable where tolltable.collector=ratetable.collector and date(`moment`)=CURDATE() and year(`moment`)=".$_SESSION['year']." Group by collector) as dtt1 from `tolltable` where date(`moment`)=CURDATE() and year(`moment`)=".$_SESSION['year']." Group by collector");
                                                    while($row = mysqli_fetch_array($query)){
                                        $dtotal1=+$row['dtt1'];
                                        $dtotal2=+$row['dtt'];
                                                ?>
                                        
                                                <tr>
                                                    <td><?php echo $row['collector']; ?></td>
                                                    <td class="text-success"><b><?php echo number_format((float)$dtotal1 + $dtotal2, 2, '.', ''); ?></b></td>
                                                </tr>
                                                <?php
                                                  }
                                                  ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        
                        <div class="panel-body">
                            <div class="col-12"><h2 class="text-center">Fees, Fines and Licences</h2></div><br><br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped" id="tolltable">
                                            <thead>
                                                <tr><th>Revenue Collector</th>
                                                    <th>Amount (GH₵)</th>
                                                    <th>Revenue</th>
                                                    <th>Recorded Time</th>
                                                    <th>Area</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        <?php 
                                            $query = mysqli_query($conn,"select * from `tolltable` left join tolltype on tolltype.tolltypeid=tolltable.tolltypeid left join area on area.areaid=tolltable.areaid where date(`moment`)=CURDATE() and year(`moment`)=".$_SESSION['year']." order by tollid desc");
                                                    while($row = mysqli_fetch_array($query)){
                                                $tollttt=+$row['amtc'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['collector']; ?></td>
                                                    <td><?php echo number_format((float)$row['amtc'], 2, '.', ''); ?></td>
                                                    <td><?php echo $row['tolltype']; ?></td>
                                                    <td><?php echo date('Y:m:d H:i:s', strtotime($row['moment'])); ?> </td>
                                                    <td><?php echo $row['area']; ?></td>
                                                </tr>
                                                <?php
                                                  }
                                                  ?>
                                                  
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="col-12"><h2 class="text-center">Rates</h2></div><br><br>
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped" id="ratetable">
                                            <thead>
                                                <tr><th>Revenue Collector</th>
                                                    <th>Amount (GH₵)</th>
                                                    <th>Revenue</th>
                                                    <th>Recorded Time</th>
                                                    <th>Area</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        <?php 
                                            $query = mysqli_query($conn,"select * from `ratetable` left join rates on rates.rate=ratetable.rate left join area on area.areaid=ratetable.areaid where date(`moment`)=CURDATE() and year(`moment`)=".$_SESSION['year']." order by ratetableid desc");
                                                    while($row = mysqli_fetch_array($query)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['collector']; ?></td>
                                                    <td><?php echo number_format((float)$row['paid'], 2, '.', ''); ?></td>
                                                    <td><?php echo $row['rate']; ?></td>
                                                    <td><?php echo date('Y:m:d H:i:s', strtotime($row['moment'])); ?> </td>
                                                    <td><?php echo $row['area']; ?></td>
                                                </tr>
                                                <?php
                                                  }
                                                  ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!--End simple table example -->

                </div>

                <div class="col-lg-4">
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body yellow">
                            <?php
                            $TTC="select sum(amtc)as TTC from tolltable where year(`moment`)=".$_SESSION['year']."";
                            $result=$conn->query($TTC);
                            $TTC=mysqli_fetch_assoc($result)["TTC"];
                            
                            $RTC="select sum(paid)as RTC from ratetable where year(`moment`)=".$_SESSION['year']."";
                            $result=$conn->query($RTC);
                            $RTC=mysqli_fetch_assoc($result)["RTC"];
                            
                            $TTL = $TTC + $RTC;
                            ?>
                            <i class="fas fa-chart-bar fa-3x"></i>
                            <h3>₵<?php echo number_format((float)$TTL, 2, '.', '');?></h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Total Revenue Collected <?php echo $_SESSION['year']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body blue">
                            <?php
                            $target="select sum(target)as sum from targets where year(`moment`)=".$_SESSION['year']."";
                            $result=$conn->query($target);
                            $target=mysqli_fetch_assoc($result)["sum"];
                            ?>
                            <i class="fas fa-bullseye fa-3x"></i>
                            <h3>₵<?php echo number_format((float)$target, 2, '.', '');?> </h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Annual Revenue Target <?php echo $_SESSION['year']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="panel panel-primary text-center no-boder">
                    <?php
                        $variance=$TTL-$target;
                        if ($variance > 0) {
                    ?>
                            <div class="panel-body green">
                                <i class="fas fa-chart-line fa-3x"></i>
                                <h3>₵<?php echo number_format((float)$variance, 2, '.', '');?></h3>
                            </div>
                    <?php }else{ ?>
                            <div class="panel-body red">
                                <i class="fas fa-chart-line fa-3x"></i>
                                <h3>₵<?php echo number_format((float)$variance, 2, '.', '');?></h3>
                            </div>
                    <?php } ?>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Amount Variance <?php echo $_SESSION['year']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="panel panel-primary text-center no-boder">
                    <?php
                        $variance=$TTL-$target;
                        $percentage=$variance/$target*100;
                        if ($percentage > 0) {
                    ?>
                            <div class="panel-body green">
                                <i class="fas fa-percent fa-3x"></i>
                                <h3><?php echo number_format((float)$percentage, 2, '.', '');?>%</h3>
                            </div>
                    <?php }else{ ?>
                            <div class="panel-body red">
                                <i class="fas fa-percent fa-3x"></i>
                                <h3><?php echo number_format((float)$percentage, 2, '.', '');?>%</h3>
                            </div>
                    <?php } ?>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">% Variance <?php echo $_SESSION['year']; ?>
                            </span>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->
    <?php include('add_modal.php'); ?>
    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/dataTables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/dataTables/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/dataTables/buttons.flash.min.js"></script>
    <script src="assets/plugins/dataTables/jszip.min.js"></script>
    <script src="assets/plugins/dataTables/pdfmake.min.js"></script>
    <script src="assets/plugins/dataTables/vfs_fonts.js"></script>
    <script src="assets/plugins/dataTables/buttons.html5.min.js"></script>
    <script src="assets/plugins/dataTables/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#total').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
            $('#tolltable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
            $('#ratetable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>
</body>

</html>
