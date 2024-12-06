<?php 
require __DIR__ . '/functions/functions.php';
include __DIR__ . '/includes/session.php';

$title = "Dashboard - view post" ;
$active_article = "active";
$active_post = "active";
include __DIR__ . '/includes/header-post.php'; 

$id = $_GET["id"];

$sql = <<<SQL
  SELECT a.judul_artikel, a.image, a.isi_artikel ,a.tanggal_dibuat, a.waktu_dibuat, a.pic, k.nama_kategori, u.image AS avatar 
  from kategori_artikel AS k left join artikel AS a on (k.id_kategori = a.id_kategori)
  left join admin AS u on (u.id_user = a.id_user)
  WHERE id_artikel = $id;
SQL;
$artikel = query($sql)[0];

?>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <!-- navbar -->
      <?php include __DIR__ . "/includes/navbar.php" ?>
      

      <!-- sidebar -->
      <?php include __DIR__ . '/includes/side-bar.php' ?>


      <!-- Main Content -->    
      <div class="main-content">
        <section class="section" id="hasil-pencarian">
          <div class="section-header">
            <div class="section-header-back">
              <a href="post.php" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Post</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">Create New Post</div>
            </div>
          </div>

          <div class="section-body">
          <h2 class="section-title">View Posts</h2>
              <div class="row">
                <div class="col-12 col-lg-7 mx-auto">
                  <div class=" view-artikel"> 
                    <h1><?= $artikel["judul_artikel"] ?></h1>
                    <img src="assets/img/articles/<?= $artikel["image"] ?>" class="w-100 image-thumbnail" alt="<?= $artikel["image"] ?>">
                    <div class="d-flex align-items-center my-3 justify-content-between">
                        <section class="d-flex align-items-center">
                            <div class="image_author">
                                <img src="assets/img/avatar/<?= $artikel["avatar"] ?>" width="50" class="rounded-circle mr-2" alt="annie">
                            </div>
                            <div class="post">
                                <div class="author"><?= $artikel["pic"] ?></div>
                                <div class="date_and_category"><?= tgl_indo(date($artikel["tanggal_dibuat"]))  ?> &bull; <?= waktu($artikel["waktu_dibuat"]) ?></div>
                            </div>
                        </section>
                        <button class="btn btn-primary badge-pill d-block ms-auto"><?= $artikel["nama_kategori"] ?></button>
                    </div>
                    <article class="content mt-4">
                        <?= $artikel["isi_artikel"] ?>
                    </article>
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
