<?php 
require __DIR__ . '/functions/functions.php';
$title = "Home";
include __DIR__ . '/includes/header.php';

$jumlahDataPerhalaman = 9;
$jumlahData = count(query("SELECT * FROM artikel"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

$sql = <<<SQL
        select a.id_artikel, a.judul_artikel, a.isi_artikel, a.pic, a.tanggal_dibuat, a.image, k.nama_kategori, u.id_user, u.image AS avatar
        from kategori_artikel AS k left join artikel AS a on (k.id_kategori = a.id_kategori)
        left join admin AS u on (u.id_user = a.id_user) OFFSET $awalData LIMIT $jumlahDataPerhalaman
       SQL;
                
$artikel = query($sql);


?>
<header>
    <nav class="nav_category">
        <ul>
            <li>
                <a href="more-artikel.php?kategori=Web Development">Web Developement</a>
                <a href="more-artikel.php?kategori=Kecerdasan Buatan">Kecerdasan Buatan</a>
            </li>
            <li>
                <a href="more-artikel.php?kategori=Mikroprocessor">Microprocessor</a>
                <a href="more-artikel.php?kategori=Jaringan Komputer">Jaringan Komputer</a>
            </li>
        </ul>
    </nav>
    <div class="hero">
        <h1>Cari artikel yang anda inginkan</h1>
        <form action="" class="mt-4">
            <input type="text" placeholder="Cari artikel" id="keyword" name="keyword" autocomplete="off" autofocus>
            <button type="submit" name="cari" id="tombol-cari">Cari</button>
        </form>
    </div>
</header>
<div class="container">
    <div id="hasil-pencarian">


    <!-- head category -->
    <div class="head_category mt-5">
        <h1>Artikel</h1>
    </div>

    <!-- Category Web Development -->
    <div class="category">
        <p>Semua Artikel</p>
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

    <div class="form_subscribe">
        <h3>Ikuti perkembangan terbaru di bidang teknologi</h3>
        <p>Subscribe untuk mendapat tutorial menarik lainnya</p>
        <form action="" class="mt-4">
            <input type="email" placeholder="Email*" autocomplete="off" autofocus>
            <button type="submit" name="subscribe">Subscribe</button>
        </form>
    </div>
</div>

<footer>
    <div class="footer_information">
        <div class="description me-5">
            <div class="logo">
                <img src="assets/img/logo.png" alt="logo">
                <span>EDUTORIAL</span>
            </div>
            <p class="my-4">We are Educatios, create your passion and inspiration. And hope success will come for your dream. Please send email and get latest tutorial.</p>
            <p><i class="fa fa-phone footer-icon"></i> +62 8231 5940 406</p>
            <p><i class="fa fa-envelope footer-icon"></i> edutech@gmail.com</p>
            <p><i class="fa fa-map-marker footer-icon"></i> Baleendah, Bandung, Indonesia</p>
        </div>
        <div class="active_links ms-md-5">
            <h2>Links</h2>
            <ul>
                <li><a href=""><i class="fa fa-long-arrow-right footer-icon"></i>Home</a></li>
                <li><a href=""><i class="fa fa-long-arrow-right footer-icon"></i>Artikel</a></li>
                <li><a href=""><i class="fa fa-long-arrow-right footer-icon"></i>Video</a></li>
                <li><a href=""><i class="fa fa-long-arrow-right footer-icon"></i>Webinar</a></li>
                <li><a href=""><i class="fa fa-long-arrow-right footer-icon"></i>Login</a></li>
            </ul>
        </div>
        <div class="active_links social">
            <h2>SocialMedia</h2>
            <ul>
                <li><a href=""><i class="fa fa-brands fa-facebook"></i>edutorial</a></li>
                <li><a href=""><i class="fa fa-brands fa-instagram"></i>edutorial</a></li>
                <li><a href=""><i class="fa fa-brands fa-youtube"></i>edutorial</a></li>
                <li><a href=""><i class="fa fa-brands fa-twitter"></i>@edutorial</a></li>
            </ul>
        </div>
    </div>
    
    <p class="copyright">&copy; edutech 2023</p>
</footer>

<script src="assets/js/pencarian.js"></script>
<?php include __DIR__ . '/includes/footer.php' ?>
