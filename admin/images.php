<?php

require('../include/database.php');
if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `project` WHERE `id` = $sno";
    $result = mysqli_query($db, $sql);
  }


if($_SERVER["REQUEST_METHOD"]=='POST'){

    if (isset( $_POST['snoEdit'])){
  
      $news_id=$_POST['snoEdit'];
  
      $title1=mysqli_real_escape_string($db,$_POST['title1']);
      $title3=mysqli_real_escape_string($db,$_POST['title3']);
      $title4=mysqli_real_escape_string($db,$_POST['title4']);
  
      $image=$_FILES['title2'];
      $filename=$image['name'];
      $filepath=$image['tmp_name'];
      $fileerror=$image['error'];
      if($fileerror==0){
          $destfile='../assets/' .$filename;
          move_uploaded_file($filepath, $destfile);
      }
      else{
        $sql = "SELECT * FROM `project` WHERE `id`=$news_id";
        $result = mysqli_query($db, $sql);
        $row = @mysqli_fetch_assoc($result);
  
        $destfile=$row['slide_name'];
        move_uploaded_file($destfile,$destfile);
       
    
      }
    
    
      $sql="UPDATE `project` SET `title` = '$title', `slide_name` = '$destfile' WHERE `project`.`slide_no` = $news_id;";
    
      $result=mysqli_query($db,$sql);
    
    
      if($result){
    
      $update=1;
      }
      else{
        $update=0;
      }
  
  
  
  
    }
    else{
  

    $title1=mysqli_real_escape_string($db,$_POST['title1']);
      $title3=mysqli_real_escape_string($db,$_POST['title3']);
      $title4=mysqli_real_escape_string($db,$_POST['title4']);
      $converted=str_replace("watch?v=","embed/" ,$title4);
  
    $image=$_FILES['title2'];
    $filename=$image['name'];
    $filepath=$image['tmp_name'];
    $fileerror=$image['error'];
    if($fileerror==0){
        $destfile='../assets/' .$filename;
        move_uploaded_file($filepath, $destfile);
        
    $sql="INSERT INTO `project` (`title`, `image`,`description`,`video`) VALUES ('$title1', '$destfile','$title3','$converted')";
  
    $result=mysqli_query($db,$sql);
    if($result){
      $insert=1;
      }
      else{
        $insert=0;
      }
  
    }
    else{
      echo '<script>
  
      alert("your file is not uploaded! try again!!");
      </script>';
  
    }
    
  
  
  }
  
  
    ?>
  
    <?php
  }
  
  
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Add Related images</h1>
    <form action="images1.php" method="POST" enctype="multipart/form-data">

    <input type="file" name="doc[]" multiple>
    <br>
    <br>
    <input type="submit" name="submit">
    </form>
</body>
</html>