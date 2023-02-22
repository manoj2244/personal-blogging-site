
<?php

require('./include/database.php');

$id=1;


$insert=0;
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

$post_per_page = 5; 
$show_page = ($page - 1) * $post_per_page;
$sno=(($page - 1) * $post_per_page)+1;


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css?<?php echo time();?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/blog-css.css">

    <style>

.main-category{
  display: flex;
  flex-wrap: wrap;
  margin-top: 15px;

}
.category{
  background: gray;
padding: 0.4rem 2rem;
border-radius: 0.8rem;
margin: 0.4rem 0.6rem;
color: white;
font-size: 15px;
}
.category a{
  font-size: 15px;
  font-weight: 500;
  color: white;

}
#share{
    display: none;
}
</style>
   
    <title>Project</title>
</head>
<body>
    <div class="navigation-bar">
        <div class="nav-bar">
        <?php


$sql = "SELECT * FROM `social_media`";
$result = mysqli_query($db, $sql);
$row_social = @mysqli_fetch_assoc($result);
                         ?>
          <div class="social">
          <a href="<?=$row_social['facebook']?>" class="fa fa-facebook-f"></a>
                        <a href="<?=$row_social['youtube']?>" class="fa fa-youtube"></a>
                        <a href="<?=$row_social['instagram']?>" class="fa fa-instagram"></a>
                        <a href="<?=$row_social['linkdin']?>" class="fa fa-linkedin"></a>
          </div>
          <div class="nav-item">
            <ul>
              <li ><a class="active" href="./index.php">Home</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="project.php">Works</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="blog.php">Blog</a></li>
            </ul>
          </div>
          <div class="search-bar">
            <p>Search <i class="fa fa-search"></i></p>
          </div>
        </div>
      </div>

    
  <!--site bar grid view-->
  
  <main>
       <section class="blog-container">
          
           <div class="site-content">
               
               
               <div class="posts">
                <h3>Projects</h3>
                <?php
                     $sql = "SELECT * FROM `project` ORDER BY id DESC LIMIT $show_page,$post_per_page";
$result = mysqli_query($db, $sql);

?>
<?php

while($row_blog = mysqli_fetch_assoc($result)){
    

    
    ?>
                
                   <div class="post-content">
                       <div class="post-images">
                           <div>
                               <img src="<?=substr($row_blog['image'],1)?>" alt="blog1" class="img" style="height: 298px;">
                           </div>
                           
                       </div>
                       <div class="post-title">
                        <a href="work.php?id=<?=$row_blog['id']?>"><?=$row_blog['title']?></a>

                        <p><?=substr($row_blog['description'],0,290)?>...
                        </p>
                        <a href="work.php?id=<?=$row_blog['id']?>"><button class="btn post-btn">Explore More &nbsp; <i class="fa fa-arrow-right"></i></button></a>
                    </div>
                   </div>
                   <hr>
                   <?php
}

                   ?>
            
            <?php

$sql = "SELECT * FROM `project`";
$result = mysqli_query($db, $sql);
$total_news = mysqli_num_rows($result);
$total_news_page = ceil($total_news / $post_per_page);

             ?>
                   <div class="pagination">

<?php
$actual_page_prev = $page - 1;

if ($page > 1) {
  $prev = "";
  $prev_next_class = "";
} else {
  $prev = "dissable";
  $prev_class = "prev_next1";
}

if ($page == 1) {
  $actual_page_prev = 1;
}
$actual_page_next = $page + 1;

if ($page < $total_news_page) {
  $next = "";
  $prev_next_class = "";
} else {
  $next = "dissable";
  $prev = "";

  $next_class = "prev_next2";
  

}

if ($page == $total_news_page) {
  $actual_page_next = $page;
}


?>

<a href="?page=<?= $actual_page_prev ?>" class="<?= $prev_class ?>"><i class="fa fa-chevron-left <?= $prev ?>"></i></a>


<?php

for ($page = 1; $page <= $total_news_page; $page++) {
  if($page==3){
    break;
  }
?>



  <a class="pages" href="?page=<?= $page ?>"><?= $page ?></a>

<?php

}

?>

<a href="?page=<?= $actual_page_next ?>" class="<?= $next_class ?>"><i class="fa fa-chevron-right <?= $next ?>"></i></a>




</div>

               </div>
            
               <aside class="sidebar">
                   
               <div class="follow">
                <?php

                
 $sql = "SELECT * FROM `social_media`";
 $result = mysqli_query($db, $sql);
 $row_social = @mysqli_fetch_assoc($result);
 
                ?>
                <h2 style="font-size: 2.1rem;">Follow Me</h2>
                <div class="social1">
                <a href="<?=$row_social['facebook']?>" class="fa fa-facebook-f"></a>
          <a href="<?=$row_social['youtube']?>" class="fa fa-youtube"></a>
          <a href="<?=$row_social['instagram']?>" class="fa fa-instagram"></a>
          <a href="<?=$row_social['linkdin']?>" class="fa fa-linkedin"></a>
                  </div>
               </div>
                

                <div class="popular-tags" style="padding: 0;">
                     <h2>Recomended Tags</h2>
                     <div class="main-category">
                      <?php
                      $sql = "SELECT * FROM `category`";
                      $result = mysqli_query($db, $sql);
                     while( $row_cat = @mysqli_fetch_assoc($result)){
                      ?>
                     <div class="category"> <a href="category.php?cate=<?=$row_cat['cate_name']?>"><?=$row_cat['cate_name']?></a></div>

                     <?php
                     }
                     ?>
                     
                    
                 </div>
                 </div>
               </aside>
           </div>
       </section>


  </main>
  <footer>
    <div class="footer-content">
        <div>©<script>
            document.write(new Date().getFullYear());
          </script> Uvraj Pokhrel</div>
         
          <div class="div">Developer:&#160; <a href="https://www.facebook.com/manoj.nepali.5891" target="_blank" style="color: gray;">Manoj Nepali</a></div>
    </div>
  </footer>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  
  <script>
    AOS.init();
  </script>


</body>
</html>