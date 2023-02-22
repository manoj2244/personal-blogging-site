

<?php

require('./include/database.php');
$cat=$_GET['cate'];
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
    <link rel="stylesheet" href="css/style2.css?<?php echo time();?>">
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
  
    <title>Category</title>
</head>
<body>
    <div class="navigation-bar">
        <div class="nav-bar">
          <div class="social">
            
          <?php


$sql = "SELECT * FROM `social_media`";
$result = mysqli_query($db, $sql);
$row_social = @mysqli_fetch_assoc($result);
                         ?>
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
                
                
                <div class="posts">
              

                   <h3 id="project" style="font-family: sans-serif;">Categorical Posts</h3>
                   <button class="btns btns2"><?=$cat?></button>
                   

                   <?php
                   $sql = "SELECT * FROM `blog` where category='$cat' ORDER BY id DESC LIMIT $show_page,$post_per_page";
                   $result = mysqli_query($db, $sql);
                   while($row_cat = mysqli_fetch_assoc($result)){
                    
                    ?>
                  

                    <div class="post-content post-contents">
                        <div class="post-images post-image">
                            <div>
                                <img src="<?=substr($row_cat['image'],1)?>" alt="blog3" class="img" style="width: 330px;">
                            </div>
                          
                        </div>
                        <div class="post-title">
                         <a href="post.php?post_id=<?=$row_cat['id']?>& cate=<?=$row_cat['category']?>"><?=$row_cat['title']?></a>
                         <p style="font-size: 13px;"><?=substr($row_cat['description'],0,200)?>...
                         </p>
                        
                     </div>
                    </div>

                 
                 <?php
                 
                   }
                   ?>
             
             <?php

$sql = "SELECT * FROM `blog` where category='$cat'";
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

<a href="?page=<?= $actual_page_prev ?>&cate=<?=$cat?>" class="<?= $prev_class ?>"><i class="fa fa-chevron-left <?= $prev ?>"></i></a>


<?php

for ($page = 1; $page <= $total_news_page; $page++) {
if($page==3){
  break;
}
?>

  <a class="pages" href="?page=<?= $page ?>& cate=<?=$cat?>"><?= $page ?></a>

<?php

}

?>

<a href="?page=<?= $actual_page_next ?>&cate=<?=$cat?>" class="<?= $next_class ?>"><i class="fa fa-chevron-right <?= $next ?>"></i></a>




</div>
                </div>
             
                <aside class="sidebar" style="padding: 0;">
    
             
                <div class="popular-tags">
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
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-62c12c4ea5a70253"></script>
<script>

    
    let share=document.getElementById('share');
     let formclose1= document.querySelector('.open');
    formclose1.addEventListener('click',()=>{

        share.style.display="block";

        
});



  </script>
  <script src="js/plugins/jquery.min.js"></script>
 <script>
let like=document.getElementById('liked');
let likes=document.getElementById('likes');
    function myfun(status,id){
        if(status=="Like"){
            document.getElementById("liked").innerHTML = "Liked";
            like.style.color="aqua";
            likes.style.color="aqua";
            jQuery.ajax({
            url:'include/like.php',
            type:'post',
            data:'type=Like&id='+id,
            
            success:function(result){

            }
        })
        }
        else{
            document.getElementById("liked").innerHTML = "Like";
            like.style.color="white";
            likes.style.color="white";
            jQuery.ajax({
            url:'include/like.php',
            type:'post',
            data:'type=Liked!&id='+id,
            
            success:function(result){

            }
        })

        }
        
     

    }
 </script>

  
 
 </body>
 </html>