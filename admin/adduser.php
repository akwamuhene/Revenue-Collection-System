<?php
use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    date_default_timezone_set('Africa/Accra');
    
    require "./vendor/autoload.php";
	include('../server/conn.php');
	include_once (__DIR__.'/ZenophSMSGH/lib/ZenophSMSGH.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$fname=mysqli_real_escape_string($conn, trim($_POST['fname']));
	$lname=mysqli_real_escape_string($conn, trim($_POST['lname']));
	$gender=mysqli_real_escape_string($conn, trim($_POST['gender']));
	$dob=mysqli_real_escape_string($conn, trim($_POST['dob']));
	$email=mysqli_real_escape_string($conn, trim($_POST['email']));
	$phone=mysqli_real_escape_string($conn, trim($_POST['phone']));
	$passw = mysqli_real_escape_string($conn, trim($_POST['pass']));
	$pass = password_hash($passw, PASSWORD_DEFAULT);
	
	$access=mysqli_real_escape_string($conn, trim($_POST['access']));
	
	$mailid  = $email;
    $username = strstr($mailid, '@', true);
    $user = $username;
    
	$suspend=0;
	$areaid = 0;
	
	$sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            
            // This is to check whether the query results was TRUE(exist) or FALSE(Does not exist)
            $Check = mysqli_num_rows($result);
            if ($Check > 0) {
                echo '<script> alert("Email already registered")</script>';
                echo '<script> window.location="https://tcsys.programx.io/admin/"</script>';
                    }else{
                        mysqli_query($conn,"insert into users(user, pass, fname, lname, sex, dob, email, phone, dateregistered, access, suspend, areaid) values ('$user', '$pass', '$fname', '$lname', '$gender', '$dob','$email', '$phone', NOW(), '$access', '$suspend','$suspend')");
	$userid=mysqli_insert_id($conn);
	mysqli_query($conn,"insert into userstotal(userid, amount) values ('$userid', '0')");
	
	try{
            $zs = new ZenophSMSGH();
            $zs->setUser('support@programx.io');
            $zs->setPassword('@programx.io');
            
            // set other parameters.
            $zs->setMessageType(ZenophSMSGH_MESSAGETYPE::TEXT);
            $zs->setSenderId('BCMA');
            $message = 'Hello '.$fname.', Congratulations! We are happy to inform you that your Birim Central Municipal Assembly Revenue Collection Account has been successfully created. We\'re happy to have you on board. Use the details below to login. username: '.$user.' and Password: '.$passw.'.';
            $zs->setMessage($message);
            
            // add destinations.
            $zs->addDestination($phone);
            
            //send the message.
            $response = $zs->sendMessage();
            }
            catch(Exception $e) {
                //catching the exception
                echo '<div class="container mt-3"><div class="error box col-lg-5 col-sm-10">Error: ' .$e->getMessage();
                echo "..! <br>Contact your IT Administrator.<br> <a href='https://tcsys.programx.io/'><button class='btn btn-info'>OK</button></a></div></div>";
                exit;
              }
	
	$m = new PHPMailer;

    $m->isSMTP();
    $m->SMTPauth = true;
    $m->SMTPDebug = 0;

    $m->Host = 'mail.programx.io';
    $m->Username = 'info@programx.io';
    $m->Password = '@program-x2201';
    $m->SMTPSecure = 'ssl';
    $m->Port = 465;

    $m->isHTML(true);

    $m->Subject = 'Birim Central Municipal Assembly Revenue Collection Registration Confirmation';

    $m->Body ='<p>Dear '.$fname.', <br> Congratulations! We are happy to inform you that your Birim Central Municipal Assembly Revenue Collection Account has been successfully created. <br> We\'re happy to have you on board. Use the details below to login.<br>
    <span>Username: <span style="color:red;">'.$user.'</span></span>
    <span>Password: <span style="color:red;">'.$passw.'</span></span><br>
    <h2> Click here to Access the <a href="https://tcsys.programx.io">Login</a></h2>
    <p><h4>Regards, <br> Collins Asante Adoma <br><i>Director IT & Design Team</i></h4></p>';
    $m->AddReplyTo('info@programx.io', 'Programx Information Technology Services');

    $m->FromName = 'Birim Central Municipal Assembly';

    $m->SetFrom('info@programx.io');
    
    $m->AddAddress($email);
    
    $m->send(); 
	?>
		<script>
			window.alert('user added successfully!');
			window.alert('user credentials has been sent email and phone!');
			window.location='https://tcsys.programx.io/admin/collectors.php';
		</script>
	<?php
}
}
?>