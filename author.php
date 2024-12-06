<?php 
require __DIR__ . '/functions/functions.php';

include __DIR__ . '/includes/session.php';

$title = "Dashboard - author" ;
$active_admin = "active";
$active_author = "active";

$id = $user["id_user"];
$author = query("SELECT * FROM admin WHERE id_user != $id");

include __DIR__ . '/includes/header-admin.php'; ?>
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
              <div class="breadcrumb-item"><a href="#">Components</a></div>
              <div class="breadcrumb-item">User</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Author</h2>
            <?php foreach($author as $row): ?>
            <div class="row">
              <div class="col-12 col-sm-12 col-lg-11 mx-auto">
                <div class="card mt-4">
                  <div class="card author-box card-primary">
                  <div class="card-body d-flex align-items-center justify-content-start-0">
                    <div class="author-box-left">
                      <img alt="image" src="assets/img/avatar/<?= $row["image"] ?>" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <!-- <a href="#" class="btn btn-primary mt-3 follow-btn" data-follow-action="alert('follow clicked');" data-unfollow-action="alert('unfollow clicked');">Follow</a> -->
                    </div>
                    <div class="author-box-details">
                      <div class="author-box-name">
                        <a href="#"><?= $row["nama_lengkap"] ?></a>
                      </div>
                      <div class="author-box-job">Author</div>
                      <div class="author-box-description">
                        <p><?= $row["bio"] ?></p>
                      </div>
                      <div class="mb-2 mt-3"><div class="text-small font-weight-bold">Follow Hasan On</div></div>
                      <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                      <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                        <i class="fab fa-twitter"></i>
                      </a>
                      <a href="#" class="btn btn-social-icon mr-1 btn-github">
                        <i class="fab fa-github"></i>
                      </a>
                      <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                        <i class="fab fa-instagram"></i>
                      </a>
                      <div class="w-100 d-sm-none"></div>
                      <div class="float-right mt-sm-0 mt-3">
                        <a href="post-by-name.php?idUser=<?= $row["id_user"] ?>" class="btn">View Posts <i class="fas fa-chevron-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
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
<?php include __DIR__ . '/includes/footer-admin.php'; ?>