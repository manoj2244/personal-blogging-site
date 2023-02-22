<?php


include('database.php');
// Program to display URL of current page.
  
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $link = "https";
else
    $link = "http";
  
// Here append the common URL characters.
$link .= "://";
  
// Append the host(domain name, ip) to the URL.
$link .= $_SERVER['HTTP_HOST'];
  
// Append the requested resource location to the URL
$link .= $_SERVER['REQUEST_URI'];
$url = $link;
$parse = parse_url($url);
$i=5;
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
require 'includes/PHPMailerAutoload.php';
//Define name 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$msg="";
if(isset($_POST['submit'])){
	
	$email=$_POST['email'];
	
	$check=mysqli_num_rows(mysqli_query($db,"select * from login where email='$email'"));

	
	if($check==0){
		$msg="Email id is not exist!!";
		$i=1;
	}
	else{
		$i=0;
		$verification_id=rand(111111111,999999999);

		$sql = "SELECT * FROM `login`";
		$result = mysqli_query($db, $sql);
		$row = @mysqli_fetch_assoc($result);
		$row1=$row['id'];
		
		// mysqli_query($db,"insert into login(name,email,password,verification_status,verification_id) values('$name','$email','$password',0,'$verification_id')");

		$sql="UPDATE `login` SET `verification_id`='$verification_id',`verification_status`='0' WHERE `login`.`id` = $row1";
		$result = mysqli_query($db, $sql);
		
		
		$msg="We've just sent a verification link to <strong>$email</strong>. Please check your inbox and click on the link to get started. If you can't find this email (which could be due to spam filters), just request a new one here.";
		
		$mailHtml='Hi, '.$row['name'].' Please confirm your account registration by clicking the button or link below: <a href="http://'.$parse['host'].'/uvraj/include/check.php?id='.$verification_id.'">click here</a>';
		
		smtp_mailer($email,'Account Verification',$mailHtml);
		
	}
}

function smtp_mailer($to,$subject,$msg){
//Include required PHPMailer files

//Create instance of PHPMailer
$mail = new PHPMailer();

//Set mailer to use smtp
$mail->isSMTP();
//Define smtp host
$mail->Host = "smtp.gmail.com";
//$mail->Host = "smtp.nepal.gov.np";
//Enable smtp authentication
$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
$mail->SMTPSecure = "tls";
//Port to connect smtp
$mail->Port = 587;
//$mail->Port = 465;
//Set gmail username
$mail->Username = "nepali2244manoj@gmail.com";
//Set gmail password
$mail->Password = "daavkcmzdnkzpzqw";
//Email subject
$mail->Subject = $subject;
//Set sender email
$mail->setFrom('nepali2244manoj@gmail.com');
$mail->FromName = 'Mailer_PHP';
//Enable HTML
$mail->isHTML(true);

$mail->Body = $msg;
//Add recipient
$mail->addAddress($to);
//Finally send email

if (!$mail->send()) {
echo 'Mailer Error: ' . $mail->ErrorInfo;
}
//Closing smtp connection
$mail->smtpClose();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Registration Form</title>
<link rel="stylesheet" href="./css/bootstrap.min.css">

<script src="./js/bootstrap.min.js"></script>
<style type="text/css">
	html{
		font-size: 62.5%;
	}
	body{
		color: #fff;
		background: #63738a;
		font-family: 'Roboto', sans-serif;
	}
    .form-control{
		height: 4.0rem;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #5cb85c;
	}
    .form-control, .btn{        
        border-radius: .3rem;
    }
	.signup-form{
		width: 40.0rem;
		margin: 0 auto;
		padding: 3.0rem 0;
	}
	.signup-form h2{
		color: #636363;
        margin: 0 0 1.5rem;
		position: relative;
		text-align: center;
    }
	.signup-form h2:before, .signup-form h2:after{
		content: "";
		height: .2rem;
		width: 15%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
    .signup-form .hint-text{
		color: #999;
		margin-bottom: 3.0rem;
		text-align: center;
	}
    .signup-form form{
		color: #999;
		border-radius: .3rem;
    	margin-bottom: 1.5rem;
        background: #f2f3f7;
        box-shadow: 0px .2rem .2rem rgba(0, 0, 0, 0.3);
        padding: 3.0rem;
    }
	.signup-form .form-group{
		margin-bottom: 2.0rem;
	}
	.signup-form input[type="checkbox"]{
		margin-top: .3rem;
	}
	.signup-form .btn{        
        font-size: 1.6rem;
        font-weight: bold;		
		min-width: 14.0rem;
        outline: none !important;
    }
	.signup-form .row div:first-child{
		padding-right: 1.0rem;
	}
	.signup-form .row div:last-child{
		padding-left: 1.0rem;
	}    	
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #5cb85c;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
	}  

	.signup-form .message{
		text-align: center;
		color:green;
	}
	.signup-form .message1{
		text-align: center;
		color:red;
	}
	p{
		font-size: 1.6rem;
	}
	.form-control{
		font-size: 1.6rem;
	}
	.text-center{
		font-size: 1.5rem;
	}
		.message{
		font-size: 1.6rem;
	}
			.message1{
		font-size: 1.6rem;
	}

	
	@media(max-width:468px){
		html{
			font-size: 50%;
		}
		.signup-form{
			width: 40rem;
		}
		form{
		    height:50.0rem;
		}
			.text-center{
		font-size: 2rem;
	}
	p{
	    font-size:2rem;
	}
	h2{
	    font-size:2rem;
	}
	.form-control{
		font-size: 2rem;
		padding:2.5rem;
		padding-left:1.5rem;
	}
	}
	
		
	
</style>
</head>
<body>
<div class="signup-form">
    <form method="post">
		<h2>Reset Password</h2>
		<p class="hint-text">Please Enter Your Valid Email Address To reset Password</p>
        
        <div class="form-group">
        	<input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
        </div>
	
		
		<div class="form-group text-center">
            <button type="submit"  name="submit" class="btn btn-success btn-lg btn-block">Send Password Reset Link</button>
        </div>
         <?php

		 if($i==0)
		 {
			 $cl="message";
		 }
		 else{
			 $cl="message1";
		 }
		 ?>
		
		<div class="<?=$cl?>">
		<?php
		echo $msg;
		?>
		</div>
    </form>
	<div class="text-center">If you have password <a style="color: #00eb48;"  href="../admin/login.php">Login</a></div>
</div>
</body>
</html>                            