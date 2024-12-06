<?php 
$title = "Register - Edutorial";
require __DIR__ . "/functions/functions.php";
include __DIR__ . '/includes/header-auth.php';

if(isset($_POST["register"])){

  if( registrasi($_POST) == 1 ){
    echo "
    <script type='text/javascript'>
    swal('Registrasi Berhasil', 'Halaman akan Redirect', 'success'); 
    function redirect(){
      window.location.href = 'login.php';
    }
    setTimeout(redirect, 3000)
    </script>";
  }elseif( registrasi($_POST) == 2 ){
    echo "
    <script type='text/javascript'>
      swal('', 'username sudah terdaftar', 'warning'); 
    </script>";
  }elseif( registrasi($_POST) == 3 ){
    echo "
    <script type='text/javascript'>
      swal('', 'Password tidak sama', 'info'); 
    </script>";
  }elseif( registrasi($_POST) == 4 ){
    echo "
    <script type='text/javascript'>
      swal('', 'Ukuran Gambar maksimal 1 mb', 'info'); 
    </script>";
  }else{
    echo "
    <script type='text/javascript'>
      swal('', 'Registrasi Gagal', 'error'); 
    </script>";
  }
}

?>

<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="assets/img/logo.png" alt="logo" width="60">
              <span>EDUTORIAL</span>
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="nama_depan">Nama Depan</label>
                      <input id="nama_depan" type="text" class="form-control" name="nama_depan" autofocus required>
                    </div>
                    <div class="form-group col-6">
                      <label for="nama_belakang">Nama Belakang</label>
                      <input id="nama_belakang" type="text" class="form-control" name="nama_belakang" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="username">Username</label>
                      <input id="username" type="text" class="form-control" name="username" autofocus required>
                    </div>
                    <div class="form-group col-6">
                      <label for="email">Email</label>
                      <input id="email" type="text" class="form-control" name="email" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="konfirmasi_password" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="bio">bio</label>
                    <textarea name="bio" id="bio" class="form-control" cols="50" rows="500" required></textarea>
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="form-divider">
                    Foto
                  </div>
                  <div class="form-group row mb-4">
                    <div class="col-sm-12 col-md-7">
                      <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="image" id="image-upload" required />
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" name="register" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
              <div class="mt-3 text-muted text-center">
              Have account? <a href="login.php">Login</a>
            </div>
         
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