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
    <title>Birim Central Municipal Assembly - Collectors Annual</title>
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
                                    <li class="selected">
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
                        <li class="breadcrumb-item"><a href="#">Annual</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Collectors</li>
                      </ol>
                    </nav>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             ANNUAL REVENUE COLLECTORS TABLE
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-1">
                                    <thead>
                                        <tr>
                                            <th>REVENUE COLLECTORS</th>
                                            <th>TOTAL AMT COLLECTED (GH₵)</th>
                                            <th>TOTAL TARGET (GH₵)</th>
                                            <th>TOTAL VARIANCE (GH₵)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                         $sql ="SELECT users.userid, users.fname, users.lname, moment, sum(colltotal) AS uctotal, sum(target) AS tgtotal FROM targets LEFT JOIN users ON users.userid=targets.userid WHERE year(`moment`)=".$_SESSION['year']." GROUP BY users.userid";
                                        $result = mysqli_query($conn, $sql);
                                             while ($row = mysqli_fetch_array($result)) { 
                                             $overalluctotal+=$row['uctotal'];
                                             $overalltgtotal+=$row['tgtotal'];
                                             $overallvariance+=$row['uctotal']-$row['tgtotal'];
                                        ?>
                                        <tr>
                                            <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
                                            <td><?php echo number_format((float)$row['uctotal'], 2, '.', ''); ?></td>
                                            <td><?php echo number_format((float)$row['tgtotal'], 2, '.', ''); ?></td>
                                            <td><?php echo number_format((float)$row['uctotal']-$row['tgtotal'], 2, '.', ''); ?></td>
                                        </tr>
                                        <?php
                                         }
                                            ?>  
                                    </tbody>
                                    <tfoot style="background-color:yellow;color:#000;">
                                <tr>
                                    <td><b>TOTAL (GH₵)</b></td>
                                    <td><b><?php echo number_format((float)$overalluctotal, 2, '.', ''); ?></b></td>
                                    <td><b><?php echo number_format((float)$overalltgtotal, 2, '.', ''); ?></b></td>
                                    <td><b><?php echo number_format((float)$overallvariance, 2, '.', ''); ?></b></td>
                                </tr>
                                </tfoot>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->
    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <?php include('add_modal.php'); ?>
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
            $('#dataTables-1').dataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>

</body>

</html>
