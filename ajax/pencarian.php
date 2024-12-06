<?php 

require __DIR__ . '/../functions/functions.php';

$connection = getConnection();
$keyword = $_GET["keyword"];


$sql = <<<SQL
            SELECT a.id_artikel, a.judul_artikel, a.image, a.tanggal_dibuat, a.pic, a.isi_artikel, k.nama_kategori 
            FROM artikel AS a INNER JOIN kategori_artikel AS k ON (k.id_kategori = a.id_kategori) 
            WHERE judul_artikel ILIKE '%$keyword%' OR
                    pic ILIKE '%$keyword%' OR
                    nama_kategori ILIKE '%$keyword%' 
          SQL;           

$artikel = $connection->query($sql)->fetchAll();


?>

<section class="section">
    <div class="section-header">
    <h1>Hasil pencarian</h1>

    </div>
    <div class="section-body">
    <h2 class="section-title"><?= $keyword ?></h2>
    <div class="row">
    <?php foreach( $artikel as $row ) : ?>  
        <div class="col-12 col-md-4 col-lg-4">
        <article class="article article-style-c">
            <div class="article-header">
            <div class="article-image">
                <img src="assets/img/articles/<?= $row["image"] ?>" style="width:100%;height:100%;object-fit:cover;" alt="">
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
    
    </div>
</section>