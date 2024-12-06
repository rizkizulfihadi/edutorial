<?php 
$title = "Dashboard" ;
$active_dashboard = "active";
require __DIR__ . '/functions/functions.php';
include __DIR__ . '/includes/session.php';
include __DIR__ . '/includes/header-admin.php'; 

$sqlAdmin = "SELECT COUNT(id_user) FROM admin";
$sqlArtikel = "SELECT COUNT(id_artikel) FROM artikel";

$jumlahAdmin = $connection->query($sqlAdmin)->fetchColumn();
$jumlahArtikel = $connection->query($sqlArtikel)->fetchColumn();



?>
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
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Admin</h4>
                  </div>
                  <div class="card-body">
                    <?= $jumlahAdmin ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Artikel</h4>
                  </div>
                  <div class="card-body">
                    <?= $jumlahArtikel ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-video"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Video</h4>
                  </div>
                  <div class="card-body">
                    2
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Webinar</h4>
                  </div>
                  <div class="card-body">
                    2
                  </div>
                </div>
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
<?php include __DIR__ . '/includes/footer-admin.php'; ?>