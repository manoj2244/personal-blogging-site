<?php
include('database.php');
session_start();
if(isset($_GET['id'])){

    $id=mysqli_real_escape_string($db,$_GET['id']);
$sql = "SELECT * FROM `login`";
$result = mysqli_query($db, $sql);
$row = @mysqli_fetch_assoc($result);
if($row['verification_status']==0 && $id==$row['verification_id']){

    
    mysqli_query($db,"update login set verification_status='1' where verification_id='$id'");
    echo "Your account is verified  ";

    ?>


     <a href="reset.php?id=<?=$row['verification_id']?>" style="font-size:1.6rem"> Click here for password reset</a>
<?php
}
else{
    echo "<h2 style='color:red;text-align:center;margin-top:200px;font-size:1.6rem;'>Your Password Reset Link is expired!! please Try Again.</h2>";

}

}

else{
   // echo "Your Password Reset Link is expired!! please Try Again.";
   echo "<h2 style='color:red;text-align:center;margin-top:200px;font-size:1.6rem;'>Your Password Reset Link is expired!! please Try Again.</h2>";

}

?>

