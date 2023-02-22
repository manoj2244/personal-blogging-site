  
 <?php
include('database.php');

$sql = "SELECT * FROM `login`";
$result = mysqli_query($db, $sql);
$row = @mysqli_fetch_assoc($result);
$row1=$row['verification_id'];
if(isset($_GET['id'])){
if($row1!=$_GET['id']){
	echo "Cannot access this file";
	exit;

}

}
else{

	echo "Cannot access this file";
	exit;

}

$msg="";
$i=5;
if($_SERVER["REQUEST_METHOD"]=='POST')

{
$sql = "SELECT * FROM `login`";
$result = mysqli_query($db, $sql);
$row = @mysqli_fetch_assoc($result);
$row1=$row['id'];


  $newpassword=mysqli_real_escape_string($db,$_POST['password']);
  $renewpassword=mysqli_real_escape_string($db,$_POST['cpassword']);
  //$currpass=mysqli_real_escape_string($db,$_POST['password']);


  //$currentpass=$row['passwords'];


   if($newpassword==$renewpassword){

    $sql="UPDATE `login` SET `passwords` = '$renewpassword' WHERE `login`.`id` = $row1";
    $result=mysqli_query($db,$sql);
   // $_SESSION['msg3']="sucessfully submitted";
   // header('location:logins-profile.php');
  $msg='sucessfully updated Now you  <a style="color:blue;" href="../index.php">login</a>';
 
  $i=0;
  }
  
 else{
   $msg= "password doesnot matched";

 }

}




 ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>login Form</title>
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
        box-shadow: 0rem .2rem .2rem rgba(0, 0, 0, 0.3);
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
		margin-top: 1.0rem;
		color:green;
		font-size:1.5rem;
	}
	.signup-form .message1{
		margin-top: 1.0rem;
		text-align: center;
		color:red;
	}

	p{
		font-size: 1.6rem;
	}
	.form-group input{
		font-size: 1.5rem;
	}
	.message1{
		font-size: 1.5rem;
	}
	@media(max-width:468px){
		html{
			font-size: 50%;
		}
	}
</style>
</head>
<body>
<div class="signup-form">
    <form method="POST" action="">
		<h2>Reset Password</h2>
		<p class="hint-text">Change Password.</p>
         
        <div class="form-group">
        	<input type="password" class="form-control" name="password" id="password" placeholder="password" required>
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="confirm password" required>
        </div>

		
		
		
            <button class="btn btn-success btn-lg btn-block text-center">Update Password</button>

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
echo '';
?>
</div>
        
		
    </form>
</div>
</body>
</html>                            