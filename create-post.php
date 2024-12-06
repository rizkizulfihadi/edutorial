<?php 
require __DIR__ . '/functions/functions.php';
include __DIR__ . '/includes/session.php';

$title = "Dashboard - create post" ;
$active_article = "active";
$active_post = "active";
include __DIR__ . '/includes/header-post.php'; 

if( isset($_POST["submit"]) ){

  if( createPost($_POST) == 1  ){
    echo "
    <script type='text/javascript'>
    swal('Artikel Berhasil dibuat', 'success'); 
    function redirect(){
      window.location.href = 'post.php';
    }
    setTimeout(redirect, 2000)
    </script>";
  }elseif( createPost($_POST) == 4 ){
    echo "
    <script type='text/javascript'>
      swal('', 'Ukuran Gambar maksimal 1 mb', 'info'); 
    </script>";
  }else{
    echo "
    <script type='text/javascript'>
      swal('', 'Artikel gagal dibuat', 'danger'); 
    </script>";
  }
}

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
            <h1>Article Post</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">Create New Post</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Create New Post</h2>                                   
            <form action="" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="pic" value="<?= $user["nama_lengkap"] ?>">
              <input type="hidden" name="id_user" value="<?= $user["id_user"] ?>">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Write Your Post</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                        <div class="col-sm-12 col-md-8">
                          <input type="text" class="form-control" name="judul_artikel">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                        <div class="col-sm-12 col-md-8">
                          <select class="form-control selectric" name="id_kategori">
                            <option value="K01">Web Developement</option>
                            <option value="K02">Kecerdasan Buatan</option>
                            <option value="K03">Jaringan Komputer</option>
                            <option value="K04">Mikroprocessor</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                        <div class="col-sm-12 col-md-8">
                          <textarea class="summernote" name="isi_artikel"></textarea>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                        <div class="col-sm-12 col-md-8">
                          <div id="image-preview" class="image-preview post">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                          </div>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-8">
                          <button type="submit" class="btn btn-primary" name="submit">Create Post</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>

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
