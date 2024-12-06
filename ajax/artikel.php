<?php

require __DIR__ . '/../functions/functions.php';

$connection = getConnection();
$keyword = $_GET["keyword"];

$sql = <<<SQL
            select a.id_artikel, a.judul_artikel, a.isi_artikel, a.pic, a.tanggal_dibuat, a.image, k.nama_kategori, u.id_user, u.image AS avatar
            from kategori_artikel AS k left join artikel AS a on (k.id_kategori = a.id_kategori)
            left join admin AS u on (u.id_user = a.id_user)
            WHERE judul_artikel ILIKE '%$keyword%' OR
                    pic ILIKE '%$keyword%' OR
                    nama_kategori ILIKE '%$keyword%' 
            SQL;

$artikel = $connection->query($sql)->fetchAll();

?>

    <!-- Category Web Development -->
    <div class="category mt-5">
        <p>Hasil pencarian</p>
    </div>

    <article>
        <div class="row mt-4 justify-content-between">
            <?php foreach($artikel as $row) :?>
            <div class="col-lg-4 col-md-6 col-12 mb-5">
                <div class="thumbnail">
                    <a href="artikel.php?id=<?= $row["id_artikel"] ?>"><img src="assets/img/articles/<?= $row["image"] ?>" alt=""></a>
                </div>
                <div class="text_content">
                    <a href="artikel.php?id=<?= $row["id_artikel"] ?>" class="title"><?= $row["judul_artikel"] ?></a>
                    <div class="footer d-flex align-items-center mt-3">
                        <div class="image_author">
                            <img src="assets/img/avatar/<?= $row["avatar"] ?>" alt="<?= $row["avatar"] ?>">
                        </div>
                        <div class="post">
                            <div class="author"><?= $row["pic"] ?></div>
                            <div class="date_and_category"><?= tgl_indo($row["tanggal_dibuat"]) ?> &bull; <?= $row["nama_kategori"] ?></div>
                        </div>
                        <a class="ms-auto" href="artikel.php?id=<?= $row["id_artikel"] ?>"><svg class="svgIcon-use" width="25" height="25" viewBox="0 0 25 25"><path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path></svg></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </article>