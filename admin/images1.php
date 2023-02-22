
  
<?php
require('../include/database.php');

$blog_id=0;

if(isset($_POST['submit'])){
    $sql = "SELECT * FROM `project`";
    $result = mysqli_query($db, $sql);
    

    
    while($row_blog = mysqli_fetch_assoc($result)){
        $blog_id=$row_blog['id'];

    }
    $blog_id=$blog_id+1;
    foreach($_FILES['doc']['name'] as $key=>$val){
        move_uploaded_file($_FILES['doc']['tmp_name'][$key],'../blog_image/'.$val);
        
        $file_path='../blog_image/'.$val;
        $sql="INSERT INTO blog_image (`image`,`blog_id`) values ('$file_path','$blog_id')";
        $result = mysqli_query($db, $sql);

    }

    header('location:project.php');

}

?>