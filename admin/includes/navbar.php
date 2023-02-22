<?php

require('../include/database.php');

?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="./index.php" class="logo d-flex align-items-center">
        <img src="../assets/profile1.png" alt="" style="max-height:45px">
        <span class="d-none d-lg-block">Uvraj Dashboard</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->



        <?php

$sql = "SELECT * FROM `touch`";
$result = mysqli_query($db, $sql);
$row1 = mysqli_num_rows($result);
?>
        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number"><?=$row1?></span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
            
              You have <?=$row1?> new messages
              <a href="/admin/contact_us.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
<?php 
      $sql = "SELECT * FROM `touch`ORDER BY id DESC LIMIT 0,3";
      $result = mysqli_query($db, $sql);
      $sno = 0;
      while($row = mysqli_fetch_assoc($result)){

        ?>
        <li class="message-item">
              <a href="#">
               
                <div>
                  <h4><?=$row['name']?></h4>
                  <p><?=$row['email']?></p>
                  <p><?=substr($row['message'],0,50)?></p>
                  <p><?= date('M,  d,  Y', strtotime(($row['submit_date']))) ?></p>
                </div>
              </a>
            </li>
            <li>
            <hr class="dropdown-divider">
          </li>

          <?php
        
     
    } 
      ?>

            
         

            <li class="dropdown-footer">
              <a href="/admin/contact_us.php">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <?php

            $sql = "SELECT * FROM `login`";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);

        ?>

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?=$row['image']?>" alt="Profile" class="" style="height: 45px; width:38px; border-radius:50%; object-fit:cover;">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?=$row['name']?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?=$row['name']?></h6>
             
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

          
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

           
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
