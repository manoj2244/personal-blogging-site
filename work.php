
<?php

require('./include/database.php');
$id=$_GET['id'];

if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

$post_per_page = 5; 
$show_page = ($page - 1) * $post_per_page;
$sno=(($page - 1) * $post_per_page)+1;

?>

<?php

if($_SERVER["REQUEST_METHOD"]=='POST'){
  


  $fullname=mysqli_real_escape_string($db,$_POST['name']);
  $comment=mysqli_real_escape_string($db,$_POST['text']);
  $text=$id;
 


  $sql="INSERT INTO `comment_project` (`name`, `comments`, `post_id`) VALUES ('$fullname', '$comment', '$text')";

  $result=mysqli_query($db,$sql);
  if($result){
  
    $insert=1;
    }




}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css?<?php echo time();?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    

    
    <link rel="stylesheet" href="css/blog-css.css">
    <link rel="stylesheet" href="css/lightbox.css">

   
  
    <title>work</title>
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
   
   <main>
        <section class="blog-container">
           
            <div class="site-content">



                <?php
                
$sql = "SELECT * FROM `project` where id=$id";
$result = mysqli_query($db, $sql);
$row_project = @mysqli_fetch_assoc($result);
?>


                <div class="posts">
                    <div class="post-content">
                        <a href="#"><?=$row_project['title']?></a>
                       
                        <div class="post-images">
                            <div>
                                <img src="<?=substr($row_project['image'],1)?>" alt="blog1" class="img">
                            </div>
                            <div class="post-info flex-row">
                             
                            
                            
                         </div>
                        </div>
                        <div class="post-title">
                         
                         <p><?=$row_project['description']?>
                         </p>
                         <div class="videos photos">
                            <h4>Watch Video About Project</h4>
                            
                            <iframe width="300" height="200" src="<?=$row_project['video']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            
                         </div>
                         <div class="photos">
                            <h4>Related Photos About Projects</h4>
           
                
                            <div class="images-project">

                            <?php


                
$sql = "SELECT * FROM `blog_image` where blog_id=$id";
$result = mysqli_query($db, $sql);



                while ($row_blog_image = mysqli_fetch_assoc($result)){
                  
                  
                  ?>
                           
                            
                            <a href="<?=substr($row_blog_image['image'],1)?>" data-lightbox="mygallery" data-title=""><img src="<?=substr($row_blog_image['image'],1)?>" alt=""></a>
                            <?php

}
?>
                          </div>
                
                          </div>
                        
                     </div>
                    </div>
                    <hr>
                   <h3 id="project">Other Works</h3>

                   <?php

$sql = "SELECT * FROM `project` ORDER BY id DESC limit $show_page,$post_per_page ";
$result = mysqli_query($db, $sql);
?>

<?php



while ($row_project = mysqli_fetch_assoc($result)){
    if($row_project['id']!=$id){
  ?>

  
                    <div class="post-content post-contents">
                        <div class="post-images post-image">
                            <div>
                                <img src="<?=substr($row_project['image'],1)?>" alt="blog3" class="img" style="width: 330px;">
                            </div>
                          
                        </div>
                        <div class="post-title">
                         <a href="work.php?id=<?=$row_project['id']?>"><?=$row_project['title']?></a>
                         <p style="font-size: 13px;"><?=substr($row_project['description'],0,260)?>&nbsp;.&nbsp;.&nbsp;.
                         </p>
                        
                     </div>
                  </div>
    


                <?php
    }
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

<a href="?page=<?= $actual_page_prev ?>&id=<?=$id?>" class="<?= $prev_class ?>"><i class="fa fa-chevron-left <?= $prev ?>"></i></a>


<?php

for ($page = 1; $page <= $total_news_page; $page++) {
  if($page==3){
    break;
  }
?>



  <a class="pages" href="?page=<?= $page ?>&id=<?=$id?>"><?= $page ?></a>

<?php

}

?>

<a href="?page=<?= $actual_page_next ?>&id=<?=$id?>" class="<?= $next_class ?>"><i class="fa fa-chevron-right <?= $next ?>"></i></a>




</div>

                </div>
             
                <aside class="sidebar" style="padding: 45px 0 0 0;">


                <?php

$sql = "SELECT * FROM `comment_project` where post_id=$id";
$result = mysqli_query($db, $sql);
?>
                <div class="comment" style="margin-bottom: 15px;">
                    <h2>Comments</h2>

<?php
while ($row_comment = mysqli_fetch_assoc($result)){
    ?>
                    <div>
                    <div class="comment-name">
                        <div class="image"><img src="./assets/unknown.png" alt=""></div> 
                        <div class="comment-detail">
                            <p style="font-size: 14px; font-weight:700;color:aqua"><?=$row_comment['name']?></p>
                        <p><?=$row_comment['comments']?>
                        </p>
                        </div>
                    </div>
                    <hr style="color: rgb(182, 185, 182);">
                    </div>

<?php
                  
}
?>
                </div>
                <h4 style="color: white;">Add Comment</h4>
                    
                <div class="comment-section" style="margin-top: 9px;">
                            <form action="" method="post">
                                <div class="name">
                                    <label for="name">Name</label>
                                    <input type="text" placeholder="Type your name" name="name" required style="width: 90%;">
                                </div>
                                <div class="comment-write">
                                    <label for="comment">Comment</label>
                                    <textarea id="message" name="text" placeholder="Message" required style="width: 90%;"></textarea>
                                </div>
                                <button>Comment</button>



                            </form>
                         </div>
<?php


$sql = "SELECT * FROM `social_media`";
$result = mysqli_query($db, $sql);
$row_social = @mysqli_fetch_assoc($result);
                         ?>
                <div class="follow">
                    <h2 style="font-size: 2.1rem;">Follow Me</h2>
                    <div class="social1">
                        <a href="<?=$row_social['facebook']?>" class="fa fa-facebook-f"></a>
                        <a href="<?=$row_social['youtube']?>" class="fa fa-youtube"></a>
                        <a href="<?=$row_social['instagram']?>" class="fa fa-instagram"></a>
                        <a href="<?=$row_social['linkdin']?>" class="fa fa-linkedin"></a>
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
   <script src="js/lightbox-plus-jquery.min.js"></script>
     
      
   

 
 </body>
 </html>