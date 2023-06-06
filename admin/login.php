<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/dist/css/adminlte.min.css">
</head>
<?php
require_once('../vendor/autoload.php');
require_once("../config/database.php");
session_start();
if(isset($_SESSION['useradmin'])){
    header("location:index.php");
}
use App\Models\User;
if(isset($_POST['DANGNHAP'])){
    $username=$_POST['username'];
    $password=sha1($_POST['password']);
    if(filter_var($username, FILTER_VALIDATE_EMAIL)){
        $args = [
            ['email','=', $username],
            ['roles','=',1],
            ['status','=',1]
        ];
    }else{
        $args = [
            ['username','=', $username],
            ['roles','=',1],
            ['status','=',1]
        ];
    }
    $row = User::where($args)->first();
    if($row != null){
        if($row->password==$password){
            $_SESSION['useradmin']=$username;
            $_SESSION['name']=$row->name;
            $_SESSION['img']=$row->image;
            header("location:index.php");
        }
        else{
            $error_login="Mật khẩu không chính xác";
        }
    }else{
        $error_login="Tên đăng nhập không chính xác";
    }
}
?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Đăng nhập </b>Hệ thống</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg" style="color:red;">
      <?php if(isset($error_login)):?>
        <?=$error_login?>      
          <?php endif;?>
      </p>
      <form action="login.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Email hoặc Tên đăng nhập" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block" name="DANGNHAP">Đăng nhập</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/dist/js/adminlte.min.js"></script>
</body>
</html>
