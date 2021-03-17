<?php
session_start();
include('../server/conn.php');
if(!isset($_SESSION['id'])){
 header('Location: ../login');
        die();
}
$queryuser = $conn->query("SELECT * FROM `users` WHERE `userid` = '$_SESSION[id]'") or die(mysqli_error());
$loggeduser = $queryuser->fetch_array();
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../img/logo.svg"/>
    <title>Birim Central Municipal Assembly - Revenue Quarter</title>
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
                    <li>
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
                                    <li class="selected">
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
                 <!--  page header -->
                <div class="col-lg-12">
                    <br><br><br>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Reports</a></li>
                        <li class="breadcrumb-item"><a href="#">Quarterly</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Revenue Type</li>
                      </ol>
                    </nav>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                       <h1 class="text-center">QUARTERLY FEES, FINES & LICENCES REPORT</h1>
                   </div>
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-warning">
                         <div class="panel-heading">
                             REVENUE (JAN - MAR)
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-01q">
                                    <thead>
                                        <tr>
                                            <th>REVENUE SUBHEAD</th>
                                            <th>TOTAL (GH₵)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?php 
                            $sql = "SELECT tolltype, sum(amtc) AS janmar FROM tolltable LEFT JOIN tolltype ON tolltype.tolltypeid=tolltable.tolltypeid WHERE moment BETWEEN '".$_SESSION['year']."-01-01 00:00:00' and '".$_SESSION['year']."-03-31 23:59:00' GROUP BY tolltype";
                                $result = mysqli_query($conn, $sql);
                             while ($row = mysqli_fetch_array($result)) { 
                             $itotal+=$row['janmar'];
                             ?>
                                <tr>
                                    <td><?php echo $row['tolltype']; ?></td>
                                    <td><?php echo number_format((float)$row['janmar'], 2, '.', ''); ?></td>
                                </tr>
                                <?php
                             }
                                ?>
                                <tfoot style="background-color:yellow;color:#000;">
                                <tr>
                                    <td><b>TOTAL</b></td>
                                    <td><b><?php echo number_format((float)$itotal, 2, '.', ''); ?></b></td>
                                </tr>
                                </tfoot>
                                </tbody>
                                </table>
                            </div><hr style="height:10px;background-color:#000;">
                          <?php 
                            $sql = "SELECT tolltype, sum((amtc * 100) / (select sum(amtc) from tolltable WHERE moment BETWEEN '".$_SESSION['year']."-01-01 00:00:00' and '".$_SESSION['year']."-03-31 23:59:00')) AS janmartotal FROM tolltable LEFT JOIN tolltype ON tolltype.tolltypeid=tolltable.tolltypeid WHERE moment BETWEEN '".$_SESSION['year']."-01-01 00:00:00' and '".$_SESSION['year']."-03-31 23:59:00' GROUP BY tolltype";
                                $result = mysqli_query($conn, $sql);
                             $chart_data="";
                             while ($row = mysqli_fetch_array($result)) { 
                     
                                $janmartolltype[]  = $row['tolltype']  ;
                                $janmaramount[] = $row['janmartotal']; 
                             }
                                ?>
                            <canvas  id="chartjs_bar1"></canvas> 
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                    <!-- Advanced Tables -->
                    <div class="panel panel-success">
                        <div class="text-success panel-heading">
                             REVENUE (APR - JUN)
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-02q">
                                    <thead>
                                        <tr>
                                            <th>REVENUE SUBHEAD</th>
                                            <th>TOTAL (GH₵)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?php 
                            $sql = "SELECT tolltype, sum(amtc) AS aprjun FROM tolltable LEFT JOIN tolltype ON tolltype.tolltypeid=tolltable.tolltypeid WHERE moment BETWEEN '".$_SESSION['year']."-04-01 00:00:00' and '".$_SESSION['year']."-06-30 23:59:00' GROUP BY tolltype";
                                $result = mysqli_query($conn, $sql);
                             while ($row = mysqli_fetch_array($result)) { 
                             $iitotal+=$row['aprjun'];
                             ?>
                                <tr>
                                    <td><?php echo $row['tolltype']; ?></td>
                                    <td><?php echo number_format((float)$row['aprjun'], 2, '.', ''); ?></td>
                                </tr>
                                <?php
                             }
                                ?>
                                <tfoot style="background-color:yellow;color:#000;">
                                <tr>
                                    <td><b>TOTAL</b></td>
                                    <td><b><?php echo number_format((float)$iitotal, 2, '.', ''); ?></b></td>
                                </tr>
                                </tfoot>
                                </tbody>
                                </table>
                            </div><hr style="height:10px;background-color:#000;">
                          <?php 
                            $sql = "SELECT tolltype, sum((amtc * 100) / (select sum(amtc) from tolltable WHERE moment BETWEEN '".$_SESSION['year']."-04-01 00:00:00' and '".$_SESSION['year']."-06-30 23:59:00')) AS aprjuntotal FROM tolltable LEFT JOIN tolltype ON tolltype.tolltypeid=tolltable.tolltypeid WHERE moment BETWEEN '".$_SESSION['year']."-04-01 00:00:00' and '".$_SESSION['year']."-06-30 23:59:00' GROUP BY tolltype";
                                $result = mysqli_query($conn, $sql);
                             $chart_data="";
                             while ($row = mysqli_fetch_array($result)) { 
                     
                                $aprjuntolltype[]  = $row['tolltype']  ;
                                $aprjunamount[] = $row['aprjuntotal']; 
                             }
                                ?>
                            <canvas  id="chartjs_bar2"></canvas> 
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                    <!-- Advanced Tables -->
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                             REVENUE (JUL - SEP)
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-03q">
                                    <thead>
                                        <tr>
                                            <th>REVENUE SUBHEAD</th>
                                            <th>TOTAL (GH₵)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?php 
                            $sql = "SELECT tolltype, sum(amtc) AS julsep FROM tolltable LEFT JOIN tolltype ON tolltype.tolltypeid=tolltable.tolltypeid WHERE moment BETWEEN '".$_SESSION['year']."-07-01 00:00:00' and '".$_SESSION['year']."-09-30 23:59:00' GROUP BY tolltype";
                                $result = mysqli_query($conn, $sql);
                             while ($row = mysqli_fetch_array($result)) { 
                             $iiitotal+=$row['julsep'];
                             ?>
                                <tr>
                                    <td><?php echo $row['tolltype']; ?></td>
                                    <td><?php echo number_format((float)$row['julsep'], 2, '.', ''); ?></td>
                                </tr>
                                <?php
                             }
                                ?>
                                <tfoot style="background-color:yellow;color:#000;">
                                <tr>
                                    <td><b>TOTAL</b></td>
                                    <td><b><?php echo number_format((float)$iiitotal, 2, '.', ''); ?></b></td>
                                </tr>
                                </tfoot>
                                </tbody>
                                </table>
                            </div><hr style="height:10px;background-color:#000;">
                          <?php 
                            $sql = "SELECT tolltype, sum((amtc * 100) / (select sum(amtc) from tolltable WHERE moment BETWEEN '".$_SESSION['year']."-07-01 00:00:00' and '".$_SESSION['year']."-09-30 23:59:00')) AS julseptotal FROM tolltable LEFT JOIN tolltype ON tolltype.tolltypeid=tolltable.tolltypeid WHERE moment BETWEEN '".$_SESSION['year']."-07-01 00:00:00' and '".$_SESSION['year']."-09-30 23:59:00' GROUP BY tolltype";
                                $result = mysqli_query($conn, $sql);
                             $chart_data="";
                             while ($row = mysqli_fetch_array($result)) { 
                     
                                $julseptolltype[]  = $row['tolltype']  ;
                                $julsepamount[] = $row['julseptotal']; 
                             }
                                ?>
                            <canvas  id="chartjs_bar3"></canvas> 
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                    <!-- Advanced Tables -->
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                             REVENUE (OCT - DEC)
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-04q">
                                    <thead>
                                        <tr>
                                            <th>REVENUE SUBHEAD</th>
                                            <th>TOTAL (GH₵)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?php 
                            $sql = "SELECT tolltype, sum(amtc) AS octdec FROM tolltable LEFT JOIN tolltype ON tolltype.tolltypeid=tolltable.tolltypeid WHERE moment BETWEEN '".$_SESSION['year']."-10-01 00:00:00' and '".$_SESSION['year']."-12-31 23:59:00' GROUP BY tolltype";
                                $result = mysqli_query($conn, $sql);
                             while ($row = mysqli_fetch_array($result)) { 
                             $ivtotal+=$row['octdec'];
                             ?>
                                <tr>
                                    <td><?php echo $row['tolltype']; ?></td>
                                    <td><?php echo number_format((float)$row['octdec'], 2, '.', ''); ?></td>
                                </tr>
                                <?php
                             }
                                ?>
                                <tfoot style="background-color:yellow;color:#000;">
                                <tr>
                                    <td><b>TOTAL</b></td>
                                    <td><b><?php echo number_format((float)$ivtotal, 2, '.', ''); ?></b></td>
                                </tr>
                                </tfoot>
                                </tbody>
                                </table>
                            </div><hr style="height:10px;background-color:#000;">
                          <?php 
                            $sql = "SELECT tolltype, sum((amtc * 100) / (select sum(amtc) from tolltable WHERE moment BETWEEN '".$_SESSION['year']."-10-01 00:00:00' and '".$_SESSION['year']."-12-31 23:59:00')) AS octdectotal FROM tolltable LEFT JOIN tolltype ON tolltype.tolltypeid=tolltable.tolltypeid WHERE moment BETWEEN '".$_SESSION['year']."-10-01 00:00:00' and '".$_SESSION['year']."-12-31 23:59:00' GROUP BY tolltype";
                                $result = mysqli_query($conn, $sql);
                             $chart_data="";
                             while ($row = mysqli_fetch_array($result)) { 
                     
                                $octdectolltype[]  = $row['tolltype']  ;
                                $octdecamount[] = $row['octdectotal']; 
                             }
                                ?>
                            <canvas  id="chartjs_bar4"></canvas> 
                        </div>
                    </div>
                    <div class="col-lg-12">
                       <h1 class="text-center">QUARTERLY RATES REPORT</h1>
                   </div>
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             RATES (JAN - MAR)
                        </div>
                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-1stq">
                                    <thead>
                                        <tr>
                                            <th>RATE</th>
                                            <th>PAID (GH₵)</th>
                                            <th>TARGET (GH₵)</th>
                                            <th>BAL (GH₵)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sql ="SELECT rates.rate, moment, sum(paid) AS iratypetotal, sum(amt) AS iamtt FROM ratetable LEFT JOIN rates ON rates.rate=ratetable.rate WHERE moment BETWEEN '".$_SESSION['year']."-01-01 00:00:00' and '".$_SESSION['year']."-03-31 23:59:00' GROUP BY rates.rate";
                                        $result = mysqli_query($conn, $sql);
                                     while ($row = mysqli_fetch_array($result)) {
                                         $ibaltt=$row['iamtt']-$row['iratypetotal'];
                                     $ipaidtotal+=$row['iratypetotal'];
                                     $itargettotal+=$row['iamtt'];
                                     $ibalancetotal+=$ibaltt;
                             ?>
                                <tr>
                                    <td><?php echo $row['rate']; ?></td>
                                    <td><?php echo number_format((float)$row['iratypetotal'], 2, '.', ''); ?></td>
                                    <td><?php echo number_format((float)$row['iamtt'], 2, '.', ''); ?></td>
                                    <td><?php echo number_format((float)$ibaltt, 2, '.', ''); ?></td>
                                </tr>
                                <?php
                             }
                                ?>
                                <tfoot style="background-color:yellow;color:#000;">
                                <tr>
                                    <td><b>TOTAL (GH₵)</b></td>
                                    <td><b><?php echo number_format((float)$ipaidtotal, 2, '.', ''); ?></b></td>
                                    <td><b><?php echo number_format((float)$itargettotal, 2, '.', ''); ?></b></td>
                                    <td><b><?php echo number_format((float)$ibalancetotal, 2, '.', ''); ?></b></td>
                                </tr>
                                </tfoot>
                                </tbody>
                                </table>
                            </div>
                            <hr style="height:10px;background-color:#000;">
                            <div class="panel-heading">
                                RATES (APR - JUN)
                            </div>
                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-2ndq">
                                    <thead>
                                        <tr>
                                            <th>RATE</th>
                                            <th>PAID (GH₵)</th>
                                            <th>TARGET (GH₵)</th>
                                            <th>BAL (GH₵)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sql ="SELECT rates.rate, moment, sum(paid) AS iiratypetotal, sum(amt) AS iiamtt FROM ratetable LEFT JOIN rates ON rates.rate=ratetable.rate WHERE moment BETWEEN '".$_SESSION['year']."-04-01 00:00:00' and '".$_SESSION['year']."-06-30 23:59:00' GROUP BY rates.rate";
                                        $result = mysqli_query($conn, $sql);
                                     while ($row = mysqli_fetch_array($result)) {
                                         $iibaltt=$row['iiamtt']-$row['iiratypetotal'];
                                     $iipaidtotal+=$row['iiratypetotal'];
                                     $iitargettotal+=$row['iiamtt'];
                                     $iibalancetotal+=$iibaltt;
                             ?>
                                <tr>
                                    <td><?php echo $row['rate']; ?></td>
                                    <td><?php echo number_format((float)$row['iiratypetotal'], 2, '.', ''); ?></td>
                                    <td><?php echo number_format((float)$row['iiamtt'], 2, '.', ''); ?></td>
                                    <td><?php echo number_format((float)$iibaltt, 2, '.', ''); ?></td>
                                </tr>
                                <?php
                             }
                                ?>
                                <tfoot style="background-color:yellow;color:#000;">
                                <tr>
                                    <td><b>TOTAL (GH₵)</b></td>
                                    <td><b><?php echo number_format((float)$iipaidtotal, 2, '.', ''); ?></b></td>
                                    <td><b><?php echo number_format((float)$iitargettotal, 2, '.', ''); ?></b></td>
                                    <td><b><?php echo number_format((float)$iibalancetotal, 2, '.', ''); ?></b></td>
                                </tr>
                                </tfoot>
                                </tbody>
                            </table>
                        </div>
                        <hr style="height:10px;background-color:#000;">
                            <div class="panel-heading">
                                RATES (JUL - SEP)
                            </div>
                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-3rdq">
                                    <thead>
                                        <tr>
                                            <th>RATE</th>
                                            <th>PAID (GH₵)</th>
                                            <th>TARGET (GH₵)</th>
                                            <th>BAL (GH₵)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sql ="SELECT rates.rate, moment, sum(paid) AS iiiratypetotal, sum(amt) AS iiiamtt FROM ratetable LEFT JOIN rates ON rates.rate=ratetable.rate WHERE moment BETWEEN '".$_SESSION['year']."-07-01 00:00:00' and '".$_SESSION['year']."-09-30 23:59:00' GROUP BY rates.rate";
                                        $result = mysqli_query($conn, $sql);
                                     while ($row = mysqli_fetch_array($result)) {
                                         $iiibaltt=$row['iiiamtt']-$row['iiiratypetotal'];
                                     $iiipaidtotal+=$row['iiiratypetotal'];
                                     $iiitargettotal+=$row['iiiamtt'];
                                     $iiibalancetotal+=$iiibaltt;
                             ?>
                                <tr>
                                    <td><?php echo $row['rate']; ?></td>
                                    <td><?php echo number_format((float)$row['iiiratypetotal'], 2, '.', ''); ?></td>
                                    <td><?php echo number_format((float)$row['iiiamtt'], 2, '.', ''); ?></td>
                                    <td><?php echo number_format((float)$iiibaltt, 2, '.', ''); ?></td>
                                </tr>
                                <?php
                             }
                                ?>
                                <tfoot style="background-color:yellow;color:#000;">
                                <tr>
                                    <td><b>TOTAL (GH₵)</b></td>
                                    <td><b><?php echo number_format((float)$iiipaidtotal, 2, '.', ''); ?></b></td>
                                    <td><b><?php echo number_format((float)$iiitargettotal, 2, '.', ''); ?></b></td>
                                    <td><b><?php echo number_format((float)$iiibalancetotal, 2, '.', ''); ?></b></td>
                                </tr>
                                </tfoot>
                                </tbody>
                            </table>
                        </div>
                        <hr style="height:10px;background-color:#000;">
                            <div class="panel-heading">
                                RATES (OCT - DEC)
                            </div>
                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-4thq">
                                    <thead>
                                        <tr>
                                            <th>RATE</th>
                                            <th>PAID (GH₵)</th>
                                            <th>TARGET (GH₵)</th>
                                            <th>BAL (GH₵)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sql ="SELECT rates.rate, moment, sum(paid) AS ivratypetotal, sum(amt) AS ivamtt FROM ratetable LEFT JOIN rates ON rates.rate=ratetable.rate WHERE moment BETWEEN '".$_SESSION['year']."-10-01 00:00:00' and '".$_SESSION['year']."-12-31 23:59:00' GROUP BY rates.rate";
                                        $result = mysqli_query($conn, $sql);
                                     while ($row = mysqli_fetch_array($result)) {
                                         $ivbaltt=$row['ivamtt']-$row['ivratypetotal'];
                                     $ivpaidtotal+=$row['ivratypetotal'];
                                     $ivtargettotal+=$row['ivamtt'];
                                     $ivbalancetotal+=$ivbaltt;
                             ?>
                                <tr>
                                    <td><?php echo $row['rate']; ?></td>
                                    <td><?php echo number_format((float)$row['ivratypetotal'], 2, '.', ''); ?></td>
                                    <td><?php echo number_format((float)$row['ivamtt'], 2, '.', ''); ?></td>
                                    <td><?php echo number_format((float)$ivbaltt, 2, '.', ''); ?></td>
                                </tr>
                                <?php
                             }
                                ?>
                                <tfoot style="background-color:yellow;color:#000;">
                                <tr>
                                    <td><b>TOTAL (GH₵)</b></td>
                                    <td><b><?php echo number_format((float)$ivpaidtotal, 2, '.', ''); ?></b></td>
                                    <td><b><?php echo number_format((float)$ivtargettotal, 2, '.', ''); ?></b></td>
                                    <td><b><?php echo number_format((float)$ivbalancetotal, 2, '.', ''); ?></b></td>
                                </tr>
                                </tfoot>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->
    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <?php include('quarterlyscripts.php'); ?>
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
            $('#dataTables-01q').dataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
            $('#dataTables-02q').dataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
            $('#dataTables-03q').dataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
            $('#dataTables-04q').dataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
            
            
            $('#dataTables-1stq').dataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
            $('#dataTables-2ndq').dataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
            $('#dataTables-3rdq').dataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
            $('#dataTables-4thq').dataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>

</body>

</html>
