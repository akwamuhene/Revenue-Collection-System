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

$amt = mysqli_real_escape_string($conn, trim($_POST['amt']));
$bal = mysqli_real_escape_string($conn, trim($_POST['bal']));
$paid = mysqli_real_escape_string($conn, trim($_POST['paid']));
$gcr = mysqli_real_escape_string($conn, trim($_POST['gcr']));
$rate = mysqli_real_escape_string($conn, trim($_POST['rate']));
$issuer = mysqli_real_escape_string($conn, trim($_POST['issuer']));
$issid = mysqli_real_escape_string($conn, trim($_POST['issid']));
$area = mysqli_real_escape_string($conn, trim($_POST['area']));
$phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
$taxpayer = mysqli_real_escape_string($conn, trim($_POST['taxpayer']));
$zero=0;
$hsenum = mysqli_real_escape_string($conn, trim($_POST['hsenum']));

$del = "select * from ratetable where phone = '$taxpayer' and date(`moment`)=(CURDATE())";
    
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
}
catch(Exception $e) {
    //catching the exception
    echo '<div class="container mt-3"><div class="error box col-lg-5 col-sm-10">Error: ' .$e->getMessage();
    echo "..! <br>Contact your IT Administrator.<br> <a href='https://tcsys.programx.io/'><button class='btn btn-info'>OK</button></a></div></div>";
    exit;
  }
    $aref = "select * from ratetable where hsenum='$hsenum' and year(`moment`)=YEAR(CURDATE())";
        
        $refexst = mysqli_query($conn, $aref);
    
    if (mysqli_num_rows($refexst) > 0){
mysqli_query($conn, "INSERT INTO ratetable(userid, rate, amt, bal, paid, gcr, collector, moment, hsenum, phone, areaid) VALUES('$issid', '$rate', '$zero', '$bal', '$paid', '$gcr', '$issuer',NOW(),'$hsenum','$taxpayer', '$area')");
    }else{
mysqli_query($conn, "INSERT INTO ratetable(userid, rate, amt, bal, paid, gcr, collector, moment, hsenum, phone, areaid) VALUES('$issid', '$rate', '$amt', '$bal', '$paid', '$gcr', '$issuer',NOW(),'$hsenum','$taxpayer', '$area')");
}
mysqli_query($conn, "UPDATE targets SET colltotal = colltotal + $paid WHERE userid='$issid' AND month(`moment`)=MONTH(CURDATE()) AND year(`moment`)=YEAR(CURDATE())");

// set other parameters.
$zs->setMessageType(ZenophSMSGH_MESSAGETYPE::TEXT);
$zs->setSenderId('BCMA');
$message = ''.$rate.' payment made for GHS'.number_format((float)$paid, 2, '.', '').' to '.$issuer.' ('.$phone.') - BCMA. Total Amt. Owed: GHS'.number_format((float)$amt, 2, '.', '').', Last Rem. Bal: GHS'.number_format((float)$bal, 2, '.', '').' GCR NO.: '.$gcr.' Hse No.: '.$hsenum.'.';
$zs->setMessage($message);

// add destinations.
$zs->addDestination($taxpayer);

//send the message.
$response = $zs->sendMessage();

echo "<script>alert('Operation successful!')
        window.location = 'https://tcsys.programx.io/';
        </script>";
mysqli_close($conn); // Connection Closed

}
?>
</html>