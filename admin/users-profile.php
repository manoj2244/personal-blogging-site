<?php


require('../include/database.php');

session_start();
$_SESSION['email']="sdsads";
if(isset($_SESSION['msg1'])){
    
  echo '<script>

  alert("Incorrect current password");
  </script>';
  unset($_SESSION['msg1']);
}

if(isset($_SESSION['msg2'])){
    
  echo '<script>

  alert("Doesnot matched your password");
  </script>';
  unset($_SESSION['msg2']);
}
if(isset($_SESSION['msg3'])){
    
  echo '<script>

  alert("sucessfully submitted");
  </script>';
  unset($_SESSION['msg3']);
}
if(isset($_SESSION['msg4'])){
    
  echo '<script>

  alert("Entered Details are incorrect");
  </script>';
  unset($_SESSION['msg4']);
}
?>


<?php


if($_SERVER["REQUEST_METHOD"]=='POST'){

  $fullname=mysqli_real_escape_string($db,$_POST['fullname']);
  $email=mysqli_real_escape_string($db,$_POST['email']);
 
  

  $image=$_FILES['file'];
  $filename=$image['name'];
  $filepath=$image['tmp_name'];
  $fileerror=$image['error'];
  if($fileerror==0){
      $destfile='../assets/' .$filename;
      move_uploaded_file($filepath, $destfile);
  }
  else{
    $sql = "SELECT * FROM `login`";
    $result = mysqli_query($db, $sql);
     $row = mysqli_fetch_assoc($result);
    $destfile=$row['image'];
      move_uploaded_file($destfile,$destfile);

  }

  //$message=mysqli_real_escape_string($db_contact,$_POST['message']);

  $sql="UPDATE `login` SET `image` = '$destfile', `name` = '$fullname',`email`='$email' WHERE `login`.`id` = 1;";

  $result=mysqli_query($db,$sql);


  if($result){

    echo '<script>
    alert("sucessfully submitted");
    </script>';
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <?php

  include('../admin/includes/navbar.php');
  
  ?>

<?php

include('../admin/includes/leftside.php');

?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <?php

$sql = "SELECT * FROM `login`";
$result = mysqli_query($db, $sql);
$row = @mysqli_fetch_assoc($result);

    ?>


    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?=$row['image']?>" alt="Profile" style="width: 200px; height:113px; border-radius:50%; object-fit:cover">
              <h2><?=$row['name']?></h2>
            
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                    <p class="small fst-italic">Hellow, I am Uvraj Pokhrel from Danf nepal.This is my personal website.And here is my admin dashboard.</p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?=$row['name']?></div>
                  </div>

                 

              <?php

            $sql = "SELECT * FROM `contact`";
            $result = mysqli_query($db, $sql);
            $row = @mysqli_fetch_assoc($result)

                ?>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">NEPAL</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?=$row['city']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?=$row['mobile']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?=$row['email']?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <?php

$sql = "SELECT * FROM `login`";
$result = mysqli_query($db, $sql);
$row = @mysqli_fetch_assoc($result)

    ?>
                  <form method="POST" enctype="multipart/form-data" action=""> 
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="<?=$row['image']?>" alt="Profile">
                        <div class="pt-2" style="display: flex;">
                        <input type="file" class="form-control" name="file" id="file" placeholder="image" value="" style="width: 60%; margin-right:10px;">
                          <a href="#" class="btn btn-danger btn-lg" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>
                   
                   

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullname" type="text" class="form-control" id="fullName" value="<?=$row['name']?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="text" class="form-control" id="email" value="<?=$row['email']?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px">Hellow, I am Uvraj Pokhrel from Dang nepal.This is my personal website.And here is my admin dashboard.</textarea>
                      </div>
                    </div>



                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->
                  

                </div>

               

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="POST" action="action3.php">

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?php

include('../admin/includes/footer.php');

?>