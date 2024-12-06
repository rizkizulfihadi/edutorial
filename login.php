<?php 
session_start();

$title = "Login - Edutorial" ;

require __DIR__ . '/functions/functions.php';
include __DIR__ . '/includes/header-auth.php';

if( isset($_COOKIE["id"]) && isset($_COOKIE["key"]) ){
  $id = $_COOKIE["id"];
  $key = $_COOKIE["key"];

  $sql = "SELECT * FROM admin WHERE id_user = '$id'";
  $statement = $connection->query($sql);
  $result = $statement->fetch();

  if( $key === hash('sha256', $result["username"]) ){
    $_SESSION["login"] = true;
    $_SESSION["username"] = $result["username"];

  }

  if( isset( $_SESSION["login"] ) ){
    header("Location:dashboard.php");
  }
  

}

if( isset($_POST["login"]) ){

  $username = $_POST["username"];
  $password = $_POST["password"];

  // cek username

  $sql = "SELECT * FROM admin WHERE username = ? ";
  $statement = $connection->prepare($sql);
  $statement->execute([$username]);
  $result = $statement->fetch();

  if($result){

    if( password_verify($password, $result["password"]) ){
       // set session
       $_SESSION["login"] = true;
       $_SESSION["username"] = $result["username"];
 
 
       // set cookie
       if( isset($_POST["remember"]) ){
         setcookie('id', $result["id_user"], time() + 3600);
         setcookie('key', hash('sha256', $result["username"]), time() + 3600);
       }
       header('Location:dashboard.php');
       exit;
    }

  }

  $error = true;

}

 ?>
<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="assets/img/logo.png" alt="logo" width="60" class=" rounded-circle">
              <span>EDUTORIAL</span>
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>
          
              <div class="card-body">
                <form method="POST" action="" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your Username
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                    <?php if(isset($error)) : ?>
                      <small class="text-danger">Username / Password salah</small>
                    <?php endif; ?>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" name="login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-3 text-muted text-center">
              Don't have an account? <a href="register.php">Create One</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; EDUTORIAL 2023
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php include __DIR__ . '/includes/footer-auth.php' ?>