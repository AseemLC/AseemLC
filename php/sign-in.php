<?php
    require'header.php';
    ?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="sign-in.php" method="post">
        <input type="text" placeholder="Enter a username" name="username" required maxlength="30"><br>
        <input type="password" placeholder="Enter a password" name="password" required maxlength="255"><br>
        <input type="password" placeholder="re-enter your password" name="conf_pass" required maxlength="255">
        <input type="submit" name="signin">
    </form>
    <?php
    if(isset($_GET['error'])) {$err= $_GET['error'];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error!</strong> '.$err.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}
    require'footer.php';
    $conn = include('dbconnect.php');
    if(isset($_POST['signin'])){
       
        $username=$_POST['username'];
        $password=$_POST['password'];
        $conf_password=$_POST['conf_pass'];
        if($password==$conf_password){
            $que="SELECT * FROM `tbl_user` WHERE username='$username'";
        $result=mysqli_query($conn,$que);
        if(mysqli_num_rows($result)==0){
        $hased_password=password_hash($password,PASSWORD_DEFAULT);
        $que="INSERT INTO `tbl_user` (`uid`, `username`, `password`) VALUE ('','$username', '$hased_password');";
         mysqli_query($conn,$que);
       echo"sucessfully Created account!";
        $_SESSION['username']=$username;
        $_SESSION['islog']=true;
       header("Location:forum.php"); 
        exit;
        }
        else{
            $error="username exist";
        }
        }else{
                $error="Please check your password";
            }
            header("Location:sign-in.php?error=$error");
        }
    ?>
</body>

</html>