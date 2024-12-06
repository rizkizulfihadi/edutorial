<?php 
require __DIR__ . '/functions/functions.php';
include __DIR__ . '/includes/session.php';

$active_article = "active";
$active_post = "active";
$title = "Dashboard - Post" ;

include __DIR__ . '/includes/header-admin.php'; 

$namaUser = $user["nama_lengkap"];

$sql = <<<SQL
  SELECT a.id_artikel, a.judul_artikel, a.image, a.tanggal_dibuat, a.pic, k.nama_kategori 
  FROM artikel AS a INNER JOIN kategori_artikel AS k ON k.id_kategori = a.id_kategori
  WHERE pic = '$namaUser';
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
            <h1>Posts</h1>
            <div class="section-header-button">
              <a href="create-post.php" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">All Posts</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Posts</h2>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Judul Artikel</th>
                            <th>Thumbnail</th>
                            <th>Tanggal dibuat</th>
                            <th>Kategori</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1;?>
                          <?php foreach( $artikel as $row ): ?>
                          <tr>
                            <td><?= $i++ ?></td>
                            <td style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 200px;">
                              <?= $row["judul_artikel"] ?>
                              <div class="table-links">
                                <a href="view-post.php?id=<?= $row["id_artikel"] ?>">View</a>
                                <div class="bullet"></div>
                                <a href="edit-post.php?id=<?= $row["id_artikel"] ?>">Edit</a>
                                <div class="bullet"></div>
                                <a href="delete-post.php?id=<?= $row["id_artikel"] ?>" onclick="return confirm('Yakin ?')" class="text-danger">Delete</a>
                              </div>
                            </td>
                            <td>
                              <img alt="image" src="assets/img/articles/<?= $row["image"] ?>" class="" width="100" height="50" data-toggle="tooltip" \>
                            </td>
                            <td><?= tgl_indo(date($row["tanggal_dibuat"])) ?></td>
                            <td><div class="badge badge-primary"><?= $row["nama_kategori"] ?></div></td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
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