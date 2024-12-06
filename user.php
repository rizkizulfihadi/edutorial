<?php 
require __DIR__ . '/functions/functions.php';
include __DIR__ . '/includes/session.php';

$title = "Dashboard - User";
$active_admin = "active";
$active_user = "active";

if(isset($_POST["submit"])){
  if( editUser($_POST) == 1  ){
    echo "
    <script>
      alert('Data User berhasil diperbarui'); 
    </script>";
  }else{
    echo "
    <script>
      alert('User gagal diperbarui'); 
    </script>";
  }
}

include __DIR__ . '/includes/header-post.php'; ?>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <!-- navbar -->
      <?php include __DIR__ . "/includes/navbar.php" ?>
      <!-- end navbar -->

      <!-- sidebar -->
      <?php include __DIR__ . '/includes/side-bar.php' ?>
      <!-- end sidebar -->

      <!-- Main Content -->
      <div class="main-content">
        <section class="section" id="hasil-pencarian">
          <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Hi, <?= $user["nama_lengkap"] ?></h2>
            <p class="section-lead">
              Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">                     
                    <img alt="image" src="assets/img/avatar/<?= $user["image"] ?>" class="rounded-circle profile-widget-picture">
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name"><?= $user["nama_lengkap"] ?> <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Author</div></div>
                    <?= $user["bio"] ?>
                  </div>
                  <div class="card-footer text-center">
                    <div class="font-weight-bold mb-2">Follow <?= $user["nama_lengkap"] ?>  On</div>
                    <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-github mr-1">
                      <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-instagram">
                      <i class="fab fa-instagram"></i>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form method="post">
                    <input type="hidden" name="id_user" value="<?= $user["id_user"] ?>">
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" value="<?= $user["nama_lengkap"] ?>" name="nama_lengkap" required="">
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>username</label>
                            <input type="text" class="form-control" value="<?= $user["username"] ?>" name="username" required="">
                            <div class="invalid-feedback">
                              Please fill in the last name
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" value="<?= $user["email"] ?>" name="email" required="">
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                          </div>
                          
                        </div>
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Bio</label>
                            <textarea class="form-control summernote-simple" value="<?= $user["bio"] ?>" name="bio"><?= $user["bio"] ?></textarea>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2023 <div class="bullet"></div> BY EDUTORIAL</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
</div>
<script src="assets/js/pencarian-admin.js"></script>
<?php include __DIR__ . '/includes/footer-post.php'; ?>