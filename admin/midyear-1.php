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
    <title>Birim Central Municipal Assembly - Revenue Mid year</title>
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
                                    <li class="selected">
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
                        <li class="breadcrumb-item"><a href="#">Mid-Year</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Revenue Type</li>
                      </ol>
                    </nav>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                       <h1 class="text-center">MID YEAR FEES, FINES & LICENCES REPORT</h1>
                   </div>
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                             REVENUE (JAN - JUN)
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-1q">
                                    <thead>
                                        <tr>
                                            <th>REVENUE SUBHEAD</th>
                                            <th>TOTAL (GH₵)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?php 
                            $sql = "SELECT tolltype, sum(amtc) AS janjune FROM tolltable LEFT JOIN tolltype ON tolltype.tolltypeid=tolltable.tolltypeid WHERE moment BETWEEN '".$_SESSION['year']."-01-01 00:00:00' and '".$_SESSION['year']."-06-30 23:59:00' GROUP BY tolltype";
                                $result = mysqli_query($conn, $sql);
                             while ($row = mysqli_fetch_array($result)) { 
                             $total+=$row['janjune'];
                             ?>
                                <tr>
                                    <td><?php echo $row['tolltype']; ?></td>
                                    <td><?php echo number_format((float)$row['janjune'], 2, '.', ''); ?></td>
                                </tr>
                                <?php
                             }
                                ?>
                                <tfoot style="background-color:yellow;color:#000;">
                                <tr>
                                    <td><b>TOTAL</b></td>
                                    <td><b><?php echo number_format((float)$total, 2, '.', ''); ?></b></td>
                                </tr>
                                </tfoot>
                                </tbody>
                                </table>
                            </div><hr style="height:10px;background-color:#000;">
                          <?php 
                            $sql = "SELECT tolltype, sum((amtc * 100) / (select sum(amtc) from tolltable WHERE moment BETWEEN '".$_SESSION['year']."-01-01 00:00:00' and '".$_SESSION['year']."-06-30 23:59:00')) AS janjuntotal FROM tolltable LEFT JOIN tolltype ON tolltype.tolltypeid=tolltable.tolltypeid WHERE moment BETWEEN '".$_SESSION['year']."-01-01 00:00:00' and '".$_SESSION['year']."-06-30 23:59:00' GROUP BY tolltype";
                                $result = mysqli_query($conn, $sql);
                             $chart_data="";
                             while ($row = mysqli_fetch_array($result)) { 
                     
                                $fmytolltype[]  = $row['tolltype']  ;
                                $fmyamount[] = $row['janjuntotal']; 
                             }
                            ?>
                            <canvas  id="midyear_bar1"></canvas> 
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                             TOLLS (JUL - DEC)
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-2q">
                                    <thead>
                                        <tr>
                                            <th>REVENUE SUBHEAD</th>
                                            <th>TOTAL (GH₵)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                            $sql = "SELECT tolltype, sum(amtc) AS juldec FROM tolltable LEFT JOIN tolltype ON tolltype.tolltypeid=tolltable.tolltypeid WHERE moment BETWEEN '".$_SESSION['year']."-07-01 00:00:00' and '".$_SESSION['year']."-12-31 23:59:00' GROUP BY tolltype";
                                $result = mysqli_query($conn, $sql);
                             while ($row = mysqli_fetch_array($result)) { 
                             $jdtotal+=$row['juldec'];
                             ?>
                                <tr>
                                    <td><?php echo $row['tolltype']; ?></td>
                                    <td><?php echo number_format((float)$row['juldec'], 2, '.', ''); ?></td>
                                </tr>
                                <?php
                             }
                                ?>
                                <tfoot style="background-color:yellow;color:#000;">
                                <tr>
                                    <td><b>TOTAL</b></td>
                                    <td><b><?php echo number_format((float)$jdtotal, 2, '.', ''); ?></b></td>
                                </tr>
                                </tfoot>
                                </tbody>
                                </table>
                            </div><hr style="height:10px;background-color:#000;">
                            <?php 
                            $sql = "SELECT tolltype, sum((amtc * 100) / (select sum(amtc) from tolltable WHERE moment BETWEEN '".$_SESSION['year']."-07-01 00:00:00' and '".$_SESSION['year']."-12-31 23:59:00')) AS juldectotal FROM tolltable LEFT JOIN tolltype ON tolltype.tolltypeid=tolltable.tolltypeid WHERE moment BETWEEN '".$_SESSION['year']."-07-01 00:00:00' and '".$_SESSION['year']."-12-31 23:59:00' GROUP BY tolltype";
                                $result = mysqli_query($conn, $sql);
                             $chart_data="";
                             while ($row = mysqli_fetch_array($result)) { 
                     
                                $smytolltype[]  = $row['tolltype'];
                                $smyamount[] = $row['juldectotal']; 
                             }
                                ?>
                            <canvas  id="midyear_bar2"></canvas>  
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                   <div class="col-lg-12">
                       <h1 class="text-center">MID YEAR RATES REPORT</h1>
                   </div>
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             RATES (JAN - JUN)
                        </div>
                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-3q">
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
                                        $sql ="SELECT rates.rate, moment, sum(paid) AS fratypetotal, sum(amt) AS famtt FROM ratetable LEFT JOIN rates ON rates.rate=ratetable.rate WHERE moment BETWEEN '".$_SESSION['year']."-01-01 00:00:00' and '".$_SESSION['year']."-06-30 23:59:00' GROUP BY rates.rate";
                                        $result = mysqli_query($conn, $sql);
                                     while ($row = mysqli_fetch_array($result)) { 
                                     $fbaltt = $row['famtt'] - $row['fratypetotal'];
                                     $fpaidtotal+=$row['fratypetotal'];
                                     $ftargettotal+=$row['famtt'];
                                     $fbalancetotal+=$fbaltt;
                             ?>
                                <tr>
                                    <td><?php echo $row['rate']; ?></td>
                                    <td><?php echo number_format((float)$row['fratypetotal'], 2, '.', ''); ?></td>
                                    <td><?php echo number_format((float)$row['famtt'], 2, '.', ''); ?></td>
                                    <td><?php echo number_format((float)$fbaltt, 2, '.', ''); ?></td>
                                </tr>
                                <?php
                             }
                                ?>
                                <tfoot style="background-color:yellow;color:#000;">
                                <tr>
                                    <td><b>TOTAL (GH₵)</b></td>
                                    <td><b><?php echo number_format((float)$fpaidtotal, 2, '.', ''); ?></b></td>
                                    <td><b><?php echo number_format((float)$ftargettotal, 2, '.', ''); ?></b></td>
                                    <td><b><?php echo number_format((float)$fbalancetotal, 2, '.', ''); ?></b></td>
                                </tr>
                                </tfoot>
                                </tbody>
                                </table>
                            </div>
                            <hr style="height:10px;background-color:#000;">
                            <div class="panel-heading">
                             RATES (JUL - DEC)
                        </div>
                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-4q">
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
                                        $sql ="SELECT rates.rate, moment, sum(paid) AS sratypetotal, sum(amt) AS samtt, sum(bal) AS sbaltt FROM ratetable LEFT JOIN rates ON rates.rate=ratetable.rate WHERE moment BETWEEN '".$_SESSION['year']."-07-01 00:00:00' and '".$_SESSION['year']."-12-31 23:59:00' GROUP BY rates.rate";
                                        $result = mysqli_query($conn, $sql);
                                     while ($row = mysqli_fetch_array($result)) {
                                    $sbaltt = $row['samtt'] - $row['sratypetotal'];
                                     $spaidtotal+=$row['sratypetotal'];
                                     $stargettotal+=$row['samtt'];
                                     $sbalancetotal+=$sbaltt;
                             ?>
                                <tr>
                                    <td><?php echo $row['rate']; ?></td>
                                    <td><?php echo number_format((float)$row['sratypetotal'], 2, '.', ''); ?></td>
                                    <td><?php echo number_format((float)$row['samtt'], 2, '.', ''); ?></td>
                                    <td><?php echo number_format((float)$sbaltt, 2, '.', ''); ?></td>
                                </tr>
                                <?php
                             }
                                ?>
                                <tfoot style="background-color:yellow;color:#000;">
                                <tr>
                                    <td><b>TOTAL (GH₵)</b></td>
                                    <td><b><?php echo number_format((float)$spaidtotal, 2, '.', ''); ?></b></td>
                                    <td><b><?php echo number_format((float)$stargettotal, 2, '.', ''); ?></b></td>
                                    <td><b><?php echo number_format((float)$sbalancetotal, 2, '.', ''); ?></b></td>
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
    <?php include('add_modal.php'); ?>
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
            $('#dataTables-1q').dataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
            $('#dataTables-2q').dataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
            $('#dataTables-3q').dataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
            $('#dataTables-4q').dataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>

</body>

</html>
