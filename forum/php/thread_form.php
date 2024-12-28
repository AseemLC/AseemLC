<?php
require'header.php';
$conn=include('dbconnect.php');
  $cat_id=$_GET['cat_id']; // Use $cat_id consistently

if(isset($_SESSION['islog'])){
echo'<form method="POST" action="thread_form.php?cat_id='.$cat_id.'">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Enter Your problem:</label>
    <input type="text" name="thread_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" maxlength="30" required>
    <small>Please Enter Title only here of maxlength"30"</small>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Enter the description of your problem Here</label>
    <input type="text" name="thread_desc"class="form-control" id="exampleInputPassword1" required>
  </div>
  <input type="submit" name="Submit"class="btn btn-primary">
</form>';

if(isset($_POST['Submit'])){
    $username=$_SESSION['username'];
    $thread_title=$_POST['thread_title'];
    $thread_desc=$_POST['thread_desc'];
    $sql="INSERT INTO thread VALUE('','$user','$thread_desc','$cat_id','$thread_title');"; // Use $cat_id here
    $a=mysqli_query($conn,$sql);
    if($a){   
        echo'<div class="alert alert-Sucess" role="alert">
         Sucessfully!,Entered your problem.
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else{
        echo'<div class="alert alert-danger" role="alert">
         Unable to Enter your problem.
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        header("Location:thread_form.php?cat_id=$cat_id"); // Use $cat_id here
    }
}
}
else{
    $error="You have to log-in into website first";
    header("Location:login.php?error='.$error.'"); // Use $cat_id here
    exit;
}
require'footer.php';
?>