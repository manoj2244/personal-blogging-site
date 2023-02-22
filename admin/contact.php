<?php
require('../include/database.php');

$insert=5;
$update=5;
session_start();
$_SESSION['email']="sdsads";

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `contact` WHERE `id` = $sno";
  $result = mysqli_query($db, $sql);
}

if($_SERVER["REQUEST_METHOD"]=='POST'){

  if (isset( $_POST['snoEdit'])){

    $news_id=$_POST['snoEdit'];

    
    $title=mysqli_real_escape_string($db,$_POST['title']);
    $title1=mysqli_real_escape_string($db,$_POST['title1']);
    $title3=mysqli_real_escape_string($db,$_POST['title3']);
    $title4=mysqli_real_escape_string($db,$_POST['title4']);

    $title5=mysqli_real_escape_string($db,$_POST['title5']);
    $title6=mysqli_real_escape_string($db,$_POST['title6']);
    $title7=mysqli_real_escape_string($db,$_POST['title7']);
    $title8=mysqli_real_escape_string($db,$_POST['title8']);

    $title9=mysqli_real_escape_string($db,$_POST['title9']);
  
  

   
    
  
  
    $sql="UPDATE `contact` SET `country` = '$title', `city` = '$title1',`streat`='$title3',`email`='$title4',`instagram`='$title5',`facebook`='$title6',`mobile`='$title7',`per_address`='$title8',`per-mob`='$title9' WHERE `contact`.`id` = $news_id;";
  
    $result=mysqli_query($db,$sql);
  
  
    if($result){
  
    $update=1;
    }
    else{
      $update=0;
    }




  }
  else{

    $title=mysqli_real_escape_string($db,$_POST['title']);
    $title1=mysqli_real_escape_string($db,$_POST['title1']);
    $title3=mysqli_real_escape_string($db,$_POST['title3']);
    $title4=mysqli_real_escape_string($db,$_POST['title4']);

    $title5=mysqli_real_escape_string($db,$_POST['title5']);
    $title6=mysqli_real_escape_string($db,$_POST['title6']);
    $title7=mysqli_real_escape_string($db,$_POST['title7']);
    $title8=mysqli_real_escape_string($db,$_POST['title8']);

    $title9=mysqli_real_escape_string($db,$_POST['title9']);
  


 
      
  $sql="INSERT INTO `contact` (`country`,`city`,`streat`,`email`,`instagram`,`facebook`,`mobile`,`per_address`,`per-mob`) VALUES ('$title', '$title1','$title3','$title4','$title5','$title6','$title7','$title8','$title9')";

  $result=mysqli_query($db,$sql);
  if($result){
    $insert=1;
    }
    else{
      $insert=0;
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

  <title>Uvraj Dashboard</title>
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


</head>

<body>

   <!-- Basic Modal -->
           
              <div class="modal fade" id="editModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit contact</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                                  <form action="" method="POST" enctype="multipart/form-data">

                                  <input type="hidden" name="snoEdit" id="snoEdit">
                                  <div class="form-group">
              <label for="desc">Country</label>
              <textarea class="form-control" id="title" name="title" rows="2"></textarea>
            </div> 
    <div class="form-group">
              <label for="desc">City</label>
              <textarea class="form-control" id="title1" name="title1" rows="2"></textarea>
            </div> 
            <div class="form-group">
              <label for="desc">Street</label>
              <textarea class="form-control" id="title3" name="title3" rows="2"></textarea>
            </div> 
            <div class="form-group">
              <label for="desc">Email</label>
              <textarea class="form-control" id="title4" name="title4" rows="2"></textarea>
            </div> 
            <div class="form-group">
              <label for="desc">Instagram</label>
              <textarea class="form-control" id="title5" name="title5" rows="2"></textarea>
            </div> 
    <div class="form-group">
              <label for="desc">Facebook</label>
              <textarea class="form-control" id="title6" name="title6" rows="2"></textarea>
            </div> 
            <div class="form-group">
              <label for="desc">Mobile Number</label>
              <textarea class="form-control" id="title7" name="title7" rows="2"></textarea>
            </div> 
            <div class="form-group">
              <label for="desc">Permanent Address</label>
              <textarea class="form-control" id="title8" name="title8" rows="2"></textarea>
            </div> 
            <div class="form-group">
              <label for="desc">Personal mobile Number</label>
              <textarea class="form-control" id="title9" name="title9" rows="2"></textarea>
            </div>

                    <button type="submit" class="btn btn-primary my-2">Update</button>
                  </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
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
    Your contact has been inserted successfully
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  }
  if($insert==0){
   echo" <div class='alert alert-danger alert-dismissible fade show' role='alert'>
    Your contact is not added sucessfully!
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  }
  if($update==1){
    echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
    Your contact has been updated successfully
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  }
  if($update==0){
   echo" <div class='alert alert-danger alert-dismissible fade show' role='alert'>
    Your contact is not updated sucessfully!
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  }


  ?>

    <div class="pagetitle">


      <h1>contact Section</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">contact</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

   
    <div class="container my-4">
    <h2>    contact</h2>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
              <label for="desc">Country</label>
              <textarea class="form-control" id="title" name="title" rows="2"></textarea>
            </div> 
    <div class="form-group">
              <label for="desc">City</label>
              <textarea class="form-control" id="title1" name="title1" rows="2"></textarea>
            </div> 
            <div class="form-group">
              <label for="desc">Street</label>
              <textarea class="form-control" id="title3" name="title3" rows="2"></textarea>
            </div> 
            <div class="form-group">
              <label for="desc">Email</label>
              <textarea class="form-control" id="title3" name="title4" rows="2"></textarea>
            </div> 
            <div class="form-group">
              <label for="desc">Instagram</label>
              <textarea class="form-control" id="title5" name="title5" rows="2"></textarea>
            </div> 
    <div class="form-group">
              <label for="desc">Facebook</label>
              <textarea class="form-control" id="title6" name="title6" rows="2"></textarea>
            </div> 
            <div class="form-group">
              <label for="desc">Mobile Number</label>
              <textarea class="form-control" id="title7" name="title7" rows="2"></textarea>
            </div> 
            <div class="form-group">
              <label for="desc">Permanent Address</label>
              <textarea class="form-control" id="title8" name="title8" rows="2"></textarea>
            </div> 
            <div class="form-group">
              <label for="desc">Personal mobile Number</label>
              <textarea class="form-control" id="title9" name="title9" rows="2"></textarea>
            </div>

   
      <button type="submit" class="btn btn-primary my-2">Add</button>
    </form>
  </div>

  
  <div class="container my-4">

    <table class="table" id="myTable">
      <thead>
        <tr>
          <th width="5%" scope="col">S.No</th>
          <th width="30%" scope="col">country</th>
          <th width="20%" scope="col">City</th>
          <th width="20%" scope="col">Street</th>
          <th width="20%" scope="col">Email</th>
          <th width="30%" scope="col">Instagram</th>
          <th width="20%" scope="col">Facebook</th>
          <th width="20%" scope="col">Mobile</th>
          <th width="20%" scope="col">Permanent Adress</th>
          <th width="20%" scope="col">Personal number</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `contact`";
          $result = mysqli_query($db, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['country'] . "</td>
           
            <td>". $row['city'] . "</td>
            <td>". $row['streat'] . "</td>
            <td>". $row['email'] . "</td>
            <td>". $row['instagram'] . "</td>
            <td>". $row['facebook'] . "</td>
            <td>". $row['mobile'] . "</td>
            <td>". $row['per_address'] . "</td>
            <td>". $row['per-mob'] . "</td>
           
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
        title1 = tr.getElementsByTagName("td")[1].innerText;
        title2 = tr.getElementsByTagName("td")[2].innerText;
        title3 = tr.getElementsByTagName("td")[3].innerText;

        title4 = tr.getElementsByTagName("td")[4].innerText;
        title5 = tr.getElementsByTagName("td")[5].innerText;
        title6 = tr.getElementsByTagName("td")[6].innerText;
        title7 = tr.getElementsByTagName("td")[7].innerText;
        title8 = tr.getElementsByTagName("td")[8].innerText;


        //file = tr.getElementsByTagName("td")[1].innerText;
       
     
       var titleedit=document.getElementById('title');
       var title11=document.getElementById('title1');
       var title22=document.getElementById('title3');
       var title33=document.getElementById('title4');

       var title44=document.getElementById('title5');
       var title55=document.getElementById('title6');
       var title66=document.getElementById('title7');
       var title77=document.getElementById('title8');
       var title88=document.getElementById('title9');
       
        titleedit.value=title;
        title11.value=title1;
        title22.value=title2;
        title33.value=title3;

        title44.value=title4;
        title55.value=title5;
        title66.value=title6;

        title77.value=title7;
        title88.value=title8;
               
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
          window.location = `../admin/contact.php?delete=${sno}`;
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

