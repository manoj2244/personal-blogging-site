
<?php
session_start();
require('./include/database.php');
$sql="UPDATE website_visitor SET counter_visitor=counter_visitor+1";
  $result = mysqli_query($db, $sql);


$k=1;
$insert=0;

?>
<?php

if($_SERVER["REQUEST_METHOD"]=='POST'){
  


  $fullname=mysqli_real_escape_string($db,$_POST['name']);
  $email=mysqli_real_escape_string($db,$_POST['email']);
  $text=mysqli_real_escape_string($db,$_POST['text']);
 


  $sql="INSERT INTO `touch` (`name`, `email`, `message`, `submit_date`) VALUES ('$fullname', '$email', '$text', current_timestamp())";

  $result=mysqli_query($db,$sql);
  if($result){
  
    $insert=1;
    }




}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- color of address bar in mobile browser -->
  <meta name="theme-color" content="#2B2B35">
  <!-- favicon  -->
  <link rel="shortcut icon" href="img/thumbnail.png" type="image/x-icon">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="css/plugins/bootstrap.min.css">
  <!-- font awesome css -->
  <link rel="stylesheet" href="css/plugins/font-awesome.min.css">
  <!-- swiper css -->
  <link rel="stylesheet" href="css/plugins/swiper.min.css">
  <!-- fancybox css -->
  <link rel="stylesheet" href="css/plugins/fancybox.min.css">
  <!-- main css -->
  <link rel="stylesheet" href="css/style.css?<?php echo time();?>">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style-custome.css">

  <style>
    #dismiss{
      transition: all 0.3s !important;
      
    }
  .cut:hover{
    cursor: pointer;



  }</style>
  <title>Uvraj Pokhrel</title>
</head>

<body>




<?php



// $row_intro=intro($db_intro);
 $sql = "SELECT * FROM `profile_images`";
 $result = mysqli_query($db, $sql);
 $row_image = @mysqli_fetch_assoc($result);
 


?>

  <!-- app -->
  <div class="art-app art-app-onepage">
  <?php



// $row_intro=intro($db_intro);

 $sql = "SELECT * FROM `social_media`";
 $result = mysqli_query($db, $sql);
 $row_social = @mysqli_fetch_assoc($result);
 


?>
    <div class="navigation-bar">
      <div class="nav-bar">
        <div class="social">
          <a href="<?=$row_social['facebook']?>" class="fab fa-facebook-f"></a>
          <a href="<?=$row_social['youtube']?>" class="fab fa-youtube"></a>
          <a href="<?=$row_social['instagram']?>" class="fab fa-instagram"></a>
          <a href="<?=$row_social['linkdin']?>" class="fab fa-linkedin-in"></a>
        </div>
        <div class="nav-item">
          <ul>
            <li ><a class="active" href="../index.php">Home</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="project.php">Works</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="blog.php">Blog</a></li>
          </ul>
        </div>
        <div class="search-bar">
          <p>Search <i class="fas fa-search"></i></p>
        </div>
      </div>
    </div>

    <!-- mobile top bar -->
    <div class="art-mobile-top-bar"></div>

    <!-- app wrapper -->
    <div class="art-app-wrapper">

      <!-- app container end -->
      <div class="art-app-container">

        <!-- info bar -->
        <div class="art-info-bar">

          <!-- menu bar frame -->
          <div class="art-info-bar-frame">

            <!-- info bar header -->
            <div class="art-info-bar-header">
              <!-- info bar button -->
              <a class="art-info-bar-btn" href="#.">
                <!-- icon -->
                <i class="fas fa-ellipsis-v"></i>
              </a>
              <!-- info bar button end -->
            </div>
            <!-- info bar header end -->

            <!-- info bar header -->
            <div class="art-header">
              <!-- avatar -->
              <div class="art-avatar">
                <a data-fancybox="avatar" href="<?=substr($row_image['avatar'],1)?>" class="art-avatar-curtain">
                  <img src="<?=substr($row_image['avatar'],1)?>" alt="avatar">
                  <i class="fas fa-expand"></i>
                </a>
                <!-- available -->
                <div class="art-lamp-light">
                  <!-- add class 'art-not-available' if not available-->
                  <div class="art-available-lamp" style="background:#01aef0;"></div>
                </div>
              </div>
              
<?php



// $row_intro=intro($db_intro);
 $sql = "SELECT * FROM `introduction`";
 $result = mysqli_query($db, $sql);
 $row_intro = @mysqli_fetch_assoc($result);
 


?>
              <!-- avatar end -->
              <!-- name -->
              <h5 class="art-name mb-10"><?=$row_intro['name']?></h5>
              <!-- post -->
              <div class="art-sm-text"><?=$row_intro['designation']?><br><?=$row_intro['passion']?></div>
            </div>
            <!-- info bar header end -->

            <!-- scroll frame -->
            <div id="scrollbar2" class="art-scroll-frame">
              <?php
              $birthDate = "17-10-2000";

              $currentDate = date("d-m-Y");
              
              $age = date_diff(date_create($birthDate), date_create($currentDate));
              
             
              ?>

              <!-- info bar about -->
              <div class="art-table p-15-15">
              <?php

$sql = "SELECT * FROM `contact`";
$result = mysqli_query($db, $sql);
$row_contact = @mysqli_fetch_assoc($result);
?>
                <!-- about text -->
                <ul>
                  <!-- country -->
                  <li>
                    <h6>Residence:</h6><span><?=$row_contact['country']?></span>
                  </li>
                  <!-- city -->
                  <li>
                    <h6>City:</h6><span><?=$row_contact['city']?></span>
                  </li>
                  <!-- age -->
                  <li>
                    <h6>Age:</h6><span><?=$age->format("%y")?></span>
                  </li>
                </ul>
              </div>
              <!-- info bar about end -->

              <!-- divider -->
              <div class="art-ls-divider"></div>

              <!-- language skills -->
              <div class="art-lang-skills p-30-15">

                <!-- skill -->
                <div class="art-lang-skills-item">
                  <div id="circleprog1" class="art-cirkle-progress"></div>
                  <!-- title -->
                  <h6>Nepali</h6>
                </div>
                <!-- skill end -->

                <!-- skill -->
                <div class="art-lang-skills-item">
                  <div id="circleprog2" class="art-cirkle-progress"></div>
                  <!-- title -->
                  <h6>English</h6>
                </div>
                <!-- skill end -->

                <!-- skill -->
                <div class="art-lang-skills-item">
                  <div id="circleprog3" class="art-cirkle-progress"></div>
                  <!-- title -->
                  <h6>Hindi</h6>
                </div>
                <!-- skill end -->

              </div>
              <!-- language skills end -->

              <!-- divider -->
              <div class="art-ls-divider"></div>

     
             <!-- hard skills -->
              <div class="art-hard-skills p-30-15">

                <!-- skill -->
                <div class="art-hard-skills-item">
                  <div class="art-skill-heading">
                    <!-- title -->
                    <h6>Solid Work</h6>
                  </div>
                  <!-- progressbar frame -->
                  <div class="art-line-progress">
 


              
                    <!-- progressbar -->
                    <div id="lineprog1"></div>
                  </div>
                  <!-- progressbar frame end -->
                </div>
                <!-- skill end -->
                


                <!-- skill -->
                <div class="art-hard-skills-item">
                  <div class="art-skill-heading">
                    <!-- title -->
                    <h6>Designer</h6>
                  </div>
                  <!-- progressbar frame -->
                  <div class="art-line-progress">
                    <!-- progressbar -->
                    <div id="lineprog2"></div>
                  </div>
                  <!-- progressbar frame end -->
                </div>
                
                <!-- skill end -->

                <!-- skill -->
                <div class="art-hard-skills-item">
                  <div class="art-skill-heading">
                    <!-- title -->
                    <h6>python</h6>
                  </div>
                  <!-- progressbar frame -->
                  <div class="art-line-progress">
                    <!-- progressbar -->
                    <div id="lineprog3"></div>
                  </div>
                  <!-- progressbar frame end -->
                </div>
                <!-- skill end -->

                <!-- skill -->
                <div class="art-hard-skills-item" style="visibility: hidden;">
                  <div class="art-skill-heading">
                    <!-- title -->
                    <h6>PHP</h6>
                  </div>
                  <!-- progressbar frame -->
                  <div class="art-line-progress">
                    <!-- progressbar -->
                    <div id="lineprog4"></div>
                  </div>
                  <!-- progressbar frame end -->
                </div>
                <!-- skill end -->

                <!-- skill -->
                <div  style="visibility: hidden;" class="art-hard-skills-item">
                  <div class="art-skill-heading">
                    <!-- title -->
                    <h6>Wordpress</h6>
                  </div>
                  <!-- progressbar frame -->
                  <div class="art-line-progress">
                    <!-- progressbar -->
                    
                  </div>
                  <div id="lineprog5"></div>
                  <!-- progressbar frame end -->
                </div>
                <!-- skill end -->

              </div>
              <!-- language skills end -->

              <!-- divider -->
              <div class="art-ls-divider"></div>

 <?php

 $sql = "SELECT * FROM `knowledge`";
 $result = mysqli_query($db, $sql);
?>

              <!-- knowledge list -->
              <ul class="art-knowledge-list p-15-0">
                <?php
              while ($row_know = mysqli_fetch_assoc($result)){
                ?>

              
                
                <li><?=$row_know['title']?></li>
                
               
                <?php
            }
            ?>
               
              </ul>
              <!-- knowledge list end -->

              <!-- divider -->
              <div class="art-ls-divider"></div>

              <!-- links frame -->
              <div class="art-links-frame p-15-15">

                <!-- download cv button -->
                <a href="include/download.php?file=sample.pdf" class="art-link">Download cv <i class="fas fa-download"></i></a>

              </div>
              <!-- links frame end -->

            </div>
            <!-- scroll frame end -->

           

          </div>
          <!-- menu bar frame end -->

        </div>
        <!-- info bar end -->

        <!-- content -->
        <div class="art-content">

          <!-- curtain -->
          <div class="art-curtain"></div>

          <!-- top background -->
          <div class="art-top-bg" style="background-image: url(img/bg.jpg)">
            <!-- overlay -->
            <div class="art-top-bg-overlay"></div>
            <!-- overlay end -->
          </div>
          <!-- top background end -->

          <!-- swup container -->
          <div class="transition-fade" id="swup">

            <!-- scroll frame -->
            <div id="scrollbar" class="art-scroll-frame">

              <!-- container -->
              <div class="container-fluid">

<?php
if($insert==1){

              echo"<div class='alert alert-primary alert-dismissible fade show' id='dismiss' role='alert'>Submitted sucessfully. Thank you for your feedback <i class='fas fa-times cut' style='float:right; font-size:1rem'></i>
                
              </div>";

}
              ?>
              

                <!-- row -->
                <div class="row p-60-0 p-lg-30-0 p-md-15-0">
                  <!-- col -->
                  <div class="col-lg-12">

                    <!-- banner -->
                    <div class="art-a art-banner" style="background-image: url(img/bg.jpg)">
                      <!-- banner back -->
                      <div class="art-banner-back"></div>
                      <!-- banner dec -->
                      <div class="art-banner-dec"></div>
                      <!-- banner overlay -->
                      <div class="art-banner-overlay">
                        <!-- main title -->
                        <div class="art-banner-title">
                          <!-- title -->
                          <h1 class="mb-15">Discover my Amazing <br>Engineering Stub!</h1>
                          <!-- suptitle -->
                          <div class="art-lg-text art-code mb-25"><i class="fa fa-cog" style="color:#01aef0;"></i> I build <span class="txt-rotate" data-period="2000"
                              data-rotate='[ "solid works design", "interfaces/Ux", "Machine design ", "automation tools." ]'></span><i class="fa fa-cog" style="color: #01aef0;"></i></div>
                          <div class="art-buttons-frame">
                            <!-- button -->
                            <a href="include/download.php?file=sample.pdf" class="art-btn art-btn-md" style="background-color: #01aef0;"><span>Download CV</span></a>
                            <!-- button -->
                            <a href="#." class="art-link art-white-link art-w-chevron">Follow Me</a>
                          </div>
                        </div>
                        <!-- main title end -->
                        <!-- photo -->
                        <img src="<?=substr($row_image['profile_image'],1)?>" class="art-banner-photo" alt="Your Name">
                      </div>
                      <!-- banner overlay end -->
                    </div>
                    <!-- banner end -->

                  </div>
                  <!-- col end -->
                </div>
                <!-- row end -->

              </div>
              <!-- container end -->

            

              <!-- container -->
              <div class="container-fluid" id="services">

                <!-- row -->
                <div class="row">

                  <!-- col -->
                  <div class="col-lg-12">

                    <!-- section title -->
                    <div class="art-section-title">
                      <!-- title frame -->
                      <div class="art-title-frame">
                        <!-- title -->
                        <h4>My Services</h4>
                      </div>
                      <!-- title frame end -->
                    </div>
                    <!-- section title end -->

                  </div>
                  <!-- col end -->

                  <!-- col -->

 <?php

$sql = "SELECT * FROM `service`";
$result = mysqli_query($db, $sql);
?>

<?php



while ($row_service = mysqli_fetch_assoc($result)){
  ?>

                  <div class="col-lg-4 col-md-6">
   

                    <!-- service -->
                    <div class="art-a art-service-icon-box">
                      <!-- service content -->
                      <div class="art-service-ib-content">
                        <!-- title -->
                        <h5 class="mb-15"><?=$row_service['title']?></h5>
                        <!-- text -->
                        <div class="mb-15" style="height:100px;"><?=substr($row_service['description'],0,150)?>...</div>
                        <!-- button -->
                        <div class="art-buttons-frame"><a href="<?=$row_service['explore']?>" class="art-link art-color-link art-w-chevron">Explore more</a></div>
                      </div>
                      <!-- service content end -->
                    </div>
                    
                    <!-- service end -->

                  </div>
                  <?php

}



?>
                  <!-- col end -->

           

                </div>
                <!-- row end -->

              </div>
              <!-- container end -->

              <!-- container -->


              <!-- container -->
              <div class="container-fluid" id="project">

                <!-- row -->
                <div class="row p-30-0">

                  <!-- col -->
                  <div class="col-lg-12">

                    <!-- section title -->
                    <div class="art-section-title">
                      <!-- title frame -->
                      <div class="art-title-frame">
                        <!-- title -->
                        <h4>Projects</h4>
                      </div>
                      <!-- title frame end -->
                      <!-- right frame -->
                      <div class="art-right-frame">
                       
                      </div>
                      <!-- right frame end -->
                    </div>
                    <!-- section title end -->

                  </div>
                  <!-- col end -->
                  

                  <div class="art-grid art-grid-3-col art-gallery">
                    <?php

$sql = "SELECT * FROM `project` ORDER BY id DESC";
$result = mysqli_query($db, $sql);
?>

<?php



while ($row_project = mysqli_fetch_assoc($result)){
  ?>

                    <!-- grid item -->

                    <div class="art-grid-item webTemplates">
                      <!-- grid item frame -->
                      <a data-fancybox="gallery" href="<?=substr($row_project['image'],1)?>" class="art-a art-portfolio-item-frame art-horizontal">
                        <!-- img -->
                        <img src="<?=substr($row_project['image'],1)?>" alt="item">
                        <!-- zoom icon -->
                        <span class="art-item-hover"><i class="fas fa-expand"></i></span>
                      </a>
                      <!-- grid item frame end -->
                      <!-- description -->
                      <div class="art-item-description">
                        <!-- title -->
                        <h5 class="mb-15"><?=substr($row_project['title'],0,30)?>&nbsp;.&nbsp;.&nbsp;.</h5>
                        <!-- button -->
                        <a href="work.php?id=<?=$row_project['id']?>" class="art-link art-color-link art-w-chevron">Read more</a>
                      </div>
                      <!-- description end -->

                    </div>
   
                    <!-- grid item end -->

                    <?php

}
                    
?>

                  </div>

                </div>
                <!-- row end -->

              </div>
              <!-- container end -->

              <!-- container -->
              <div class="container-fluid">

                <!-- row -->
                <div class="row">

                  <!-- col -->
                  <div class="col-lg-6">

                    <!-- section title -->
                    <div class="art-section-title">
                      <!-- title frame -->
                      <div class="art-title-frame">
                        <!-- title -->
                        <h4>Education</h4>
                      </div>
                      <!-- title frame end -->
                    </div>
                    <!-- section title end -->

                    <!-- timeline -->

                    <?php

$sql = "SELECT * FROM `education`";
$result = mysqli_query($db, $sql);
?>

<?php



while ($row_education = mysqli_fetch_assoc($result)){
  ?>

                    <div class="art-timeline art-gallery" id="history">
                      <div class="art-timeline-item">
                        <div class="art-timeline-mark-light"></div>
                        <div class="art-timeline-mark"></div>

                        <div class="art-a art-timeline-content">
                          <div class="art-card-header">
                            <div class="art-left-side">
                              <h5><?= $row_education['title']?></h5>
                              <div class="art-el-suptitle mb-15"><?= $row_education['addresh']?></div>
                            </div>
                            <div class="art-right-side">
                              <span class="art-date"><?= $row_education['date']?></span>
                            </div>
                          </div>

                          <p><?= $row_education['description']?></p>
                          
                        </div>
                      </div>

                     

                    </div>

<?php
}

?>
                    
                    <!-- timeline end -->

                  </div>
                  <div class="col-lg-6">

                    <!-- section title -->
                    <div class="art-section-title">
                      <!-- title frame -->
                      <div class="art-title-frame">
                        <!-- title -->
                        <h4>Work History</h4>
                      </div>
                      <!-- title frame end -->
                    </div>
                    <!-- section title end -->

                    <!-- timeline -->

                    <?php

$sql = "SELECT * FROM `work_history`";
$result = mysqli_query($db, $sql);
?>

<?php



while ($row_history = mysqli_fetch_assoc($result)){
  ?>
                    <div class="art-timeline">

                      <div class="art-timeline-item">
                        <div class="art-timeline-mark-light"></div>
                        <div class="art-timeline-mark"></div>


                        <div class="art-a art-timeline-content">
                          <div class="art-card-header">
                            <div class="art-left-side">
                              <h5><?=$row_history['title']?></h5>
                              <div class="art-el-suptitle mb-15"><?=$row_history['tag']?></div>
                            </div>
                            <div class="art-right-side">
                              <span class="art-date"><?=$row_history['date']?></span>
                            </div>
                          </div>
                          <p><?=$row_history['description']?></p>
                        </div>
                      </div>

                     

                    </div>
<?php
}
?>
                    
                    <!-- timeline end -->

                  </div>
                  <!-- col end -->

                </div>
                <!-- row end -->

              </div>
              <!-- container end -->

              <!-- container -->
              <div class="container-fluid">

                <!-- row -->
                <div class="row">

                  <!-- col -->
                  <div class="col-lg-12">

                    <!-- section title -->
                    <div class="art-section-title">
                      <!-- title frame -->
                      <div class="art-title-frame">
                        <!-- title -->
                        <h4>Blogs</h4>
                      </div>
                      <!-- title frame end -->
                    </div>
                    <!-- section title end -->

                  </div>
                  <!-- col end -->

                  <!-- col -->
                  <div class="col-lg-12">

                    <!-- slider container -->
                    <div class="swiper-container art-blog-slider" style="overflow: visible">
                      <!-- slider wrapper -->
                      <div class="swiper-wrapper">
                        <!-- slide -->
                        <?php

$sql = "SELECT * FROM `blog`";
$result = mysqli_query($db, $sql);
?>

<?php



while ($row_blog = mysqli_fetch_assoc($result)){
  ?>

                        <div class="swiper-slide">

                          <!-- blog post card -->
                          <div class="art-a art-blog-card" style="height: 328px;">
                            <!-- post cover -->
                            <a href="#." class="art-port-cover">
                              <!-- img -->
                              <img src="<?=substr($row_blog['image'],1)?>" alt="blog post">
                            </a>
                            <!-- post cover end -->
                            <!-- post description -->
                            <div class="art-post-description">
                              <!-- title -->
                              <a href="#.">
                                <h5 class="mb-15"><?=substr($row_blog['title'],0,25)?>&nbsp;.&nbsp;.&nbsp;.</h5>
                              </a>
                              <!-- text -->
                              <div class="mb-15"><?=substr($row_blog['description'],0,50)?>&nbsp;.&nbsp;.&nbsp;.</div>
                              <!-- link -->
                              <a href="post.php?post_id=<?=$row_blog['id']?>& cate=<?=$row_blog['category']?>" class="art-link art-color-link art-w-chevron">Read more</a>
                            </div>
                            <!-- post description end -->
                          </div>
                          <!-- blog post card end -->

                        </div>

<?php
}
?>
                        
                        <!-- slide end -->
          
                        
                      </div>
                      
                      <!-- slider wrapper end -->
                    </div>
                    
                    <!-- slider container end -->

                  </div>
                  
                  <!-- col end -->

                  <!-- col -->
                  <div class="col-lg-12">

                    <!-- slider navigation -->
                    <div class="art-slider-navigation">

                      <!-- left side -->
                      <div class="art-sn-left">

                        <!-- slider pagination -->
                        <div class="swiper-pagination"></div>

                      </div>
                      <!-- left side end -->

                      <!-- right side -->
                      <div class="art-sn-right">

                        <!-- slider navigation -->
                        <div class="art-slider-nav-frame">
                          <!-- prev -->
                          <div class="art-slider-nav art-blog-swiper-prev"><i class="fas fa-chevron-left"></i></div>
                          <!-- next -->
                          <div class="art-slider-nav art-blog-swiper-next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                        <!-- slider navigation -->

                      </div>
                      <!-- right side end -->

                    </div>
                    <!-- slider navigation end -->

                  </div>
                  <!-- col end -->

                </div>
                <!-- row end -->

              </div>
              <!-- container end -->
              
               <!-- container -->
               <div class="container-fluid">

<!-- row -->
<div class="row">

  <!-- col -->
  <div class="col-lg-12">

    <!-- section title -->
    <div class="art-section-title">
      <!-- title frame -->
      <div class="art-title-frame">
        <!-- title -->
        <h4>Gallery</h4>
      </div>
      <!-- title frame end -->
    </div>
    <!-- section title end -->

  </div>
  <!-- col end -->

  <!-- col -->
  <div class="col-lg-12">

    <!-- slider container -->
    <div class="swiper-container art-blog-slider" style="overflow: visible">
      <!-- slider wrapper -->
      <div class="swiper-wrapper">
        <!-- slide -->
        <?php

$sql = "SELECT * FROM `gallery`";
$result = mysqli_query($db, $sql);
?>

<?php



while ($row_blog = mysqli_fetch_assoc($result)){
?>

        <div class="swiper-slide">

          <!-- blog post card -->
          <div class="art-a art-blog-card">
            <!-- post cover -->
            <a href="<?=substr($row_blog['image_name'],1)?>"  data-fancybox="gallery" class="art-port-cover">
              <!-- img -->
              <img src="<?=substr($row_blog['image_name'],1)?>" alt="blog post">
            </a>
            <!-- post cover end -->
            <!-- post description -->
         
            <!-- post description end -->
          </div>
          <!-- blog post card end -->

        </div>

<?php
}
?>
        
        <!-- slide end -->

        
      </div>
      
      <!-- slider wrapper end -->
    </div>
    
    <!-- slider container end -->

  </div>
  
  <!-- col end -->

  <!-- col -->
  <div class="col-lg-12">

    <!-- slider navigation -->
    <div class="art-slider-navigation">

      <!-- left side -->
      <div class="art-sn-left">

        <!-- slider pagination -->
        <div class="swiper-pagination"></div>

      </div>
      <!-- left side end -->

      <!-- right side -->
      <div class="art-sn-right">

        <!-- slider navigation -->
        <div class="art-slider-nav-frame">
          <!-- prev -->
          <div class="art-slider-nav art-blog-swiper-prev"><i class="fas fa-chevron-left"></i></div>
          <!-- next -->
          <div class="art-slider-nav art-blog-swiper-next"><i class="fas fa-chevron-right"></i></div>
        </div>
        <!-- slider navigation -->

      </div>
      <!-- right side end -->

    </div>
    <!-- slider navigation end -->

  </div>
  <!-- col end -->

</div>
<!-- row end -->

</div>
<!-- container end -->
              <!-- container -->
              <div class="container-fluid">

              <?php

$sql = "SELECT * FROM `contact`";
$result = mysqli_query($db, $sql);
$row_contact = @mysqli_fetch_assoc($result);
?>

                <!-- row -->
                <div class="row p-30-0">

                  <!-- col -->
                  <div class="col-lg-12">

                    <!-- section title -->
                    <div class="art-section-title">
                      <!-- title frame -->
                      <div class="art-title-frame">
                        <!-- title -->
                        <h4>Contact information</h4>
                      </div>
                      <!-- title frame end -->
                    </div>
                    <!-- section title end -->

                  </div>
                  <!-- col end -->
                  <!-- col -->
                  <div class="col-lg-4">
                    <!-- contact card -->
                    <div class="art-a art-card">
                      <div class="art-table p-15-15">
                        <ul>
                          <li>
                            <h6>Country:</h6><span><?=$row_contact['country']?></span>
                          </li>
                          <li>
                            <h6>City:</h6><span><?=$row_contact['city']?></span>
                          </li>

                          <li>
                            <h6>Streat:</h6><span><?=$row_contact['streat']?></span>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- contact card end -->
                  </div>
                  <!-- col end -->
                  <!-- col -->
                  <div class="col-lg-4">
                    <!-- contact card -->
                    <div class="art-a art-card">
                      <div class="art-table p-15-15">
                        <ul>
                          <li>
                            <h6>Email:</h6><span><?=$row_contact['email']?></span>
                          </li>
                          <li>
                            <h6>Instagram:</h6><span><?=$row_contact['instagram']?></span>
                          </li>
                          <li>
                            <h6>Facebook:</h6><span><?=$row_contact['facebook']?></span>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- contact card end -->
                  </div>
                  <!-- col end -->
                  <!-- col -->
                  <div class="col-lg-4">
                    <!-- contact card -->
                    <div class="art-a art-card">
                      <div class="art-table p-15-15">
                        <ul>
                          <li>
                            <h6>Mobile number:</h6><span><?=$row_contact['mobile']?></span>
                          </li>
                          <li>
                            <h6>Per.Address:</h6><span><?=$row_contact['per_address']?></span>
                          </li>
                          <li>
                            <h6>Personal Mob:</h6><span><?=$row_contact['per-mob']?></span>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- contact card end -->

                  </div>
                  <!-- col end -->

                  <!-- col -->

  
                  <div class="col-lg-12">

                    <!-- section title -->
                    <div class="art-section-title">
                      <!-- title frame -->
                      <div class="art-title-frame">
                        <!-- title -->
                        <h4>Get in touch</h4>
                      </div>
                      <!-- title frame end -->
                    </div>
                    <!-- section title end -->

                    <!-- contact form frame -->
                    <div class="art-a art-card">

                      <!-- contact form -->
                      <form  class="art-contact-form" method="POST">
                        <!-- form field -->
                        <div class="art-form-field">
                          <!-- name input -->
                          <input id="name" name="name" class="art-input" type="text" placeholder="Name" required>
                          <!-- label -->
                          <label for="name"><i class="fas fa-user"></i></label>
                        </div>
                        <!-- form field end -->
                        <!-- form field -->
                        <div class="art-form-field">
                          <!-- email input -->
                          <input id="email" name="email" class="art-input" type="email" placeholder="Email" required>
                          <!-- label -->
                          <label for="email"><i class="fas fa-at"></i></label>
                        </div>
                        <!-- form field end -->
                        <!-- form field -->
                        <div class="art-form-field">
                          <!-- message textarea -->
                          <textarea id="message" name="text" class="art-input" placeholder="Message" required></textarea>
                          <!-- label -->
                          <label for="message"><i class="far fa-envelope"></i></label>
                        </div>
                        <!-- form field end -->
                        <!-- button -->
                        <div class="art-submit-frame">
                          <button class="art-btn art-btn-md art-submit" type="submit"><span>Send message</span></button>
                          <!-- success -->
                          <div class="art-success">Success <i class="fas fa-check"></i></div>
                        </div>
                      </form>
                      <!-- contact form end -->

                    </div>
                    <!-- contact form frame end -->

                  </div>
                  <!-- col end -->

                </div>
                <!-- row end -->

              </div>
              <!-- container end -->

            

              <!-- container -->
              <div class="container-fluid" style="padding-bottom: 32px;">

                <!-- footer -->
                <footer>
                  <!-- copyright -->
                  <div>©<script>
                    document.write(new Date().getFullYear());
                  </script> Uvraj Pokhrel</div>
                 
                  <div>Developer:&#160; <a href="https://www.facebook.com/manoj.nepali.5891" target="_blank">Manoj Nepali</a></div>
                </footer>
                <!-- footer end -->

              </div>
              <!-- container end -->

            </div>
            <!-- scroll frame end -->

          </div>
          <!-- swup container end -->

        </div>
        <!-- content end -->

      </div>
      <!-- app container end -->

    </div>
    <!-- app wrapper end -->

    <!-- preloader -->
    <div class="art-preloader">
      <!-- preloader content -->
      <div class="art-preloader-content">
        <!-- title -->
        <h4>Uvraj Pokhrel</h4>
        <!-- progressbar -->
        <div id="preloader" class="art-preloader-load"></div>
      </div>
      <!-- preloader content end -->
    </div>
    <!-- preloader end -->

  </div>
  <!-- app end -->
  <div id="swupMenu"></div>

  <!-- jquery js -->
  <script src="js/plugins/jquery.min.js"></script>
  <!-- anime js -->
  <script src="js/plugins/anime.min.js"></script>
  <!-- swiper js -->
  <script src="js/plugins/swiper.min.js"></script>
  <!-- progressbar js -->
  <script src="js/plugins/progressbar.min.js"></script>
  <!-- smooth scrollbar js -->
  <script src="js/plugins/smooth-scrollbar.min.js"></script>
  <!-- overscroll js -->
  <script src="js/plugins/overscroll.min.js"></script>
  <!-- typing js -->
  <script src="js/plugins/typing.min.js"></script>
  <!-- isotope js -->
  <script src="js/plugins/isotope.min.js"></script>
  <!-- fancybox js -->
  <script src="js/plugins/fancybox.min.js"></script>
  <!-- swup js -->
  <script src="js/plugins/swup.min.js"></script>

  <!-- main js -->
  <script src="js/main.js"></script>
  <script>
    let dis=document.getElementById('dismiss');
     let formclose1= document.querySelector('.cut');
    formclose1.addEventListener('click',()=>{
   
        dismiss.style.visibility="hidden";
          dismiss.style.opacity="0";
});
  </script>

</body>

</html>
