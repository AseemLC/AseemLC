<?php
require'header.php';
$conn = include('dbconnect.php');

echo'<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
  </head>';
  echo'
  <body bg-color="dark">
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../image/slider-1.jpg" width="400px" height="600px" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../image/slider-2.jpg" width="400px" height="600px" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../image/slider-3.jpg" width="400px" height="600px" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>';
$que="SELECT * FROM tbl_cat ";
$result=mysqli_query($conn,$que);
if(mysqli_num_rows($result)){
while($row=mysqli_fetch_assoc($result)){
    $cat_id= $row['cat_id'];
    $category = $row['cat_heading'];
    $category_desc = $row['cat_desc'];
echo' <p class="card-text">.</p>
<div class="card" >
  <img src="../image/'.$category.'.jpg" class="card-img-top" alt="..." style="width: 100px; height:100px;">
  <div class="card-body">
  '.$category_desc.'<br>
    <h5 class="card-title">'.$category.'</h5>
    <a href="discussion_list.php?cat_id='.$cat_id.'" class="btn btn-primary">having problem!</a>
  </div>
</div>';}
}
echo'
</body> 
</html>';
 ?>
 <?php 
 require'footer.php';
 ?>