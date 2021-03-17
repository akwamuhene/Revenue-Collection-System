<?php
session_start();
include('conn.php');
		
  if(isset($_POST['submit'])){
    $hsenum = $_POST['hsenum'];
	$year = $_POST['year'];
  $query=mysqli_query($conn,"select ratetableid, rate, userid, amt, sum(paid) AS sumamt, bal, gcr, collector, moment, hsenum, phone, areaid from `ratetable` where hsenum like '%$hsenum%' && year(`moment`) like '%$year%' order by moment DESC LIMIT 1");
   
    if (mysqli_num_rows($query)==0){
        ?>
        <div class="col-md-12"><h1 class="text-center">No results found</h1></div>
        <?php
    }else{
  
  while($row=mysqli_fetch_array($query)){
    $ratetableid=$row['ratetableid'];
    echo include('../ratespaid.php');
}
}
}
?>