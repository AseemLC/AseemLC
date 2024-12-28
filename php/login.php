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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <form action="login.php" method="post">
            <input type="text" placeholder="Enter a username" name="username" required maxlength="30"><br>
            <input type="password" placeholder="Enter a password" name="password" required maxlength="255"><br>
            <input type="submit" name="login">
        </form>
        <?php 
        
        if(isset($_GET['error'])) {$err= $_GET['error'];
            echo'
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error!</strong> '.$err.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';     
        }
        require'footer.php';
        $conn = include('dbconnect.php');
        if(isset($_POST['login'])){
            $username=$_POST['username'];
            $password=$_POST['password'];
                $que="SELECT * FROM `tbl_user` WHERE username='$username'";
            $result=mysqli_query($conn,$que);
            if(mysqli_num_rows($result)==1){
                while($row=mysqli_fetch_assoc($result))
                {
                    $hash_pass=$row['password'];
            if(password_verify($password,$hash_pass)){
            echo"sucessfully Logged as".$username."!";
            $_SESSION['username']=$username;
            $_SESSION['islog']=true;
            header("Location:forum.php");
            exit;
        }
        else{
            $error="Invalid password";
        }
            }
        }
        else{
            $error="Username doesn't exist";
        }
                header("Location:login.php?error=$error");
                exit;
            }
        ?>
    </body>

    </html>