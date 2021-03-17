<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../img/logo.svg"/>
<style>
<?php include '../css/style.css'; ?>
<?php include '../plugins/css/bootstrap.min.css'; ?>
</style>
</head>
<?php
include('conn.php');
include_once (__DIR__.'/ZenophSMSGH/lib/ZenophSMSGH.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

$ghc = mysqli_real_escape_string($conn, trim($_POST['ghc']));
$tolltypeid = mysqli_real_escape_string($conn, trim($_POST['tolltypeid']));
$issuer = mysqli_real_escape_string($conn, trim($_POST['issuer']));
$issid = mysqli_real_escape_string($conn, trim($_POST['issid']));
$area = mysqli_real_escape_string($conn, trim($_POST['area']));
$gcr = mysqli_real_escape_string($conn, trim($_POST['gcr']));
$phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
$tollpayer = mysqli_real_escape_string($conn, trim($_POST['tollpayer']));

$length = 10;
$tollnum = substr(str_shuffle(str_repeat($x='1234567890', ceil($length/strlen($x)) )),1,$length);

$del = "select * from tolltable where phone = '$tollpayer' and date(`moment`)=(CURDATE())";

$query = mysqli_query($conn,"select * from `tolltype` where tolltypeid = '$tolltypeid'");
while($row = mysqli_fetch_array($query)){
    $revenueoption = $row['tolltype'];

    
    $exist = mysqli_query($conn, $del);
    
    if (mysqli_num_rows($exist) > 0){
        echo "<script>alert('User is linked to already existing entries!')
        window.location = 'https://tcsys.programx.io/';
        </script>";
        exit;
    }

try{
$zs = new ZenophSMSGH();
$zs->setUser('support@programx.io');
$zs->setPassword('@programx.io');

// set other parameters.
$zs->setMessageType(ZenophSMSGH_MESSAGETYPE::TEXT);
$zs->setSenderId('BCMA');
$message = ''.$revenueoption.' payment made for GHS'.number_format((float)$ghc, 2, '.', '').' to '.$issuer.' ('.$phone.') - Birim Cent. Mun. Assembly. Reference number '.$tollnum.'.';
$zs->setMessage($message);

// add destinations.
$zs->addDestination($tollpayer);

//send the message.
$response = $zs->sendMessage();
}
catch(Exception $e) {
    //catching the exception
    echo '<div class="container mt-3"><div class="error box col-lg-5 col-sm-10">Error: ' .$e->getMessage();
    echo "..! <br>Contact your IT Administrator.<br> <a href='https://tcsys.programx.io/'><button class='btn btn-info'>OK</button></a></div></div>";
    exit;
  }
  


mysqli_query($conn, "INSERT INTO tolltable(userid, tolltypeid, amtc, collector, moment, tollnum, phone, areaid, gcr) VALUES('$issid', '$tolltypeid', '$ghc', '$issuer',NOW(),'$tollnum','$tollpayer', '$area','$gcr')");

mysqli_query($conn, "UPDATE targets SET colltotal = colltotal + $ghc WHERE userid='$issid' AND month(`moment`)=MONTH(CURDATE()) AND year(`moment`)=YEAR(CURDATE())");

echo "<script>alert('Operation successful!')
        window.location = 'https://tcsys.programx.io/';
        </script>";
mysqli_close($conn); // Connection Closed

}
}
?>
</html>