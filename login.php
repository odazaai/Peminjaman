<?php
require_once('database.php');
session_start();

if(isset($_POST['masuk'])){
  $username=$_POST['username'];
  if (cek_login($_POST['username'], $_POST['password'])){
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    if ($_SESSION['role']=="Admin"){
      header("location:home.php");
    }else{
      header("location:home_user.php");
    }
  }else{
    header("location:login.php?msg=gagal");
  }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peminjaman</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="bg-success bg-opacity-25">
    <div class="container">
        <br><br><br><br><br><br>

    <div class="card position-absolute top-50 start-50 translate-middle" style="width: 20rem;">
     <div class="card-body shadow h-100 py-2">
      <br>
       <h4 class="card-title"><center>Welcome Back!</center></h4>
       <h6 class="card-subtitle mb-2 text-body-secondary"><center>Login to Continue</center></h6>
       <br>
       <form action="" method="post">
      <div class="form-group">
         <input type="user" class="form-control" name="username" placeholder="Username">
      </div>
      <br>
      <div class="form-group">
         <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
      <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div>
      <div class="form-group">
        <button type="submit" name="masuk" class="btn btn-success">Login</button>
      </div>
      <br>
    </form>
  </div>
</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>