<?php
require('../include/database.php');

$insert=5;
$update=5;

session_start();
$_SESSION['email']="sdsads";
if(isset($_GET['delete1'])){
  $sno = $_GET['delete1'];
  $delete = true;
  $sql = "DELETE FROM `touch` WHERE `id` = $sno";
  $result = mysqli_query($db, $sql);
}




?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Uvraj Pokhrel</title>
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
  <
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  
           



              <div class="modal fade" id="editModal1" tabindex="-1">
                <div class="modal-dialog modal-fullscreen">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Show Message Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                                  <form action="" method="POST" enctype="multipart/form-data">

                                  <input type="hidden" name="snoEdit" id="snoEdit">
                                  
                                  <div class="form-group">
        <label for="title">	fullname</label>
        <input type="text" class="form-control" id="titles" name="titles" aria-describedby="emailHelp" value="">
      </div>
      <div class="form-group">
        <label for="title1">email.</label>
        <input type="text" class="form-control" id="title1s" name="title1s" aria-describedby="emailHelp" value="">
      </div>
      <div class="form-group">
        <label for="title2">phone
         </label>
        <input type="text" class="form-control" id="title2s" name="title2s" aria-describedby="emailHelp" value="">
      </div>
      <div class="form-group">
        <label for="title2">phone
         </label>
        <input type="text" class="form-control" id="title3s" name="title3s" aria-describedby="emailHelp" value="">
      </div>
     
     
                   
                  </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     
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

 


  </div>

  <div class="container my-4"id="all">


  <h2>Showing Messages From Visitors</h2>

<table class="table" id="myTable1">
  <thead>
    <tr>
      <th width="5%" scope="col">S.No</th>
      <th width="10%" scope="col">	fullname</th>
      <th width="10%" scope="col">email</th>
      <th width="" scope="col">Message</th>
      <th width="" scope="col">Date</th>
 
    
      <th   width=""  scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $sql = "SELECT * FROM `touch`ORDER BY id DESC";
      $result = mysqli_query($db, $sql);
      $sno = 0;
      while($row = mysqli_fetch_assoc($result)){
        $sno = $sno + 1;
        echo "<tr>
        <th scope='row'>". $sno . "</th>
        <td>". $row['name'] . "</td>
        <td>".$row['email']. "</td>
        <td>".$row['message']. "</td>
        <td>".date("M D Y", strtotime($row['submit_date'])). "</td>
       
        <td> <button class='edit1 btn btn-sm btn-primary'id=".$row['id'].">View</button><button class='delete1 btn btn-sm btn-primary' id=d".$row['id'].">Delete</button></td>
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
  edit1 = document.getElementsByClassName('edit1');
    Array.from(edit1).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        titles = tr.getElementsByTagName("td")[0].innerText;
        title1s = tr.getElementsByTagName("td")[1].innerText;
        title2s = tr.getElementsByTagName("td")[2].innerText;
        title3s = tr.getElementsByTagName("td")[3].innerText;
   
       // title4s= tr.getElementsByTagName("td")[4].innerText;
       
      
        
      
     
       var titleedits=document.getElementById('titles');
       var titleedit1s=document.getElementById('title1s');
       var titleedit2s=document.getElementById('title2s');
       var titleedit3s=document.getElementById('title3s');
    
       
     
      
        titleedits.value=titles;
        titleedit1s.value=title1s;
        titleedit2s.value=title2s;
        titleedit3s.value=title3s;
      
     
      
      
       
        snoEdit.value = e.target.id;
       
        $('#editModal1').modal('toggle');
      })
    })

    

     deletes = document.getElementsByClassName('delete1');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this Message!")) {
          console.log("yes");
          window.location = `../admin/message.php?delete1=${sno}`;
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
    $(document).ready(function () {
      $('#myTable1').DataTable();

    });
  </script>

