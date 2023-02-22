<?php

require('database.php');



$type=$_POST['type'];
$id=$_POST['id'];

if($type=="Like"){
  $sql="UPDATE blog SET likes=likes+1 where id=$id";
  $result = mysqli_query($db, $sql);
}
else{
  $sql="UPDATE blog SET likes=likes-1 where id=$id";
  $result = mysqli_query($db, $sql);
}

?>