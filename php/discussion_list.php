<?php
require'header.php';
$conn = include('dbconnect.php');
  if(isset($_GET['cat_id'])){
  $cat_id = $_GET['cat_id'];
}
echo'<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>';
  echo'
  <body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>';
$que="SELECT * FROM `thread` WHERE category_id ='$cat_id'";
$result=mysqli_query($conn,$que);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_assoc($result)){
    $thread_title=$row['thread_title'];
    $thread_desc= $row['thread_desc'];
    $username=$row['username'];
    echo'<div class="card" >
    <div class="card-body">
    '.$thread_title.'....<br>
    '.$thread_desc.'
    by'.$username.'
    </div>
  </div>';
}
}
echo'<a href="thread_form.php?cat_id='.$cat_id.'">Facing problem!Let\'s Learn from World.</a>';
echo'
</body> 
</html>';
 ?>
 <?php 
 require'footer.php';
 ?>