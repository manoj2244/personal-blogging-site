<?php
require('../include/database.php');

$insert=5;
$update=5;
session_start();
$_SESSION['email']="sdsads";

if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `blog` WHERE `id` = $sno";
    $result = mysqli_query($db, $sql);
  }

  
  
  
  if($_SERVER["REQUEST_METHOD"]=='POST'){
  
      if (isset( $_POST['snoEdit'])){
    
        $news_id=$_POST['snoEdit'];
    
        $title1=mysqli_real_escape_string($db,$_POST['title1']);
        $title3=mysqli_real_escape_string($db,$_POST['title3']);
        $title4=mysqli_real_escape_string($db,$_POST['title4']);
    
        $title5=mysqli_real_escape_string($db,$_POST['title5']);
        $title6=mysqli_real_escape_string($db,$_POST['title6']);
        $image=$_FILES['title2'];
        $filename=$image['name'];
        $filepath=$image['tmp_name'];
        $fileerror=$image['error'];
        if($fileerror==0){
            $destfile='../assets/' .$filename;
            move_uploaded_file($filepath, $destfile);
        }
        else{
          $sql = "SELECT * FROM `blog` WHERE `id`=$news_id";
          $result = mysqli_query($db, $sql);
          $row = @mysqli_fetch_assoc($result);
    
          $destfile=$row['slide_name'];
          move_uploaded_file($destfile,$destfile);
         
      
        }
      
      
        $sql="UPDATE `blog` SET `title` = '$title', `slide_name` = '$destfile' WHERE `blog`.`slide_no` = $news_id;";
      
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
        
        $title5=mysqli_real_escape_string($db,$_POST['title5']);
        $title6=mysqli_real_escape_string($db,$_POST['title6']);

        $converted=str_replace("watch?v=","embed/" ,$title4);
    
      $image=$_FILES['title2'];
      $filename=$image['name'];
      $filepath=$image['tmp_name'];
      $fileerror=$image['error'];
      if($fileerror==0){
          $destfile='../assets/' .$filename;
          move_uploaded_file($filepath, $destfile);
          
      $sql="INSERT INTO `blog` (`title`, `image`,`description`,`link`,`category`,`date`) VALUES ('$title1', '$destfile','$title3','$converted','$title5','$title6')";
    
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
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Uvraj pokhrel</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
 <link href="assets/main-image.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script>
      function post(){
      
        var d=document.getElementById("select");
        var display=d.options[d.selectedIndex].text;

        var e=document.getElementById("title100").value=display;
       
      }
    </script>


</head>

<body>

   <!-- Basic Modal -->
           
              <div class="modal fade" id="editModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit data</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                                  <form action="images.php" method="POST" enctype="multipart/form-data">

                                  <input type="hidden" name="snoEdit" id="snoEdit">
                                  <div class="form-group">
              <label for="desc">Update Word FIle Content</label>
              <textarea class="form-control" id="title" name="title" rows="3" value=""></textarea>
            </div>
                    <button type="submit" class="btn btn-primary my-2">update</button>
                  </form>
                    </div>
                   
                  </div>
                </div>
              </div><!-- End Basic Modal-->
<?php

include('../admin/includes/navbar.php');

?>


<?php

include('../admin/includes/leftside.php');

?>




  <main id="main" class="main">

  <?php



  if($insert==1){
    echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
    Your data has been inserted successfully
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  }
  if($insert==0){
   echo" <div class='alert alert-danger alert-dismissible fade show' role='alert'>
    Your data is not added sucessfully!
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  }
  if($update==1){
    echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
    Your data has been updated successfully
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  }
  if($update==0){
   echo" <div class='alert alert-danger alert-dismissible fade show' role='alert'>
    Your data is not updated sucessfully!
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  }


  ?>

    <div class="pagetitle">


      <h1>Blog Section</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">blog</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

   
    <div class="container my-4">
    <h2>Add blog</h2>
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
                      <label for="titles">Title</label>
                      <input type="text" class="form-control" id="title1" name="title1" value="">
                    </div>
                    <div class="form-group">
                      <label for="titles">Image</label>
                      <input type="file" class="form-control" id="title2" name="title2" value="">
                    </div>
    <div class="form-group">
              <label for="desc">Add Word FIle Content</label>
              <textarea class="form-control" id="title3" name="title3" rows="3"></textarea>
            </div> 
            <div class="form-group">
                      <label for="titles">Video</label>
                      <input type="text" class="form-control" id="title4" name="title4" value="">
                    </div>
                    <div class="form-group" style="margin-top: 12px; margin-bottom:12px;">
                        <?php
                        
$sql = "SELECT * FROM `category`";
$result = mysqli_query($db, $sql);


                        ?>
        <label for="title1">Category</label>
        <select name="select" id="select" onchange="post();"; style="padding: 8px;">
        <?php
        while($row_cat = @mysqli_fetch_assoc($result)){
        ?>
        <option value="1"><?=$row_cat['cate_name']?></option>
        <?php
        }
        ?>
      </select>
        <input type="text" class="form-control" id="title100" name="title5" aria-describedby="emailHelp" value="">
      </div>
                    <div class="form-group">
                      <label for="titles">Date</label>
                      <input type="text" class="form-control" id="title6" name="title6" value="">
                    </div>

 
      <button type="submit" class="btn btn-primary my-2">Add</button>
    </form>
  </div>

  
  <div class="container my-4">

    <table class="table" id="myTable">
      <thead>
        <tr>
          <th width="5%" scope="col">S.No</th>
          <th width="" scope="col">Title</th>
          <th width="20%" scope="col">image</th>
          <th width="20%" scope="col">Description</th>
          <th width="5%" scope="col">Video</th>
          <th width="" scope="col">category</th>
          <th width="15%" scope="col">Date</th>
          
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `blog`";
          $result = mysqli_query($db, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['title'] . "</td>
            <td> <img src='".$row['image']."' style='width:150px;height:150px;object-fit:cover;'></td>
            <td>". substr($row['description'] ,0,150). "</td>
            <td>". $row['link'] . "</td>
            <td>". $row['category'] . "</td>
            <td>". $row['date'] . "</td>
            
            <td> <button class='edit btn btn-sm btn-primary'id=".$row['id'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['id'].">Delete</button></td>
          </tr>";
        } 
          ?>


      </tbody>
    </table>
  </div>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->


  <?php

include('../admin/includes/footer.php');

?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>


<script>
  edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        //file = tr.getElementsByTagName("td")[1].innerText;
     
       var titleedit=document.getElementById('title');
       var fileedit=document.getElementById('file1');
        titleedit.value=title;
       // fileedit.innerText=file;
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this data!")) {
          console.log("yes");
          window.location = `../admin/blogs.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })

    
    </script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>
  <script>
 CKEDITOR.replace( 'title3', {
  height: 300,
  extraPlugins:'filebrowser',
  filebrowserUploadUrl: "upload.php",
  filebrowserBrowseUrl:'browser.php',
  filebrowserUploadMethod:"form"
 });
</script>

