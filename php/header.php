<?php
session_start();
$conn = include('dbconnect.php');
if(isset($_SESSION['username'])){
  $user=$_SESSION['username'];
  $status=true;
  
}
else{
  $status=false;
  $user="Guest";
  }
echo'
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">message</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="forum.php">Home</a>
        </li>';
        if($status==false){
         echo'<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php">Log-In</a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="sign-in.php">Sign-In</a>
        </li>';
        }
        else{
          echo'<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="log-out.php">Log-Out</a>
        </li>';
        }
      echo'</ul>
    </div>
  </div>
</nav>';
if($status==false){
echo'<p align="Right"><img src="https://www.shutterstock.com/image-vector/user-profile-icon-vector-avatar-600nw-2247726673.jpg" width="35px" height="35px" >'.$user.'</p>';
}
else{
  echo'<p align="Right"><img src="https://www.shutterstock.com/image-vector/user-profile-icon-vector-avatar-600nw-2247726673.jpg" width="35px" height="35px" >'.$user.'</p>';
}
?>