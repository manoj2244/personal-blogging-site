   <!-- Right side columns -->
   <div class="col-lg-4">

<!-- Recent Activity -->
<div class="card">
  <div class="filter">
    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
      <li class="dropdown-header text-start">
        <h6>Filter</h6>
      </li>

      <li><a class="dropdown-item" href="#">Today</a></li>
      <li><a class="dropdown-item" href="#">This Month</a></li>
      <li><a class="dropdown-item" href="#">This Year</a></li>
    </ul>
  </div>

  <div class="card-body">
    <h5 class="card-title">Messages <span>| Year</span></h5>

    </li>
<?php 
      $sql = "SELECT * FROM `touch`ORDER BY id DESC LIMIT 0,5";
      $result = mysqli_query($db, $sql);
      $sno = 0;
      while($row = mysqli_fetch_assoc($result)){

        ?>


        <div class="activity my-4">

      <div class="activity-item d-flex">
        <div class="activite-label"><?= date('M,  d', strtotime(($row['submit_date']))) ?></div>
        <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
        <div class="activity-content">
          <a href="#" class="fw-bold text-dark"><?=$row['name']?></a>
          <p style="width: 170px;letter-spacing:0.5px"><?=substr($row['message'],0,40)?></p>
        </div>
      </div>

     

     

    </div>

<?php
      }


      ?>

    
    
  </div>
</div><!-- End Recent Activity -->



</div><!-- End Right side columns -->