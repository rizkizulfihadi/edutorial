<?php 
require __DIR__ . '/functions/functions.php';
include __DIR__ . '/includes/session.php';

$active_article = "active";
$active_allPost = "active";
$title = "Dashboard - Post" ;

include __DIR__ . '/includes/header-admin.php'; 

$jumlahDataPerhalaman = 9;
$jumlahData = count(query("SELECT * FROM artikel"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

$sql = <<<SQL
  SELECT a.id_artikel, a.judul_artikel, a.image, a.tanggal_dibuat, a.pic, a.isi_artikel, k.nama_kategori 
  FROM artikel AS a INNER JOIN kategori_artikel AS k ON (k.id_kategori = a.id_kategori) OFFSET $awalData LIMIT $jumlahDataPerhalaman;
SQL;
$artikel = query($sql);

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
            <h1>Article</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">All Posts</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">All Article</h2>
            <div class="row">
            <?php foreach( $artikel as $row ) : ?>  
                <div class="col-12 col-md-4 col-lg-4">
                <article class="article article-style-c">
                  <div class="article-header">
                    <div class="article-image" data-background="assets/img/articles/<?= $row["image"] ?>">
                    </div>
                    <div class="article-title">
                      <h2><a href="view-artikel.php?id=<?= $row["id_artikel"] ?>"><?= $row["judul_artikel"] ?></a></h2>
                    </div>
                  </div>
                  <div class="article-details">
                  <div class="article-category mb-4"><a href="#"><?= $row["nama_kategori"] ?></a> <div class="bullet"></div> <a href="#"><?= tgl_indo($row["tanggal_dibuat"]) ?></a></div>
                    <div class="article-user-details">
                        <div class="user-detail-name d-flex justify-content-between">
                          <p><?= $row["pic"] ?></p>
                          <a href="view-artikel.php?id=<?= $row["id_artikel"] ?>">Read More <i class="fas fa-chevron-right"></i></a>
                        </div>
                        
                      </div>
                  </div>
                </article>
              </div>
            <?php endforeach ?>
            </div>
            <nav>
        <ul class="pagination justify-content-end my-4 mb-5">
            <?php if( $halamanAktif > 1 ):?>
            <li class="page-item">
                <a class="page-link" href="?halaman=<?= $halamanAktif - 1 ?>" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <?php else : ?>
            <li class="page-item disabled">
                <a class="page-link" href="?halaman=<?= $halamanAktif - 1 ?>" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <?php endif; ?>

            <?php for($i = 1; $i <= $jumlahHalaman; $i++): ?>
                <?php if($halamanAktif == $i) : ?>
                    <li class="page-item active"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
                <?php else : ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if( $halamanAktif < $jumlahHalaman ):?>
            <li class="page-item">
                <a class="page-link" href="?halaman=<?= $halamanAktif + 1 ?>" tabindex="-1" aria-disabled="true">Next</a>
            </li>
            <?php else : ?>
            <li class="page-item disabled">
                <a class="page-link" href="?halaman=<?= $halamanAktif + 1 ?>" tabindex="-1" aria-disabled="true">Next</a>
            </li>
            <?php endif; ?>
        </ul>
    </nav>
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